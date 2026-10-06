<?php
// Lists lines containing Thai characters in zh snapshots.
// Usage: php scripts/i18n/check-zh.php <zh-snapshot-dir>
$dir = $argv[1] ?? null;
if (!$dir) {
    fwrite(STDERR, "usage: check-zh.php <dir>\n");
    exit(2);
}
$count = 0;
foreach (glob("$dir/*.txt") as $file) {
    foreach (file($file, FILE_IGNORE_NEW_LINES) as $i => $line) {
        if (preg_match('/[\x{0E00}-\x{0E7F}]/u', $line)) {
            $count++;
            echo basename($file) . ':' . ($i + 1) . ": $line\n";
        }
    }
}
echo "$count line(s) with Thai\n";
