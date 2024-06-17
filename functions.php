<?php

/**
 * UDS WordPress Theme functions and definitions
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$uds_wp_includes = array(
	'/theme-settings.php',                       // Initialize theme default settings.
	'/setup.php',                                // Theme setup and custom theme supports.
	'/theme-activation.php',                     // Build sample menus upon theme activation.
	'/asu-favicons.php',                         // Enable ASU Favicons.
	'/wpautop.php',                              // Disable wpautop.
	'/widgets.php',                              // Register widget area.
	'/navigation-widget.php',                    // Custom Navigation menu widget.
	'/shortcodes.php',                           // Additional shortcodes for the theme.
	'/class-uds-notification-banner.php',        // Load the UDS notification widget.
	'/enqueue.php',                              // Enqueue scripts and styles.
	'/template-tags.php',                        // Custom template tags for this theme.
	'/render-partials.php',                      // Rendering methods for certain customizer-controlled items.
	'/pagination.php',                           // Custom pagination for this theme.
	'/hooks.php',                                // Custom hooks.
	'/extras.php',                               // Custom functions that act independently of the theme templates.
	'/customizer.php',                           // Customizer additions.
	'/custom-comments.php',                      // Custom Comments file.
	'/jetpack.php',                              // Load Jetpack compatibility file.
	'/tgm-plugin-activation.php',                // Load TGM Plugin Activation script for dependent plugin recommendations.
	'/class-wp-social-media-walker.php',         // Load custom WordPress nav walker for footer Social Media menu wdiget.
	'/wp-custom-menu.php',                       // Load custom menu builder functions.
	'/editor.php',                               // Load Editor functions.
	'/uds-blocks.php',                           // Custom blocks created with ACF Pro.
	'/deprecated.php',                           // Load deprecated functions.
	'/uds-contextual-help.php',                  // theme-specific context-senstive help tabs.
	'/tiny-mce.php',                             // Create custom toolbars for the WYSIWYG editor in ACF.
	'/wp-rest-api-extensions.php',               // Extend WP-REST API.
	'/scroll-to-div.php',                        // Add animation to anchore scroll and offset -150.
	'/header-localizer-script.php',				 // load custom react menu
	'/class-unity-react-header-navtree-walker.php', // custom loop over navtree using built in WP methods
	'/theme-settings-custom.php', // advanced admin settings (header menu, etc)
	'/block-pattern-categories.php'				 // Add our custom block pattern categories
);

foreach ($uds_wp_includes as $file) {
	require_once get_template_directory() . '/inc' . $file;
}

function log_rest_api_attempts($result, $server, $request)
{
	// Ensure the current user is properly initialized
	wp_set_current_user(wp_validate_auth_cookie('', 'logged_in'));

	// Path to the log file
	$log_file = get_template_directory() . '/rest-api-attempts.log';
	// Get the route from the request
	$route = $request->get_route();

	// Check if the request URL contains '/wp/v2'
	if (strpos($route, '/wp/v2') !== false) {
		// Get the current user
		$current_user = wp_get_current_user();
		$is_authenticated = ($current_user->exists()) ? 'Authenticated' : 'Unauthenticated';

		// Log the user information for debugging
		$user_info = sprintf(
			"User ID: %s, Username: %s",
			$current_user->ID,
			$current_user->user_login
		);

		// Log the attempt
		$log_entry = sprintf(
			"[%s] %s %s %s | %s\n",
			date('Y-m-d H:i:s'),
			$_SERVER['REMOTE_ADDR'],
			$_SERVER['REQUEST_URI'],
			$is_authenticated,
			$user_info
		);
		file_put_contents($log_file, $log_entry, FILE_APPEND);
	}

	return $result;
}
add_filter('rest_pre_dispatch', 'log_rest_api_attempts', 10, 3);
