#!/bin/bash
# Simple block build script that copies JS files for viewScript and editorScript usage

echo "Building block JavaScript files..."

# Create build directories
mkdir -p build/blocks/tabbed-panels
mkdir -p build/blocks/modals  
mkdir -p build/blocks/overlay-card
mkdir -p build/blocks/background-section
mkdir -p build/blocks/foldable-card
mkdir -p build/admin

# Copy viewScript files (frontend block scripts)
cp src/js/custom/tabbed-panels.js build/blocks/tabbed-panels/view.js
cp src/js/custom/modals.js build/blocks/modals/view.js
cp src/js/custom/overlay-card.js build/blocks/overlay-card/view.js
cp templates-blocks/background-section/background-section.js build/blocks/background-section/view.js
cp templates-blocks/foldable-card/foldable-card.js build/blocks/foldable-card/view.js

# Copy editorScript files (admin/editor block scripts)
cp src/js/custom/admin/core-list-block.js build/admin/core-list-block.js
cp src/js/custom/admin/core-divider.js build/admin/core-divider.js
cp src/js/custom/admin/core-image-block.js build/admin/core-image-block.js
cp src/js/custom/admin/heading-highlights.js build/admin/heading-highlights.js

echo "Block JavaScript files built successfully!"
echo "ViewScript files created:"
echo "- build/blocks/tabbed-panels/view.js"
echo "- build/blocks/modals/view.js"  
echo "- build/blocks/overlay-card/view.js"
echo "- build/blocks/background-section/view.js"
echo "- build/blocks/foldable-card/view.js"
echo ""
echo "EditorScript files created:"
echo "- build/admin/core-list-block.js"
echo "- build/admin/core-divider.js"
echo "- build/admin/core-image-block.js"
echo "- build/admin/heading-highlights.js"