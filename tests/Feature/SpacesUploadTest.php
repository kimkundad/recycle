<?php

namespace Tests\Feature;

use App\Support\SpacesUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SpacesUploadTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('do_spaces');
        config(['filesystems.disks.do_spaces.endpoint' => 'https://sgp1.digitaloceanspaces.com/', 'filesystems.disks.do_spaces.bucket' => 'bucket']);
    }

    public function test_image_is_resized_and_stored_under_the_folder(): void
    {
        $name = SpacesUpload::image(UploadedFile::fake()->image('a.png', 1000, 500), 'brand', 'x.png', 250, 250);

        $this->assertSame('x.png', $name);
        Storage::disk('do_spaces')->assertExists('wpnrayong/brand/x.png');
        [$w, $h] = getimagesizefromstring(Storage::disk('do_spaces')->get('wpnrayong/brand/x.png'));
        $this->assertSame([250, 125], [$w, $h]);
    }

    public function test_file_is_stored_as_is(): void
    {
        $file = UploadedFile::fake()->image('slide.jpg', 1920, 600);

        SpacesUpload::file($file, 'slide', '1-slide.jpg');

        $this->assertSame(file_get_contents($file->getRealPath()), Storage::disk('do_spaces')->get('wpnrayong/slide/1-slide.jpg'));
    }

    public function test_delete_removes_the_file_and_ignores_empty_names(): void
    {
        Storage::disk('do_spaces')->put('wpnrayong/news/a.png', 'x');

        SpacesUpload::delete('news', 'a.png');
        SpacesUpload::delete('news', null);
        SpacesUpload::delete('news', '');

        Storage::disk('do_spaces')->assertMissing('wpnrayong/news/a.png');
    }

    public function test_public_url_points_at_the_bucket_and_encodes_the_name(): void
    {
        $this->assertSame(
            'https://sgp1.digitaloceanspaces.com/bucket/wpnrayong/editor/1-%E0%B8%81%20a.jpg',
            SpacesUpload::publicUrl('editor', '1-ก a.jpg')
        );
    }
}
