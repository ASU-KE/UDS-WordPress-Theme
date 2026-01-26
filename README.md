<p align="center">
  <img src="https://rto.asu.edu/wp-content/themes/UDS-WordPress-Theme/dist/img/endorsed-logo/asu_knowledge_enterprise_white.png" alt="ASU Knowledge Enterprise" width="400" />
</p>

<h1 align="center">ASU Web Standards WordPress Theme</h1>

<p align="center">A WordPress theme that builds on top of ASU's canonical design tokens, and the official ASU Unity Design System (@asu/unity-bootstrap-theme), to deliver standards-compliant and accessible WordPress websites across ASU.</p>

### Features

- **ASU Web Standards 2.0**
  - Based on ASU's official design token library for consistent adherence to Web Standards 2.0
  - Utilizes the official ASU Bootstrap theme built on top of the design token library
  - Accessibility compliant
  - React-based header and footer components
- WordPress
  - Utilizes standard WordPress features, such as page templates, widgets, and shortcodes, for easy and rapid development of standards-compliant WordPress sites
- PHP 8 required
  - PHP 8 - v1.6 and later
  - PHP 7.4 compatible - v1.5 and earlier

- **Content Components**
  - 16 custom ACF blocks for UDS-compliant content (cards, banners, alerts, modals, etc.)
  - 42+ pre-designed block patterns for rapid page building
  - Custom widgets for global banners and footer content
  - Shortcode for sidebar menus

- **WordPress Integration**
  - Utilizes standard WordPress features for easy development
  - Enhanced WP REST API with featured image and ACF field support
  - Custom navigation menus with ASU Web Standards enforcement
  - Widget areas for banners and footer customization
  - Child theme support with starter template available

- **Analytics & Performance**
  - Built-in Google Analytics Data Layer for comprehensive event tracking
  - Google Tag Manager, Google Analytics, and Hotjar integration
  - WordPress 6.8+ Speculative Loading support for improved performance
  - Automatic tracking of user interactions (clicks, accordions, modals, etc.)

### Found a bug? Have a question? Need support?

[ServiceNow - KE Web Services Portal](https://asu.service-now.com/sp?sys_id=aa9567101b47b9109a9cca2b234bcbfd&id=sc_category)

## Table of Contents

- [Getting Started](#getting-started)
	- [Installation](#installation)
		- [Required Plugins](#required-plugins)
	- [Using the Theme](#using-the-theme)
		- [Updating the Theme](#updating-the-theme)
		- [Customizer Options](#customizer-options)
		- [UDS Advanced Settings](#uds-advanced-settings)
		- [ACF Blocks](#acf-blocks)
		- [Block Patterns](#block-patterns)
		- [Page Heroes](#page-heroes)
		- [Page Banners](#page-banners)
		- [Menus](#menus)
			- [Working with the Main Menu](#working-with-the-main-menu)
		- [Shortcodes](#shortcodes)
		- [Widget Areas](#widget-areas)
		- [Analytics and Tracking](#analytics-and-tracking)
- [For Developers](#for-developers)
	- [Introduction](#introduction)
	- [Requirements](#requirements)
	- [Local WordPress Environment](#local-wordpress-environment)
	- [Setting Up Local or Lando](#setting-up-local-or-lando)
		- [Local By Flywheel](#local-by-flywheel)
		- [Lando](#lando)
	- [Installing Dependencies](#installing-dependencies)
	- [Installing Dependencies from the ASU Unity Design System](#installing-dependencies-from-the-asu-unity-design-system)
	- [Contributing to the Theme](#contributing-to-the-theme)
		- [PHP Coding Standards](#php-coding-standards)
			- [Composer Scripts](#composer-scripts)
		- [NPM and Gulp Scripts](#npm-and-gulp-scripts)
		- [Working with Styles](#working-with-styles)
	- [WP REST API Extensions](#wp-rest-api-extensions)
	- [Extending the Theme](#extending-the-theme)
		- [Action Hooks and Filters](#action-hooks-and-filters)

## Getting Started

### Required Plugins
- [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro/)
- [Bootstrap Blocks](https://wordpress.org/plugins/wp-bootstrap-blocks/)

### Using the Theme

#### Updating the Theme
##### Update CSS
- `npm i @asu/asu-unity-stack`
- `npm i bootstrap`
- node_modules update @import path to `../../node_modules/bootstrap` in errored files
- gulp task copy node module to /css folder
- gulp task minify css for prod (rename module is throwing `(node:26735) [DEP0180] DeprecationWarning: fs.Stats constructor is deprecated.` may need update soon )
##### Update ASU header
- `npm i @asu/component-header-footer`
- gulp task copy node module to /js folder
##### Update images
- `npm i @asu/asu-unity-stack`
- gulp task copy node module to /img folder

#### Customizer Options

The WordPress Customizer provides access to various theme settings for controlling the appearance and behavior of your site:

- **Header Settings** - Configure the ASU header including logo, navigation, and partner logo
- **Footer Settings** - Customize footer columns, social media icons, unit name, and contribute button
- **Color Schemes** - Select color options for various components
- **Analytics** - Add tracking codes for Google Tag Manager, Google Analytics, and Hotjar
- **Additional Settings** - Various other theme-specific configuration options

Access the Customizer via **Appearance → Customize** in the WordPress admin.

#### UDS Advanced Settings

The theme provides an advanced settings page accessible at **WordPress Admin → Settings → UDS Advanced Settings**. This page includes configuration options for:

##### React Footer Toggle
- Enable or disable the React-based footer (see [React Footer](#react-footer-footer-v2) section below for details)
- Default: Enabled for new installations

##### Speculative Loading Settings
- Enable/disable WordPress 6.8+ Speculative Loading for improved performance
- Configure speculation mode (prefetch or prerender)
- Set eagerness level (conservative, moderate, or eager)
- See [Speculative Loading](#speculative-loading-wordpress-68) section for complete details

##### Header Configuration
- Advanced header menu settings and customization options

#### ACF Blocks

The theme includes 16 custom ACF blocks that provide UDS-compliant content components:

- **UDS Alert** - Dismissible alert messages with various styles and colors
- **UDS Background Section** - Container with background images, patterns, or colors using Inner Blocks
- **UDS Banner** - Customizable banner with text and styles
- **UDS Blockquote** - Stylized quotations with optional images and accent colors
- **UDS Button** - Configurable buttons with multiple styles, sizes, and optional icons
- **UDS Card** - Content cards with images, text, and call-to-action elements
- **UDS Content Image Overlap** - Image and content layouts with overlapping designs
- **UDS Foldable Card** - Accordion-style collapsible content cards
- **UDS Grid Links** - Grid layout for displaying linked content items
- **UDS Heading** - Customizable headings with UDS styling options
- **UDS Image** - Enhanced image block with UDS-specific features
- **UDS Modals** - Modal windows with configurable triggers and content
- **UDS Overlay Card** - Cards with image overlays and hover effects
- **UDS Person Profile** - Display profiles with photos, contact information, and social links
- **UDS Show More** - Expandable content sections with show/hide functionality
- **UDS Tabbed Panels** - Tabbed interface for organizing content into switchable panels

All blocks are available in the WordPress Block Editor under the "UDS" category and follow ASU Web Standards 2.0 design guidelines.

#### Block Patterns

The theme includes 42+ pre-designed block patterns organized into categories for quick page building:

**Pattern Categories:**
- **Call to Action** - Conversion-focused layouts with buttons and messaging
- **Cards** - Various card layouts for content display (4-card, 6-card, 8-card sections)
- **Image and Text** - Combined text and image layouts in multiple configurations
- **Photo Cards** - Portrait and landscape photo card arrangements (2, 3, and 4-column layouts)
- **News and Events** - Dynamic news grid patterns
- **Page Starters** - Complete page templates (full-width, with sidebars, with breadcrumbs)
- **Quotes** - Quote layouts with various styling options
- **Video and Text** - Video content combined with text layouts
- **Miscellaneous** - Additional utility patterns including stat grids, image features, and nested containers

Access patterns from the Block Editor inserter by clicking the "Patterns" tab.

#### Page Heroes

Page heroes are large banner areas at the top of pages or posts that can include images, videos, titles, and call-to-action buttons. Heroes are configured using Advanced Custom Fields on each page or post.

**Hero Configuration Options:**
- **Size** - Choose from small, medium (default), or large hero sizes
- **Media Source** - Use uploaded images, videos, or external URLs
- **Title** - Custom hero title with optional text highlighting
- **Text Color** - Choose between dark or white text for contrast
- **Call-to-Action Buttons** - Add multiple CTA buttons with configurable styles and links
- **Background Effects** - Optional color overlays and opacity controls

Heroes are automatically displayed at the top of pages and posts when configured. The hero template is located in `templates-global/hero.php`.

#### Page Banners
The theme provides a widget area, and corresponding widget, for displaying UDS-compliant banners across the top of every page in your site. These banners will appear below the hero area, and above all other content.

To create a banner, add the provided *Notification Banner* widget to the *Global Banner Area* on the WordPress widgets admin screen (or via the Customizer) and configure the banner as desired using the options provided. Make sure to set the *Show Banner* option to **Yes** in order to have the banner appear on your site.

To remove a page banner, either delete the widget from the Global Banner widget area, or set the *Show Banner* option to **No**.

#### React Footer (Footer v2)

The theme now includes a modern React-based footer component that operates similarly to the header, providing better performance and consistency. This feature can be toggled on or off through the WordPress admin interface.

##### Enabling/Disabling the React Footer

1. Navigate to **WordPress Admin → Settings → UDS Advanced Settings**
2. Locate the **"Use React Footer"** toggle
3. Enable for the React footer (recommended) or disable to use the legacy PHP footer
4. The React footer is enabled by default for new installations

##### React Footer Features

The React footer provides the same functionality as the legacy footer with these sections:
- **Branding Row**: Logo and social media icons
- **Action Row**: Contact information and footer navigation columns
- **Innovation Links**: Rankings image and university services links
- **Colophon**: Legal and compliance links

##### Important Notes and Quirks

**Social Media Icons:**
- The React footer only displays [officially approved social media icons](https://zeroheight.com/9f0b32a56/p/02de7e-iconography) per ASU brand standards
- Supported platforms: Facebook, Twitter (displays as X icon), LinkedIn, Instagram, YouTube, and a few others
- **Note**: Use "Twitter" as the navigation label to get the X icon
- Icons not in the approved list will not appear in the React footer
- The icon is determined by the **Navigation Label**, not the URL
- If a social menu item has a label but no URL, the icon will not appear

**Contribute Button:**
- The button text is standardized to "Support ASU" per ASU brand guidelines
- Custom contribute button text from the Customizer is **not** used in the React footer
- This ensures brand consistency but may affect sites with custom button text
- Use the legacy footer if custom button text is required

**Footer Menu:**
- Three-level deep menus are supported, but third-level items will not display (per standards)
- If no menu is assigned to the "Footer Menu" location, the information row will still show with the site name

**Child Theme Compatibility:**
- If your child theme overrides `footer.php`, it will use that version instead of the React footer
- The React footer toggle has no effect when `footer.php` is overridden in a child theme
- This ensures child theme customizations continue to work as expected

**Customizer Settings:**
All standard Customizer settings are respected by the React footer:
- Custom logo images and URLs
- Unit name customization (custom text or site name)
- Contact link URL
- Contribute button URL
- Hiding logo/social or information rows
- Footer menu assignments

**Switching Between React and Legacy:**
- Settings are applied immediately when switching between footer types
- React footer enforces brand standards (e.g., "Support ASU" button text)
- Legacy footer allows customizations that may not meet brand standards
- No data migration is needed; both footers use the same WordPress settings

##### Developer Notes

**File Structure:**
- `inc/footer-localizer-script.php` - Extracts WordPress footer data and formats it for React
- `src/js/custom/init-uds-footer.js` - Initializes the React footer component
- `footer.php` - Template that switches between React and legacy implementations
- `acf-json/group_637677713cbf6.json` - ACF field definition for the React footer toggle

**Data Flow:**
```
WordPress Customizer Settings → footer-localizer-script.php → 
JavaScript Props → React Component (AsuHeaderFooter.initASUFooter)
```

**For PHP 8.0+ Developers:**
The footer toggle logic in `footer.php` (lines 25-29) can be simplified using the null coalescing operator:
```php
$use_react_footer = get_field('use_react_footer', 'options') ?? true;
```

**Extending/Debugging:**
- JavaScript errors are logged to the browser console with descriptive messages
- Check for `udsFooterVars` in the browser console to verify footer data is being passed correctly
- The footer initialization includes checks for missing dependencies (React library, footer container, etc.)

#### Menus
The UDS-WordPress theme has three assignable menu areas:
- The **main navigation** menu, at the top of every page
- The **main footer** menu, at the bottom of every page
- The **social media icons** menu, shown above the main footer area


##### Working with the Main Menu
You build the main menu of your site using the built-in WordPress menu builder. The menu-building code behind the scenes, however, will enforce certain ASU Web Standards when it comes to the main navigation menu:

- menu items can be nested no more than **three** levels deep. Any menu you item to drag to the fourth level (or any level beyond that) **will not appear** in the menu.
- First level menu items will appear as entries in the main navigation menu
- Second level menu items will form dropdown menus beneath their parent item, **unless** there are also third-level items beneath them. In that case:
  - the second level item will become a non-clickable column header, and all third-level items below it will form links in a single column
  - any sub-menu with more than two columns will be rendered as a full-width 'mega-menu'

Here is an example of a main menu hierarchy, and how each item would be rendered in this theme.

![Example of menu hierarchy](dist/img/admin/menu-hierarchy.png "Example Menu Hierarchy")


#### Shortcodes

The theme provides the following shortcode:

##### `[uds-sidebar-menu]`

Creates a collapsible sidebar navigation menu using a WordPress menu.

**Attributes:**
- `menu` - The name of the WordPress menu to display
- `title` - Optional title to display above the menu

**Example:**
```
[uds-sidebar-menu menu="My Sidebar Menu" title="Section Navigation"]
```

The shortcode generates a UDS-compliant sidebar menu with:
- Mobile-responsive collapse/expand functionality
- Bootstrap 5 data attributes for animations
- Automatic menu structure from WordPress menu builder
- ARIA labels for accessibility

#### Widget Areas

The theme provides two widget areas for adding WordPress widgets:

##### Global Banner Area
- **Location:** Below the hero image and above all page content
- **Purpose:** Display site-wide alert banners or important notifications
- **Widget:** Use the provided "Notification Banner" widget to create UDS-compliant banners
- **Configuration:** Add the widget in **Appearance → Widgets** or via the Customizer

##### Footer Widgets
- **Location:** Additional column in the footer area
- **Purpose:** Add custom content or widgets to the footer
- **Configuration:** Add widgets in **Appearance → Widgets** or via the Customizer
- **Note:** This area is managed separately from the React Footer columns

#### Analytics and Tracking

The theme includes comprehensive analytics support for tracking user interactions and behavior:

##### Google Analytics Data Layer

The theme includes `data-layer.js` which automatically tracks:
- **Accordion interactions** - Open/close events on UDS Foldable Cards
- **Sidebar menu events** - Navigation clicks in sidebar menus
- **Carousel interactions** - Slide navigation events
- **Tab interactions** - Tab panel switching in UDS Tabbed Panels
- **Modal events** - Modal open/close actions
- **Button clicks** - Call-to-action button interactions
- **Card interactions** - Clicks on UDS Card elements

All events are pushed to the Google Analytics data layer with structured data including:
- Event name and type
- Action performed
- Section and region identifiers
- Clicked element text
- Custom `data-ga` attributes from blocks

##### Tracking Code Integration

Configure tracking codes in the WordPress Customizer:

**Google Tag Manager**
- Add GTM container ID in Customizer
- Automatically includes both `<head>` and `<noscript>` implementations
- Provides data layer support for enhanced tracking

**Google Analytics**
- Direct GA tracking code support
- Legacy GA implementation for sites not using GTM

**Hotjar**
- Add Hotjar site ID in Customizer
- Includes Hotjar tracking script for heatmaps and session recordings

All tracking implementations follow ASU Web Standards and best practices for privacy and performance.

## For Developers

### Introduction

### Requirements

- [Volta](https://volta.sh/) is used to manage node versions. `package.json` volta section references the minimum requirements.
- Lando + Docker or Local by Flywheel is used to run a local dev server.


### Local WordPress Environment

- [Local by Flywheel](https://localwp.com/)
- [Lando](https://docs.lando.dev/)

### Setting Up Local or Lando

#### Local By Flywheel

- Visit [v](https://localwp.com/) and click the `Download` button.
- Choose your platform and enter some information (only the email field is mandatory), the download should start and you’ll be taken to a start-up screen, where you will select the `Let’s Go!` button. After installation, you’ll be taken to the dashboard.
- Proceed to create a new local WordPress install or connect to a remote service like [WP Engine](https://wpengine.com/).

We are currently using WP Engine to manage our WordPress sites and to connect your Local By Flywheel installation to WP Engine you will need a WP Engine account and API key.

[WP Engine Instructions](https://wpengine.com/support/local/).
- To connect select the `Connect` icon on the left hand side of your Local dashboard.

![Local By FlyWheel Connect Select Example](img/admin/local-by-flywheel-connect.png "Local By FlyWheel Connect Select Example")

- After you have connected to WP Engine you will see all of the site available to your account listed within the `Connect` area.

![Local By FlyWheel Connect Area Example](img/admin/local-by-flywheel-connect-area.png "Local By FlyWheel Connect Area Example")
- In order to connect to WP Engine you must click the `My Hosts` button in the upper right corner of the `Connect` area.

Then you will see a list of hosting providers to choose from.

- Select `WP Engine` and sign in.

This will give you access to pull sites locally to work on.

For new project's select: `ASU UDS Quickstart`

`*` After you have pulled the site to to your local machine disconnect it from the host to ensure premature development is not deployed in the background. You can do this by clicking the same button used to `Pull To Local` to `Disconnect`.

You are now ready to clone the theme within the projects `wp-content/themes` folder.

#### Lando

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

#### 2026 Lando
- `mkdir local-site/wordpress-test-site`, `cd` into directory
- `lando init` - "code base from current directory", use wordpress recipe, webroot press enter for default, name your app
- `lando start` - visit in browser to confirm apache server is running
- `lando wp core download` - get latest wordpress software
- `lando wp config create --dbname=wordpress --dbuser=wordpress --dbpass=wordpress --dbhost=database` - creates `wp-config.php` file, defaults from lando recipe, do not change
- `lando wp core install --url="https://url-from-lando-start" --title="Wordpress Site Title" --admin_user=admin --admin_password=password --admin_email=test@asu.edu`
- default WordPress should be running. To install the theme, git clone into `wp-content/themes`

> [!IMPORTANT]  
> MacOS Tahoe users must visit `System Settings > Privacy and Security > Full Disk Access` and allow the program running Lando (ex. terminal window in VS Code). The app will only partially load and display 500 or 403 errors.

### Installing Dependencies

- Make sure you have installed Node.js and Browser-Sync (optional) on your computer globally
- Then open your terminal and browse to the location of the theme
- Run: `$ composer install`
- Run: `$ npm install`

### VS Code editor config
- Install PHP intelephenese
- Add default wordpress stub
- To get intelephese to recognize acf functions, add to VS code `settings.json`:
  -  `"intelephense.environment.includePaths": ["/local/path/to/acf-pro-stubs"]`,
  - [https://github.com/php-stubs/acf-pro-stubs](https://github.com/php-stubs/acf-pro-stubs)


### Installing Dependencies from the ASU Unity Design System

Add your private key to the `.npmrc` file.

### Contributing to the Theme

Welcoming paragraph here with general contribution notes

#### PHP Coding Standards
The theme is set up with tools to help you write PHP that conforms to the [WordPress Coding Standards](https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/). After initially cloning the theme repo, run `composer install` to install these tools in the `/vendor` directory.

###### Composer Scripts
The theme contains two composer scripts to help you write code that conforms to the WordPress standards:

- **`composer check:cs`** will process _all_ `.php` files in the theme and check them for compliance with the WordPress standards. Any code that does not meet the standard will be indicated, and you can fix **most** of them with another script...
- **`composer fix:cs`** will fix errors marked with an `[x]` in the output of `composer check:cs`. You will need to correct any other issues manually.

It is important to run the `composer check:cs` command and fix any issues **before pushing your code to Github**, as these commands will run on _every single .php file_ in the theme. If you don't check your work, any issues with your code will surface when another developer checks their code, making it more difficult for any developer to know if it is their code causing the errors.

If needed, you can manually run these commands and target a specific file, or files. From the **root folder** of the theme:

- To check files:`./vendor/bin/phpcs {path-to-the-php-file}`
- To fix errors: `./vendor/bin/phpcbf {path-to-the-php-file}`


#### NPM and Gulp Scripts
We use [Gulp](https://gulp.js) as our task runner. While can run Gulp tasks directly from the command line,  we have created some NPM aliases for common tasks.


- **`npm run build`** will compile theme assets from the files in the `/src` directories and copy them to `/css`, `/js`, and `/img` directories. This includes minifying CSS, uglifying and concating JS files, and running all images through `imageoptim`. If you are not using the `watch` option, this is the command to run after you have made any changes to Javascript or CSS files. This step also cleans out and replaces all files in the `\dist` directory. This is equivalent to directly running `gulp compile`.
- **`npm run images`** does only the image optimization step of the build process. It will optimize all images in `/src/img` and copying the optimized images to `/img`. This is equivalent to directly running `gulp imagemin`.
- **`npm run sync`** starts BrowserSync and watches SCSS and JS files for changes, automatically processing those files when they are saved (using a subset of the tasks that would run with `npm run build`). This is equivalent to directly running `gulp watch-bs` or just `gulp`, as it is the default Gulp task. **See the BrowserSync section below to help you set up BrowserSync before running any of these commands.**
- **`npm run assets`** will delete the files in the `/src/image`, `/src/js`, `/src/sass` and `/src/fontawesome` directories and replace them with the current files in the appropriate`/node-modules` sub-directories. This is equivalent to directly running `gulp reset-assets`. This command was formerly known as `postinstall`.
- **`npm run scripts`** will rebundle javascript files in `/src/js` based on the gulp file settings. Currently there is an admin js build, and a production js build file.

#### Working with Styles

To work with and compile your Sass files on the fly start:`$ gulp watch`

### WP REST API Extensions

The theme extends the WordPress REST API to provide additional functionality for headless implementations and external integrations:

#### Featured Images in REST API

All public post types that support thumbnails automatically include enhanced featured image data in their REST API responses under the `uds_featured_image` field. This includes:
- Image ID, alt text, caption, and description
- Media type and details
- Source URL and all available image sizes with their URLs
- Parent post information

#### ACF Fields in REST API

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

### Extending the Theme

A "starter" child theme template has been made available for use in creating your custom solution for WordPress. That theme template is located here:

- https://github.com/asu-ke-web-services/UDS-WordPress-Child-Theme

Out of the box, the child theme template:

- Compiles its own set of CSS rules so that styles from the parent can be overwritten by the child theme's CSS.
- Includes a reference to the **UDS-Boostrap-4** design token library, so that you can include these standardized references in your child theme's codebase.
- Includes both the child and the parent's `functions.php` (and related) files. This follows the best practices of the WordPress project.

Further instructions on how to best use the child theme template can be found the GitHub repository.

#### Action Hooks and Filters

The **UDS-WordPress-Theme** includes hooks in the following places.
| Hook | Location |
|------|----------|
| uds_wp_after_global_header     | header.php         |
| uds_wp_before_global_footer     | footer.php         |
| uds_wp_before_global_footer_columns | footer.php |
| uds_wp_add_speculation_rules | inc/speculative-loading.php |
| uds_wp_speculation_exclude_paths (filter) | inc/speculative-loading.php |
| wp_load_speculation_rules | inc/speculative-loading.php |
| wp_speculation_rules_href_exclude_paths (filter) | inc/speculative-loading.php |

**uds_wp_after_global_header** - fires immediately after the closing `</header><!-- end #asu-header -->` statement in `header.php`. Serves as an ideal place for a small banner or other alert mechanism to be added before a potential hero image across multiple pages on the site.

**uds_wp_before_global_footer** - fires immediately before the closing global `<footer>` tag in `footer.php`. Allows for a persistent block of code to appear across multiple pages of the site, just above the point at which the global footer begins.

**uds_wp_before_global_footer_columns** - fires immediately before the `<div id="wrapper-footer-columns">` landmark within `footer.php`. In conjunction with the theme option to turn off the native footer column feature, this would be a handy way to replace the native functionality for the footer columns with your own solution.

**uds_wp_add_speculation_rules** - fires during the `wp_load_speculation_rules` action, allowing child themes or plugins to add custom speculation rules for prefetching or prerendering pages. This is part of the WordPress 6.8+ Speculative Loading API that helps improve site performance.

**uds_wp_speculation_exclude_paths** (filter) - filters the array of paths to exclude from speculative loading. Use this filter in child themes or plugins to add or modify which URLs should not be prefetched or prerendered.

**wp_load_speculation_rules** - WordPress core action that is hooked to add custom speculation rules in addition to the main core speculation rule.

**wp_speculation_rules_href_exclude_paths** (filter) - WordPress core filter that allows you to exclude additional paths from speculative loading. The theme uses this to exclude admin URLs, login pages, AJAX endpoints, and REST API endpoints by default.

You can take advantage of these hooks within a child theme or plugin using a function like the following:
```php
/**
 * Adds a section of content immediately above the global footer.
 * Looks for a template called '/templates/content-prefooter.php'
 */
function your_project_add_prefooter_content() {
	get_template_part( 'templates/content', 'prefooter' );
}
add_action( 'uds_wp_before_global_footer', 'your_project_add_prefooter_content' );

/**
 * Example: Add custom paths to exclude from speculative loading.
 */
function your_project_exclude_custom_paths( $exclude_paths ) {
	// Exclude your custom paths from speculative loading
	$exclude_paths[] = '/custom-path/*';
	$exclude_paths[] = '/another-path/*';
	return $exclude_paths;
}
add_filter( 'uds_wp_speculation_exclude_paths', 'your_project_exclude_custom_paths' );
```

### Speculative Loading (WordPress 6.8+)

The theme includes support for WordPress 6.8's Speculative Loading feature, which uses the [Speculation Rules API](https://developer.mozilla.org/en-US/docs/Web/API/Speculation_Rules_API) to improve site performance by prefetching or prerendering pages that users are likely to navigate to.

**What is Speculative Loading?**
Speculative Loading allows the browser to speculatively load pages in the background before a user clicks on a link. This can significantly reduce page load times and improve the user experience.

**UI Configuration**
You can configure Speculative Loading settings from the WordPress admin:
1. Navigate to **Settings → UDS Advanced Settings**
2. Locate the **Speculative Loading Settings** section
3. Configure the following options:
   - **Enable Speculative Loading**: Toggle to enable/disable the feature (enabled by default)
   - **Speculation Mode**: Choose between:
     - **Prefetch**: Downloads the page content in advance (lighter on resources)
     - **Prerender**: Fully renders the page in the background (faster but more resource intensive)
   - **Eagerness**: Control when speculation starts:
     - **Conservative**: Only on user interaction (hover, mousedown)
     - **Moderate**: Balance between conservative and eager (default)
     - **Eager**: Speculatively load immediately when link is visible

**Default Exclusions**
The theme automatically excludes the following paths from speculative loading to prevent unnecessary prefetching of administrative and API endpoints:
- `/wp-admin/*` - WordPress admin pages
- `/wp-login.php*` - Login pages
- `/wp-admin/admin-ajax.php*` - AJAX endpoints
- `/wp-json/*` - REST API endpoints

**Customization**
You can customize which paths are excluded from speculative loading using the `uds_wp_speculation_exclude_paths` filter in your child theme or plugin. See the example above.

For more information about WordPress Speculative Loading, see:
- [WordPress 6.8 Speculative Loading](https://make.wordpress.org/core/2025/03/06/speculative-loading-in-6-8/)
- [WordPress Core Ticket #62503](https://core.trac.wordpress.org/ticket/62503)
