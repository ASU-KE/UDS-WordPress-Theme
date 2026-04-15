# Copilot Instructions for UDS WordPress Theme

## Project Overview

This is the **ASU Unity Design System (UDS) WordPress Theme** — a production WordPress theme built by Arizona State University Knowledge Enterprise (ASU-KE). It delivers ASU Web Standards 2.0‑compliant, accessible WordPress websites using ASU's canonical design tokens and the official Unity Design System (`@asu/unity-bootstrap-theme`).

- **Theme text domain:** `uds-wordpress-theme`
- **Based on:** UnderStrap (Underscores + Bootstrap 5)
- **Required plugins:** Advanced Custom Fields Pro, Bootstrap Blocks (`wp-bootstrap-blocks`)
- **License:** GPL-2.0-only

## Repository Layout

```
├── functions.php             # Main include loader — requires all /inc files
├── style.css                 # Theme metadata header only (no compiled CSS)
├── theme.json                # Block editor design tokens (colors, spacing)
├── header.php / footer.php   # Global templates with React header/footer injection
├── page.php / single.php / archive.php / search.php / 404.php / author.php / index.php
│
├── inc/                      # PHP includes (35+ files loaded by functions.php)
│   ├── setup.php             # Theme support, menus, excerpt config
│   ├── enqueue.php           # Script/style enqueue and block editor palette
│   ├── uds-blocks.php        # ACF block registration (18 blocks)
│   ├── widgets.php           # Sidebar/widget area registration
│   ├── customizer/           # Customizer panels and settings
│   ├── header-localizer-script.php   # React header component config
│   ├── footer-localizer-script.php   # React footer component config
│   ├── wp-rest-api-extensions.php    # REST API enhancements
│   ├── speculative-loading.php       # WP 6.8+ prefetch/prerender
│   ├── class-*.php           # Walker classes, widgets, ACF multisite support
│   ├── analytics/            # Google Tag Manager / Analytics setup
│   └── tgm-plugin-activation/       # Plugin dependency management
│
├── templates-blocks/         # ACF block render templates (18 blocks)
│   └── {block-name}/block.json + {block-name}.php
├── templates-global/         # Hero, story-hero, global-banner partials
├── templates-loop/           # Content loop templates (content, card, single, search, none)
├── patterns/                 # 42+ block patterns for the block editor
├── acf-json/                 # ACF field group JSON exports (auto-sync)
│
├── src/                      # Source assets
│   ├── sass/                 # SCSS source (theme.scss, admin.scss, partials)
│   ├── js/custom/            # Theme JavaScript source files
│   ├── js/uds/               # ASU component UMD bundles (header, footer, data-layer)
│   └── js/fontawesome/       # Font Awesome JS bundles
│
├── dist/                     # Compiled/minified output (committed to repo)
│   ├── css/theme.min.css     # Main theme styles
│   ├── css/admin.min.css     # Admin styles
│   ├── js/                   # Compiled JS bundles
│   └── img/                  # UDS brand images and endorsed logos
│
├── docs/                     # Documentation (developer guide, user guide, changelog)
├── languages/                # Translation files (i18n)
├── gulpfile.mjs              # Gulp 5 build configuration (ES modules)
├── package.json              # npm dependencies + Volta-pinned Node 14.21.3
├── composer.json             # PHP dependencies + PHPCS scripts
└── .vscode/settings.json     # WordPress coding standards (tabs, UTF-8, LF)
```

## Build System

The theme uses **Gulp 5** (ES module format in `gulpfile.mjs`) for asset compilation. Key commands:

| Command | Purpose |
|---------|---------|
| `npm run build` | Full compile — SCSS, CSS minify, JS bundle, images (`gulp compile`) |
| `npm run compile-sass` | Compile SCSS → CSS |
| `npm run minify-css` | Minify compiled CSS to `dist/css/` |
| `npm run frontjs` | Bundle frontend JS to `dist/js/theme.min.js` |
| `npm run scripts` | Rebundle all JS files |
| `npm run sync` | BrowserSync dev server with file watching |
| `npm run assets` | Reset `/src` assets from `node_modules` |
| `npm run update-header` | Update ASU header/footer component from npm |

**Asset pipeline:**
- SCSS source in `src/sass/` → compiled to `src/css/compiled-sass/` → minified to `dist/css/`
- JS source in `src/js/custom/` → Babel transpiled, concatenated, uglified to `dist/js/`
- UDS images, Font Awesome, and Bootstrap copied from `node_modules` via Gulp tasks

**Important:** The `dist/` directory is committed to the repository. After changing any source files in `src/`, you must run the appropriate build command and commit the updated `dist/` output.

## Code Quality and Linting

### PHP

```bash
composer install                # Install PHP dev dependencies (once)
composer run check:cs           # PHPCS — WordPress Coding Standards check
composer run fix:cs             # PHPCBF — auto-fix code style violations
composer run lint:php           # PHP Parallel Lint — syntax check all PHP files
```

- Standard: WordPress Coding Standards (WPCS) + WP Theme Review
- PHP minimum: 5.6 (composer.json), PHP 8 recommended (README)
- PHPCS config comes from `composer.json` scripts; there is no standalone `phpcs.xml` in the repo

### JavaScript / CSS

There are no ESLint or Stylelint configurations. JavaScript follows ES6+ conventions transpiled with Babel. SCSS follows BEM-inspired naming with component-based organization.

## Coding Conventions

### PHP

- Follow [WordPress Coding Standards](https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/)
- **Indentation:** Tabs (per `.vscode/settings.json`)
- **Text domain:** Always use `'uds-wordpress-theme'` for translatable strings
- All user-facing strings must use `__()`, `_e()`, or similar i18n functions
- New functionality files go in `inc/` and must be added to the `$uds_wp_includes` array in `functions.php`
- Walker classes follow the naming pattern `class-{name}.php`
- Widget classes follow WordPress widget API patterns (see `class-uds-notification-banner.php`)

### JavaScript

- ES6+ source, transpiled to ES5 via Babel `@babel/preset-env`
- Feature-based file organization in `src/js/custom/`
- Admin scripts in `src/js/custom/admin/`
- Accessibility scripts in `src/js/custom/a11y/`
- jQuery is available but jQuery Migrate is disabled

### SCSS

- Entry points: `src/sass/theme.scss` (frontend) and `src/sass/admin.scss` (admin)
- Partials prefixed with underscore (`_filename.scss`)
- Component-based organization in `src/sass/theme/` and `src/sass/blocks/`

### JSON/YAML

- 2-space indentation (per `.vscode/settings.json`)

## Architecture Patterns

### ACF Blocks

Custom blocks are registered in `inc/uds-blocks.php` using `register_block_type()` on the `init` hook (priority 5). Each block lives in `templates-blocks/{block-name}/` with:
- `block.json` — Block metadata and ACF field references
- `{block-name}.php` — Server-side render template

All blocks use the `'uds'` block category, added via the `block_categories_all` filter.

### Block Patterns

Block patterns are PHP files in the `patterns/` directory. Custom categories are registered in `inc/block-pattern-categories.php`.

### React Header/Footer

The ASU global header and footer are React components (`@asu/component-header-footer`). Configuration is passed via `wp_localize_script()` in:
- `inc/header-localizer-script.php`
- `inc/footer-localizer-script.php`

Navigation data is prepared by `class-unity-react-header-navtree-walker.php`.

### Theme Customizer

Customizer settings are organized in `inc/customizer/` with separate files for settings, sanitizers, controls JS, and preview JS. Advanced settings use a custom admin page in `inc/theme-settings-custom.php`.

### REST API Extensions

Custom REST fields registered in `inc/wp-rest-api-extensions.php`:
- `uds_featured_image` — enhanced image data for all public post types
- `uds_news_author` — author metadata for posts
- `uds_story_hero` — story hero configuration for posts

### Script/Style Enqueuing

All frontend and admin assets are enqueued in `inc/enqueue.php`. Cache busting uses `filemtime()`. The block editor color palette is also defined here (must stay in sync with `theme.json`).

## WordPress Hooks

### Custom Action Hooks

| Hook | Location | Purpose |
|------|----------|---------|
| `uds_wp_after_global_header` | `header.php` | Insert content after the header |
| `uds_wp_before_global_footer` | `footer.php` | Insert content before footer |
| `uds_wp_before_global_footer_columns` | `footer.php` | Replace footer columns |
| `uds_wp_add_speculation_rules` | `inc/speculative-loading.php` | Add speculation rules |

### Custom Filters

| Filter | Location | Purpose |
|--------|----------|---------|
| `uds_wp_speculation_exclude_paths` | `inc/speculative-loading.php` | Exclude URLs from speculative loading |
| `uds_rest_api_featured_image` | `inc/wp-rest-api-extensions.php` | Modify REST featured image data |

## Testing

There are no automated test suites (no PHPUnit, Jest, or similar). Validation relies on:

1. **PHP linting:** `composer run lint:php`
2. **Code standards:** `composer run check:cs`
3. **Manual testing** in a local WordPress environment

## npm Dependencies and GitHub Packages

ASU packages (`@asu/*`) are hosted on GitHub Packages. The `.npmrc` file configures the `@asu` scope to use `https://npm.pkg.github.com`. A personal access token with `read:packages` scope is required for `npm install`.

**Node version:** Pinned via Volta to Node 14.21.3 / npm 9.5.0 (see `package.json` → `volta`).

## CI/CD

The only GitHub Actions workflow is `.github/workflows/azure-devops-sync.yml`, which syncs GitHub issues to Azure DevOps. There are no CI build or test workflows.

## Key Files to Understand

When working on this theme, these files are the most impactful:

| File | Why it matters |
|------|---------------|
| `functions.php` | Central include loader — all `inc/` files must be listed here |
| `inc/enqueue.php` | All script/style registration and block editor setup |
| `inc/uds-blocks.php` | ACF block registration, block whitelist, disabled core blocks |
| `inc/setup.php` | Theme support features, nav menus, image sizes |
| `theme.json` | Block editor design tokens — colors and spacing must match `enqueue.php` |
| `gulpfile.mjs` | Build pipeline — source file lists for JS bundles |
| `inc/header-localizer-script.php` | React header configuration |
| `inc/footer-localizer-script.php` | React footer configuration |

## Common Tasks

### Adding a new ACF block

1. Create `templates-blocks/{block-name}/block.json` and `{block-name}.php`
2. Register the block in `inc/uds-blocks.php` within the `uds_acf_blocks_init()` function
3. Add block-specific styles in `src/sass/blocks/` and import in `src/sass/theme.scss`
4. Run `npm run build` to compile assets

### Adding a new block pattern

1. Create a PHP file in `patterns/` following existing pattern structure
2. Register any new categories in `inc/block-pattern-categories.php`

### Adding a new include file

1. Create the file in `inc/`
2. Add the path to the `$uds_wp_includes` array in `functions.php`

### Updating ASU components

1. Update version in `package.json`
2. Run `npm install`
3. Run `npm run update-header` (for header/footer component)
4. Run `npm run assets` (to refresh source files from node_modules)
5. Run `npm run build` (to compile everything)
6. Commit updated `dist/` files

### Modifying styles

1. Edit SCSS files in `src/sass/`
2. Run `npm run compile-sass && npm run minify-css` (or `npm run build`)
3. Commit both source and `dist/css/` changes

### Modifying JavaScript

1. Edit JS files in `src/js/custom/`
2. Run `npm run frontjs` (frontend) or `npm run scripts` (all)
3. Commit both source and `dist/js/` changes

## Vendor Files (Read-Only)

The following files are **vendor/third-party assets** copied from `node_modules` by Gulp tasks. They may be read for context but **must not be modified directly** — they are overwritten on every `npm run assets` or `npm run update-header` run:

- `src/css/fontawesome/all.css`
- `src/js/fontawesome/all.js`
- `src/js/uds/asuHeaderFooter.umd.js`
- `src/js/uds/unity-bootstrap.umd.js`
- `src/js/uds/unity-bootstrap.umd.js.map`

## Gotchas and Troubleshooting

- **`dist/` is committed:** Always rebuild and commit compiled assets after source changes.
- **`.npmrc` token:** `npm install` will fail without a valid GitHub Packages token for the `@asu` scope. If you encounter authentication errors, this is why.
- **Volta:** The project pins Node 14.21.3. If Volta is not installed, manually ensure you use a compatible Node version.
- **ACF Pro required:** Many theme features depend on ACF Pro. Without it, blocks and several admin features will not function.
- **Color palette sync:** The color palette in `theme.json` must stay in sync with the palette defined in `inc/enqueue.php` (lines ~128–195).
- **Block whitelist:** `inc/uds-blocks.php` contains a strict allowed block list. Adding new core blocks requires updating the `uds_allowed_block_types()` function.
- **jQuery Migrate disabled:** The theme disables jQuery Migrate for performance. Code should not depend on deprecated jQuery APIs.
- **PHPCS runtime version:** The `check:cs` script passes `--runtime-set testVersion 5.6-` to enforce PHP 5.6+ compatibility checks.
