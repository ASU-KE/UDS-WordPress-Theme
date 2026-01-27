# UDS WordPress Theme - Block ViewStyle Implementation

## Overview

This implementation refactors all custom blocks to use the WordPress `viewStyle` feature in `block.json` files. This enables block-specific frontend styling while maintaining compatibility with the existing UDS design system.

## Build Process

### Compiling Block Styles

Block styles are now built from SCSS source files that use UDS design tokens, ensuring they stay in sync with design system updates:

```bash
# Compile all block SCSS files to CSS
npm run build

# Or use gulp directly
gulp compile-block-styles

# Or update everything (CSS + JS)
gulp compile
```

### Source Files

Each block has a corresponding SCSS file in `/src/sass/blocks/`:
- `_alert.scss` → `/src/css/blocks/alert.css`
- `_background-section.scss` → `/src/css/blocks/background-section.css`
- `_blockquote.scss` → `/src/css/blocks/blockquote.css`
- And so on for all 16 blocks...

### Design System Integration (No Duplication)

**Important**: Block SCSS files import only variables and mixins from a shared `_variables.scss` file:

```scss
@import "variables";
```

This approach ensures:
- **No code duplication**: Each block CSS contains only block-specific styles
- **Shared tokens**: All blocks use the same design system values
- **Global Bootstrap**: The full UDS Bootstrap bundle remains loaded globally via `theme.min.css`
- **Efficient loading**: WordPress loads block CSS only when blocks are present

The `_variables.scss` file contains design tokens extracted from the UDS design system:
- `$uds-size-spacing-*` for spacing values
- `$uds-color-base-*` for color values
- `@include media-breakpoint-up(*)` for responsive breakpoints
- No compiled CSS rules (only variables, mixins, and functions)

## Updating Styles

When the upstream design system (@asu/unity-bootstrap-theme) is updated:

1. Update the npm package: `npm update @asu/unity-bootstrap-theme`
2. Update `src/sass/blocks/_variables.scss` with any new token values
3. Rebuild block styles: `npm run build` or `gulp compile-block-styles`
4. The compiled CSS files in `/src/css/blocks/` will be regenerated with updated values

## Design Decisions

### Variables-Only Import Pattern

The block SCSS files use a variables-only import to avoid code duplication:

**Why not import the full bundle?**
- Importing the full UDS Bootstrap bundle in each block would duplicate all Bootstrap CSS
- If a page uses 5 blocks, the Bootstrap CSS would be included 5 times
- This would massively increase page size and hurt performance

**Our Solution:**
- Created `/src/sass/blocks/_variables.scss` with design tokens only
- Blocks import this file to access `$uds-color-base-*`, `$uds-size-spacing-*`, etc.
- The full Bootstrap CSS remains in the global `theme.min.css` (loaded once per page)
- Block CSS files contain only block-specific styles

**Trade-off:**
- Variables must be manually synced when the design system updates
- This is a one-time update per design system release
- Ensures no code duplication and optimal performance

### Value Sources

All values in the CSS files are derived from UDS design tokens:

- `$uds-size-spacing-6` → `48px`
- `$uds-size-spacing-12` → `96px`
- `$uds-color-base-gold` → `#ffc627`
- `$uds-color-base-maroon` → `#8c1d40`
- `$uds-color-base-gray-7` → `#191919`
- `md` breakpoint → `768px`

## Block Files

Each block now includes:
- `viewStyle`: Path to frontend-only CSS file in `block.json`
- Source SCSS file in `/src/sass/blocks/`
- Compiled CSS file in `/src/css/blocks/`

## Benefits

- ✅ Frontend-only styling (editor unaffected)
- ✅ Performance improvement (conditional loading)
- ✅ Better separation of concerns
- ✅ WordPress best practices compliance
- ✅ Backward compatibility maintained
- ✅ **No code duplication** - each block CSS contains only its specific styles
- ✅ **Design system integration** with manual token updates
- ✅ **Developer control** over style updates