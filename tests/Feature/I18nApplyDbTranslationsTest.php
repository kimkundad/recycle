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
class I18nApplyDbTranslationsTest extends TestCase
{
    private string $dir;

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
                    $t->text($f['zh'])->nullable();
                }
            });
        }
        DB::table('categories')->insert([
            ['id' => 1, 'cat_name' => 'เศษ', 'cat_name_en' => 'Scrap', 'cat_name_zh' => null],
            ['id' => 2, 'cat_name' => 'เหล็ก', 'cat_name_en' => ' ', 'cat_name_zh' => null],
            ['id' => 3, 'cat_name' => 'ทองแดง', 'cat_name_en' => 'Copper', 'cat_name_zh' => '已有'],
        ]);
        DB::table('news')->insert(['id' => 1, 'title' => 'ข่าว', 'title_en' => 'News', 'detail' => '<p>ไทย</p>', 'detail_en' => '<p><b>Hi</b> there</p>']);

        $this->dir = sys_get_temp_dir() . '/tr-' . uniqid();
        File::makeDirectory($this->dir . '/source', 0777, true);
        $this->artisan('i18n:export-db-source', ['--out' => $this->dir . '/source'])->assertExitCode(0);
    }

    protected function tearDown(): void
    {
        File::deleteDirectory($this->dir);
        parent::tearDown();
    }

    private function hash(string $table, int $id): string
    {
        return SourceRow::hash($table, DB::table($table)->find($id));
    }

    private function writeFile(string $table, array $rows): void
    {
        File::put("{$this->dir}/$table.json", json_encode(['table' => $table, 'rows' => $rows], JSON_UNESCAPED_UNICODE));
    }

    private function apply(array $extra = [])
    {
        return $this->artisan('i18n:apply-db-translations', ['--dir' => $this->dir, '--table' => ['categories']] + $extra);
    }

    public function test_fills_only_blank_targets_and_is_idempotent(): void
    {
        $this->writeFile('categories', [
            ['id' => 1, 'source_hash' => $this->hash('categories', 1), 'zh' => ['cat_name' => '废料']],
            ['id' => 2, 'source_hash' => $this->hash('categories', 2), 'en' => ['cat_name' => 'Steel'], 'zh' => ['cat_name' => '钢材']],
            ['id' => 3, 'source_hash' => $this->hash('categories', 3), 'zh' => ['cat_name' => '铜']],
        ]);

        $this->apply()->assertExitCode(0);

        $this->assertSame('废料', DB::table('categories')->find(1)->cat_name_zh);
        $this->assertSame('Steel', DB::table('categories')->find(2)->cat_name_en, 'whitespace-only en counts as blank');
        $this->assertSame('钢材', DB::table('categories')->find(2)->cat_name_zh);
        $this->assertSame('已有', DB::table('categories')->find(3)->cat_name_zh, 'existing zh never overwritten');

        $this->apply()->expectsOutputToContain('categories: 0 fields written')->assertExitCode(0);
    }

    public function test_second_run_does_not_report_its_own_en_fills_as_source_changes(): void
    {
        $this->writeFile('categories', [
            ['id' => 2, 'source_hash' => $this->hash('categories', 2), 'en' => ['cat_name' => 'Steel'], 'zh' => ['cat_name' => '钢材']],
        ]);
        $this->apply()->assertExitCode(0);

        $this->apply()
            ->doesntExpectOutputToContain('source changed')
            ->expectsOutputToContain('categories: 0 fields written')
            ->assertExitCode(0);
    }

    public function test_dry_run_writes_nothing(): void
    {
        $this->writeFile('categories', [['id' => 1, 'source_hash' => $this->hash('categories', 1), 'zh' => ['cat_name' => '废料']]]);
        $this->apply(['--dry-run' => true])->expectsOutputToContain('DRY RUN')->assertExitCode(0);
        $this->assertNull(DB::table('categories')->find(1)->cat_name_zh);
    }

    public function test_rejects_ids_that_are_not_in_the_export(): void
    {
        $this->writeFile('categories', [
            ['id' => 1, 'source_hash' => $this->hash('categories', 1), 'zh' => ['cat_name' => '废料']],
            ['id' => 99, 'source_hash' => str_repeat('a', 64), 'zh' => ['cat_name' => 'x']],
        ]);
        $this->apply()->expectsOutputToContain('id 99: not in source export')->assertExitCode(1);
        $this->assertNull(DB::table('categories')->find(1)->cat_name_zh, 'table aborted as a whole');
        $this->assertNull(DB::table('categories')->find(99));
    }

    public function test_skips_rows_whose_source_changed_after_export(): void
    {
        $this->writeFile('categories', [['id' => 1, 'source_hash' => $this->hash('categories', 1), 'zh' => ['cat_name' => '废料']]]);
        // An admin edits the source after the export.
        DB::table('categories')->where('id', 1)->update(['cat_name_en' => 'Scrap metal']);

        $this->apply()->expectsOutputToContain('skipped id 1: source changed')->assertExitCode(0);
        $this->assertNull(DB::table('categories')->find(1)->cat_name_zh);
    }

    public function test_skips_rows_deleted_after_export(): void
    {
        $this->writeFile('categories', [['id' => 1, 'source_hash' => $this->hash('categories', 1), 'zh' => ['cat_name' => '废料']]]);
        DB::table('categories')->where('id', 1)->delete();

        $this->apply()->expectsOutputToContain('skipped id 1: row no longer exists')->assertExitCode(0);
        $this->assertNull(DB::table('categories')->find(1));
    }

    public function test_rejects_overlong_values_before_writing(): void
    {
        $this->writeFile('categories', [
            ['id' => 1, 'source_hash' => $this->hash('categories', 1), 'zh' => ['cat_name' => str_repeat('长', 200)]],
            ['id' => 2, 'source_hash' => $this->hash('categories', 2), 'zh' => ['cat_name' => '钢材']],
        ]);
        $this->apply()->expectsOutputToContain('too long')->assertExitCode(1);
        $this->assertNull(DB::table('categories')->find(2)->cat_name_zh, 'table aborted as a whole');
    }

    public function test_rejects_html_with_different_tags(): void
    {
        $this->writeFile('news', [['id' => 1, 'source_hash' => $this->hash('news', 1), 'zh' => ['detail' => '<p>你好 那里</p>']]]);
        $this->artisan('i18n:apply-db-translations', ['--dir' => $this->dir, '--table' => ['news']])
            ->expectsOutputToContain('tag mismatch')
            ->assertExitCode(1);

        $this->writeFile('news', [['id' => 1, 'source_hash' => $this->hash('news', 1), 'zh' => ['detail' => '<p><b>你好</b> 那里</p>']]]);
        $this->artisan('i18n:apply-db-translations', ['--dir' => $this->dir, '--table' => ['news']])->assertExitCode(0);
        $this->assertSame('<p><b>你好</b> 那里</p>', DB::table('news')->find(1)->detail_zh);
    }

    public function test_rejects_en_for_fields_that_already_have_english(): void
    {
        $this->writeFile('categories', [['id' => 1, 'source_hash' => $this->hash('categories', 1), 'en' => ['cat_name' => 'Other']]]);
        $this->apply()->expectsOutputToContain('en given but source has English')->assertExitCode(1);
    }
}
