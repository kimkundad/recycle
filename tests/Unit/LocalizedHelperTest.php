<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class LocalizedHelperTest extends TestCase
{
    private function row(array $attrs): object
    {
        return (object) $attrs;
    }

    public function test_thai_uses_base_field(): void
    {
        App::setLocale('th');
        $this->assertSame('ไทย', localized($this->row(['title' => 'ไทย', 'title_en' => 'EN']), 'title'));
    }

    public function test_english_prefers_en_then_base(): void
    {
        App::setLocale('en');
        $this->assertSame('EN', localized($this->row(['title' => 'ไทย', 'title_en' => 'EN']), 'title'));
        $this->assertSame('ไทย', localized($this->row(['title' => 'ไทย', 'title_en' => null]), 'title'));
        $this->assertSame('ไทย', localized($this->row(['title' => 'ไทย', 'title_en' => "  \n"]), 'title'));
        $this->assertSame('ไทย', localized($this->row(['title' => 'ไทย']), 'title'));
    }

    public function test_chinese_prefers_zh_then_en_then_base(): void
    {
        App::setLocale('zh');
        $this->assertSame('中文', localized($this->row(['title' => 'ไทย', 'title_en' => 'EN', 'title_zh' => '中文']), 'title'));
        $this->assertSame('EN', localized($this->row(['title' => 'ไทย', 'title_en' => 'EN']), 'title'));
        $this->assertSame('EN', localized($this->row(['title' => 'ไทย', 'title_en' => 'EN', 'title_zh' => '']), 'title'));
        $this->assertSame('ไทย', localized($this->row(['title' => 'ไทย', 'title_en' => ' ']), 'title'));
    }

    public function test_works_with_models_and_arrays(): void
    {
        App::setLocale('zh');
        $model = new class extends Model {
            protected $guarded = [];
        };
        $model->fill(['name' => 'ไทย', 'name_en' => 'EN']);

        $this->assertSame('EN', localized($model, 'name'));
        $this->assertSame('EN', localized(['name' => 'ไทย', 'name_en' => 'EN'], 'name'));
    }

    public function test_returns_null_when_nothing_available(): void
    {
        App::setLocale('zh');
        $this->assertNull(localized($this->row([]), 'title'));
        $this->assertNull(localized(null, 'title'));
    }

    public function test_zh_only_localizes_in_chinese_and_keeps_base_field_otherwise(): void
    {
        $row = $this->row(['name' => 'ไทย', 'name_en' => 'EN']);

        App::setLocale('zh');
        $this->assertSame('EN', zh_localized($row, 'name'));

        App::setLocale('en');
        $this->assertSame('ไทย', zh_localized($row, 'name'));

        App::setLocale('th');
        $this->assertSame('ไทย', zh_localized($row, 'name'));
    }
}
