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

    /** DigitalOcean Managed MySQL enforces sql_require_primary_key. */
    public function test_bookkeeping_table_has_a_primary_key(): void
    {
        $this->migration->up();

        $this->assertTrue(Schema::hasColumn('zh_columns_added', 'id'));
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
