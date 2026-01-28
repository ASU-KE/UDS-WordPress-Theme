# Admin Scripts Gulp Task Documentation

## Overview

The `admin-scripts` gulp task compiles and bundles JavaScript files that are used in the WordPress admin area. This unified task consolidates all admin-side JavaScript functionality into a single bundle (`admin-bundle.js`) that is loaded on all WordPress admin pages.

## Location

- **Gulpfile**: `gulpfile.mjs`
- **Task Name**: `admin-scripts`
- **Output**: `dist/js/admin-bundle.js`

## Purpose

The admin-scripts task serves two main purposes:

1. **General Admin Functionality**: Menu editor customizations and other admin-wide features
2. **Gutenberg Block Customizations**: Block styles and editor enhancements for the WordPress block editor

## Source Files

The task bundles the following JavaScript files from `src/js/custom/admin/`:

| File | Purpose | Dependencies |
|------|---------|--------------|
| `admin.js` | Hides CTA button option for menu items with children in the menu editor | jQuery |
| `core-list-block.js` | Registers custom block styles for core/list (Maroon Bullet, Step List, etc.) and adds `uds-list` class | WordPress blocks API, lodash |
| `core-divider.js` | Registers Gold divider style for core/separator and removes default styles | WordPress blocks API |
| `core-image-block.js` | Replaces default core/image styles with UDS-specific styles (Drop shadow, Circular) | WordPress blocks API |
| `heading-highlights.js` | Adds toolbar buttons for heading highlights (Gold, White, Black) to core/heading blocks | WordPress blocks API, rich text API |

## How to Run

### Via NPM Script
```bash
npm run scripts
```

### Directly with Gulp
```bash
npx gulp admin-scripts
```

### As Part of Full Build
The admin-scripts task is included in the main build process:
```bash
npm run build
```

## Build Process

The task performs the following steps:

1. **Source**: Reads JavaScript files from `src/js/custom/admin/`
2. **Transpile**: Uses Babel with `@babel/preset-env` to ensure browser compatibility
3. **Concatenate**: Combines all files into a single bundle
4. **Output**: Writes `admin-bundle.js` to `dist/js/`

## Defensive Checks

All Gutenberg block customization files include defensive checks to prevent JavaScript errors on non-editor admin pages:

```javascript
// Example from core-list-block.js
if (typeof wp === 'undefined' || typeof wp.blocks === 'undefined' || typeof wp.domReady === 'undefined') {
    return;
}
```

These checks ensure scripts:
- ✅ Execute normally on post/page edit screens where the block editor is loaded
- ✅ Return early without errors on other admin pages (Dashboard, Settings, etc.)
- ✅ Don't pollute the JavaScript console with errors

## WordPress Enqueue

The bundled script is enqueued in `inc/enqueue.php`:

```php
function uds_wp_admin_scripts() {
    // ...
    $js_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/js/admin-bundle.js');
    wp_enqueue_script('uds-wordpress-admin-bundle-script', 
        get_template_directory_uri() . '/dist/js/admin-bundle.js', 
        array('lodash'), 
        $js_version
    );
}
add_action('admin_enqueue_scripts', 'uds_wp_admin_scripts');
```

**Key Points:**
- Loaded on **all** WordPress admin pages
- Depends on `lodash` (required by core-list-block.js)
- Version based on file modification time for cache busting

## Development Workflow

### Adding New Admin Scripts

1. Create your JavaScript file in `src/js/custom/admin/`
2. If using WordPress block editor APIs, add defensive checks:
   ```javascript
   if (typeof wp === 'undefined' || typeof wp.blocks === 'undefined') {
       return;
   }
   ```
3. Add the file path to the `adminScripts` array in `gulpfile.mjs`:
   ```javascript
   const adminScripts = [
       "./src/js/custom/admin/admin.js",
       "./src/js/custom/admin/core-list-block.js",
       "./src/js/custom/admin/core-divider.js",
       "./src/js/custom/admin/core-image-block.js",
       "./src/js/custom/admin/heading-highlights.js",
       "./src/js/custom/admin/your-new-file.js", // Add here
   ]
   ```
4. Run `npm run scripts` to rebuild the bundle
5. Test on both editor and non-editor admin pages

### Testing Changes

1. **Build the bundle**:
   ```bash
   npm run scripts
   ```

2. **Test on Editor Pages**:
   - Navigate to Pages → Add New or Edit
   - Open browser console
   - Verify no JavaScript errors
   - Test that your block customizations work

3. **Test on Non-Editor Pages**:
   - Navigate to Dashboard, Settings, or Plugins
   - Open browser console
   - Verify no JavaScript errors
   - Confirm scripts return early (check defensive checks)

### Debugging

If you encounter issues:

1. **Check the console**: Look for JavaScript errors in the browser console
2. **Verify file paths**: Ensure all file paths in `gulpfile.mjs` are correct
3. **Check defensive checks**: Make sure all WordPress API checks are in place
4. **Rebuild**: Run `npm run scripts` to regenerate the bundle
5. **Clear cache**: Clear WordPress cache and browser cache

## Historical Context

### Previous Architecture

Previously, admin JavaScript was split into two separate tasks:

- **admin-scripts**: General admin functionality (contained legacy references to non-existent files)
- **admin-core-scripts**: Gutenberg block customizations (loaded conditionally only on post/page screens)

### Consolidation (Current)

The tasks were consolidated to:
- Remove legacy FontAwesome file references that didn't exist
- Remove misplaced front-end scripts (hero_video.js, modals.js, side-menu-active-child.js)
- Merge all legitimate admin scripts into a single task
- Add defensive checks to prevent errors on non-editor pages
- Simplify the build process and maintenance

## Performance Considerations

- **Bundle Size**: The current admin-bundle.js is approximately 10-15KB
- **Loading**: Scripts load on all admin pages but defensive checks ensure non-applicable code doesn't execute
- **Trade-off**: Slight overhead on non-editor pages in exchange for simpler maintenance and build process

## Related Files

- **Gulpfile**: `gulpfile.mjs` - Task definition
- **Source Files**: `src/js/custom/admin/*.js` - Individual admin scripts
- **Output**: `dist/js/admin-bundle.js` - Compiled bundle
- **Enqueue**: `inc/enqueue.php` - WordPress script loading
- **Workflow**: `.github/workflows/build-admin-scripts.yml` - CI/CD automation

## Troubleshooting

### Bundle not generated
- Run `npm install --legacy-peer-deps` to ensure dependencies are installed
- Check for errors in the source JavaScript files
- Verify gulp is installed globally or use `npx gulp admin-scripts`

### JavaScript errors in admin
- Check that defensive checks are present in all Gutenberg files
- Verify `lodash` dependency is properly enqueued in `inc/enqueue.php`
- Look for syntax errors in source files

### Changes not reflected
- Clear WordPress cache (if using caching plugin)
- Hard refresh browser (Ctrl+Shift+R or Cmd+Shift+R)
- Verify file modification time in enqueue script is updating

## Additional Resources

- [WordPress Block Editor Handbook](https://developer.wordpress.org/block-editor/)
- [Gulp Documentation](https://gulpjs.com/)
- [Babel Preset Env](https://babeljs.io/docs/en/babel-preset-env)
- [ASU Unity Design System](https://github.com/ASU/unity-bootstrap-theme)
