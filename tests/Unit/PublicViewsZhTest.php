<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

/** Views that build localized() input by hand must pass the zh column too. */
class PublicViewsZhTest extends TestCase
{
    private function view(string $name): string
    {
        return file_get_contents(dirname(__DIR__, 2) . "/resources/views/$name.blade.php");
    }

    public function test_design_filter_labels_pass_name_zh(): void
    {
        $src = $this->view('design-products-listing');
        $this->assertSame(3, substr_count($src, "'name_zh' => \$item->name_zh"));
        $this->assertSame(0, preg_match("/'name_en' => \\\$item->name_en\\], 'name'\\)/", $src));
    }

    /**
     * Translatable DB fields must go through localized()/zh_localized(); a raw echo always
     * shows the Thai base value, also on the Chinese site.
     */
    public function test_front_views_do_not_echo_translatable_fields_raw(): void
    {
        $root = dirname(__DIR__, 2) . '/resources/views';
        $files = array_merge(glob("$root/*.blade.php"), glob("$root/layouts/*.blade.php"), glob("$root/partials/*.blade.php"));
        $raw = '/\{\{\s*\$\w+(?:\[\d+\])?->(cat_name|sub_name|name_pro|title_pro|sub_title|header|content)\s*\}\}/';
        $found = [];
        foreach ($files as $file) {
            if (basename($file) === 'product.blade.php') {
                continue; // legacy theme demo, out of scope
            }
            foreach (file($file) as $n => $line) {
                if (preg_match($raw, $line, $m)) {
                    $found[] = basename($file) . ':' . ($n + 1) . ' ' . trim($m[0]);
                }
            }
        }
        $this->assertSame([], $found);
    }

    public function test_project_headers_use_zh_localized(): void
    {
        $src = $this->view('service');
        $this->assertStringNotContainsString('{{ $u->header }}', $src);
        $this->assertSame(2, substr_count($src, "zh_localized(\$u, 'header')"));
    }
}
