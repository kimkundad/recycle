<?php

namespace App\Console\Commands;

use App\Support\DbTranslation\SourceRow;
use App\Support\DbTranslation\TranslatableFields;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class I18nExportDbSource extends Command
{
    protected $signature = 'i18n:export-db-source {--out=database/translations/source}';
    protected $description = 'Export translatable DB content (read-only) for translation';

    public function handle(): int
    {
        $out = base_path($this->option('out'));
        if (str_starts_with($this->option('out'), '/') || preg_match('/^[A-Za-z]:/', $this->option('out'))) {
            $out = $this->option('out');
        }
        @mkdir($out, 0777, true);

        foreach (TranslatableFields::MAP as $table => $fields) {
            $columns = ['id'];
            foreach ($fields as $f) {
                $columns[] = $f['base'];
                if ($f['en']) {
                    $columns[] = $f['en'];
                }
            }
            $rows = [];
            foreach (DB::table($table)->orderBy('id')->get($columns) as $row) {
                $entry = ['id' => (int) $row->id, 'source_hash' => SourceRow::hash($table, $row), 'fields' => []];
                foreach ($fields as $field => $f) {
                    $entry['fields'][$field] = [
                        'th' => SourceRow::clean($row->{$f['base']}),
                        'en' => $f['en'] ? SourceRow::clean($row->{$f['en']}) : null,
                    ];
                }
                $rows[] = $entry;
            }
            file_put_contents("$out/$table.json", json_encode(['table' => $table, 'rows' => $rows], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "\n");
            $this->info("$table: " . count($rows) . ' rows');
        }

        return self::SUCCESS;
    }
}
