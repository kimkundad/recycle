<?php

use App\Support\DbTranslation\TranslatableFields;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
                $t->id(); // DigitalOcean Managed MySQL requires a primary key on every table
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
                DB::table(self::LOG)->insert(['table_name' => $table, 'column_name' => $f['zh']]);
            }
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable(self::LOG)) {
            return;
        }
        foreach (DB::table(self::LOG)->get() as $row) {
            if (Schema::hasColumn($row->table_name, $row->column_name)) {
                Schema::table($row->table_name, fn (Blueprint $t) => $t->dropColumn($row->column_name));
            }
        }
        Schema::drop(self::LOG);
    }
};
