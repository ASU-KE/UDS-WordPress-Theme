# Speculative Loading (WordPress 6.8+)

The theme includes support for WordPress 6.8's Speculative Loading feature, which uses the [Speculation Rules API](https://developer.mozilla.org/en-US/docs/Web/API/Speculation_Rules_API) to improve site performance by prefetching or prerendering pages that users are likely to navigate to.

## Table of Contents

- [What is Speculative Loading?](#what-is-speculative-loading)
- [UI Configuration](#ui-configuration)
- [Default Exclusions](#default-exclusions)
- [Customization](#customization)
- [Additional Resources](#additional-resources)

## What is Speculative Loading?
Speculative Loading allows the browser to speculatively load pages in the background before a user clicks on a link. This can significantly reduce page load times and improve the user experience.

## UI Configuration
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

## Default Exclusions
The theme automatically excludes the following paths from speculative loading to prevent unnecessary prefetching of administrative and API endpoints:
- `/wp-admin/*` - WordPress admin pages
- `/wp-login.php*` - Login pages
- `/wp-admin/admin-ajax.php*` - AJAX endpoints
- `/wp-json/*` - REST API endpoints

## Customization
You can customize which paths are excluded from speculative loading using the `uds_wp_speculation_exclude_paths` filter in your child theme or plugin. See the [Extending the Theme](extending.md#action-hooks-and-filters) guide for examples.

## Additional Resources

For more information about WordPress Speculative Loading, see:
- [WordPress 6.8 Speculative Loading](https://make.wordpress.org/core/2025/03/06/speculative-loading-in-6-8/)
- [WordPress Core Ticket #62503](https://core.trac.wordpress.org/ticket/62503)
