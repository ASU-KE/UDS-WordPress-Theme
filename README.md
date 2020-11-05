<p align="center">
  <img src="https://cdn.infonet.research.asu.edu/assets/asu_asu_knowledge_enterprise_horiz_150ppi.png" alt="ASU Knowledge Enterprise" width="400" />
</p>

<h1 align="center">ASU Web Standards WordPress Theme</h1>
<h2 align="center">A WordPress theme based on ASU's Web Standards 2.0</h2>

<p align="center">A WordPress theme that builds on top of ASU's canonical design tokens, and the official ASU Bootstrap theme, to deliver standards-compliant and accessible WordPress websites across ASU.</p>

![divider](https://cdn.infonet.research.asu.edu/assets/divider.png)

[![bootstrap](https://img.shields.io/badge/Bootstrap-4-blue)](https://getbootstrap.com/)
[![wordpress](https://img.shields.io/badge/Wordpress-5-green?logo=Wordpress)](https://getbootstrap.com/)
[![understrap](https://img.shields.io/badge/Built&nbsp;with-Understrap-lightgrey?)](https://understrap.com/)

### Features

- ASU Web Standards 2.0
  - Based on ASU's official design token libray for consistent adherence to Web Standards 2.0
  - Utilizes the official ASU Bootstrap theme built on top of the design token library
  - Accessibilty built-in: all Bootstrap markup and styling is approved by the ASU Accessibility community before release
- WordPress
  - Utilizes standard WordPress features, such as page templates, widgets, and shortcodes, for easy and rapid development of standards-compliant WordPress sites


![divider](https://cdn.infonet.research.asu.edu/assets/divider.png)

## Table of Contents

- [Table of Contents](#table-of-contents)
- [❯ Getting Started](#-getting-started)
  - [Installation](#installation)
    - [GitHub Updater](#github-updater)
    - [Installing Required Plugins](#installing-required-plugins)
    - [Updating the Theme](#updating-the-theme)
  - [Using the Theme](#using-the-theme)
    - [Customizer Options](#customizer-options)
    - [Page Heroes](#page-heroes)
    - [Social Media Icons](#social-media-icons)
    - [Menus](#menus)
    - [Shortcodes](#shortcodes)
    - [Adding Sidebars](#adding-sidebars)
  - [Reporting Issues](#reporting-issues)
- [❯ For Developers](#-for-developers)
  - [Introduction](#introduction)
  - [Requirements](#requirements)
  - [Local WordPress Environment](#local-wordpress-environment)
  - [Setting Up Local or Lando](#setting-up-local-or-lando)
    - [Local By Flywheel](#local-by-flywheel)
    - [Lando](#lando)
  - [Cloning the Theme](#cloning-the-theme)
  - [Installing Dependencies](#installing-dependencies)
  - [Installing Dependencies from the ASU Unity Design System](#installing-dependencies-from-the-asu-unity-design-system)
  - [Contributing to the Theme](#contributing-to-the-theme)
    - [Coding Standards](#coding-standards)
    - [Code Linting](#code-linting)
      - [Composer Scripts](#composer-scripts)
      - [PHPCS](#phpcs)
    - [Working with Styles](#working-with-styles)
    - [BroswerSync](#broswersync)
    - [Travis CI](#travis-ci)
- [Project Structure](#project-structure)

![divider](https://cdn.infonet.research.asu.edu/assets/divider.png)

## ❯ Getting Started

### Installation
#### GitHub Updater
#### Installing Required Plugins
#### Updating the Theme

### Using the Theme
#### Customizer Options
#### Page Heroes
#### Social Media Icons
#### Menus
#### Shortcodes
#### Adding Sidebars

### Reporting Issues

![divider](https://cdn.infonet.research.asu.edu/assets/divider.png)

## ❯ For Developers
### Introduction
### Requirements
You need to set up your development environment before you can do anything.

Install [Node.js and NPM](https://nodejs.org/en/download/)

- on OSX use [homebrew](http://brew.sh) `brew install node`
- on Windows use [chocolatey](https://chocolatey.org/) `choco install nodejs`

### Local WordPress Environment
This is a WordPress theme, and you will need to have access, and administrative rights, to a WordPress site in order to do any development on the theme. It is **not recommended** to attempt theme development on a live server.

There are several solutions available for hosting local WordPress development sites on your own computer, including:

* [Local by Flywheel](https://localwp.com/)
* [Lando](https://docs.lando.dev/)
* [wp-local-docker](https://github.com/10up/wp-local-docker) by 10up
* [VVV](https://varyingvagrantvagrants.org/)

### Setting Up Local or Lando
#### Local By Flywheel
#### Lando

### Cloning the Theme
Once you have been able to install and run a local version of WordPress, clone [theme repository](https://github.com/asu-ke-web-services/UDS-WordPress-Theme.git) into the `wp-content/themes` folder and continue with the installation process below.

### Installing Dependencies
- Make sure you have installed Node.js and Browser-Sync (optional) on your computer globally
- Then open your terminal and browse to the location of the theme
- Run: `$ composer install`
- Run: `$ npm install`

### Installing Dependencies from the ASU Unity Design System
- Does this need its own section?

### Contributing to the Theme
Welcoming paragraph here with general contribution notes
#### Coding Standards
#### Code Linting
##### Composer Scripts
##### PHPCS
#### Working with Styles
To work with and compile your Sass files on the fly start:`$ gulp watch`
#### BroswerSync
Or, to run with Browser-Sync:

- First change the browser-sync options to reflect your environment in the file `/gulpconfig.json` in the beginning of the file:
```javascript
{
    "browserSyncOptions" : {
        "proxy": "localhost/theme_test/", // <----- CHANGE HERE
        "notify": false
    },
    ...
};
```
- then run: `$ gulp watch-bs`
#### Travis CI

![divider](https://cdn.infonet.research.asu.edu/assets/divider.png)

## Project Structure
[is this needed?]

This theme is built on top of [Understrap](https://understrap.com), with minor adjustments specific to the needs of the theme. Most traditional WordPress theme files are where you would expect them. Files and folders of interest include:

| Name                            | Description                                                                |
| ------------------------------- | -------------------------------------------------------------------------- |
| **functions.php**               | A lean file that loads code from multiple files in the **/inc** directory  |
| **/inc**                        | WordPress hooks and callbacks, organized by their purpose in the theme and loaded into **functions.php** at runtime     |
| **/templates-loop**             | Partial templates for displaying content from posts and pages (the WordPress 'loop')                                     |
| **/templates-page**  | Multiple full-page layout templates  |
| **/templates-sidebar**          | Templates for the various widget areas in the theme (aka 'sidebars')    |
| **/sass/theme/_theme**   | An SCSS file for styling rules that are not covered by the Bootstrap theme, or other SCSS files in the **/sass** directory. The first place to put your custom styles                                               |