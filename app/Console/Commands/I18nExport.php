<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class I18nExport extends Command
{
    protected $signature = 'i18n:export {path}';
    protected $description = 'Export site translations (th/en/zh) to an xlsx for client review';

    public function handle(): int
    {
        $book = new Spreadsheet();
        $readme = $book->getActiveSheet();
        $readme->setTitle('README');
        $readme->setCellValue('A1', 'คำแปลภาษาจีน (中文) เป็นฉบับร่าง กรุณาตรวจและแก้ไขในคอลัมน์ 中文 เท่านั้น');
        $readme->setCellValue('A2', 'Chinese (中文) is a draft. Please review and edit only the 中文 column.');
        $readme->setCellValue('A3', 'เอกสารยาว (นโยบายข้อมูลส่วนบุคคล, นโยบายบริษัทในหน้าเกี่ยวกับเรา) ไม่อยู่ในไฟล์นี้ ตรวจแยกที่ resources/views/partials/term/zh.blade.php และ partials/about-policy/zh.blade.php');

        foreach (glob(lang_path('th/*.php')) as $file) {
            $name = basename($file, '.php');
            $th = Arr::dot(require $file);
            $en = Arr::dot(require lang_path("en/$name.php"));
            $zh = Arr::dot(require lang_path("zh/$name.php"));

            $sheet = $book->createSheet();
            $sheet->setTitle($name);
            $sheet->fromArray(['key', 'ไทย', 'English', '中文', 'หมายเหตุ'], null, 'A1');
            $row = 2;
            foreach ($th as $key => $value) {
                $sheet->fromArray([$key, $value, $en[$key] ?? '', $zh[$key] ?? '', ''], null, "A$row");
                $row++;
            }
            foreach (['A' => 30, 'B' => 50, 'C' => 50, 'D' => 50, 'E' => 30] as $col => $width) {
                $sheet->getColumnDimension($col)->setWidth($width);
            }
            $sheet->getStyle("B2:D$row")->getAlignment()->setWrapText(true);
            $sheet->freezePane('B2');
        }

        (new Xlsx($book))->save($this->argument('path'));
        $this->info('exported to ' . $this->argument('path'));

        return self::SUCCESS;
    }
}
