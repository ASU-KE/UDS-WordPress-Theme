# Extending the Theme

This guide covers how to extend the UDS WordPress Theme through child themes, action hooks, and filters.

## Table of Contents

- [Child Theme Support](#child-theme-support)
- [Action Hooks and Filters](#action-hooks-and-filters)

## Child Theme Support

A "starter" child theme template has been made available for use in creating your custom solution for WordPress. That theme template is located here:

- https://github.com/asu-ke-web-services/UDS-WordPress-Child-Theme

Out of the box, the child theme template:

- Compiles its own set of CSS rules so that styles from the parent can be overwritten by the child theme's CSS.
- Includes a reference to the **UDS-Boostrap-4** design token library, so that you can include these standardized references in your child theme's codebase.
- Includes both the child and the parent's `functions.php` (and related) files. This follows the best practices of the WordPress project.

Further instructions on how to best use the child theme template can be found the GitHub repository.

## Action Hooks and Filters

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
