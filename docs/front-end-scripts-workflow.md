# Front-End Scripts Workflow

This document explains how to use the new GitHub Workflow that duplicates the functionality of the `front-end-scripts` gulp task.

## How it works

The workflow located at `.github/workflows/front-end-scripts.yml` automatically:

1. **Concatenates** the following JavaScript files in order:
   - `src/js/fontawesome/fontawesome.js`
   - `src/js/fontawesome/brands.js`
   - `src/js/fontawesome/solid.js`
   - `src/js/custom/skip-link-focus-fix.js` (if exists)
   - `src/js/custom/init-uds-header.js`
   - `src/js/custom/hero_video.js`
   - `src/js/custom/modals.js`
   - `src/js/custom/side-menu-active-child.js`

2. **Transpiles** the code using Babel with @babel/preset-env for browser compatibility

3. **Generates** two output files:
   - `dist/js/theme.min.js` - Minified version for production
   - `src/js/theme.js` - Non-minified version for development

## When it runs

The workflow triggers:
- On push to `develop` branch when non-admin JS files change
- On pull requests to `develop` branch when non-admin JS files change
- Manually via "Run workflow" button in GitHub Actions

**Note**: This workflow only watches the `develop` branch. Built files will be merged from `develop` into `main` as needed. The workflow explicitly excludes admin JavaScript files in `src/js/custom/admin/**`. Changes to admin scripts will not trigger this workflow. For admin scripts, a separate workflow should be created to duplicate the `admin-scripts` and `admin-core-scripts` gulp tasks.

## Manual execution

To run the workflow manually:
1. Go to the "Actions" tab in GitHub
2. Select "Front-End Scripts Build" workflow
3. Click "Run workflow" button
4. Choose the branch and click "Run workflow"

## Output artifacts

After running, the workflow uploads build artifacts containing:
- `dist/js/theme.min.js`
- `src/js/theme.js`

These can be downloaded from the workflow run page.

## Comparison with gulp task

This workflow produces identical output to:
```bash
npm run frontjs
# or
gulp front-end-scripts
```

The main advantages of the GitHub workflow:
- Runs automatically on code changes (excluding admin scripts)
- No need for local npm dependencies
- Provides downloadable artifacts
- Runs in clean environment every time

## Admin Scripts

This workflow handles only front-end scripts. Admin scripts in `src/js/custom/admin/**` are intentionally excluded.
