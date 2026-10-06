<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use PhpOffice\PhpSpreadsheet\IOFactory;

class I18nImport extends Command
{
    protected $signature = 'i18n:import {path}';
    protected $description = 'Import reviewed Chinese translations from the review xlsx into lang/zh';

    public function handle(): int
    {
        $book = IOFactory::load($this->argument('path'));

        foreach ($book->getAllSheets() as $sheet) {
            $name = $sheet->getTitle();
            $thFile = lang_path("th/$name.php");
            if ($name === 'README' || !is_file($thFile)) {
                continue;
            }

            $known = Arr::dot(require $thFile);
            $zh = require lang_path("zh/$name.php");
            $updated = 0;

            foreach ($sheet->toArray(null, false, false, false) as $i => $row) {
                if ($i === 0) {
                    continue;
                }
                [$key, , , $value] = array_pad($row, 4, null);
                if ($key === null || $key === '') {
                    continue;
                }
                if (!array_key_exists($key, $known)) {
                    $this->warn("skipped unknown key $name.$key");
                    continue;
                }
                if (!is_string($value) || trim($value) === '') {
                    $this->warn("skipped empty value $name.$key");
                    continue;
                }
                Arr::set($zh, $key, $value);
                $updated++;
            }

            file_put_contents(lang_path("zh/$name.php"), "<?php\n\nreturn " . var_export($zh, true) . ";\n");
            $this->info("$name: $updated updated");
        }

        return self::SUCCESS;
    }
}
