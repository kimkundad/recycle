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

    /** zh fields without an _en counterpart (hprojects.header has no English column). */
    private const ZH_ONLY = ['header'];

    public function test_controllers_save_zh_wherever_they_save_en(): void
    {
        $root = dirname(__DIR__, 2);
        foreach (self::CONTROLLERS as $c) {
            $src = file_get_contents("$root/app/Http/Controllers/$c.php");
            preg_match_all('/->([a-z_]+)_en\s*=/', $src, $en);
            preg_match_all('/->([a-z_]+)_zh\s*=/', $src, $zh);
            $zhFields = array_values(array_diff($zh[1], self::ZH_ONLY));
            $this->assertSame(array_count_values($en[1]), array_count_values($zhFields), "$c: _en/_zh assignments differ");
        }
    }

    /** hprojects.header has no _en column but is shown in zh, so admins must be able to edit header_zh. */
    public function test_project_header_zh_is_editable(): void
    {
        $root = dirname(__DIR__, 2);
        $controller = file_get_contents("$root/app/Http/Controllers/HProjectController.php");
        $this->assertSame(substr_count($controller, '->header ='), substr_count($controller, '->header_zh ='));
        foreach (['create', 'edit'] as $form) {
            $this->assertStringContainsString('name="header_zh"', file_get_contents("$root/resources/views/admin/hproject/$form.blade.php"), $form);
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
            $this->assertSame(array_values(array_unique($en[1])), array_values(array_diff(array_unique($zh[1]), self::ZH_ONLY)), basename(dirname($form)) . '/' . basename($form));
        }
    }
}
