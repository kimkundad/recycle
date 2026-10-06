# Chinese (zh) Locale Phase 2 — DB Content Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add `*_zh` columns for all translatable DB content, fill them (and empty `*_en` columns) with translations stored in the repo, let admins edit Chinese, and apply everything to production safely.

**Architecture:** A single field map (`App\Support\DbTranslation\TranslatableFields`) drives a guarded migration, a read-only source exporter, an idempotent fill-blanks-only apply command, a translation-file validator, and admin/view parity tests. Translations are JSON files under `database/translations/`, written by Claude against exported sources, and applied to production only after backup + dry-run with explicit user go-ahead.

**Tech Stack:** Laravel 9.52, PHP 8 (container `recycle-php`), MySQL 8.0.45 (production, `.env`), PHPUnit with in-memory SQLite.

**Spec:** `docs/superpowers/specs/2026-10-07-chinese-locale-phase2-db-design.md`

## Global Constraints

- Branch: `feature/zh-locale` (Phase 1 is on it). Commit with explicit `git add <files>`; the working tree has unrelated uncommitted dashboard files.
- **Production safety.** `.env` points to the live production MySQL. Before Task 12:
  - only read-only `SELECT`s may run against it (`i18n:export-db-source`, ad-hoc inspection);
  - no migration and no apply command (even with `--dry-run`) runs against production.
- Tests use in-memory SQLite only. Each test class forces `database.default=sqlite`, `:memory:`, asserts the driver, and never uses `RefreshDatabase`/`DatabaseMigrations`.
- Never overwrite a non-blank `_en` or `_zh` value. Blank = NULL or whitespace-only.
- zh source = `_en` if not blank, else Thai base. Product names keep Latin-script segments, model codes, sizes and units verbatim and translate only Thai segments (both for `name_pro_zh` and for filling `name_pro_en`). Example: `H-Beam - เหล็กเอชบีม ใหม่เก่าเก็บ` → zh `H-Beam - H型钢 全新库存`, en `H-Beam - New Old Stock`.
- HTML fields: the translation's tag sequence (every `<...>` token, byte-for-byte, in order) must equal the source's.
- Numbers, prices, phone numbers, emails, URLs, standards (TIS, ISO), brand and company names stay verbatim; company name in zh = `Wongpanit Recycle Rayong Co., Ltd.`
- Empty source field → no translation (target stays NULL).
- Container commands: `MSYS_NO_PATHCONV=1 docker exec -w /var/www recycle-php <cmd>`. Run phpunit one file per invocation.
- Commit messages end with `Co-Authored-By: Claude Opus 5.5 <noreply@anthropic.com>`.

## Review Focus

1. A translated value longer than its column (`varchar(191/199)`, e.g. a filled `name_pro_en`) must be rejected before writing, not truncated or failing mid-transaction. Test: Task 3.
2. An admin form that saves `X_en` but has no `X_zh` input would null the Chinese on every save. Every controller assignment of `->X_zh =` must have a matching input in every form that posts to it. Test: Task 10 parity test.
3. A row deleted after export, or a translation-file id that doesn't exist, must be reported and skipped, never inserted. Test: Task 3.
4. Whitespace-only `_en` (e.g. `' '`) counts as blank: zh is translated from Thai and `_en` is filled. Test: Task 2 (export marks source) + Task 3 (apply writes).
5. Non-design products have `material/highlights/use_case` nulled by `ProductController` on every save. The zh columns must follow the same rule so they don't keep stale values. Test: Task 10.

---

### Task 1: Field map + guarded migration

**Files:**
- Create: `app/Support/DbTranslation/TranslatableFields.php`
- Create: `database/migrations/2026_10_07_000001_add_zh_columns_for_db_content.php`
- Test: `tests/Feature/ZhColumnsMigrationTest.php`

**Interfaces:**
- Produces: `TranslatableFields::MAP` — `array<string table, array<string field, array{base:string, en:?string, zh:string, html:bool, max:?int}>>`; `TranslatableFields::tables(): string[]`.

- [ ] **Step 1: Create the field map**

```php
<?php

namespace App\Support\DbTranslation;

/**
 * Every translatable DB field: base (Thai) column, English column (null when none),
 * Chinese column, whether it holds HTML, and the varchar limit (null for text types).
 */
final class TranslatableFields
{
    public const MAP = [
        'categories' => [
            'cat_name' => ['base' => 'cat_name', 'en' => 'cat_name_en', 'zh' => 'cat_name_zh', 'html' => false, 'max' => 199],
        ],
        'subcats' => [
            'sub_name' => ['base' => 'sub_name', 'en' => 'sub_name_en', 'zh' => 'sub_name_zh', 'html' => false, 'max' => 199],
        ],
        'products' => [
            'name_pro' => ['base' => 'name_pro', 'en' => 'name_pro_en', 'zh' => 'name_pro_zh', 'html' => false, 'max' => 199],
            'condition' => ['base' => 'condition', 'en' => 'condition_en', 'zh' => 'condition_zh', 'html' => false, 'max' => 191],
            'title_pro' => ['base' => 'title_pro', 'en' => 'title_pro_en', 'zh' => 'title_pro_zh', 'html' => false, 'max' => null],
            'detail_pro' => ['base' => 'detail_pro', 'en' => 'detail_pro_en', 'zh' => 'detail_pro_zh', 'html' => true, 'max' => null],
            'material' => ['base' => 'material', 'en' => 'material_en', 'zh' => 'material_zh', 'html' => false, 'max' => null],
            'highlights' => ['base' => 'highlights', 'en' => 'highlights_en', 'zh' => 'highlights_zh', 'html' => false, 'max' => null],
            'use_case' => ['base' => 'use_case', 'en' => 'use_case_en', 'zh' => 'use_case_zh', 'html' => false, 'max' => null],
        ],
        'news' => [
            'title' => ['base' => 'title', 'en' => 'title_en', 'zh' => 'title_zh', 'html' => false, 'max' => 191],
            'sub_title' => ['base' => 'sub_title', 'en' => 'sub_title_en', 'zh' => 'sub_title_zh', 'html' => false, 'max' => null],
            'detail' => ['base' => 'detail', 'en' => 'detail_en', 'zh' => 'detail_zh', 'html' => true, 'max' => null],
        ],
        'slideshows' => [
            'title' => ['base' => 'title', 'en' => 'title_en', 'zh' => 'title_zh', 'html' => false, 'max' => 199],
            'big_title' => ['base' => 'big_title', 'en' => 'big_title_en', 'zh' => 'big_title_zh', 'html' => false, 'max' => null],
            'sub_title' => ['base' => 'sub_title', 'en' => 'sub_title_en', 'zh' => 'sub_title_zh', 'html' => true, 'max' => null],
            'g_btn_text' => ['base' => 'g_btn_text', 'en' => 'g_btn_text_en', 'zh' => 'g_btn_text_zh', 'html' => false, 'max' => null],
            'w_btn_text' => ['base' => 'w_btn_text', 'en' => 'w_btn_text_en', 'zh' => 'w_btn_text_zh', 'html' => false, 'max' => null],
        ],
        'certificates' => [
            'name' => ['base' => 'name', 'en' => 'name_en', 'zh' => 'name_zh', 'html' => false, 'max' => 199],
        ],
        'hprojects' => [
            'header' => ['base' => 'header', 'en' => null, 'zh' => 'header_zh', 'html' => false, 'max' => 191],
            'content' => ['base' => 'content', 'en' => 'content_en', 'zh' => 'content_zh', 'html' => false, 'max' => null],
        ],
        'type_contacts' => [
            'name' => ['base' => 'name', 'en' => 'name_en', 'zh' => 'name_zh', 'html' => false, 'max' => 199],
        ],
        'design_types' => [
            'name' => ['base' => 'name_th', 'en' => 'name_en', 'zh' => 'name_zh', 'html' => false, 'max' => 191],
        ],
        'design_materials' => [
            'name' => ['base' => 'name_th', 'en' => 'name_en', 'zh' => 'name_zh', 'html' => false, 'max' => 191],
        ],
        'design_sizes' => [
            'name' => ['base' => 'name_th', 'en' => 'name_en', 'zh' => 'name_zh', 'html' => false, 'max' => 191],
        ],
    ];

    /** @return string[] */
    public static function tables(): array
    {
        return array_keys(self::MAP);
    }
}
```

The `zh` column type mirrors `en` (varchar(max) when `max` is set, else text/longtext). `news.detail_zh` is `longText`; `hprojects.header_zh` is `string(191)`.

- [ ] **Step 2: Write the failing migration test** `tests/Feature/ZhColumnsMigrationTest.php`

```php
<?php

namespace Tests\Feature;

use App\Support\DbTranslation\TranslatableFields;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

/** In-memory SQLite only; .env points at production MySQL. */
class ZhColumnsMigrationTest extends TestCase
{
    private $migration;

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
        // Simulate a hand-made column that already exists in production.
        Schema::table('categories', fn (Blueprint $t) => $t->string('cat_name_zh')->nullable());

        $this->migration = require database_path('migrations/2026_10_07_000001_add_zh_columns_for_db_content.php');
    }

    public function test_up_adds_every_zh_column_and_tolerates_existing_ones(): void
    {
        $this->migration->up();

        foreach (TranslatableFields::MAP as $table => $fields) {
            foreach ($fields as $f) {
                $this->assertTrue(Schema::hasColumn($table, $f['zh']), "$table.{$f['zh']} missing");
            }
        }
    }

    public function test_down_removes_only_columns_it_added(): void
    {
        $this->migration->up();
        $this->migration->down();

        $this->assertTrue(Schema::hasColumn('categories', 'cat_name_zh'), 'pre-existing column must survive down()');
        $this->assertFalse(Schema::hasColumn('products', 'name_pro_zh'));
        $this->assertTrue(Schema::hasColumn('products', 'name_pro_en'));
    }
}
```

- [ ] **Step 3: Run — expect FAIL** (migration file missing).

Run: `MSYS_NO_PATHCONV=1 docker exec -w /var/www recycle-php vendor/bin/phpunit tests/Feature/ZhColumnsMigrationTest.php`

- [ ] **Step 4: Write the migration**

```php
<?php

use App\Support\DbTranslation\TranslatableFields;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Adds *_zh next to every translatable column. Guarded with hasColumn() because the
 * production schema was partly edited by hand. down() removes only what up() added,
 * recorded in the zh_columns_added cache table.
 */
return new class extends Migration
{
    private const LOG = 'zh_columns_added';

    public function up(): void
    {
        if (!Schema::hasTable(self::LOG)) {
            Schema::create(self::LOG, function (Blueprint $t) {
                $t->string('table_name');
                $t->string('column_name');
            });
        }

        foreach (TranslatableFields::MAP as $table => $fields) {
            foreach ($fields as $f) {
                if (Schema::hasColumn($table, $f['zh'])) {
                    continue;
                }
                Schema::table($table, function (Blueprint $t) use ($table, $f) {
                    if ($f['max']) {
                        $col = $t->string($f['zh'], $f['max']);
                    } elseif ($table === 'news' && $f['zh'] === 'detail_zh') {
                        $col = $t->longText($f['zh']);
                    } else {
                        $col = $t->text($f['zh']);
                    }
                    $col->nullable();
                    if ($f['en'] && Schema::getConnection()->getDriverName() === 'mysql') {
                        $col->after($f['en']);
                    }
                });
                \Illuminate\Support\Facades\DB::table(self::LOG)->insert(['table_name' => $table, 'column_name' => $f['zh']]);
            }
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable(self::LOG)) {
            return;
        }
        foreach (\Illuminate\Support\Facades\DB::table(self::LOG)->get() as $row) {
            if (Schema::hasColumn($row->table_name, $row->column_name)) {
                Schema::table($row->table_name, fn (Blueprint $t) => $t->dropColumn($row->column_name));
            }
        }
        Schema::drop(self::LOG);
    }
};
```

Note: SQLite `dropColumn` on Laravel 9 needs doctrine/dbal. If the test fails on `dropColumn` with a DBAL error, run `docker exec recycle-php composer require --dev doctrine/dbal:^3` (dev-only, not deployed behaviour) and ledger it.

- [ ] **Step 5: Run — expect PASS** (2 tests).
- [ ] **Step 6: Commit**

```bash
git add app/Support/DbTranslation/TranslatableFields.php database/migrations/2026_10_07_000001_add_zh_columns_for_db_content.php tests/Feature/ZhColumnsMigrationTest.php
git commit -m "feat(i18n): add zh column migration driven by a translatable field map

Co-Authored-By: Claude Opus 5.5 <noreply@anthropic.com>"
```

---

### Task 2: Source hashing + read-only exporter

**Files:**
- Create: `app/Support/DbTranslation/SourceRow.php`
- Create: `app/Console/Commands/I18nExportDbSource.php`
- Test: `tests/Feature/I18nExportDbSourceTest.php`
- Output (committed later in Task 5): `database/translations/source/<table>.json`

**Interfaces:**
- Consumes: `TranslatableFields::MAP`.
- Produces:
  - `SourceRow::hash(string $table, object|array $row): string` — sha256 over `json_encode` of `[field => [base, en]]` in MAP order, with each value `trim`med and `null` for blank;
  - `SourceRow::isBlank(?string $v): bool`;
  - `php artisan i18n:export-db-source {--out=database/translations/source}` writes `<table>.json` = `{"table": "...", "rows": [{"id": int, "source_hash": "...", "fields": {field: {"th": ?string, "en": ?string}}}]}`, ordered by id. Uses only `SELECT`.

- [ ] **Step 1: Write the failing test**

```php
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
```

- [ ] **Step 2: Run — expect FAIL** (class/command missing).
- [ ] **Step 3: Implement `SourceRow`**

```php
<?php

namespace App\Support\DbTranslation;

final class SourceRow
{
    public static function isBlank(?string $value): bool
    {
        return $value === null || trim($value) === '';
    }

    /** Value as stored for hashing/export: trimmed, blank → null. */
    public static function clean(?string $value): ?string
    {
        return self::isBlank($value) ? null : trim($value);
    }

    /** @param object|array $row */
    public static function hash(string $table, $row): string
    {
        $parts = [];
        foreach (TranslatableFields::MAP[$table] as $field => $f) {
            $parts[$field] = [
                self::clean(data_get($row, $f['base'])),
                $f['en'] ? self::clean(data_get($row, $f['en'])) : null,
            ];
        }
        return hash('sha256', json_encode($parts, JSON_UNESCAPED_UNICODE));
    }
}
```

- [ ] **Step 4: Implement the exporter**

```php
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
```

- [ ] **Step 5: Run — expect PASS.**
- [ ] **Step 6: Commit**

```bash
git add app/Support/DbTranslation/SourceRow.php app/Console/Commands/I18nExportDbSource.php tests/Feature/I18nExportDbSourceTest.php
git commit -m "feat(i18n): add read-only DB translation source exporter

Co-Authored-By: Claude Opus 5.5 <noreply@anthropic.com>"
```

---

### Task 3: Apply command (fill blanks only, hash-checked, validated, dry-run)

**Files:**
- Create: `app/Support/DbTranslation/TranslationValidator.php`
- Create: `app/Console/Commands/I18nApplyDbTranslations.php`
- Test: `tests/Feature/I18nApplyDbTranslationsTest.php`

**Interfaces:**
- Consumes: `TranslatableFields::MAP`, `SourceRow::hash/isBlank`.
- Produces:
  - `TranslationValidator::tags(string $html): string[]` — all `<...>` tokens in order;
  - `TranslationValidator::errors(string $table, array $file, array $sourceById): string[]` — checks: every row id is in source; `source_hash` matches the source file; only known fields; the `en` key appears only for fields whose source `en` is null and that have an en column; HTML tag sequence equals the source's (source = en if present else th); `mb_strlen <= max`; no blank values;
  - `php artisan i18n:apply-db-translations {--table=*} {--dry-run} {--dir=database/translations}`.
- Translation file format `database/translations/<table>.json`:

```json
{"table": "categories", "rows": [{"id": 2, "source_hash": "…", "en": {"cat_name": "Steel"}, "zh": {"cat_name": "钢材"}}]}
```

- [ ] **Step 1: Write the failing tests**

```php
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
```

- [ ] **Step 2: Run — expect FAIL** (command missing).
- [ ] **Step 3: Implement `TranslationValidator`**

```php
<?php

namespace App\Support\DbTranslation;

final class TranslationValidator
{
    /** @return string[] */
    public static function tags(string $html): array
    {
        preg_match_all('/<[^>]+>/', $html, $m);
        return $m[0];
    }

    /**
     * @param array $file      decoded database/translations/<table>.json
     * @param array $sourceById id => decoded source row
     * @return string[] human-readable errors
     */
    public static function errors(string $table, array $file, array $sourceById): array
    {
        $errors = [];
        $map = TranslatableFields::MAP[$table];
        foreach ($file['rows'] as $row) {
            $id = $row['id'] ?? null;
            $src = $sourceById[$id] ?? null;
            if (!$src) {
                $errors[] = "id $id: not in source export";
                continue;
            }
            if (($row['source_hash'] ?? '') !== $src['source_hash']) {
                $errors[] = "id $id: source_hash differs from source export";
            }
            foreach (['en', 'zh'] as $lang) {
                foreach ($row[$lang] ?? [] as $field => $value) {
                    $f = $map[$field] ?? null;
                    if (!$f) {
                        $errors[] = "id $id: unknown field $field";
                        continue;
                    }
                    if (!is_string($value) || SourceRow::isBlank($value)) {
                        $errors[] = "id $id $lang.$field: blank value";
                        continue;
                    }
                    if ($lang === 'en' && (!$f['en'] || $src['fields'][$field]['en'] !== null)) {
                        $errors[] = "id $id en.$field: en given but source has English or no en column";
                    }
                    if ($f['max'] && mb_strlen($value) > $f['max']) {
                        $errors[] = "id $id $lang.$field: too long (" . mb_strlen($value) . " > {$f['max']})";
                    }
                    if ($f['html']) {
                        $origin = $src['fields'][$field]['en'] ?? $src['fields'][$field]['th'] ?? '';
                        if (self::tags($origin) !== self::tags($value)) {
                            $errors[] = "id $id $lang.$field: tag mismatch";
                        }
                    }
                }
            }
        }
        return $errors;
    }
}
```

Note: for `en` fills of HTML fields the origin is the Thai source (en is null), which the `??` chain already selects.

- [ ] **Step 4: Implement the command**

```php
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
                    if (SourceRow::hash($table, $current) !== $row['source_hash']) {
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
}
```

- [ ] **Step 5: Run — expect PASS** (8 tests).
- [ ] **Step 6: Commit**

```bash
git add app/Support/DbTranslation/TranslationValidator.php app/Console/Commands/I18nApplyDbTranslations.php tests/Feature/I18nApplyDbTranslationsTest.php
git commit -m "feat(i18n): add idempotent fill-blanks-only DB translation apply command

Co-Authored-By: Claude Opus 5.5 <noreply@anthropic.com>"
```

---

### Task 4: Translation-file validation test (repo data)

**Files:**
- Test: `tests/Unit/DbTranslationFilesTest.php`

**Interfaces:**
- Consumes: `TranslationValidator::errors`, files under `database/translations/`.

- [ ] **Step 1: Write the test** (passes vacuously until files exist; Task 5+ make it meaningful)

```php
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
```

- [ ] **Step 2: Run** — expect `OK, but incomplete, skipped` (no files yet).
- [ ] **Step 3: Commit**

```bash
git add tests/Unit/DbTranslationFilesTest.php
git commit -m "test(i18n): validate repo DB translation files against their sources

Co-Authored-By: Claude Opus 5.5 <noreply@anthropic.com>"
```

---

### Task 5: Export sources from production (read-only) + glossary + small tables

**Files:**
- Create: `database/translations/source/*.json` (11 files, from production via `SELECT` only)
- Create: `database/translations/GLOSSARY.md`
- Create: `database/translations/{categories,subcats,slideshows,certificates,hprojects,type_contacts,design_types,design_materials,design_sizes}.json`

- [ ] **Step 1: Export (read-only):** `MSYS_NO_PATHCONV=1 docker exec -w /var/www recycle-php php artisan i18n:export-db-source` → expect 11 lines `<table>: N rows` (categories 10, subcats 19, products 256, news 15, slideshows 7, certificates 16, hprojects 9, type_contacts 3, design_* 3 each; counts may have grown).
- [ ] **Step 2: Write `GLOSSARY.md`**: table `Thai | English | 中文 | note`, including at least: company name (zh = `Wongpanit Recycle Rayong Co., Ltd.`), WPN, ใหม่เก่าเก็บ = New Old Stock / 全新库存, มือสอง/มือ2 = Used / 二手, เหล็กรูปพรรณ = Structural steel / 型钢, เศษโลหะ = Metal scrap / 废金属, สเตนเลส = Stainless steel / 不锈钢, อัลลอย = Alloy / 合金, เครื่องจักร = Machinery / 机械, ฟิตติ้ง = Fitting / 管件, H-Beam = H型钢 (keep "H-Beam" in names), plus terms Phase 1 lang files already use (check `lang/zh/common.php`, `home.php`) so both agree.
- [ ] **Step 3: Translate the 9 small tables** by writing the JSON files (format in Task 3). For each source row: `zh` for every field whose source has th or en; `en` for every field with an en column whose source en is null and th is not null. Copy `source_hash` from the source row.
- [ ] **Step 4: Validate:** `MSYS_NO_PATHCONV=1 docker exec -w /var/www recycle-php vendor/bin/phpunit tests/Unit/DbTranslationFilesTest.php` → the 9 tables pass (both tests), products/news skipped.
- [ ] **Step 5: Commit**

```bash
git add database/translations/GLOSSARY.md database/translations/source database/translations/categories.json database/translations/subcats.json database/translations/slideshows.json database/translations/certificates.json database/translations/hprojects.json database/translations/type_contacts.json database/translations/design_types.json database/translations/design_materials.json database/translations/design_sizes.json
git commit -m "feat(i18n): add DB translation sources, glossary and small-table translations

Co-Authored-By: Claude Opus 5.5 <noreply@anthropic.com>"
```

---

### Task 6: Product names, conditions, summaries, design fields

**Files:**
- Create: `database/translations/products.json` (fields `name_pro`, `condition`, `title_pro`, `material`, `highlights`, `use_case` for all 256 rows; `detail_pro` added in Task 7)

- [ ] **Step 1:** Write translations in batches of ~50 rows. Name rule from Global Constraints (keep Latin segments; translate Thai segments; all-English names copied verbatim into zh). `en` fills for blank `name_pro_en`/`title_pro_en`/`condition_en` etc.
- [ ] **Step 2:** After each batch run the validator test; it must report no errors (the completeness test still fails until Task 7 adds `detail_pro`; run only `--filter test_translation_file_matches_its_source` here).
- [ ] **Step 3: Commit** `database/translations/products.json` with message `feat(i18n): translate product names and summaries`.

---

### Task 7: Product details (HTML)

**Files:**
- Modify: `database/translations/products.json` (add `detail_pro` for every row with source text)

- [ ] **Step 1:** Translate text nodes only; copy every tag byte-for-byte. Rows whose source detail is only tags/whitespace: copy the source as-is (it still counts as a translation and keeps zh non-empty).
- [ ] **Step 2:** Run the full validator test for products (both tests) → PASS.
- [ ] **Step 3: Commit** `feat(i18n): translate product details`.

---

### Task 8: News (titles, summaries, HTML details)

**Files:**
- Create: `database/translations/news.json`

- [ ] **Step 1:** Translate all 15 rows (`title`, `sub_title`, `detail`) with the HTML rule; en fills for any blank `_en`.
- [ ] **Step 2:** Validator test for news → PASS (both tests). All 11 tables now pass.
- [ ] **Step 3: Commit** `feat(i18n): translate news`.

---

### Task 9: Rehearsal on a local MySQL copy (no production writes)

**Files:** none committed (uses a throwaway container).

- [ ] **Step 1:** Start a throwaway MySQL 8 container on the compose network:
  `docker run -d --name recycle-zh-rehearsal --network $(docker inspect recycle-php -f '{{range $k,$v := .NetworkSettings.Networks}}{{$k}}{{end}}') -e MYSQL_ROOT_PASSWORD=rehearsal -e MYSQL_DATABASE=recycle mysql:8.0`
- [ ] **Step 2:** Copy the 11 tables from production with a **read-only** dump piped into the rehearsal DB:
  `MSYS_NO_PATHCONV=1 docker exec recycle-php sh -c 'mysqldump --single-transaction --no-tablespaces -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USERNAME" -p"$DB_PASSWORD" "$DB_DATABASE" categories subcats products news slideshows certificates hprojects type_contacts design_types design_materials design_sizes | mysql -hrecycle-zh-rehearsal -uroot -prehearsal recycle'`
  (DB_* values come from `.env`; export them into the `sh -c` environment with `set -a; . ./.env; set +a` first, run from `/var/www`.)
- [ ] **Step 3:** Every rehearsal command passes real env vars, which take precedence over `.env` (Laravel's dotenv never overwrites existing variables). Define once per shell:
  `R="MSYS_NO_PATHCONV=1 docker exec -w /var/www -e DB_HOST=recycle-zh-rehearsal -e DB_PORT=3306 -e DB_DATABASE=recycle -e DB_USERNAME=root -e DB_PASSWORD=rehearsal recycle-php"`
  First prove the override works: `eval "$R php artisan tinker --execute 'echo config(\"database.connections.mysql.host\");'"` → must print `recycle-zh-rehearsal`. **If it prints the production host, stop.**
  Then: `eval "$R php artisan migrate --path=database/migrations/2026_10_07_000001_add_zh_columns_for_db_content.php --force"`, `eval "$R php artisan i18n:apply-db-translations --dry-run"`, `eval "$R php artisan i18n:apply-db-translations"`, and once more (expect `0 fields written` for every table).
- [ ] **Step 4:** Serve the site from the rehearsal DB: `MSYS_NO_PATHCONV=1 docker exec -d -w /var/www -e DB_HOST=recycle-zh-rehearsal -e DB_PORT=3306 -e DB_DATABASE=recycle -e DB_USERNAME=root -e DB_PASSWORD=rehearsal recycle-php php artisan serve --host=127.0.0.1 --port=8090`, then `MSYS_NO_PATHCONV=1 docker exec -w /var/www recycle-php php scripts/i18n/snapshot.php http://127.0.0.1:8090 zh storage/app/i18n-snapshots/rehearsal` (and `en`). `check-zh.php storage/app/i18n-snapshots/rehearsal/zh` should list only the switcher label "ภาษาไทย", ฿ prices and the unused `#product-quickview` modal. Then `eval "$R php artisan migrate:rollback --path=database/migrations/2026_10_07_000001_add_zh_columns_for_db_content.php --force"` and confirm the zh columns are gone (`SHOW COLUMNS FROM products LIKE '%_zh'` → empty). Stop the server: `docker exec recycle-php pkill -f "artisan serve"`.
- [ ] **Step 5:** `docker rm -f recycle-zh-rehearsal`. Ledger the reports (fields written per table).

---

### Task 10: Admin forms + controllers

**Files:**
- Modify: admin forms with `_en` inputs: `resources/views/admin/{category,certificate,hproject,news,product,slide,subcat,type_contact,design_product_filters}/{create,edit}.blade.php`, `subcat/create_new.blade.php`, `design_product_filters/index.blade.php` (if it contains an inline form)
- Modify: `app/Http/Controllers/{CategoryController,CertificateController,HProjectController,NewConController,ProductController,SlideController,SubCatController,TypeConController,DesignProductFilterController}.php`
- Test: `tests/Unit/AdminZhParityTest.php`, `tests/Feature/AdminCategoryZhTest.php`

**Interfaces:**
- Consumes: `TranslatableFields::MAP` (zh column names).

- [ ] **Step 1: Write the parity test** (fails now: no `_zh` anywhere)

```php
<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

/**
 * Every controller that saves X_en must save X_zh, and every admin form that posts X_en
 * must also post X_zh — otherwise saving the form would null the Chinese value.
 */
class AdminZhParityTest extends TestCase
{
    private const CONTROLLERS = ['CategoryController', 'CertificateController', 'HProjectController', 'NewConController', 'ProductController', 'SlideController', 'SubCatController', 'TypeConController', 'DesignProductFilterController'];

    public function test_controllers_save_zh_wherever_they_save_en(): void
    {
        $root = dirname(__DIR__, 2);
        foreach (self::CONTROLLERS as $c) {
            $src = file_get_contents("$root/app/Http/Controllers/$c.php");
            preg_match_all('/->([a-z_]+)_en\s*=/', $src, $en);
            preg_match_all('/->([a-z_]+)_zh\s*=/', $src, $zh);
            $this->assertSame(array_count_values($en[1]), array_count_values($zh[1]), "$c: _en/_zh assignments differ");
        }
    }

    public function test_admin_forms_post_zh_wherever_they_post_en(): void
    {
        $root = dirname(__DIR__, 2);
        foreach (glob("$root/resources/views/admin/{category,certificate,hproject,news,product,slide,subcat,type_contact,design_product_filters}/*.blade.php", GLOB_BRACE) as $form) {
            $src = file_get_contents($form);
            preg_match_all('/name=["\']([a-z_]+)_en["\']/', $src, $en);
            preg_match_all('/name=["\']([a-z_]+)_zh["\']/', $src, $zh);
            $this->assertSame(array_unique($en[1]), array_unique($zh[1]), basename(dirname($form)) . '/' . basename($form));
        }
    }
}
```

Note: product detail EN posts as `kt_docs_ckeditor_classic_en`; the zh editor posts as `kt_docs_ckeditor_classic_zh` and the parity regex covers it (`kt_docs_ckeditor_classic` prefix). Controllers that assign `$objs->detail_pro_en = $request['kt_docs_ckeditor_classic_en']` get `$objs->detail_pro_zh = $request['kt_docs_ckeditor_classic_zh']`.

- [ ] **Step 2: Write the feature test** `tests/Feature/AdminCategoryZhTest.php`: SQLite `categories` table (id, cat_name, cat_name_en, cat_name_zh, image, status, timestamps), one row; `withoutMiddleware(UserRoleMiddleware::class)`, `Storage::fake('do_spaces')`, `URL::forceRootUrl('http://localhost')`; `PUT /admin/category/1` with `cat_name`, `cat_name_en`, `cat_name_zh='钢材'` and no image; assert redirect and `cat_name_zh === '钢材'`. Then `PUT` again with `cat_name_zh=''` and assert NULL or '' (admin cleared it).
- [ ] **Step 3: Run both — expect FAIL.**
- [ ] **Step 4: Edit every form:** after each `_en` input block, add a copy of that block with `_en`→`_zh` in `name`, `id`, `old()`/`$objs->..._en` value, error-bag key; label text gets ` (中文)` (or replace "อังกฤษ"/"English" with "จีน (中文)"). CKEditor fields: duplicate the editor container and its JS init with the `_zh` id.
- [ ] **Step 5: Edit every controller:** next to each `->X_en = …` add `->X_zh = …` from the matching request key. Validation: zh fields are `nullable` (do not copy `required`). For ProductController design fields keep the same rule: `$objs->material_zh = $isDesignProduct ? $request->input('material_zh') : null;` (Review Focus 5).
- [ ] **Step 6: Run both tests — PASS.** Also run `php -l` on each controller and compile each edited view: `MSYS_NO_PATHCONV=1 docker exec -w /var/www recycle-php php artisan view:cache` (expect success), then `php artisan view:clear`.
- [ ] **Step 7: Commit**

The admin directory also holds an unrelated uncommitted file (`resources/views/admin/dashboard/index.blade.php`), so stage the forms by explicit path:

```bash
git status --short resources/views/admin | grep -v "admin/dashboard/" | awk '{print $2}' | xargs git add
git add app/Http/Controllers/CategoryController.php app/Http/Controllers/CertificateController.php app/Http/Controllers/HProjectController.php app/Http/Controllers/NewConController.php app/Http/Controllers/ProductController.php app/Http/Controllers/SlideController.php app/Http/Controllers/SubCatController.php app/Http/Controllers/TypeConController.php app/Http/Controllers/DesignProductFilterController.php tests/Unit/AdminZhParityTest.php tests/Feature/AdminCategoryZhTest.php
git diff --cached --stat   # must not list admin/dashboard
git commit -m "feat(admin): add Chinese fields to admin forms and save them

Co-Authored-By: Claude Opus 5.5 <noreply@anthropic.com>"
```

---

### Task 11: Public views read zh where Phase 1 bypassed `localized()`

**Files:**
- Modify: `resources/views/design-products-listing.blade.php` (3 filter labels), `resources/views/service.blade.php` (hproject header)
- Test: `tests/Unit/LocalizedHelperTest.php` (add case)

- [ ] **Step 1: Write the failing test** `tests/Unit/PublicViewsZhTest.php`

```php
<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

/** Views that build localized() input by hand must pass the zh column too. */
class PublicViewsZhTest extends TestCase
{
    private function view(string $name): string
    {
        return file_get_contents(dirname(__DIR__, 2) . "/resources/views/$name.blade.php");
    }

    public function test_design_filter_labels_pass_name_zh(): void
    {
        $src = $this->view('design-products-listing');
        $this->assertSame(3, substr_count($src, "'name_zh' => \$item->name_zh"));
        $this->assertSame(0, preg_match("/'name_en' => \\\$item->name_en\\], 'name'\\)/", $src));
    }

    public function test_project_headers_use_zh_localized(): void
    {
        $src = $this->view('service');
        $this->assertStringNotContainsString('{{ $u->header }}', $src);
        $this->assertSame(2, substr_count($src, "zh_localized(\$u, 'header')"));
    }
}
```

- [ ] **Step 2: Run — FAIL** (`MSYS_NO_PATHCONV=1 docker exec -w /var/www recycle-php vendor/bin/phpunit tests/Unit/PublicViewsZhTest.php`).
- [ ] **Step 3:** Edit the three labels to `localized(['name' => $item->name_th, 'name_en' => $item->name_en, 'name_zh' => $item->name_zh], 'name')`; in `service.blade.php` replace `{{ $u->header }}` (tab title and `<h4>`) with `{{ zh_localized($u, 'header') }}`.
- [ ] **Step 4: Run — PASS;** run Phase 1 snapshot diff for th/en against the Phase 1 baseline (`scripts/i18n/snapshot.php` + `diff.php`) → IDENTICAL (columns don't exist locally yet only in production; `$item->name_zh` is null → same output). If the baseline under `storage/app/i18n-snapshots/baseline` is missing, recapture from commit `c0178a2` state first.
- [ ] **Step 5: Commit** `git add resources/views/design-products-listing.blade.php resources/views/service.blade.php tests/Unit/PublicViewsZhTest.php` with message `feat(i18n): read zh for design filters and project headers`.

---

### Task 12: Production run (STOP for user go-ahead before EACH numbered step)

Each step below is a separate request to the user; do not chain them. Record each output in the ledger.

- [ ] **Step 1 — Backup (asks user):**
  `MSYS_NO_PATHCONV=1 docker exec -w /var/www recycle-php sh -c 'set -a; . ./.env; set +a; mkdir -p storage/app/backups; mysqldump --single-transaction --no-tablespaces -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USERNAME" -p"$DB_PASSWORD" "$DB_DATABASE" categories subcats products news slideshows certificates hprojects type_contacts design_types design_materials design_sizes > storage/app/backups/$(date +%Y%m%d-%H%M%S)-zh-phase2.sql'`
  Verify: file size > 0 and `grep -c "CREATE TABLE"` = 11.
- [ ] **Step 2 — Re-export sources and compare (read-only, no go-ahead needed):** export to a temp dir and `diff` against `database/translations/source`; any changed row will be skipped by the hash check — list them for the user.
- [ ] **Step 3 — Migrate (asks user):** `php artisan migrate --path=database/migrations/2026_10_07_000001_add_zh_columns_for_db_content.php --force`. Verify columns with `SHOW COLUMNS … LIKE '%_zh'`.
- [ ] **Step 4 — Dry run (asks user; writes nothing):** `php artisan i18n:apply-db-translations --dry-run` → show the per-table report.
- [ ] **Step 5 — Apply (asks user):** `php artisan i18n:apply-db-translations` → report; then run again → expect `0 fields written` everywhere.
- [ ] **Step 6 — Verify (read-only):** snapshot zh and en from the local site (now reading production with new columns), `check-zh.php`, spot-check pages. Report EN changes expected from filled `_en`.
- [ ] **Rollback (only if the user asks):** `php artisan migrate:rollback --path=database/migrations/2026_10_07_000001_add_zh_columns_for_db_content.php --force` for zh columns; `_en` fills restored from the Step 1 dump for the rows/fields listed in the Step 5 report.
