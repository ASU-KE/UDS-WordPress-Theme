# CSS Styling Update Process

This document outlines the steps to update CSS styling from the latest asu-unity-stack release.

## Prerequisites

1. Ensure you have a valid GitHub Personal Access Token with access to ASU packages
2. Update the `.npmrc` file with your token:
   ```
   @asu:registry=https://npm.pkg.github.com
   //npm.pkg.github.com/:_authToken=YOUR_ACTUAL_TOKEN_HERE
   ```

## Update Steps

### 1. Install Latest Package
```bash
npm install @asu/unity-bootstrap-theme@latest --save
```

### 2. Compile and Minify CSS
```bash
gulp update-css-styling
```

Or run tasks separately:
```bash
gulp compile-sass
gulp minify-css
```

## Expected Changes

- `package.json` updated with latest version of `@asu/unity-bootstrap-theme`
- `src/css/compiled-sass/theme.css` updated with latest styles
- `dist/css/theme.min.css` updated with minified styles

## File Structure

- **Source**: `src/sass/theme.scss` imports from `@asu/unity-bootstrap-theme/src/scss/unity-bootstrap-theme.bundle`
- **Compiled**: `src/css/compiled-sass/theme.css`
- **Minified**: `dist/css/theme.min.css`

## Verification

After running the update process, verify that:
1. The package version in `package.json` reflects the latest version
2. New CSS files are generated with updated timestamps
3. The WordPress theme loads the updated styles correctly