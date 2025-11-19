# Changelog

All notable changes to the UDS WordPress Theme will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [v2.0.3] - 2025-10-29

### What's Changed
* Fix: Add meaningful alt text fallbacks for card overlay images by @Copilot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/650
* Fix tabbed-panels block missing viewScript by @Copilot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/664
* v2.0.3 hotfix by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/662

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v2.0.2...v2.0.3

## [v2.0.2] - 2025-10-28

### Changed
- file clean up
- `alert.php` - BS5 API update
- revert grid links name

### What's Changed
* v2.0.2 update by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/648

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v2.0.1...v2.0.2

## [v2.0.1] - 2025-10-20

### Features and bug fixes

#### a11y
- Fix accordion accessibility: add focus frame, Space bar keyboard support, and Bootstrap 5 compliance

#### Dev
- fix uds-grid-links location json value
- Add update-css-styling task for CSS updates

### What's Changed
* Fix accordion accessibility: add focus frame, Space bar keyboard support, and Bootstrap 5 compliance by @Copilot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/609
* v2.0.1 patch by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/641

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v2.0...v2.0.1

## [v2.0] - 2025-10-14

### Features

#### Analytics
- `templates-blocks/*` - add `data-ga` attributes
- `data-layer.js` - default UDS `pushGAEvent`, event listeners added: BS5 elements, side menus, general click events

#### Header 
- Added comprehensive support for logo hover title prop

#### Dev
- All ACF blocks now use the modern WordPress `block.json` format
- Disable jQuery Migrate on front-end
- gulp task clean up

#### UDS

##### @asu/unity-bootstrap-theme

###### @asu/unity-bootstrap-theme-v1.30.0
**Features**
- unity-bootstrap-theme: added mixin to expand clickable area for btn
- unity-bootstrap-theme: applied some feedback changes

###### @asu/unity-bootstrap-theme-v1.29.0
**Features**
- unity-bootstrap-theme: improve accessibility by increasing text contrast (WCAG AAA compliance)

###### @asu/unity-bootstrap-theme-v1.28.3
**Bug Fixes**
- unity-bootstrap-theme: fix long accordion scroll issue

###### @asu/unity-bootstrap-theme-v1.28.2
**Bug Fixes**
- unity-bootstrap-theme: add process.env to vite build

###### @asu/unity-bootstrap-theme-v1.28.1
**Bug Fixes**
- unity-bootstrap-theme: added scss selector for a.btn disabled

###### @asu/unity-bootstrap-theme-v1.28.0
**Bug Fixes**
- unity-bootstrap-theme: add retry logic to initCardBoodies to for .card-body elemtns

**Features**
- unity-bootstrap-theme: changed margin and padding for List

##### @asu/component-header-footer

###### @asu/component-header-footer-v1.1.0
**Features**
- component-header-footer: added mobile style for search input
- component-header-footer: applied soma feedback

###### @asu/component-header-footer-v1.0.14
**Bug Fixes**
- component-header-footer: fix footer clashing classes with bootstrap JS

### Bug fixes
- `tabbed-panels.php` - Fix PHP warnings
- `banner.php` - Clean up button logic
- `alert.php` - fix font awesome icons, fix bootstrap events, fix possible `DOMException` error
- `profile.php` - fix placeholder image path
- `card.php` - fix PHP deprecation warnings and undefined array key errors
- `overlay-card.php` - fix PHP warnings
- `image-overlap.php` - fix PHP 8 depreciation warnings

### What's Changed
* Fix PHP Warnings in Tabbed Panels by @wmcconnell in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/606
* Clean Up Button Logic in Banner Block by @wmcconnell in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/607
* Fix alert banner close button, update icons for Font Awesome 7, modernize alert and modals block registration, and resolve DOM error by @Copilot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/612
* Fix hardcoded theme path in UDS Profile Block placeholder image by @Copilot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/617
* Add logo title prop support to UDS header for hover text functionality by @Copilot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/615
* Refactor ACF blocks from register.php to modern block.json format by @Copilot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/614
* Fix PHP errors in card.php for null values and undefined array keys by @Copilot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/616
* Disable jQuery Migrate on frontend for improved performance by @Copilot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/629
* Fix PHP warnings in overlay-card.php for Ajax responses by @Copilot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/632
* Fix PHP 8+ deprecation error in image-overlap.php when background field is empty by @Copilot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/633
* @asu/component-header-footer 1.1.0 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/639
* @asu/unity-bootstrap-theme 1.30.0, @asu/component-header-footer 1.1.0 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/638
* Add data-layer.js analytics tracking to theme and update blocks with data-ga attributes by @Copilot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/631
* v2.0 October by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/610

### New Contributors
* @Copilot made their first contribution in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/612

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v1.10.0...v2.0

## [v1.10.0] - 2025-09-30

### Features and bug fixes
- remove unused problematic gulp package
- heading highlight mobile fixes

### What's Changed
* highlight-gold 2nd line mobile fix by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/605
* v1.10 September by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/601

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v1.9...v1.10.0

## [v1.9] - 2025-08-26

### Features and bug fixes

#### Editor
- Editor max width to mimic front end page
- Containers max width to mimic front end containers

#### UDS Card
- Interactive card CTA is now optional. hide if field empty
- use the card's ACF title for data-ga-section

#### UDS Button
- fix font awesome icons not loading on front end

#### Font Awesome
- update to v7 Pro

#### Header menu
- Fix errors and bugs when no menu items

### @asu/unity-bootstrap-theme-v1.26.1 (2025-06-30)

#### Bug Fixes
- unity-bootstrap-theme: update line clamp for ranking card
- unity-bootstrap-theme: update ranking card styles

### @asu/unity-bootstrap-theme-v1.26.2 (2025-07-07)

#### Bug Fixes
- components-core: added tabindex and focus css for accordion wrapper
- unity-bootstrap-theme: split padding value to margin and padding

### @asu/unity-bootstrap-theme-v1.26.3 (2025-07-11)

#### Bug Fixes
- component-header-footer: updating footer to included privacy button
- styles for manual consent opt out
- styles for manual consent opt out version 2
- unity-bootstrap-theme: blockquotes in mobile view too compressed, need to stack

### @asu/unity-bootstrap-theme-v1.26.4 (2025-07-14)

#### Bug Fixes
- unity-bootstrap-theme: cSS Padding added to images without header

### @asu/unity-bootstrap-theme-v1.26.5 (2025-07-14)

#### Bug Fixes
- unity-bootstrap-theme: fix school image styles in global footer

### @asu/unity-bootstrap-theme-v1.27.0 (2025-07-24)

#### Bug Fixes
- unity-bootstrap-theme: focus state centered

#### Features
- unity-bootstrap-theme: increase font size from 12px up to 16px in uds-figure-caption

### @asu/component-header-footer-v1.0.11 (2025-07-11)

#### Bug Fixes
- button type for cookie consent opt out is now a button
- component-header-footer: updating footer to included privacy button
- styles for manual consent opt out
- styles for manual consent opt out version 2

### @asu/component-header-footer-v1.0.12 (2025-07-14)

#### Bug Fixes
- component-header-footer: fix school logo in footer styles
- component-header-footer: update url params for a11y to use fragments instead of params

### @asu/component-header-footer-v1.0.13 (2025-07-24)

#### Bug Fixes
- component-header-footer: fix social icon focus styles

### What's Changed
* Editor: Container block styles by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/542
* UDS Card: interactive card CTA by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/557
* fix(data-ga-section): replace undefined $heading with acf get_field by @ramon-west-asu in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/588
* UDS Button updates by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/593
* Font Awesome v7 Pro by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/595
* @asu/component-header-footer v1.0.13 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/587
* Fix errors and bugs when no menu items by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/600
* update admin-bundle.js by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/598
* @asu/unity-bootstrap-theme v1.27.0, @asu/component-header-footer v1.0.13 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/586

### New Contributors
* @ramon-west-asu made their first contribution in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/588

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v1.8...v1.9

## [v1.8] - 2025-06-25

### Features and bug fixes

#### a11y
- `card.php` - add button aria-label

#### Bug fixes
- `shortcodes.php` - mobile side drop down menu: add Bootstrap 5 data-attributes for drop down animation
- step lists - remove custom padding, use UDS default padding

### @asu/unity-bootstrap-theme

#### @asu/unity-bootstrap-theme-v1.26.0 (2025-06-09)
#### @asu/unity-bootstrap-theme-v1.25.2 (2025-05-30)
#### @asu/unity-bootstrap-theme-v1.25.1 (2025-05-28)

##### Bug Fixes
* unity-bootstrap-theme: added styles to hidden box
* unity-bootstrap-theme: fixing visible text paragraph
* unity-bootstrap-theme: removed aria-hidden
* unity-bootstrap-theme: standardize all list types margins
* unity-bootstrap-theme: steplist adjust circle to be more rounded
* unity-bootstrap-theme: removed display none style on mobile for the Breadcrumb

##### Features
* unity-bootstrap-theme: added js for trucate aria-describedby on card-body
* unity-bootstrap-theme: setup aria-label for p

### @asu/component-header-footer v1.0.10

#### Bug Fixes
* component-header-footer: fix footer mobile column styles

### What's Changed
* remove custom list padding by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/580
* mobile - side menu: fix bs4 to bs5 data- attributes by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/571
* card.php - button aria-label by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/574
* @asu/component-header-footer v1.0.10 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/578
* @asu/unity-bootstrap-theme v1.26.0 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/579
* v1.8 June by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/581

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v1.7...v1.8

## [v1.7] - 2025-05-19

### Features and bug fixes

#### a11y
- UDS Blockquote: fix icon aria labels
- @asu/component-header-footer updates
- UDS Person Profile: fix mobile issue

### @asu/component-header-footer

#### @asu/component-header-footer-v1.0.9 (2025-05-06)
#### @asu/component-header-footer-v1.0.8 (2025-05-01)
#### @asu/component-header-footer-v1.0.7 (2025-04-18)
#### @asu/component-header-footer-v1.0.6 (2025-04-01)
#### @asu/component-header-footer-v1.0.5 (2025-03-31)

##### Bug Fixes
* component-header-footer: update alt for innovation logo
* component-header-footer: added focusout event to NavItem
* component-header-footer: removed aria-labelledby and added span for desktop
* component-header-footer: add correct outline for footer links and buttons onfocus
* component-header-footer: fixing variable name
* component-header-footer: updated logo alt and title from brand header

### @asu/unity-bootstrap-theme

#### @asu/unity-bootstrap-theme-v1.25.0 (2025-05-01)
#### @asu/unity-bootstrap-theme-v1.24.1 (2025-04-29)
#### @asu/unity-bootstrap-theme-v1.24.0 (2025-04-24)
#### @asu/unity-bootstrap-theme-v1.23.2 (2025-04-21)
#### @asu/unity-bootstrap-theme-v1.23.1 (2025-04-18)
#### @asu/unity-bootstrap-theme-v1.23.0 (2025-04-16)
#### @asu/unity-bootstrap-theme-v1.22.0 (2025-04-09)
#### @asu/unity-bootstrap-theme-v1.21.6 (2025-04-03)
#### @asu/unity-bootstrap-theme-v1.21.5 (2025-04-01)
#### @asu/unity-bootstrap-theme-v1.21.4 (2025-03-21)

##### Bug Fixes
- unity-bootstrap-theme: changed margin-top to padding-top on uds-anchor-menu-wrapper
- unity-bootstrap-theme: added style only for a tags into Images
- unity-bootstrap-theme: removed unnecesary z-index
- unity-bootstrap-theme: update build to include js
- component-events: added style to fix a:focus
- component-news: removed margin from focus and added to a tag into card-title
- unity-bootstrap-theme: fix focus styles for card titles
- unity-bootstrap-theme: notification Banner button enlarged and gap between buttons reduced
- unity-bootstrap-theme: notification Banner size enlarged and gap reduced
- unity-bootstrap-theme: added style for small and medium hero
- unity-bootstrap-theme: changed height to min-height on hero-overlay classes
- unity-bootstrap-theme: spacing changed between Radio button and text
- unity-bootstrap-theme: added hover white to footer's social icon
- unity-bootstrap-theme: add bundled UMD bootstrap file to package dist

##### Features
- unity-bootstrap-theme: added margin-top on uds-anchor-menu-wrapper
- unity-bootstrap-theme: update dist files and README docs for usage
- unity-bootstrap-theme: changed heigth to min-heigth on div.uds-hero-lg
- unity-bootstrap-theme: added visually-hidden text for Tags

### UDS Person Profile

#### Bug fixes
- Update to latest UDS markup
- `_profile.scss` clean up and refactor
- update block registration to use acf/json

### What's Changed
* UDS Blockquote: fix quote icon a11y by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/558
* Bump eazy-logger from 4.0.1 to 4.1.0 by @dependabot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/559
* @asu/component-header-footer v1.0.9 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/565
* UDS Person Profile by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/564
* v1.7 May by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/560

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v1.6...v1.7

## [v1.6] - 2025-04-10

### Features and bug fixes

#### a11y
- fix aria labels for social media icons
- UDS Blockquote: update to remove italics

#### ACF Hero
- fix span indent
- fix highlighting, allow single word highlights
- sub-title support
- editor UI updates

#### CSS/SASS Styles
- update latest @asu/unity-bootstrap-theme-v1.21.3
- remove legacy v1 hero styles

### @asu/unity-bootstrap-theme

#### @asu/unity-bootstrap-theme-v1.21.3 (2025-03-07)
#### @asu/unity-bootstrap-theme-v1.21.2 (2025-02-28)
#### @asu/unity-bootstrap-theme-v1.21.1 (2025-02-12)
#### @asu/unity-bootstrap-theme-v1.21.0 (2025-02-11)

##### Bug Fixes
- unity-bootstrap-theme: bring back css dir
- unity-bootstrap-theme: relative css assets
- unity-bootstrap-theme: accessibility: Dark Background Hyperlink Color Not Accessible
- unity-bootstrap-theme: pagination active state page changed to a perfect circle
- unity-bootstrap-theme: allow span,i alert-icon tags
- unity-bootstrap-theme: apply a11y breadcrumbs min size
- unity-bootstrap-theme: breadcrumbs
- unity-bootstrap-theme: style tweak to support rendering non-svg icons
- unity-react-core: update package.json

##### Features
- components-core: added component-carousel to components-core
- unity-bootstrap-theme: banner icon styles
- unity-bootstrap-theme: rank cards native BS
- unity-react-core: form elements

### Dev
- refactor build process for unity package update
- refactor using newest header-footer component
- cleanup unused files
- gulp file cleanup, update for unity packages
- 404.php: update/refactor

### What's Changed
* update to component-header-footer, refactor for update by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/547
* UDS refactor setup install, latest UDS style updates by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/546
* v1 hero sass cleanup by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/550
* UDS Blockquote: a11y style updates by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/553
* social media icons: aria label regex update by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/552
* Fix Issues with ACF-Based Page Hero by @wmcconnell in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/555
* 404.php, deprecated feature: v1 hero by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/549
* v1.6 April by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/548

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v1.5...v1.6

## [v1.5] - 2025-03-04

### Features
- remove legacy cookie consent
- compile font-awesome v6.7.1
- center unity-carousels by default

#### UDS: Page Hero
- update block to latest UDS markup
- refactor PHP logic
- fix video hero styles

#### Dev
- update gulp file tasks
- file cleanup

### What's Changed
* Center unity-carousels content by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/536
* Remove legacy cookie consent, compile font-awesome v6.7.1 JS' by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/543
* UDS: Page Hero - update block to latest by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/530
* v1.5 - March by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/537

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v1.4...v1.5

## [v1.4] - 2025-01-30

### Updates

#### Features
- @asu/component-footer v2.2.3 - ranked image update

#### Bug fixes
- main header: text-wrap long titles on mobile

### @asu/unity-bootstrap-theme

#### v1.20.2

##### Bug Fixes
- unity-bootstrap-theme: fix profile squishing grid view

#### v1.20.1

##### Bug Fixes
- unity-bootstrap-theme: breadcrumbs final active link changed to black
- unity-bootstrap-theme: requested to remove !important

#### v1.20.0

##### Features
- unity-bootstrap-theme: removed unnecessary display none for input validation on webform

#### v1.19.1

##### Bug Fixes
- unity-bootstrap-theme: pagination hover color fix

#### v1.19.0

##### Features
- unity-bootstrap-theme: added custom selector for input type submit
- unity-bootstrap-theme: added style and example for input type submit

#### v1.18.3

##### Bug Fixes
- unity-bootstrap-theme: left aligned the heading

#### v1.18.2

##### Bug Fixes
- unity-bootstrap-theme: apply a11y breadcrumbs min size

#### v1.18.1

##### Bug Fixes
- unity-bootstrap-theme: added display block to card-link

### What's Changed
* update to latest @asu/component-footer v2.2.3 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/524
* @asu/unity-bootstrap-theme v1.20.2 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/527
* main header: text-wrap long titles on mobile by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/529
* v1.4 January by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/525

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v1.3.1...v1.4

## [v1.3.1] - 2024-12-27

### What's Changed
* Update legacy analytics by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/521
* v1.3.1 hotfix - remove legacy lavidge tracking by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/522

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v1.3...v1.3.1

## [v1.3] - 2024-12-16

### Updates

#### Features
- unity-bootstrap-theme: add ranking image css
- unity-bootstrap-theme: added padding to a tags in card-link
- unity-bootstrap-theme: changed padding to mins to ensure that the minimums are corrects
- unity-bootstrap-theme: add grid styles
- unity-bootstrap-theme: add grid view styles
- fontawesome v6.7.1
- components-carousel v2.1.1 SCSS update

#### Bug Fixes
- footer: update global links to latest
- accordion(foldable card): Fix color choices, update user instructions
- accordion(foldable card): update accordion data-target to BS5
- cleanup old files

### What's Changed
* footer: update global links to latest by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/509
* Fix accordion color choices, update user instructions by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/514
* update unity-bootstrap-theme v1.16.0: footer endorsed logo fix by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/516
* fontawesome v6.7.1 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/515
* components-carousel v2.1.1 SCSS update by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/504
* Update Primary Branch Name by @wmcconnell in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/518
* fix bs5 accordion target by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/519
* delete unused legacy images by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/510
* @asu/unity-bootstrap-theme v1.18.0 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/517
* v1.3 December by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/511

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v1.2...v1.3

## [v1.2] - 2024-11-19

### Updates

#### Features
- unity-bootstrap-theme: added blockquote animated block

#### Bug Fixes
- unity-bootstrap-theme: remove period. initial commit ignored benign file change
- unity-bootstrap-theme: update web directory profile address and email
- unity-bootstrap-theme: update webdir styles
- unity-bootstrap-theme: rename innovation logo and reduce duplicate
- unity-bootstrap-theme: updated footer ranking logo
- component-footer: update innovation logo

### Dev tools
- Merge pull request #465

### a11y 
- aria label for social media icons

### What's Changed
* Bump postcss and autoprefixer by @dependabot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/465
* @asu/component-footer v2.2.2 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/496
* @asu/unity-bootstrap-theme v1.15.3 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/495
* aria label for social media icons by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/491
* @asu/unity-bootstrap-theme v1.15.2 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/492
* v1.2 November by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/490

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v1.1.0...v1.2

## [v1.1.0] - 2024-10-30

### Updates

#### Features
- UDS Button: add optional aria-label
- Javascript admin cleanup - create core bundle
- Font awesome updates - fix styling, update to v6.6
- update GFL lab logo 2024 registered tm

#### Bug Fixes
- enqueue lodash with admin script
- stop cookie consent init on edit page
- update bs5 collapsed default, aria updates
- update component-header v2.3.3
- unity-bootstrap-theme v1.14.2

### component-header v2.3.3

#### Features
- component-header: removed display:unset on Header hidden inputs
- component-header: return display:unset and change the selector for the styles to input[name=q]

#### Bug Fixes
- component-header: change onFocus to onClick for type definitions
- component-header: fix all dataLayer events in header
- component-header: fix dataLayer firing on parent dropdown click
- component-header: fix logo onClick
- component-header: missing data layer for logo when partner not used
- component-header: remove duplicate props
- component-header: fix keyboard clickable in menu item
- component-header: added onClick event to dropdown sublinks
- component-header: fixed navtree with onclick not getting called
- component-header: fixed prop that was not passed in properly
- component-header: add escape functionality when inside of menu dropdown
- component-header: add keyboard navigation

### unity-bootstrap-theme v1.14.2

#### Features
- unity-bootstrap-theme: add table caption styles

#### Bug Fixes
- unity-bootstrap-theme: fix padding in image background with cta
- unity-bootstrap-theme: update ranking card styles
- unity-bootstrap-theme: added css for long pagination on mobile
- unity-bootstrap-theme: removed width from span in commons styles

### What's Changed
* UDS Button: aria-label by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/467
* Javascript admin cleanup - create core bundle by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/469
* enqueue lodash with admin script by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/475
* stop cookie consent init on edit page by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/468
* update bs5 collapsed default, aria updates by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/474
* update component-header v2.3.3 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/476
* Bump send and browser-sync by @dependabot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/481
* Bump cookie and socket.io by @dependabot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/480
* Font awesome updates - fix styling, update to v6.6 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/478
* unity-bootstrap-theme v1.14.2 by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/479
* gulp compile latest after all merged by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/484
* update GFL lab logo 2024 registered tm by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/485
* v1.1 October update by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/472

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v1.0...v1.1.0

## [v1.0] - 2024-09-17

### What's Changed
* Bump @babel/traverse from 7.14.5 to 7.23.2 by @dependabot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/396
* Bump socket.io from 4.5.2 to 4.7.5 by @dependabot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/453
* Bump ws and socket.io-client by @dependabot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/456
* Bump follow-redirects from 1.14.8 to 1.15.6 by @dependabot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/450
* Bump axios and browser-sync by @dependabot in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/449
* 2024 footer logo by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/460
* Move GTM functions to load in head and body by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/438
* 2024 theme update by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/448
* dev to main by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/464
* Update CHANGELOG.md by @jkcox in https://github.com/ASU-KE/UDS-WordPress-Theme/pull/466

### Major Updates
- README update, dev instructions
- add Changelog
- reorganize src/ and dist/
- refactor gulp tasks
- fontawesome v6
- UDS Background Section block - new patterns
- Update Accordion, tabbed panels, side menu, horizontal card
- Update to unity-bootstrap-theme-v1.13.0, sass tokens update
- component-header v2.3.0
- 404 page searches search.asu.edu
- delete legacy/unused JS, PHP
- interactive cards
- glidejs ASU sass styles
- fix admin header on mobile
- bs4 fallback for float buttons

**Full Changelog**: https://github.com/ASU-KE/UDS-WordPress-Theme/compare/v0.57...v1.0

## [v0.57] - 2024-07-26

Small update to aria labels

**Release**: component-header v2.2.8

## [v0.56] - 2024-07-15

Force lodash to enqueue in the admin area.

## [v0.54] - 2024-05-07

This release was created specifically for our current sites that are already using GitUpdater Pro, but, due to GitUpdater's preference for tagged releases, cannot upgrade the theme from our previous 0.29 tagged release.

The hope is that this will be the final release on the `develop` branch and we will soon release a formal 1.0 release on `main` and switch all of our sites over to that release as part of Project SOCKE. In the meantime, however, this should allow us to manually update specific sites to the latest version of the theme as we prepare a 1.0 release.

There have been many updates and improvements since 0.29. A small sample includes:

- The addition of the Pattern Library patterns
- The use of the Unity React header, which should provide:
  - The correct Google Analytics code(s)
  - Data Layer support
- Fixes for anchor menu "stickiness" and positioning that currently require additional snippets to be manually created on each site

---

[v2.0.3]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v2.0.3
[v2.0.2]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v2.0.2
[v2.0.1]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v2.0.1
[v2.0]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v2.0
[v1.10.0]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v1.10.0
[v1.9]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v1.9
[v1.8]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v1.8
[v1.7]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v1.7
[v1.6]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v1.6
[v1.5]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v1.5
[v1.4]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v1.4
[v1.3.1]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v1.3.1
[v1.3]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v1.3
[v1.2]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v1.2
[v1.1.0]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v1.1.0
[v1.0]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v1.0
[v0.57]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v0.57
[v0.56]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v0.56
[v0.54]: https://github.com/ASU-KE/UDS-WordPress-Theme/releases/tag/v0.54
