<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sale_pages', function (Blueprint $table) {
            $table->text('head_scripts')->nullable()->after('cta_label');
            $table->text('body_scripts')->nullable()->after('head_scripts');
        });
    }

    public function down(): void
    {
        Schema::table('sale_pages', function (Blueprint $table) {
            $table->dropColumn(['head_scripts', 'body_scripts']);
        });
    }
};
