#!/bin/bash

# Update CSS Styling from Latest ASU Unity Stack Release
# This script automates the process outlined in the problem statement

set -e

echo "Starting CSS styling update process..."

# Check if .npmrc has a valid token
if grep -q "YOUR_TOKEN_HERE" .npmrc; then
    echo "Error: Please update .npmrc with a valid GitHub Personal Access Token"
    echo "Edit .npmrc and replace YOUR_TOKEN_HERE with your actual token"
    exit 1
fi

echo "1. Installing latest @asu/unity-bootstrap-theme package..."
npm install @asu/unity-bootstrap-theme@latest --save --legacy-peer-deps

echo "2. Running gulp tasks to compile and minify CSS..."
npx gulp update-css-styling

echo "CSS styling update completed successfully!"
echo ""
echo "Updated files:"
echo "- package.json (updated dependency version)"
echo "- src/css/compiled-sass/theme.css (compiled SCSS)"
echo "- dist/css/theme.min.css (minified CSS)"