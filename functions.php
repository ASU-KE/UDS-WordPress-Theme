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
	'/class-unity-react-header-ctabtn-walker.php', // loop over cta btns
);

foreach ($uds_wp_includes as $file) {
	require_once get_template_directory() . '/inc' . $file;
}
