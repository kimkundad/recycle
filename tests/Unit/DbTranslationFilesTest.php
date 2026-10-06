<?php

namespace Tests\Unit;

use App\Support\DbTranslation\TranslatableFields;
use App\Support\DbTranslation\TranslationValidator;
use Tests\TestCase;

class DbTranslationFilesTest extends TestCase
{
    public static function tables(): array
    {
        return array_map(fn ($t) => [$t], TranslatableFields::tables());
    }

    /** @dataProvider tables */
    public function test_translation_file_matches_its_source(string $table): void
    {
        $dir = base_path('database/translations');
        if (!is_file("$dir/$table.json")) {
            $this->markTestSkipped("no translation file for $table yet");
        }
        $this->assertFileExists("$dir/source/$table.json");
        $file = json_decode(file_get_contents("$dir/$table.json"), true);
        $source = json_decode(file_get_contents("$dir/source/$table.json"), true);

        $this->assertSame([], TranslationValidator::errors($table, $file, array_column($source['rows'], null, 'id')));
    }

    /** @dataProvider tables */
    public function test_every_translatable_source_value_has_a_zh_translation(string $table): void
    {
        $dir = base_path('database/translations');
        if (!is_file("$dir/$table.json")) {
            $this->markTestSkipped("no translation file for $table yet");
        }
        $file = array_column(json_decode(file_get_contents("$dir/$table.json"), true)['rows'], null, 'id');
        $source = json_decode(file_get_contents("$dir/source/$table.json"), true)['rows'];

        $missing = [];
        foreach ($source as $row) {
            foreach ($row['fields'] as $field => $v) {
                $needsEn = TranslatableFields::MAP[$table][$field]['en'] && $v['en'] === null && $v['th'] !== null;
                if (($v['th'] !== null || $v['en'] !== null) && !isset($file[$row['id']]['zh'][$field])) {
                    $missing[] = "id {$row['id']} zh.$field";
                }
                if ($needsEn && !isset($file[$row['id']]['en'][$field])) {
                    $missing[] = "id {$row['id']} en.$field";
                }
            }
        }
        $this->assertSame([], $missing);
    }
}
