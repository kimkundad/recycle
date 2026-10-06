<?php

namespace App\Support\DbTranslation;

final class TranslationValidator
{
    /** @return string[] */
    public static function tags(string $html): array
    {
        preg_match_all('/<[^>]+>/', $html, $m);
        return $m[0];
    }

    /**
     * @param array $file      decoded database/translations/<table>.json
     * @param array $sourceById id => decoded source row
     * @return string[] human-readable errors
     */
    public static function errors(string $table, array $file, array $sourceById): array
    {
        $errors = [];
        $map = TranslatableFields::MAP[$table];
        foreach ($file['rows'] as $row) {
            $id = $row['id'] ?? null;
            $src = $sourceById[$id] ?? null;
            if (!$src) {
                $errors[] = "id $id: not in source export";
                continue;
            }
            if (($row['source_hash'] ?? '') !== $src['source_hash']) {
                $errors[] = "id $id: source_hash differs from source export";
            }
            foreach (['en', 'zh'] as $lang) {
                foreach ($row[$lang] ?? [] as $field => $value) {
                    $f = $map[$field] ?? null;
                    if (!$f) {
                        $errors[] = "id $id: unknown field $field";
                        continue;
                    }
                    if (!is_string($value) || SourceRow::isBlank($value)) {
                        $errors[] = "id $id $lang.$field: blank value";
                        continue;
                    }
                    if ($lang === 'en' && (!$f['en'] || $src['fields'][$field]['en'] !== null)) {
                        $errors[] = "id $id en.$field: en given but source has English or no en column";
                    }
                    if ($f['max'] && mb_strlen($value) > $f['max']) {
                        $errors[] = "id $id $lang.$field: too long (" . mb_strlen($value) . " > {$f['max']})";
                    }
                    if ($f['html']) {
                        $origin = $src['fields'][$field]['en'] ?? $src['fields'][$field]['th'] ?? '';
                        if (self::tags($origin) !== self::tags($value)) {
                            $errors[] = "id $id $lang.$field: tag mismatch";
                        }
                    }
                }
            }
        }
        return $errors;
    }
}
