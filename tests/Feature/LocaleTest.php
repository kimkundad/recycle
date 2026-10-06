<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class LocaleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // APP_URL contains /public and AppServiceProvider forces https outside "local".
        URL::forceRootUrl('http://localhost');
        URL::forceScheme('http');

        Route::middleware('web')->get('/__locale-probe', fn () => app()->getLocale());
    }

    public function test_supported_locales_config(): void
    {
        $this->assertSame(['th', 'en', 'zh'], config('app.supported_locales'));
    }

    public function test_default_locale_is_thai(): void
    {
        $this->get('/__locale-probe')->assertSeeText('th');
    }

    public function test_change_accepts_each_supported_locale(): void
    {
        foreach (['th', 'en', 'zh'] as $lang) {
            $this->get("/lang/change?lang=$lang")->assertSessionHas('locale', $lang);
            $this->get('/__locale-probe')->assertSeeText($lang);
        }
    }

    public function test_change_ignores_unsupported_values(): void
    {
        $this->get('/lang/change?lang=zh');

        foreach (['jp', '', '../', 'ZH'] as $junk) {
            $this->get('/lang/change?lang=' . urlencode($junk))->assertSessionHas('locale', 'zh');
        }
    }

    public function test_stale_unsupported_session_value_falls_back_to_thai(): void
    {
        $this->withSession(['locale' => 'jp'])
            ->get('/__locale-probe')
            ->assertSeeText('th')
            ->assertSessionHas('locale', 'th');
    }
}
