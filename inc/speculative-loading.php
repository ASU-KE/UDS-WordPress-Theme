<?php
/**
 * Speculative Loading configuration for WordPress 6.8+
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Configure speculative loading rules for the theme.
 * Uses wp_get_speculation_rules_configuration() to get the default configuration
 * and allows customization via filters.
 *
 * @return void
 */
function uds_wp_configure_speculation_rules() {
	// Only proceed if the function exists (WordPress 6.8+).
	if ( ! function_exists( 'wp_get_speculation_rules_configuration' ) ) {
		return;
	}

	// Get the default speculation rules configuration from WordPress core.
	$config = wp_get_speculation_rules_configuration();

	// Allow child themes or plugins to modify the configuration.
	$config = apply_filters( 'uds_wp_speculation_rules_configuration', $config );

	// The configuration is automatically used by WordPress core when returned.
	return $config;
}

/**
 * Add custom speculation rules in addition to core rules.
 * This hook allows adding custom prefetch or prerender rules.
 *
 * @return void
 */
function uds_wp_add_custom_speculation_rules() {
	// Custom rules can be added here if needed in the future.
	// Example: Add custom rules for specific pages or patterns.

	/**
	 * Allow child themes or plugins to add their own custom speculation rules.
	 *
	 * @since 2.0.4
	 */
	do_action( 'uds_wp_add_speculation_rules' );
}
add_action( 'wp_load_speculation_rules', 'uds_wp_add_custom_speculation_rules' );

/**
 * Exclude specific paths from speculative loading.
 * This prevents certain URLs from being prefetched or prerendered.
 *
 * @param array $exclude_paths Array of path patterns to exclude.
 * @return array Modified array of excluded paths.
 */
function uds_wp_exclude_speculation_paths( $exclude_paths ) {
	// Add theme-specific paths to exclude from speculation.
	// These are paths that should not be prefetched/prerendered.
	$theme_exclude_paths = array(
		// Exclude admin URLs.
		'/wp-admin/*',
		// Exclude login/logout URLs.
		'/wp-login.php*',
		// Exclude AJAX endpoints.
		'/wp-admin/admin-ajax.php*',
		// Exclude REST API endpoints that modify data.
		'/wp-json/*',
	);

	// Merge theme exclusions with any existing exclusions.
	$exclude_paths = array_merge( $exclude_paths, $theme_exclude_paths );

	/**
	 * Allow child themes or plugins to add or modify excluded paths.
	 *
	 * @since 2.0.4
	 *
	 * @param array $exclude_paths Array of path patterns to exclude from speculation.
	 */
	$exclude_paths = apply_filters( 'uds_wp_speculation_exclude_paths', $exclude_paths );

	return $exclude_paths;
}
add_filter( 'wp_speculation_rules_href_exclude_paths', 'uds_wp_exclude_speculation_paths' );
