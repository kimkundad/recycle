<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\File;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Tests\TestCase;

class I18nSpreadsheetTest extends TestCase
{
    private string $langBackup;

    protected function setUp(): void
    {
        parent::setUp();
        $this->langBackup = sys_get_temp_dir() . '/lang-backup-' . uniqid();
        File::copyDirectory(lang_path(), $this->langBackup);
    }

    protected function tearDown(): void
    {
        File::deleteDirectory(lang_path());
        File::copyDirectory($this->langBackup, lang_path());
        File::deleteDirectory($this->langBackup);
        parent::tearDown();
    }

    public function test_export_then_import_round_trips_chinese(): void
    {
        $path = sys_get_temp_dir() . '/i18n-' . uniqid() . '.xlsx';

        $this->artisan('i18n:export', ['path' => $path])->assertExitCode(0);

        $book = IOFactory::load($path);
        $sheet = $book->getSheetByName('common');
        $this->assertNotNull($sheet);
        $this->assertSame(['key', 'ไทย', 'English', '中文', 'หมายเหตุ'], array_slice($sheet->rangeToArray('A1:E1')[0], 0, 5));

        // Client edits the first data row's Chinese cell.
        $key = $sheet->getCell('A2')->getValue();
        $sheet->setCellValue('D2', '客户修改');
        $sheet->setCellValue('A99', 'does.not.exist');
        $sheet->setCellValue('D99', 'x');
        IOFactory::createWriter($book, 'Xlsx')->save($path);

        $this->artisan('i18n:import', ['path' => $path])
            ->expectsOutputToContain('skipped unknown key common.does.not.exist')
            ->assertExitCode(0);

        $zh = require lang_path('zh/common.php');
        $this->assertSame('客户修改', data_get($zh, $key));
        unlink($path);
    }
}
