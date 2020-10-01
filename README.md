<p align="center">
  <img src="https://cdn.infonet.research.asu.edu/assets/asu_asu_knowledge_enterprise_horiz_150ppi.png" alt="ASU Knowledge Enterprise" width="400" />
</p>

<h1 align="center">ASU TwentyTwenty WordPress Theme</h1>
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

## ❯ Table of Contents

- [Project Structure](#-project-structure)
- [Getting Started](#-for-developers)
- [Scripts and Tasks](#-scripts-and-tasks)

![divider](https://cdn.infonet.research.asu.edu/assets/divider.png)

## ❯ Project Structure

This theme is built on top of [Understrap](https://understrap.com), with minor adjustments specific to the needs of the theme. Most traditional WordPress theme files are where you would expect them. Files and folders of interest include:

| Name                            | Description                                                                |
| ------------------------------- | -------------------------------------------------------------------------- |
| **functions.php**               | A lean file that loads code from multiple files in the **/inc** directory  |
| **/inc**                        | WordPress hooks and callbacks, organized by their purpose in the theme and loaded into **functions.php** at runtime     |
| **/templates-loop**             | Partial templates for displaying content from posts and pages (the WordPress 'loop')                                     |
| **/templates-page**  | Multiple full-page layout templates  |
| **/templates-sidebar**          | Templates for the various widget areas in the theme (aka 'sidebars')    |
| **/sass/theme/_theme**   | An SCSS file for styling rules that are not covered by the Bootstrap theme, or other SCSS files in the **/sass** directory. The first place to put your custom styles                                               |

![divider](https://cdn.infonet.research.asu.edu/assets/divider.png)

## ❯ For Developers

### Set up the Development Environment

You need to set up your development environment before you can do anything.

Install [Node.js and NPM](https://nodejs.org/en/download/)

- on OSX use [homebrew](http://brew.sh) `brew install node`
- on Windows use [chocolatey](https://chocolatey.org/) `choco install nodejs`


### Create a Local WordPress Development Environment
This is a WordPress theme, and you will need to have access, and administrative rights, to a WordPress site in order to do any development on the theme. It is **not recommended** to attempt theme development on a live server. There are several solutions available for hosting local WordPress development sites on your own computer, including:

* [Local by Flywheel](https://localwp.com/)
* [Lando](https://docs.lando.dev/)
* [wp-local-docker](https://github.com/10up/wp-local-docker) by 10up
* [VVV](https://varyingvagrantvagrants.org/)

NOTE: As of 23 June 2020, the KE WordPress Theme Development Task Force (WP Power Rangers) are instructed to use [wp-local-docker](https://github.com/10up/wp-local-docker) by 10up. This framework has been pre-installed with [WP Snapshots](https://github.com/10up/wpsnapshots) a utility that allows us to capture file and database snapshots that will be pushed to an AWS S3 bucket, and allow us to restore our local development sites quickly and efficiently.

#### Install and Configure wp-local-docker

> TODO

Once you have been able to install and run a local version of WordPress, clone this repository into the `wp-content/themes` folder and continue with the installation process below.

#### Using WP Snapshots to Push/Pull website snapshots

> TODO

### A Note on Installing Dependencies from the ASU Unity Design System Package Repository ###
The ASU-produced packages in this theme are loaded from the ASU Unity Private NPM (Verdaccio) package repository. This requires you to sign-in and create a user account on the NPM server. Doing so, npm will automatically save your authentication token into a local .npmrc file located in your home directory.

#### Creating a User Account and Saving your NPM Access Token
1. Visit the ASU Unity NPM Package server and follow directions to add yourself as a user: http://ec2-54-201-88-203.us-west-2.compute.amazonaws.com/
2. Configure npm to use this private registry. Add the following line to the .npmrc file in my home directory (existing lines can be left in-place):

```
@asu-design-system:registry=http://ec2-54-201-88-203.us-west-2.compute.amazonaws.com
```

This config tells npm that all packages from ‘@asu-design-system’ should be grabbed from the ASU private registry. If it says you are not authorized, try to login using:

```
npm login --registry http://ec2-54-201-88-203.us-west-2.compute.amazonaws.com
```

Once you have successfully signed-in, npm will automatically save new line to your .npmrc, saving your login token for the future.

### Installing Dependencies
- Make sure you have installed Node.js and Browser-Sync (optional) on your computer globally
- Then open your terminal and browse to the location of the theme
- Run: `$ composer install`
- Run: `$ npm install`

### Running
To work with and compile your Sass files on the fly start:

- `$ gulp watch`

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

## ❯ For Theme Users

### How to Use the Built-In Widget Slider

The front-page slider is widget driven. Simply add more than one widget to widget position “Hero”.
- Click on Appearance → Widgets.
- Add two, or more, widgets of any kind to widget area “Hero”.
- That’s it.
