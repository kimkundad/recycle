<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Uploaded files live on DigitalOcean Spaces under wpnrayong/{folder}/{name}.
 * Views reach them through the /images/{path} route; HTML content embeds publicUrl().
 */
class SpacesUpload
{
    public const DISK = 'do_spaces';
    public const ROOT = 'wpnrayong';

    /** Store an image, resized to fit within $width x $height (aspect ratio kept). Returns $name. */
    public static function image(UploadedFile $file, string $folder, string $name, int $width, int $height): string
    {
        $img = Image::make($file->getRealPath())->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        self::disk()->put(self::path($folder, $name), (string) $img->encode(), 'public');

        return $name;
    }

    /** Store a file unchanged. Returns $name. */
    public static function file(UploadedFile $file, string $folder, string $name): string
    {
        self::disk()->put(self::path($folder, $name), file_get_contents($file->getRealPath()), 'public');

        return $name;
    }

    public static function delete(string $folder, ?string $name): void
    {
        if ($name !== null && $name !== '') {
            self::disk()->delete(self::path($folder, $name));
        }
    }

    public static function path(string $folder, string $name): string
    {
        return self::ROOT . '/' . $folder . '/' . $name;
    }

    /** Permanent public URL, for links stored inside HTML content. */
    public static function publicUrl(string $folder, string $name): string
    {
        return rtrim(config('filesystems.disks.do_spaces.endpoint'), '/')
            . '/' . config('filesystems.disks.do_spaces.bucket')
            . '/' . self::path($folder, rawurlencode($name));
    }

    private static function disk()
    {
        return Storage::disk(self::DISK);
    }
}
