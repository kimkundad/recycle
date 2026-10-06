<?php

namespace App\Support\DbTranslation;

final class SourceRow
{
    public static function isBlank(?string $value): bool
    {
        return $value === null || trim($value) === '';
    }

    /** Value as stored for hashing/export: trimmed, blank → null. */
    public static function clean(?string $value): ?string
    {
        return self::isBlank($value) ? null : trim($value);
    }

    /** @param object|array $row */
    public static function hash(string $table, $row): string
    {
        $parts = [];
        foreach (TranslatableFields::MAP[$table] as $field => $f) {
            $parts[$field] = [
                self::clean(data_get($row, $f['base'])),
                $f['en'] ? self::clean(data_get($row, $f['en'])) : null,
            ];
        }
        return hash('sha256', json_encode($parts, JSON_UNESCAPED_UNICODE));
    }
}
