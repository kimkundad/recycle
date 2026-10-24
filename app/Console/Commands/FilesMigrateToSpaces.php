<?php

namespace App\Console\Commands;

use App\Support\SpacesUpload;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

/**
 * One-off move of uploads that used to be written under public/ onto DO Spaces.
 * Files are fetched from the live site (uploads made on production never reached git),
 * so local copies are left alone. Safe to re-run: files already on Spaces are skipped.
 */
class FilesMigrateToSpaces extends Command
{
    protected $signature = 'files:migrate-to-spaces {--dry-run : Report only; upload nothing, write nothing} {--source=https://www.wpnrayong.com : Site the files are fetched from}';

    protected $description = 'Copy uploads still served from public/ to DO Spaces and repoint links embedded in HTML';

    /** table => [column holding a file name, old public/ folder, Spaces folder]. The name itself is kept. */
    public const COLUMNS = [
        'alliances' => ['image', 'img/alliance', 'alliance'],
        'brands' => ['image', 'img/brand', 'brand'],
        'certificates' => ['image', 'img/certificate', 'certificate'],
        'hprojects' => ['image', 'img/hproject', 'hproject'],
        'slideshows' => ['image', 'img/slide', 'slide'],
        'news' => ['image', 'media', 'news'],
        'settings' => ['facebook_image', 'media', 'setting'],
    ];

    /** HTML columns whose embedded editor images (/img/all_image/, /media/) move to the editor/ folder. */
    public const HTML = ['news' => ['detail', 'detail_en', 'detail_zh']];

    /** A link to an editor image on this site: absolute, or root-relative right after a quote, "(" or "=". */
    private const EMBED = '~(?:https?://(?:www\.)?wpnrayong\.com|(?<=["\'(=]))/(img/all_image|media)/([^"\'\s<>)]+)~';

    private array $done;
    private array $stats;

    public function handle(): int
    {
        $this->done = [];
        $this->stats = ['uploaded' => 0, 'present' => 0, 'missing' => 0, 'rows' => 0];

        if ($this->option('dry-run')) {
            $this->warn('Dry run: nothing is uploaded or written.');
        }

        foreach (self::COLUMNS as $table => [$column, $from, $folder]) {
            $names = DB::table($table)->whereNotNull($column)->where($column, '<>', '')->distinct()->pluck($column);
            foreach ($names as $name) {
                $this->copy($from, $folder, $name);
            }
        }

        foreach (self::HTML as $table => $columns) {
            $this->rewriteEmbeds($table, $columns);
        }

        $s = $this->stats;
        $this->info("Done: {$s['uploaded']} uploaded, {$s['present']} already on Spaces, {$s['missing']} missing, {$s['rows']} rows updated" . ($this->option('dry-run') ? ' (dry run)' : '') . '.');

        return self::SUCCESS;
    }

    private function rewriteEmbeds(string $table, array $columns): void
    {
        $updates = [];
        foreach (DB::table($table)->select(array_merge(['id'], $columns))->orderBy('id')->get() as $row) {
            $changed = [];
            foreach ($columns as $column) {
                if ($row->$column === null) {
                    continue;
                }
                $html = preg_replace_callback(self::EMBED, function ($m) {
                    $name = rawurldecode($m[2]);
                    return $this->copy($m[1], 'editor', $name) ? SpacesUpload::publicUrl('editor', $name) : $m[0];
                }, $row->$column);
                if ($html !== $row->$column) {
                    $changed[$column] = $html;
                }
            }
            if ($changed) {
                $updates[$row->id] = $changed;
                $this->line("$table #{$row->id}: " . implode(', ', array_keys($changed)));
            }
        }

        if (!$this->option('dry-run')) {
            DB::transaction(function () use ($table, $updates) {
                foreach ($updates as $id => $changed) {
                    DB::table($table)->where('id', $id)->update($changed);
                }
            });
        }
        $this->stats['rows'] += count($updates);
    }

    /** Ensure public/{$from}/{$name} is on Spaces as {$folder}/{$name}; false when the source is gone. */
    private function copy(string $from, string $folder, string $name): bool
    {
        $target = SpacesUpload::path($folder, $name);
        if (isset($this->done[$target])) {
            return $this->done[$target];
        }

        $disk = Storage::disk(SpacesUpload::DISK);
        if ($disk->exists($target)) {
            $this->stats['present']++;
            return $this->done[$target] = true;
        }

        $response = Http::timeout(60)->get(rtrim($this->option('source'), '/') . "/$from/" . rawurlencode($name));
        if (!$response->successful()) {
            $this->warn("missing $from/$name (HTTP {$response->status()})");
            $this->stats['missing']++;
            return $this->done[$target] = false;
        }

        if (!$this->option('dry-run')) {
            $body = $response->body();
            $disk->put($target, $body, 'public');
            if ($disk->size($target) !== strlen($body)) {
                throw new RuntimeException("size mismatch after upload: $target");
            }
        }
        $this->line("upload $from/$name -> $target");
        $this->stats['uploaded']++;

        return $this->done[$target] = true;
    }
}
