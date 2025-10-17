#!/bin/bash
# Simple block build script that copies JS files for viewScript usage

echo "Building block JavaScript files..."

# Create build directories
mkdir -p build/blocks/tabbed-panels
mkdir -p build/blocks/modals  
mkdir -p build/blocks/overlay-card

# Copy block-specific JavaScript files to build directory
cp src/js/custom/tabbed-panels.js build/blocks/tabbed-panels/view.js
cp src/js/custom/modals.js build/blocks/modals/view.js
cp src/js/custom/overlay-card.js build/blocks/overlay-card/view.js

echo "Block JavaScript files built successfully!"
echo "Files created:"
echo "- build/blocks/tabbed-panels/view.js"
echo "- build/blocks/modals/view.js"  
echo "- build/blocks/overlay-card/view.js"