# Updating the Theme

This guide covers the process for updating various components of the UDS WordPress Theme.

## Table of Contents

- [Update CSS](#update-css)
- [Update ASU Header](#update-asu-header)
- [Update Images](#update-images)

## Update CSS
- `npm i @asu/asu-unity-stack`
- `npm i bootstrap`
- node_modules update @import path to `../../node_modules/bootstrap` in errored files
- gulp task copy node module to /css folder
- gulp task minify css for prod (rename module is throwing `(node:26735) [DEP0180] DeprecationWarning: fs.Stats constructor is deprecated.` may need update soon )

## Update ASU Header
- `npm i @asu/component-header-footer`
- gulp task copy node module to /js folder

## Update Images
- `npm i @asu/asu-unity-stack`
- gulp task copy node module to /img folder
