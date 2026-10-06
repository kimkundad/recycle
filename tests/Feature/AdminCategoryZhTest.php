<?php

namespace Tests\Feature;

use App\Http\Middleware\UserRoleMiddleware;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

/** In-memory SQLite only; .env points at production MySQL. */
class AdminCategoryZhTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        DB::purge('sqlite');
        $this->assertSame('sqlite', DB::connection()->getDriverName());
        URL::forceRootUrl('http://localhost');
        URL::forceScheme('http');
        Storage::fake('do_spaces');
        $this->withoutMiddleware(UserRoleMiddleware::class);

        Schema::create('categories', function (Blueprint $t) {
            $t->id();
            $t->string('cat_name')->nullable();
            $t->string('cat_name_en')->nullable();
            $t->string('cat_name_zh')->nullable();
            $t->string('image')->nullable();
            $t->integer('status')->default(0);
            $t->timestamps();
        });
        DB::table('categories')->insert(['id' => 1, 'cat_name' => 'เหล็ก', 'cat_name_en' => 'Steel', 'image' => 'a.jpg']);
    }

    private function admin(): User
    {
        $u = new User(['name' => 'Admin', 'email' => 'admin@example.com']);
        $u->id = 1;
        return $u;
    }

    public function test_update_saves_and_clears_chinese_name(): void
    {
        $this->actingAs($this->admin())
            ->put('/admin/category/1', ['cat_name' => 'เหล็ก', 'cat_name_en' => 'Steel', 'cat_name_zh' => '钢材'])
            ->assertRedirect();
        $this->assertSame('钢材', DB::table('categories')->find(1)->cat_name_zh);

        $this->actingAs($this->admin())
            ->put('/admin/category/1', ['cat_name' => 'เหล็ก', 'cat_name_en' => 'Steel', 'cat_name_zh' => ''])
            ->assertRedirect();
        $this->assertEmpty(DB::table('categories')->find(1)->cat_name_zh);
    }
}
