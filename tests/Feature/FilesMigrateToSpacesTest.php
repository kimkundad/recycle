<?php

namespace Tests\Feature;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

/** In-memory SQLite and faked Spaces/HTTP only; .env points at production. */
class FilesMigrateToSpacesTest extends TestCase
{
    private const SRC = 'https://www.wpnrayong.com';
    private const BUCKET_URL = 'https://sgp1.digitaloceanspaces.com/bucket/wpnrayong';

    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        DB::purge('sqlite');
        $this->assertSame('sqlite', DB::connection()->getDriverName());
        config(['filesystems.disks.do_spaces.endpoint' => 'https://sgp1.digitaloceanspaces.com', 'filesystems.disks.do_spaces.bucket' => 'bucket']);
        Storage::fake('do_spaces');

        foreach (['alliances', 'brands', 'certificates', 'hprojects', 'slideshows'] as $table) {
            Schema::create($table, fn (Blueprint $t) => [$t->id(), $t->string('image')->nullable()]);
        }
        Schema::create('news', fn (Blueprint $t) => [$t->id(), $t->string('image')->nullable(), $t->text('detail')->nullable(), $t->text('detail_en')->nullable(), $t->text('detail_zh')->nullable()]);
        Schema::create('settings', fn (Blueprint $t) => [$t->id(), $t->string('facebook_image')->nullable()]);

        DB::table('slideshows')->insert([['image' => '1-cover side.jpg'], ['image' => '2-gone.jpg']]);
        DB::table('settings')->insert(['facebook_image' => '9.png']);
        DB::table('news')->insert([
            'image' => '5.png',
            'detail' => '<img src="https://www.wpnrayong.com/img/all_image/1-%E0%B8%81.jpg"><img src="/media/a_1.png">',
            'detail_en' => '<img src="https://wpnrayong.com/img/all_image/1-ก.jpg"> <img src="https://www.wpnrayong.com/img/all_image/missing.jpg">',
            'detail_zh' => null,
        ]);

        Http::fake([
            self::SRC . '/img/slide/1-cover%20side.jpg' => Http::response('slide-bytes'),
            self::SRC . '/media/9.png' => Http::response('setting-bytes'),
            self::SRC . '/media/5.png' => Http::response('news-bytes'),
            self::SRC . '/img/all_image/1-%E0%B8%81.jpg' => Http::response('editor-bytes'),
            self::SRC . '/media/a_1.png' => Http::response('media-bytes'),
            '*' => Http::response('', 404),
        ]);
    }

    public function test_dry_run_changes_nothing(): void
    {
        $before = DB::table('news')->first();

        $this->artisan('files:migrate-to-spaces', ['--dry-run' => true])->assertExitCode(0);

        $this->assertSame([], Storage::disk('do_spaces')->allFiles());
        $this->assertEquals($before, DB::table('news')->first());
    }

    public function test_copies_files_and_rewrites_embedded_urls(): void
    {
        $this->artisan('files:migrate-to-spaces')
            ->expectsOutputToContain('missing img/slide/2-gone.jpg')
            ->expectsOutputToContain('missing img/all_image/missing.jpg')
            ->assertExitCode(0);

        $disk = Storage::disk('do_spaces');
        $this->assertSame('slide-bytes', $disk->get('wpnrayong/slide/1-cover side.jpg'));
        $this->assertSame('setting-bytes', $disk->get('wpnrayong/setting/9.png'));
        $this->assertSame('news-bytes', $disk->get('wpnrayong/news/5.png'));
        $this->assertSame('editor-bytes', $disk->get('wpnrayong/editor/1-ก.jpg'));
        $this->assertSame('media-bytes', $disk->get('wpnrayong/editor/a_1.png'));

        $news = DB::table('news')->first();
        $this->assertSame('5.png', $news->image);
        $this->assertSame('<img src="' . self::BUCKET_URL . '/editor/1-%E0%B8%81.jpg"><img src="' . self::BUCKET_URL . '/editor/a_1.png">', $news->detail);
        $this->assertSame('<img src="' . self::BUCKET_URL . '/editor/1-%E0%B8%81.jpg"> <img src="https://www.wpnrayong.com/img/all_image/missing.jpg">', $news->detail_en);
        $this->assertNull($news->detail_zh);
    }

    public function test_second_run_skips_files_already_on_spaces(): void
    {
        $this->artisan('files:migrate-to-spaces')->assertExitCode(0);
        $requests = count(Http::recorded());

        $this->artisan('files:migrate-to-spaces')
            ->expectsOutputToContain('0 uploaded')
            ->assertExitCode(0);
        $this->assertSame(2, count(Http::recorded()) - $requests, 'only the two missing files are retried');
    }
}
