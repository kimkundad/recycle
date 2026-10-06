<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

/**
 * The shared front-end script partial is rendered on every page in every locale,
 * so user-facing strings in it must come from translation files.
 */
class SharedScriptsTranslationTest extends TestCase
{
    public function test_alerts_in_shared_scripts_are_not_hardcoded_thai(): void
    {
        $source = file_get_contents(dirname(__DIR__, 2) . '/resources/views/layouts/inc-script.blade.php');

        preg_match_all('/swal\(([^)]*)\)/u', $source, $calls);
        foreach ($calls[1] as $argument) {
            $this->assertDoesNotMatchRegularExpression('/[\x{0E00}-\x{0E7F}]/u', $argument, "hard-coded Thai alert: swal($argument)");
        }
    }
}
