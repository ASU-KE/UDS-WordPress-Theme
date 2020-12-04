<?php
/**
 * UDS WordPress Theme functions and definitions
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$uds_wp_includes = array(
	'/theme-sidebars-helpers.php',               // Sidebar helper functions.
	'/theme-settings.php',                       // Initialize theme default settings.
	'/setup.php',                                // Theme setup and custom theme supports.
	'/theme-activation.php',                     // Build sample menus upon theme activation.
	'/asu-favicons.php',                         // Enable ASU Favicons.
	'/wpautop.php',                              // Disable wpautop.
	'/widgets.php',                              // Register widget area.
	'/navigation-widget.php',                    // Custom Navigation menu widget.
	'/class-uds-notification-banner.php',        // Load the UDS notification widget.
	'/enqueue.php',                              // Enqueue scripts and styles.
	'/template-tags.php',                        // Custom template tags for this theme.
	'/pagination.php',                           // Custom pagination for this theme.
	'/hooks.php',                                // Custom hooks.
	'/extras.php',                               // Custom functions that act independently of the theme templates.
	'/customizer.php',                           // Customizer additions.
	'/custom-comments.php',                      // Custom Comments file.
	'/jetpack.php',                              // Load Jetpack compatibility file.
	'/wp-custom-fields.php',                     // Disable WP Core custom fields metaboxes.
	'/tgm-plugin-activation.php',                // Load TGM Plugin Activation script for dependent plugin recommendations.
	'/class-wp-social-media-walker.php',         // Load custom WordPress nav walker for footer Social Media menu wdiget.
	'/wp-custom-menu.php',                       // Load custom menu builder functions.
	'/editor.php',                               // Load Editor functions.
	'/deprecated.php',                           // Load deprecated functions.
	'/uds-contextual-help.php',             // theme-specific context-senstive help tabs.
);

foreach ( $uds_wp_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}


/**
 * To remove Template field from the Page Attributes metabox.
 * ====== I'm leaving this function here till we decide whether to use it or not ====== .
 *
 * @param Templates $templates is for template field in metabox.
 */
function uds_wp_remove_page_templates( $templates ) {
	return array();
}
add_filter( 'theme_page_templates', 'uds_wp_remove_page_templates' );
