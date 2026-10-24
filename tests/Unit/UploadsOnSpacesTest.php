<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

/**
 * Uploaded files live on DO Spaces (see App\Support\SpacesUpload); nothing may write to
 * or link at the old local upload folders under public/.
 */
class UploadsOnSpacesTest extends TestCase
{
    private const LOCAL_UPLOAD_URL = '~(img/(alliance|brand|certificate|hproject|slide|all_image)/|[\'"/]media/)[\'"]?\s*[.+]~';

    private function files(string $dir, string $pattern): array
    {
        $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(dirname(__DIR__, 2) . "/$dir"));
        return array_values(array_filter(iterator_to_array($it), fn (\SplFileInfo $f) => $f->isFile() && preg_match($pattern, $f->getFilename())));
    }

    public function test_controllers_do_not_write_uploads_to_local_disk(): void
    {
        $found = [];
        foreach ($this->files('app/Http/Controllers', '/\.php$/') as $file) {
            foreach (file($file) as $n => $line) {
                if (preg_match('~^\s*//~', $line)) {
                    continue;
                }
                if (preg_match('~->move\(|unlink\(|->save\(\'|public_path\(\'(media|img)~', $line)) {
                    $found[] = $file->getFilename() . ':' . ($n + 1) . ' ' . trim($line);
                }
            }
        }
        $this->assertSame([], $found);
    }

    public function test_views_do_not_link_uploads_from_local_folders(): void
    {
        $found = [];
        $files = array_merge($this->files('resources/views', '/\.blade\.php$/'), $this->files('app/Http/Controllers', '/\.php$/'));
        foreach ($files as $file) {
            foreach (file($file) as $n => $line) {
                if (preg_match(self::LOCAL_UPLOAD_URL, $line) && !str_contains($line, 'assets/media') && !preg_match('~^\s*//~', $line)) {
                    $found[] = $file->getFilename() . ':' . ($n + 1) . ' ' . trim($line);
                }
            }
        }
        $this->assertSame([], $found);
    }
}
