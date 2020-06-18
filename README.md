<p align="center">
  <img src="https://cdn.infonet.research.asu.edu/assets/asu_asu_knowledge_enterprise_horiz_150ppi.png" alt="ASU Knowledge Enterprise" width="400" />
</p>

<h1 align="center">ASU Web Standards WordPress Theme</h1>
<h2 align="center">A WordPress theme based on ASU's Web Standards 2.0</h2>

<p align="center"><a href="https://reactjs.org/" target="blank">A WordPress theme that builds on top of ASU's canonical design tokens, and the official ASU Bootstrap theme, to deliver standards-compliant and accessible WordPress websites across ASU.</p>

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
| **/loop-templates**             | Partial templates for displaying content from posts and pages (the WordPress 'loop')                                     |
| **/page-templates**  | Multiple full-page layout templates  |
| **/sidebar-templates**          | Templates for the various widget areas in the theme (aka 'sidebars')    |
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

Once you have been able to install and run a local version of WordPress, clone this repository into the `wp-content/themes` folder and continue with the installation process below.


### A Note on Installing Dependencies from the KE Github Package Repository ###
Certain dependencies in this theme are loaded from the Knowledge Enterprise Github package repository, and require that you can authenticate yourself with a Personal Access Token in order to install them via the traditional `npm install` command. If you have not created a Github Personal Access Token for this purpose, follow the steps below. If you do have a Personal Access Token with the correct settings, you can proceed the final two steps.

#### Creating and Using a Personal Access Token
1. Sign in to the Github website
1. Click on your profile image in the upper, right-hand corner and select 'Settings' from the menu
1. From the settings page, select 'Developer settings'
1. In Developer settings, click on 'Personal Access Tokens'
Click on the 'Generate New Token' button
1. In the note field, type a descriptive note so you'll remember what this token is for.
1. From the list of checkboxes, make sure you check `read: packages`. That's the specific one you need for installing the packages. You can, of course, check others if you want a more general-purpose access token, but `read: packages` is required for this purpose
1. Click the 'Generate Token' box at the bottom of the page. You should be taken to a page with your new token visible.
1. **Copy the token**, or leave this page open for copying it later. Github will not display the token again, so this is the only screen where you will ever see it.
1. Create a new file in your home directory named `.npmrc` if you do not have one already
1. Edit your `.npmrc` file to include the line `//npm.pkg.github.com/:_authToken=your_token_here`, pasting in your new token to replace `your_token_here`, and save the file

### Installing Dependencies
- Make sure you have installed Node.js and Browser-Sync (optional) on your computer globally
- Then open your terminal and browse to the location of the theme
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
