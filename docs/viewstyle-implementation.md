# UDS WordPress Theme - Block ViewStyle Implementation

## Overview

This implementation refactors all custom blocks to use the WordPress `viewStyle` feature in `block.json` files. This enables block-specific frontend styling while maintaining compatibility with the existing UDS design system.

## Design Decisions

### CSS Files vs SCSS Integration

The viewStyle CSS files use computed values (e.g., `#ffc627` instead of `$uds-color-base-gold`) for the following reasons:

1. **WordPress Compatibility**: ViewStyle files must be plain CSS that WordPress can load directly
2. **Build Simplicity**: Avoids complex build pipeline for individual block CSS files
3. **Performance**: Direct CSS loading is faster than additional SCSS compilation

### Value Sources

All hardcoded values in the CSS files are derived from UDS design tokens:

- `32px` = `$uds-size-spacing-6`
- `96px` = `$uds-size-spacing-12`
- `#ffc627` = `$uds-color-base-gold`
- `#8c1d40` = `$uds-color-base-maroon`
- `#484848` = `$uds-color-base-gray-7`
- `768px` = `md` breakpoint

## Future Improvements

To maintain better consistency with the design system, consider:

1. **CSS Custom Properties**: Generate CSS variables from SCSS tokens in the main build
2. **Automated Sync**: Create build process to update viewStyle CSS when design tokens change
3. **Token Documentation**: Maintain mapping between CSS values and SCSS tokens

## Block Files

Each block now includes:
- `viewStyle`: Path to frontend-only CSS file
- Dedicated CSS file in `/src/css/blocks/`
- Extracted styles from main SCSS where applicable

## Benefits

- ✅ Frontend-only styling (editor unaffected)
- ✅ Performance improvement (conditional loading)
- ✅ Better separation of concerns
- ✅ WordPress best practices compliance
- ✅ Backward compatibility maintained