#!/usr/bin/env node

/**
 * Test script to verify CSS update process
 * Run this after updating CSS styling to verify the process worked correctly
 */

const fs = require('fs');
const path = require('path');

function checkFileExists(filePath, description) {
    if (fs.existsSync(filePath)) {
        const stats = fs.statSync(filePath);
        console.log(`✓ ${description}: ${filePath} (${stats.size} bytes, modified: ${stats.mtime.toLocaleString()})`);
        return true;
    } else {
        console.log(`✗ ${description}: ${filePath} NOT FOUND`);
        return false;
    }
}

function checkPackageVersion() {
    try {
        const packageJson = JSON.parse(fs.readFileSync('package.json', 'utf8'));
        const currentVersion = packageJson.dependencies['@asu/unity-bootstrap-theme'];
        console.log(`✓ Package version: @asu/unity-bootstrap-theme@${currentVersion}`);
        return true;
    } catch (error) {
        console.log(`✗ Error reading package.json: ${error.message}`);
        return false;
    }
}

console.log('Testing CSS Update Process...\n');

let allPassed = true;

// Check package.json
allPassed = checkPackageVersion() && allPassed;

// Check source files
allPassed = checkFileExists('src/sass/theme.scss', 'Source SCSS file') && allPassed;

// Check compiled files
allPassed = checkFileExists('src/css/compiled-sass/theme.css', 'Compiled CSS file') && allPassed;
allPassed = checkFileExists('src/css/compiled-sass/theme.css.map', 'CSS source map') && allPassed;

// Check minified files
allPassed = checkFileExists('dist/css/theme.min.css', 'Minified CSS file') && allPassed;
allPassed = checkFileExists('dist/css/theme.min.css.map', 'Minified CSS source map') && allPassed;

console.log('\n' + (allPassed ? '✓ All checks passed!' : '✗ Some checks failed.'));
process.exit(allPassed ? 0 : 1);