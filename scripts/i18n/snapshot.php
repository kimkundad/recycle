<?php
// Captures the visible text of every public page for one locale.
// Usage (inside recycle-php): php scripts/i18n/snapshot.php http://recycle-nginx th storage/app/i18n-snapshots/baseline
// GET requests only.

[, $base, $locale, $outRoot] = $argv + [null, null, null, null];
if (!$base || !$locale || !$outRoot) {
    fwrite(STDERR, "usage: snapshot.php <base-url> <locale> <out-dir>\n");
    exit(2);
}
$base = rtrim($base, '/');
$jar = tempnam(sys_get_temp_dir(), 'i18n');

function fetch(string $url, string $jar, bool $ajax = false): string
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_COOKIEJAR => $jar,
        CURLOPT_COOKIEFILE => $jar,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_HTTPHEADER => $ajax ? ['X-Requested-With: XMLHttpRequest', 'Accept: application/json, text/html'] : [],
    ]);
    $body = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($body === false || $code >= 400) {
        fwrite(STDERR, "WARN $code $url\n");
        return '';
    }
    return $body;
}

function visibleText(string $html): string
{
    // JSON responses (AJAX) may wrap HTML in a field; flatten all string values.
    $json = json_decode($html, true);
    if (is_array($json)) {
        $parts = [];
        array_walk_recursive($json, function ($v) use (&$parts) {
            if (is_string($v)) {
                $parts[] = $v;
            }
        });
        $html = implode("\n", $parts);
    }
    $html = preg_replace('#<(script|style|noscript)\b[^>]*>.*?</\1>#is', '', $html);
    $html = preg_replace('#<!--.*?-->#s', '', $html);
    // Keep user-visible attribute text (form placeholders, tooltips, alt text) as its own line.
    $html = preg_replace_callback('#<[^>]+>#', function ($tag) {
        preg_match_all('#\s(placeholder|title|alt|aria-label)\s*=\s*(["\'])(.*?)\2#is', $tag[0], $m, PREG_SET_ORDER);
        return "\n" . implode("\n", array_map(fn ($a) => '@' . strtolower($a[1]) . ': ' . $a[3], $m)) . "\n";
    }, $html);
    $text = html_entity_decode($html, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $lines = array_filter(array_map(fn ($l) => preg_replace('/\s+/u', ' ', trim($l)), explode("\n", $text)), 'strlen');
    return implode("\n", $lines) . "\n";
}

// Switch locale in this cookie session (redirect is not followed).
fetch("$base/", $jar);
fetch("$base/lang/change?lang=$locale", $jar);

$pages = [
    'home' => '/',
    'about' => '/about',
    'service' => '/service',
    'steel' => '/steel',
    'warehouse' => '/warehouse',
    'certificate' => '/certificate',
    'contact' => '/contact',
    'term' => '/term',
    'category' => '/category',
    'recomment' => '/recomment',
    'blog' => '/blog',
    'design-products' => '/design-products',
];

// Discover one detail page of each kind from listing pages.
// Product listings are loaded via AJAX, so discover those links from the AJAX responses.
$discover = [
    'product_detail' => ['/category_find?search=&category=&brand=', '#/product_detail/(\d+)#', true],
    'design_product_detail' => ['/design-products/find', '#/design-products/(\d+)#', true],
    'blog_detail' => ['/blog', '#/blog_detail/(\d+)#', false],
];
foreach ($discover as $name => [$from, $re, $isAjax]) {
    $body = str_replace('\\/', '/', fetch($base . $from, $jar, $isAjax));
    if (preg_match($re, $body, $m)) {
        $pages[$name] = $m[0];
    } else {
        fwrite(STDERR, "WARN no link found for $name on $from\n");
    }
}

$ajax = [
    'ajax-blogs' => '/blogs?page=1',
    'ajax-category_find' => '/category_find?search=&category=&brand=',
    'ajax-recomment_find' => '/recomment_find?page=1',
    'ajax-steel_find' => '/steel_find?search=&category=&brand=',
    'ajax-design-products-find' => '/design-products/find',
];

$dir = "$outRoot/$locale";
@mkdir($dir, 0777, true);
foreach ($pages as $name => $path) {
    file_put_contents("$dir/$name.txt", visibleText(fetch($base . $path, $jar)));
}
foreach ($ajax as $name => $path) {
    file_put_contents("$dir/$name.txt", visibleText(fetch($base . $path, $jar, true)));
}
unlink($jar);
echo "wrote " . (count($pages) + count($ajax)) . " files to $dir\n";
