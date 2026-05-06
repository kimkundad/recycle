<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->tinyInteger('show_filter_types')->default(1)->after('youtube');
            $table->tinyInteger('show_filter_materials')->default(1)->after('show_filter_types');
            $table->tinyInteger('show_filter_sizes')->default(1)->after('show_filter_materials');
        });
    }

    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['show_filter_types', 'show_filter_materials', 'show_filter_sizes']);
        });
    }
};
