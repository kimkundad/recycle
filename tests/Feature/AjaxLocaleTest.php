<?php

namespace Tests\Feature;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

/** In-memory SQLite only; .env points at production MySQL. */
class AjaxLocaleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        DB::purge('sqlite');
        $this->assertSame('sqlite', DB::connection()->getDriverName());
        URL::forceRootUrl('http://localhost');
        URL::forceScheme('http');

        Schema::create('news', function (Blueprint $t) {
            $t->id();
            $t->string('title')->nullable();
            $t->string('title_en')->nullable();
            $t->text('sub_title')->nullable();
            $t->text('sub_title_en')->nullable();
            $t->string('image')->nullable();
            $t->integer('status')->default(1);
            $t->date('startdate')->nullable();
            $t->timestamps();
        });
        Schema::create('unit_products', function (Blueprint $t) {
            $t->id();
            $t->string('name_unit')->nullable();
        });
        Schema::create('products', function (Blueprint $t) {
            $t->id();
            $t->string('name_pro')->nullable();
            $t->string('name_pro_en')->nullable();
            $t->string('image_pro')->nullable();
            $t->double('amount')->default(0);
            $t->integer('discount')->default(0);
            $t->integer('typePrice')->default(0);
            $t->integer('unit_id')->nullable();
            $t->integer('status')->default(1);
            $t->integer('type_pro')->default(0);
        });

        // getArticles() skips the newest post (shown as the page hero), so seed two.
        DB::table('news')->insert([
            ['id' => 1, 'title' => 'ข่าวไทย', 'title_en' => 'English news', 'sub_title' => 'สรุป', 'sub_title_en' => 'Summary', 'startdate' => '2026-01-01'],
            ['id' => 2, 'title' => 'ข่าวล่าสุด', 'title_en' => 'Latest news', 'sub_title' => 'สรุป', 'sub_title_en' => 'Summary', 'startdate' => '2026-01-02'],
        ]);
        DB::table('products')->insert([
            ['name_pro' => 'สินค้าไทย', 'name_pro_en' => 'English product', 'image_pro' => 'a.jpg', 'typePrice' => 1, 'type_pro' => 2],
        ]);
    }

    private function ajax(string $locale, string $uri): string
    {
        return $this->withSession(['locale' => $locale])
            ->get($uri, ['X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()
            ->getContent();
    }

    public function test_articles_in_chinese_have_no_thai_static_labels(): void
    {
        $html = $this->ajax('zh', '/blogs?page=1');

        $this->assertStringContainsString('English news', $html);
        $this->assertStringContainsString(__('common.read_more', [], 'zh'), $html);
        $this->assertDoesNotMatchRegularExpression('/[\x{0E00}-\x{0E7F}]/u', $html);
    }

    public function test_articles_in_thai_unchanged(): void
    {
        $html = $this->ajax('th', '/blogs?page=1');

        $this->assertStringContainsString('ข่าวไทย', $html);
        $this->assertStringContainsString('อ่านต่อ', $html);
    }

    public function test_recommended_products_in_chinese_have_no_thai_static_labels(): void
    {
        $html = $this->ajax('zh', '/recomment_find?page=1');

        $this->assertStringContainsString('English product', $html);
        $this->assertStringContainsString(__('common.contact_seller', [], 'zh'), $html);
        $this->assertStringContainsString(__('common.view_product', [], 'zh'), $html);
        $this->assertDoesNotMatchRegularExpression('/[\x{0E00}-\x{0E7F}]/u', $html);
    }
}
