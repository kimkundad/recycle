<?php

namespace Tests\Feature;

use App\Support\DbTranslation\SourceRow;
use App\Support\DbTranslation\TranslatableFields;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

/** In-memory SQLite only; .env points at production MySQL. */
class I18nExportDbSourceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        DB::purge('sqlite');
        $this->assertSame('sqlite', DB::connection()->getDriverName());
        foreach (TranslatableFields::MAP as $table => $fields) {
            Schema::create($table, function (Blueprint $t) use ($fields) {
                $t->id();
                foreach ($fields as $f) {
                    $t->text($f['base'])->nullable();
                    if ($f['en']) {
                        $t->text($f['en'])->nullable();
                    }
                }
            });
        }
        DB::table('categories')->insert([
            ['id' => 2, 'cat_name' => 'เหล็ก', 'cat_name_en' => '  '],
            ['id' => 1, 'cat_name' => 'เศษ', 'cat_name_en' => 'Scrap'],
        ]);
    }

    public function test_hash_ignores_whitespace_and_changes_with_content(): void
    {
        $a = SourceRow::hash('categories', ['cat_name' => 'เหล็ก', 'cat_name_en' => '  ']);
        $b = SourceRow::hash('categories', ['cat_name' => ' เหล็ก ', 'cat_name_en' => null]);
        $c = SourceRow::hash('categories', ['cat_name' => 'เหล็ก', 'cat_name_en' => 'Steel']);
        $this->assertSame($a, $b);
        $this->assertNotSame($a, $c);
        $this->assertTrue(SourceRow::isBlank(" \n"));
        $this->assertFalse(SourceRow::isBlank('x'));
    }

    public function test_export_writes_sorted_rows_with_hash_and_blank_en_as_null(): void
    {
        $out = sys_get_temp_dir() . '/src-' . uniqid();
        $this->artisan('i18n:export-db-source', ['--out' => $out])->assertExitCode(0);

        $json = json_decode(File::get("$out/categories.json"), true);
        $this->assertSame('categories', $json['table']);
        $this->assertSame([1, 2], array_column($json['rows'], 'id'));
        $this->assertSame(['th' => 'เหล็ก', 'en' => null], $json['rows'][1]['fields']['cat_name']);
        $this->assertSame(SourceRow::hash('categories', ['cat_name' => 'เหล็ก', 'cat_name_en' => '  ']), $json['rows'][1]['source_hash']);
        $this->assertFileExists("$out/design_types.json");
        File::deleteDirectory($out);
    }
}
