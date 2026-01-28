# Developer Guide

This guide covers development setup, contributing guidelines, and technical details for working with the UDS WordPress Theme.

## Table of Contents

- [Requirements](#requirements)
- [Local WordPress Environment](#local-wordpress-environment)
- [Setting Up Local or Lando](#setting-up-local-or-lando)
- [Installing Dependencies](#installing-dependencies)
- [VS Code Editor Config](#vs-code-editor-config)
- [Installing Dependencies from the ASU Unity Design System](#installing-dependencies-from-the-asu-unity-design-system)
- [Contributing to the Theme](#contributing-to-the-theme)
- [WP REST API Extensions](#wp-rest-api-extensions)

## Requirements

- [Volta](https://volta.sh/) is used to manage node versions. `package.json` volta section references the minimum requirements.
- Lando + Docker or Local by Flywheel is used to run a local dev server.


## Local WordPress Environment

- [Local by Flywheel](https://localwp.com/)
- [Lando](https://docs.lando.dev/)

## Setting Up Local or Lando

### Local By Flywheel

- Visit [https://localwp.com/](https://localwp.com/) and click the `Download` button.
- Choose your platform and enter some information (only the email field is mandatory), the download should start and you'll be taken to a start-up screen, where you will select the `Let's Go!` button. After installation, you'll be taken to the dashboard.
- Proceed to create a new local WordPress install or connect to a remote service like [WP Engine](https://wpengine.com/).

We are currently using WP Engine to manage our WordPress sites and to connect your Local By Flywheel installation to WP Engine you will need a WP Engine account and API key.

[WP Engine Instructions](https://wpengine.com/support/local/).
- To connect select the `Connect` icon on the left hand side of your Local dashboard.

![Local By FlyWheel Connect Select Example](../img/admin/local-by-flywheel-connect.png "Local By FlyWheel Connect Select Example")

- After you have connected to WP Engine you will see all of the site available to your account listed within the `Connect` area.

![Local By FlyWheel Connect Area Example](../img/admin/local-by-flywheel-connect-area.png "Local By FlyWheel Connect Area Example")
- In order to connect to WP Engine you must click the `My Hosts` button in the upper right corner of the `Connect` area.

Then you will see a list of hosting providers to choose from.

- Select `WP Engine` and sign in.

This will give you access to pull sites locally to work on.

For new project's select: `ASU UDS Quickstart`

`*` After you have pulled the site to to your local machine disconnect it from the host to ensure premature development is not deployed in the background. You can do this by clicking the same button used to `Pull To Local` to `Disconnect`.

You are now ready to clone the theme within the projects `wp-content/themes` folder.

### Lando

- Review [Lando Requirements](https://docs.lando.dev/basics/installation.html#hardware-requirements) to check your system against the hardware requirements.
- Install [Lando](https://docs.lando.dev/basics/installation.html#macos)

Lando will install all necessary underlying dependencies to run.

Lando constructs a Docker based development environment according to YAML files called recipes that guides the containers it builds, services available and tooling provided.

Within the theme's repository is a .lando.yml file that will be used to start Lando and build the development environment.

The process will look like this.
- Change directory to project folder or make one.
- Start Lando: `$ lando start`
- Install WordPress core: `$ lando wp download core`
- Create wp-config: `$ wp config create --dbname=wordpress --dbuser=wordpress --dbpass=wordpress --dbhost=database`
- Download and import the database: `$ lando db-import site-database-export-file.sql`

You are now ready to clone the theme within the projects `wp-content/themes` folder.

### 2026 Lando
- `mkdir local-site/wordpress-test-site`, `cd` into directory
- `lando init` - "code base from current directory", use wordpress recipe, webroot press enter for default, name your app
- `lando start` - visit in browser to confirm apache server is running
- `lando wp core download` - get latest wordpress software
- `lando wp config create --dbname=wordpress --dbuser=wordpress --dbpass=wordpress --dbhost=database` - creates `wp-config.php` file, defaults from lando recipe, do not change
- `lando wp core install --url="https://url-from-lando-start" --title="Wordpress Site Title" --admin_user=admin --admin_password=password --admin_email=test@asu.edu`
- default WordPress should be running. To install the theme, git clone into `wp-content/themes`

> [!IMPORTANT]  
> MacOS Tahoe users must visit `System Settings > Privacy and Security > Full Disk Access` and allow the program running Lando (ex. terminal window in VS Code). The app will only partially load and display 500 or 403 errors.

## Installing Dependencies

- Make sure you have installed Node.js and Browser-Sync (optional) on your computer globally
- Then open your terminal and browse to the location of the theme
- Run: `$ composer install`
- Run: `$ npm install`

## VS Code Editor Config
- Install PHP intelephenese
- Add default wordpress stub
- To get intelephese to recognize acf functions, add to VS code `settings.json`:
  -  `"intelephense.environment.includePaths": ["/local/path/to/acf-pro-stubs"]`,
  - [https://github.com/php-stubs/acf-pro-stubs](https://github.com/php-stubs/acf-pro-stubs)


## Installing Dependencies from the ASU Unity Design System

Add your private key to the `.npmrc` file.

## Contributing to the Theme

Welcoming paragraph here with general contribution notes

### PHP Coding Standards
The theme is set up with tools to help you write PHP that conforms to the [WordPress Coding Standards](https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/). After initially cloning the theme repo, run `composer install` to install these tools in the `/vendor` directory.

#### Composer Scripts
The theme contains two composer scripts to help you write code that conforms to the WordPress standards:

- **`composer check:cs`** will process _all_ `.php` files in the theme and check them for compliance with the WordPress standards. Any code that does not meet the standard will be indicated, and you can fix **most** of them with another script...
- **`composer fix:cs`** will fix errors marked with an `[x]` in the output of `composer check:cs`. You will need to correct any other issues manually.

It is important to run the `composer check:cs` command and fix any issues **before pushing your code to Github**, as these commands will run on _every single .php file_ in the theme. If you don't check your work, any issues with your code will surface when another developer checks their code, making it more difficult for any developer to know if it is their code causing the errors.

If needed, you can manually run these commands and target a specific file, or files. From the **root folder** of the theme:

- To check files:`./vendor/bin/phpcs {path-to-the-php-file}`
- To fix errors: `./vendor/bin/phpcbf {path-to-the-php-file}`


### NPM and Gulp Scripts
We use [Gulp](https://gulp.js) as our task runner. While can run Gulp tasks directly from the command line,  we have created some NPM aliases for common tasks.


- **`npm run build`** will compile theme assets from the files in the `/src` directories and copy them to `/css`, `/js`, and `/img` directories. This includes minifying CSS, uglifying and concating JS files, and running all images through `imageoptim`. If you are not using the `watch` option, this is the command to run after you have made any changes to Javascript or CSS files. This step also cleans out and replaces all files in the `\dist` directory. This is equivalent to directly running `gulp compile`.
- **`npm run images`** does only the image optimization step of the build process. It will optimize all images in `/src/img` and copying the optimized images to `/img`. This is equivalent to directly running `gulp imagemin`.
- **`npm run sync`** starts BrowserSync and watches SCSS and JS files for changes, automatically processing those files when they are saved (using a subset of the tasks that would run with `npm run build`). This is equivalent to directly running `gulp watch-bs` or just `gulp`, as it is the default Gulp task. **See the BrowserSync section below to help you set up BrowserSync before running any of these commands.**
- **`npm run assets`** will delete the files in the `/src/image`, `/src/js`, `/src/sass` and `/src/fontawesome` directories and replace them with the current files in the appropriate`/node-modules` sub-directories. This is equivalent to directly running `gulp reset-assets`. This command was formerly known as `postinstall`.
- **`npm run scripts`** will rebundle javascript files in `/src/js` based on the gulp file settings. Currently there is an admin js build, and a production js build file.

### Working with Styles

To work with and compile your Sass files on the fly start:`$ gulp watch`

## WP REST API Extensions

The theme extends the WordPress REST API to provide additional functionality for headless implementations and external integrations:

### Featured Images in REST API

All public post types that support thumbnails automatically include enhanced featured image data in their REST API responses under the `uds_featured_image` field. This includes:
- Image ID, alt text, caption, and description
- Media type and details
- Source URL and all available image sizes with their URLs
- Parent post information

### ACF Fields in REST API

The theme registers custom ACF fields to the `/wp-json/wp/v2/posts` endpoint:

**News Author Fields** (`uds_news_author`)
- Author name
- Author title
- Author email
- Author phone

**Story Hero Fields** (`uds_story_hero`)
- Background choice (color/image)
- Background color
- Background image
- Background image size

These extensions make it easier to build headless WordPress implementations or integrate with external systems while maintaining access to custom content fields.
