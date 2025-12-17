# UDS WordPress Theme - Block ViewStyle Implementation

## Overview

This implementation refactors all custom blocks to use the WordPress `viewStyle` feature in `block.json` files. This enables block-specific frontend styling while maintaining compatibility with the existing UDS design system.

## Build Process

### Compiling Block Styles

Block styles are now built from SCSS source files that import the UDS design system, ensuring they stay in sync with design token updates:

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

### Design System Integration

All block SCSS files import the UDS design system at the top:

```scss
@import "../../../node_modules/@asu/unity-bootstrap-theme/src/scss/unity-bootstrap-theme.bundle";
```

This gives access to all design tokens:
- `$uds-size-spacing-*` for spacing values
- `$uds-color-base-*` for color values
- `@include media-breakpoint-up(*)` for responsive breakpoints
- And all other UDS tokens and mixins

## Updating Styles

When the upstream design system (@asu/asu-unity-stack or @asu/unity-bootstrap-theme) is updated:

1. Update the npm package: `npm update @asu/unity-bootstrap-theme`
2. Rebuild block styles: `npm run build` or `gulp compile-block-styles`
3. The compiled CSS files in `/src/css/blocks/` will be regenerated with updated token values

## Design Decisions

### SCSS to CSS Build Pipeline

The viewStyle CSS files are now compiled from SCSS source files for the following reasons:

1. **Design Token Access**: SCSS files can use UDS design tokens directly
2. **Maintainability**: When design tokens change, running the build updates all values automatically
3. **Developer Control**: Developers have full control over when to update styles
4. **Consistency**: All blocks use the same design system values

### Value Sources

All values in the CSS files are derived from UDS design tokens:

- `$uds-size-spacing-6` → `32px`
- `$uds-size-spacing-12` → `96px`
- `$uds-color-base-gold` → `#ffc627`
- `$uds-color-base-maroon` → `#8c1d40`
- `$uds-color-base-gray-7` → `#484848`
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
- ✅ **Design system integration** with automatic token updates
- ✅ **Developer control** over style updates