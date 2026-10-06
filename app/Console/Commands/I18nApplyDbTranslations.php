<?php

namespace App\Console\Commands;

use App\Support\DbTranslation\SourceRow;
use App\Support\DbTranslation\TranslatableFields;
use App\Support\DbTranslation\TranslationValidator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class I18nApplyDbTranslations extends Command
{
    protected $signature = 'i18n:apply-db-translations {--table=*} {--dry-run} {--dir=database/translations}';
    protected $description = 'Write reviewed translations into blank *_en / *_zh columns';

    public function handle(): int
    {
        $dir = preg_match('#^([A-Za-z]:|/)#', $this->option('dir')) ? $this->option('dir') : base_path($this->option('dir'));
        $tables = $this->option('table') ?: TranslatableFields::tables();
        $dry = (bool) $this->option('dry-run');
        $failed = false;
        if ($dry) {
            $this->warn('DRY RUN — nothing will be written');
        }

        foreach ($tables as $table) {
            if (!isset(TranslatableFields::MAP[$table]) || !is_file("$dir/$table.json")) {
                $this->line("$table: no translation file, skipped");
                continue;
            }
            $file = json_decode(file_get_contents("$dir/$table.json"), true);
            $source = json_decode(file_get_contents("$dir/source/$table.json"), true);
            $sourceById = array_column($source['rows'], null, 'id');

            $errors = TranslationValidator::errors($table, $file, $sourceById);
            if ($errors) {
                $failed = true;
                $this->error("$table: " . count($errors) . ' validation error(s), table not applied');
                foreach ($errors as $e) {
                    $this->line("  $e");
                }
                continue;
            }

            $written = 0;
            $rowsUpdated = 0;
            $filled = 0;
            $live = DB::table($table)->whereIn('id', array_column($file['rows'], 'id'))->get()->keyBy('id');

            $work = function () use ($table, $file, $live, $dry, &$written, &$rowsUpdated, &$filled) {
                foreach ($file['rows'] as $row) {
                    $current = $live[$row['id']] ?? null;
                    if (!$current) {
                        $this->line("  skipped id {$row['id']}: row no longer exists");
                        continue;
                    }
                    if (!$this->sourceUnchanged($table, $current, $row)) {
                        $this->line("  skipped id {$row['id']}: source changed since export");
                        continue;
                    }
                    $changes = [];
                    foreach (['en', 'zh'] as $lang) {
                        foreach ($row[$lang] ?? [] as $field => $value) {
                            $column = TranslatableFields::MAP[$table][$field][$lang];
                            if (!SourceRow::isBlank($current->{$column} ?? null)) {
                                $filled++;
                                continue;
                            }
                            $changes[$column] = $value;
                        }
                    }
                    if ($changes) {
                        $rowsUpdated++;
                        $written += count($changes);
                        $this->line("  id {$row['id']}: " . implode(', ', array_keys($changes)));
                        if (!$dry) {
                            DB::table($table)->where('id', $row['id'])->update($changes);
                        }
                    }
                }
            };
            $dry ? $work() : DB::transaction($work);

            $this->info("$table: $written fields written, $rowsUpdated rows, $filled fields already filled");
        }

        return $failed ? self::FAILURE : self::SUCCESS;
    }

    /**
     * True when the row's source still matches the export. English values this command
     * filled itself on an earlier run are ignored, so a re-run is not reported as an edit.
     */
    private function sourceUnchanged(string $table, object $current, array $row): bool
    {
        if (SourceRow::hash($table, $current) === $row['source_hash']) {
            return true;
        }
        $withoutOwnFills = clone $current;
        foreach ($row['en'] ?? [] as $field => $value) {
            $column = TranslatableFields::MAP[$table][$field]['en'];
            if (($withoutOwnFills->{$column} ?? null) === $value) {
                $withoutOwnFills->{$column} = null;
            }
        }

        return SourceRow::hash($table, $withoutOwnFills) === $row['source_hash'];
    }
}
