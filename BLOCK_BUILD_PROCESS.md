# Block Build Process Documentation

## Overview
This project has been refactored to use WordPress block `viewScript` properties for block-specific JavaScript instead of bundling everything through Gulp.

## Build Process

### Block-Specific JavaScript (viewScript)
The following blocks now use `viewScript` which ensures their JavaScript is only loaded when the block is present on the page:

1. **Tabbed Panels Block** (`templates-blocks/tabbed-panels/`)
   - Source: `src/js/custom/tabbed-panels.js`
   - Built: `build/blocks/tabbed-panels/view.js`
   - Block.json: `viewScript: "file:../../build/blocks/tabbed-panels/view.js"`

2. **Modals Block** (`templates-blocks/modals/`)
   - Source: `src/js/custom/modals.js`
   - Built: `build/blocks/modals/view.js`
   - Block.json: `viewScript: "file:../../build/blocks/modals/view.js"`

3. **Overlay Card Block** (`templates-blocks/overlay-card/`)
   - Source: `src/js/custom/overlay-card.js`
   - Built: `build/blocks/overlay-card/view.js`
   - Block.json: `viewScript: "file:../../build/blocks/overlay-card/view.js"`

4. **Background Section Block** (`templates-blocks/background-section/`)
   - Source: `templates-blocks/background-section/background-section.js`
   - Built: `build/blocks/background-section/view.js`
   - Block.json: `viewScript: "file:../../build/blocks/background-section/view.js"`

5. **Foldable Card Block** (`templates-blocks/foldable-card/`)
   - Source: `templates-blocks/foldable-card/foldable-card.js`
   - Built: `build/blocks/foldable-card/view.js`
   - Block.json: `viewScript: "file:../../build/blocks/foldable-card/view.js"`

### Global JavaScript (Gulp)
The following JavaScript files remain in the global Gulp build process as they are used site-wide:

- FontAwesome scripts
- Skip link focus fix
- UDS header initialization
- Hero video functionality
- Side menu active child
- Accordion accessibility

### Build Commands

- `npm run build` - Builds both blocks and global assets
- `npm run build:blocks` - Builds only block-specific JavaScript
- `npm run scripts` - Builds only global JavaScript through Gulp

### Development Notes

1. Block-specific JavaScript should be placed in `src/js/custom/` with descriptive filenames or in the block directory
2. Add new blocks to the `build-blocks.sh` script and corresponding `viewScript` in block.json
3. Global JavaScript should remain in the Gulp `front-end-scripts` task
4. The `build/` directory contains compiled block assets and should not be edited directly

## Future Enhancements

When package installation issues are resolved, this setup can be enhanced to use:
- `@wordpress/scripts` for more advanced webpack building
- Babel transpilation for better browser compatibility
- Minification and optimization for production builds