<?php

namespace App\Support\DbTranslation;

/**
 * Every translatable DB field: base (Thai) column, English column (null when none),
 * Chinese column, whether it holds HTML, and the varchar limit (null for text types).
 */
final class TranslatableFields
{
    public const MAP = [
        'categories' => [
            'cat_name' => ['base' => 'cat_name', 'en' => 'cat_name_en', 'zh' => 'cat_name_zh', 'html' => false, 'max' => 199],
        ],
        'subcats' => [
            'sub_name' => ['base' => 'sub_name', 'en' => 'sub_name_en', 'zh' => 'sub_name_zh', 'html' => false, 'max' => 199],
        ],
        'products' => [
            'name_pro' => ['base' => 'name_pro', 'en' => 'name_pro_en', 'zh' => 'name_pro_zh', 'html' => false, 'max' => 199],
            'condition' => ['base' => 'condition', 'en' => 'condition_en', 'zh' => 'condition_zh', 'html' => false, 'max' => 191],
            'title_pro' => ['base' => 'title_pro', 'en' => 'title_pro_en', 'zh' => 'title_pro_zh', 'html' => false, 'max' => null],
            'detail_pro' => ['base' => 'detail_pro', 'en' => 'detail_pro_en', 'zh' => 'detail_pro_zh', 'html' => true, 'max' => null],
            'material' => ['base' => 'material', 'en' => 'material_en', 'zh' => 'material_zh', 'html' => false, 'max' => null],
            'highlights' => ['base' => 'highlights', 'en' => 'highlights_en', 'zh' => 'highlights_zh', 'html' => false, 'max' => null],
            'use_case' => ['base' => 'use_case', 'en' => 'use_case_en', 'zh' => 'use_case_zh', 'html' => false, 'max' => null],
        ],
        'news' => [
            'title' => ['base' => 'title', 'en' => 'title_en', 'zh' => 'title_zh', 'html' => false, 'max' => 191],
            'sub_title' => ['base' => 'sub_title', 'en' => 'sub_title_en', 'zh' => 'sub_title_zh', 'html' => false, 'max' => null],
            'detail' => ['base' => 'detail', 'en' => 'detail_en', 'zh' => 'detail_zh', 'html' => true, 'max' => null],
        ],
        'slideshows' => [
            'title' => ['base' => 'title', 'en' => 'title_en', 'zh' => 'title_zh', 'html' => false, 'max' => 199],
            'big_title' => ['base' => 'big_title', 'en' => 'big_title_en', 'zh' => 'big_title_zh', 'html' => false, 'max' => null],
            'sub_title' => ['base' => 'sub_title', 'en' => 'sub_title_en', 'zh' => 'sub_title_zh', 'html' => true, 'max' => null],
            'g_btn_text' => ['base' => 'g_btn_text', 'en' => 'g_btn_text_en', 'zh' => 'g_btn_text_zh', 'html' => false, 'max' => null],
            'w_btn_text' => ['base' => 'w_btn_text', 'en' => 'w_btn_text_en', 'zh' => 'w_btn_text_zh', 'html' => false, 'max' => null],
        ],
        'certificates' => [
            'name' => ['base' => 'name', 'en' => 'name_en', 'zh' => 'name_zh', 'html' => false, 'max' => 199],
        ],
        'hprojects' => [
            'header' => ['base' => 'header', 'en' => null, 'zh' => 'header_zh', 'html' => false, 'max' => 191],
            'content' => ['base' => 'content', 'en' => 'content_en', 'zh' => 'content_zh', 'html' => false, 'max' => null],
        ],
        'type_contacts' => [
            'name' => ['base' => 'name', 'en' => 'name_en', 'zh' => 'name_zh', 'html' => false, 'max' => 199],
        ],
        'design_types' => [
            'name' => ['base' => 'name_th', 'en' => 'name_en', 'zh' => 'name_zh', 'html' => false, 'max' => 191],
        ],
        'design_materials' => [
            'name' => ['base' => 'name_th', 'en' => 'name_en', 'zh' => 'name_zh', 'html' => false, 'max' => 191],
        ],
        'design_sizes' => [
            'name' => ['base' => 'name_th', 'en' => 'name_en', 'zh' => 'name_zh', 'html' => false, 'max' => 191],
        ],
    ];

    /** @return string[] */
    public static function tables(): array
    {
        return array_keys(self::MAP);
    }
}
