# Chinese (zh) Locale — Phase 2: Database Content Design

Date: 2026-10-07
Status: Approved in conversation, pending written-spec review
Builds on: `docs/superpowers/specs/2026-10-06-chinese-locale-phase1-design.md` (branch `feature/zh-locale`)

## Goal

Store Simplified Chinese for every translatable database field, fill it with translations
produced in this session, and let admins edit it. Phase 1's `localized()` already reads
`*_zh` columns, so the public site shows the new content with little or no view work.

## Decisions (from the brainstorming conversation)

| # | Decision |
|---|---|
| 1 | Write directly to the **production** MySQL database (the `.env` connection). Every write step is preceded by a backup and runs only after the user says so. |
| 2 | **No client review** of DB translations; Claude's translations are final. |
| 3 | Rows without English: translate Thai → Chinese, **and fill empty `*_en` columns** (Thai → English). The English site changes accordingly. |
| 4 | Product names: **keep English segments, translate only the Thai segments**. Example: `H-Beam - เหล็กเอชบีม ใหม่เก่าเก็บ` → zh `H-Beam - H型钢 全新库存`, en `H-Beam - New Old Stock`. All-English names stay as they are in zh. |
| 5 | Translate **all 256 products** (including `status = 0`) and all rows of the other tables. |
| 6 | Work continues on branch `feature/zh-locale`; Phase 1 and Phase 2 merge together. |
| 7 | Approach A: translations live as JSON files in the repo and are written by an idempotent artisan command. |

## Scope

### Columns

`*_zh` is added next to every `*_en` column, using the same type:

| Table | New columns |
|---|---|
| categories | `cat_name_zh` varchar(199) |
| subcats | `sub_name_zh` varchar(199) |
| products | `name_pro_zh` varchar(199), `condition_zh` varchar(191), `title_pro_zh` text, `detail_pro_zh` text, `material_zh` text, `highlights_zh` text, `use_case_zh` text |
| news | `title_zh` varchar(191), `sub_title_zh` text, `detail_zh` longtext |
| slideshows | `title_zh` varchar(199), `big_title_zh` text, `sub_title_zh` text, `g_btn_text_zh` text, `w_btn_text_zh` text |
| certificates | `name_zh` varchar(199) |
| hprojects | `content_zh` text, `header_zh` varchar(191) |
| type_contacts | `name_zh` varchar(199) |
| design_types, design_materials, design_sizes | `name_zh` varchar(191) |

`hprojects.header` has no English column. It gets `header_zh` only, shown in zh via
`zh_localized()`. TH and EN keep showing `header`.

Out of scope: `brands` (brand names are proper nouns; the table uses a nonstandard
`name_eng` column), `sale_pages`, admin-panel UI text, `settings`.

### Content volume (measured 2026-10-07, text only, excluding HTML)

About 85,000 characters with English sources. There is additional Thai-only content:
114 product names, 184 product summaries, and 130 product details with no English.

## Design

### 1. Migration

- One migration, `add_zh_columns_for_db_content`. For each table and column it runs
  `if (!Schema::hasColumn(...))`, because the live schema was partly changed by hand and
  several `_en` columns have no migration. Every new column is nullable and placed
  `->after('<field>_en')`.
- `down()` drops only the columns this migration added (`hasColumn` guarded).
- No data changes in the migration.

### 2. Translation data in the repo

- `database/translations/source/<table>.json` (exported, read-only): for each row, `id`,
  the base/th and en values of every translatable field, and `source_hash`. The hash is
  sha256 of the row's th+en values of all translatable fields, in a fixed field order.
- `database/translations/<table>.json` (translated): for each row,
  `{ "id", "source_hash", "en": {field: value}, "zh": {field: value} }`. `en` contains
  only fields whose `_en` is empty in the source.
- `database/translations/GLOSSARY.md`: fixed renderings for the company name, customer
  and partner names, and recycling, steel and machinery terms. Shared with Phase 1 lang
  files, which are updated if they disagree.
- Export command: `php artisan i18n:export-db-source` (read-only `SELECT`s only).

### 3. Translation rules

- zh source: the `_en` value when it is not blank; otherwise the Thai base value.
- Product names: Latin-script segments, model codes, sizes and units stay verbatim; Thai
  segments are translated. The same rule applies to filling `name_pro_en`.
- HTML fields (`detail_pro*`, `detail*` of news, slide `sub_title`): translate text nodes
  only. Tags, attributes, image `src`, links, inline styles and entities stay
  byte-identical. A validator compares the tag sequence of source and translation and
  fails on any mismatch.
- Numbers, prices, phone numbers, emails, URLs, standards (TIS, ISO) and brand names stay
  verbatim.
- Empty source field → no translation (the field stays NULL).

### 4. Apply command

`php artisan i18n:apply-db-translations {--table=*} {--dry-run}`

- Loads `database/translations/<table>.json` for the selected tables (default: all).
- For each row:
  - Recomputes the row's `source_hash` from the live DB. On mismatch it skips the row and
    reports it, because an admin edited the source after export.
  - Writes a target column only if it is currently NULL or blank. It never overwrites
    existing `_en` or `_zh` values.
- Runs one transaction per table. Output is per table: rows updated, fields written,
  rows skipped (hash mismatch / missing row), fields skipped (already filled).
- `--dry-run` prints the same report without writing.
- Idempotent: a second run reports 0 fields written.
- The HTML tag-sequence validator runs before any write and aborts the table on failure.

### 5. Admin

- Every create/edit form that has an `_en` input gets a matching Chinese input
  (`<field>_zh`) right after it, with the same widget (input, textarea, or CKEditor for
  HTML fields) and the label suffix "(中文)".
- Forms: category, subcat (create, create_new, edit), product, news, slide, certificate,
  hproject, type_contact, design_product_filters.
- Controllers save `_zh` fields the same way they save `_en` fields (nullable, same
  validation rules as `_en`).

### 6. Public site

- `localized()` already resolves `_zh` → `_en` → base. No change for most views.
- Design filter labels currently call
  `localized(['name' => name_th, 'name_en' => name_en], 'name')` and must also pass
  `name_zh`.
- `hprojects.header` uses `zh_localized($u, 'header')` on the service page.
- Phase 1 places that preserve EN quirks keep working; once `_en` is filled, the quirks
  disappear by themselves, which is the intended EN change.
- Phase 1 places that use `zh_localized()` (contact topics, subcategory captions,
  certificate names) read `_zh` automatically.

### 7. Production run (each step needs the user's go-ahead)

1. **Backup:** `mysqldump --single-transaction` of the 11 tables to
   `storage/app/backups/<timestamp>-zh-phase2.sql` (gitignored), and verify the file is
   non-empty and contains each table.
2. **Migrate:** `php artisan migrate --path=database/migrations/<the new migration>`.
   Only this migration, never a bare `migrate`, because older migrations may not match the
   hand-edited schema.
3. **Dry run:** `php artisan i18n:apply-db-translations --dry-run`; review the report.
4. **Apply:** the same command without `--dry-run`.
5. **Verify:** run it again (expect 0 writes); run snapshot.php for zh and en; run
   check-zh.php (expect only switcher label, ฿ and the unused modal); spot-check pages.
6. **Rollback** if needed: run the migration's `down()` for the zh columns. For `_en`
   fills, restore the affected columns from the dump; the command's report lists every
   row and field it wrote.

### 8. Testing (in-memory SQLite only)

- Migration: adds columns when missing, skips existing ones, `down()` removes only its
  own columns.
- Apply command:
  - writes only blank targets;
  - skips rows with hash mismatch;
  - `--dry-run` writes nothing;
  - a second run writes nothing;
  - aborts a table whose HTML tag sequence differs.
- Admin: store/update for each controller persist `_zh` (feature tests with the minimal
  schema and `UserRoleMiddleware` disabled).
- Translation files: a test validates every JSON file against its source (ids exist, hash
  format, no unknown fields, HTML tag sequences match).

## Risks

- **Production write:** mitigated by the backup, dry-run, fill-blanks-only rule,
  per-table transactions and explicit go-ahead per step.
- **Source edited between export and apply:** handled by `source_hash` skip and report.
- **EN site changes** when `_en` is filled (decision 3): intended.
- **Translation quality** without client review (decision 2): accepted by the user; the
  glossary keeps terms consistent.
- **Content added later** has no Chinese until an admin fills the new fields.
  Auto-translation is out of scope.
