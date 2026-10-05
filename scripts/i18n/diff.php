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
    // Compare as multisets so repeated lines and reordering are reported too.
    $lc = array_count_values($left);
    $rc = array_count_values($right);
    foreach ($lc as $line => $n) {
        if (($rc[$line] ?? 0) < $n) {
            echo "- (x" . ($n - ($rc[$line] ?? 0)) . ") $line\n";
        }
    }
    foreach ($rc as $line => $n) {
        if (($lc[$line] ?? 0) < $n) {
            echo "+ (x" . ($n - ($lc[$line] ?? 0)) . ") $line\n";
        }
    }
    if ($lc == $rc) {
        foreach ($left as $i => $line) {
            if ($line !== $right[$i]) {
                echo "  order differs from line " . ($i + 1) . ": '$line' vs '{$right[$i]}'\n";
                break;
            }
        }
    }
}
echo $failed ? "DIFFERENT\n" : "IDENTICAL\n";
exit($failed ? 1 : 0);
