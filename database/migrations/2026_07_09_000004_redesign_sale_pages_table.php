<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sale_pages', function (Blueprint $table) {
            // Drop hero/features/price columns no longer needed
            $table->dropColumn(['hero_image', 'hero_title', 'hero_subtitle', 'features', 'price_label', 'cta_label']);

            // Add new button config columns
            $table->string('phone_label')->default('โทร')->after('phone');
            $table->string('inquiry_url')->nullable()->after('line_url');
            $table->string('inquiry_label')->default('สอบถาม')->after('inquiry_url');
        });
    }

    public function down(): void
    {
        Schema::table('sale_pages', function (Blueprint $table) {
            $table->dropColumn(['phone_label', 'inquiry_url', 'inquiry_label']);
            $table->string('hero_image')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->text('features')->nullable();
            $table->string('price_label')->nullable();
            $table->string('cta_label')->default('สอบถามเพิ่มเติม');
        });
    }
};
