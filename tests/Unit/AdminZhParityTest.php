<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

/**
 * Every controller that saves X_en must save X_zh, and every admin form that posts X_en
 * must also post X_zh — otherwise saving the form would null the Chinese value.
 */
class AdminZhParityTest extends TestCase
{
    private const CONTROLLERS = ['CategoryController', 'CertificateController', 'HProjectController', 'NewConController', 'ProductController', 'SlideController', 'SubCatController', 'TypeConController', 'DesignProductFilterController'];

    public function test_controllers_save_zh_wherever_they_save_en(): void
    {
        $root = dirname(__DIR__, 2);
        foreach (self::CONTROLLERS as $c) {
            $src = file_get_contents("$root/app/Http/Controllers/$c.php");
            preg_match_all('/->([a-z_]+)_en\s*=/', $src, $en);
            preg_match_all('/->([a-z_]+)_zh\s*=/', $src, $zh);
            $this->assertSame(array_count_values($en[1]), array_count_values($zh[1]), "$c: _en/_zh assignments differ");
        }
    }

    public function test_admin_forms_post_zh_wherever_they_post_en(): void
    {
        $root = dirname(__DIR__, 2);
        $forms = [];
        foreach (['category', 'certificate', 'hproject', 'news', 'product', 'slide', 'subcat', 'type_contact', 'design_product_filters'] as $dir) {
            $forms = array_merge($forms, glob("$root/resources/views/admin/$dir/*.blade.php"));
        }
        $this->assertNotEmpty($forms);
        foreach ($forms as $form) {
            $src = file_get_contents($form);
            preg_match_all('/name=["\']([a-z_]+)_en["\']/', $src, $en);
            preg_match_all('/name=["\']([a-z_]+)_zh["\']/', $src, $zh);
            $this->assertSame(array_unique($en[1]), array_unique($zh[1]), basename(dirname($form)) . '/' . basename($form));
        }
    }
}
