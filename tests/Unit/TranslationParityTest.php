<?php

namespace Tests\Unit;

use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;

class TranslationParityTest extends TestCase
{
    private const LOCALES = ['th', 'en', 'zh'];

    private function langPath(string $locale, string $file = ''): string
    {
        return dirname(__DIR__, 2) . "/lang/$locale" . ($file ? "/$file" : '');
    }

    public static function siteFiles(): array
    {
        $files = glob(dirname(__DIR__, 2) . '/lang/th/*.php');
        return array_map(fn ($f) => [basename($f)], $files);
    }

    /** @dataProvider siteFiles */
    public function test_file_has_same_keys_in_all_locales(string $file): void
    {
        $flat = [];
        foreach (self::LOCALES as $locale) {
            $path = $this->langPath($locale, $file);
            $this->assertFileExists($path, "lang/$locale/$file missing");
            $flat[$locale] = Arr::dot(require $path);
        }

        foreach (['en', 'zh'] as $locale) {
            $this->assertSame([], array_values(array_diff(array_keys($flat['th']), array_keys($flat[$locale]))), "keys in th/$file missing from $locale");
            $this->assertSame([], array_values(array_diff(array_keys($flat[$locale]), array_keys($flat['th']))), "keys in $locale/$file missing from th");
        }

        foreach ($flat['th'] as $key => $thValue) {
            foreach (self::LOCALES as $locale) {
                $value = $flat[$locale][$key];
                $this->assertIsString($value, "$locale/$file:$key is not a string");
                $this->assertNotSame('', trim($value), "$locale/$file:$key is empty");
            }
            $tokens = function (string $s): array {
                preg_match_all('/:[a-z_]+/', $s, $m);
                $found = array_values(array_unique($m[0]));
                sort($found);
                return $found;
            };
            foreach (['en', 'zh'] as $locale) {
                $this->assertSame($tokens($thValue), $tokens($flat[$locale][$key]), "placeholder mismatch in $locale/$file:$key");
            }
        }
    }
}
