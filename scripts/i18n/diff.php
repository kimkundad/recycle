<?php
// Usage: php scripts/i18n/diff.php <dirA> <dirB>   (exit 1 when any file differs)

[, $a, $b] = $argv + [null, null, null];
if (!$a || !$b) {
    fwrite(STDERR, "usage: diff.php <dirA> <dirB>\n");
    exit(2);
}
$failed = false;
$names = array_unique(array_merge(
    array_map('basename', glob("$a/*.txt")),
    array_map('basename', glob("$b/*.txt"))
));
sort($names);
foreach ($names as $name) {
    $left = is_file("$a/$name") ? file("$a/$name", FILE_IGNORE_NEW_LINES) : [];
    $right = is_file("$b/$name") ? file("$b/$name", FILE_IGNORE_NEW_LINES) : [];
    if ($left === $right) {
        continue;
    }
    $failed = true;
    echo "=== $name\n";
    foreach (array_diff($left, $right) as $i => $line) {
        echo "- [" . ($i + 1) . "] $line\n";
    }
    foreach (array_diff($right, $left) as $i => $line) {
        echo "+ [" . ($i + 1) . "] $line\n";
    }
}
echo $failed ? "DIFFERENT\n" : "IDENTICAL\n";
exit($failed ? 1 : 0);
