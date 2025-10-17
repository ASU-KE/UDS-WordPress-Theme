# Block Build Process Documentation

## Overview
This project has been refactored to use WordPress block `viewScript` and `editorScript` properties for block-specific JavaScript instead of bundling everything through Gulp.

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

### Core Block Extensions (editorScript)
The following scripts extend WordPress core blocks and are now individually enqueued as editor scripts instead of being bundled:

1. **Core List Block Extensions**
   - Source: `src/js/custom/admin/core-list-block.js`
   - Built: `build/admin/core-list-block.js`
   - Enqueued: In `inc/enqueue.php` for post/page edit screens
   - Purpose: Adds custom list styles and UDS styling

2. **Core Separator Block Extensions**
   - Source: `src/js/custom/admin/core-divider.js`
   - Built: `build/admin/core-divider.js`
   - Enqueued: In `inc/enqueue.php` for post/page edit screens
   - Purpose: Customizes separator block styles

3. **Core Image Block Extensions**
   - Source: `src/js/custom/admin/core-image-block.js`
   - Built: `build/admin/core-image-block.js`
   - Enqueued: In `inc/enqueue.php` for post/page edit screens
   - Purpose: Adds UDS-specific image styles

4. **Heading Highlights**
   - Source: `src/js/custom/admin/heading-highlights.js`
   - Built: `build/admin/heading-highlights.js`
   - Enqueued: In `inc/enqueue.php` for post/page edit screens
   - Purpose: Adds highlighting formatting options to heading blocks

### Global JavaScript (Gulp)
The following JavaScript files remain in the global Gulp build process as they are used site-wide:

- FontAwesome scripts
- Skip link focus fix
- UDS header initialization
- Hero video functionality
- Side menu active child
- Accordion accessibility
- General admin functionality (admin.js, customizer scripts)

### Build Commands

- `npm run build` - Builds both blocks and global assets
- `npm run build:blocks` - Builds both viewScript and editorScript files
- `npm run scripts` - Builds only global JavaScript through Gulp

### Development Notes

1. **ViewScript files**: Block-specific frontend JavaScript goes in `src/js/custom/` or block directories
2. **EditorScript files**: Core block extensions go in `src/js/custom/admin/`
3. **Global scripts**: Site-wide functionality remains in Gulp `front-end-scripts` and `admin-scripts` tasks
4. **Build directory**: `build/` contains compiled assets and should not be edited directly
5. **Enqueuing**: EditorScripts are enqueued in `inc/enqueue.php` with proper WordPress dependencies

### Adding New Scripts

**For new block viewScripts:**
1. Add source file to `src/js/custom/` or block directory
2. Add build command to `build-blocks.sh`
3. Add `viewScript` property to block.json

**For new core block extensions:**
1. Add source file to `src/js/custom/admin/`
2. Add build command to `build-blocks.sh`
3. Add enqueue statement to `inc/enqueue.php` with appropriate dependencies

## Future Enhancements

When package installation issues are resolved, this setup can be enhanced to use:
- `@wordpress/scripts` for more advanced webpack building
- Babel transpilation for better browser compatibility
- Minification and optimization for production builds