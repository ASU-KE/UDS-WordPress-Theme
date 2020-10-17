<?php
/**
 * UDS WordPress Theme Customizer
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$uds_wp_includes = array(
	'/customizer-sanitizers.php',           // Load input sanitizer functions.
	'/customizer-preview-js.php',           // Make Theme Customizer preview reload changes asynchronously.
	'/customizer-post-message-support.php', // Add postMessage support for site title and description in the Theme Customizer.
	'/customizer-endorsed-unit-logos.php',  // Load endorsed unit logos for Customizer.
	'/customizer-settings.php',             // Load custom settings and sections in Customizer.
);

foreach ( $uds_wp_includes as $file ) {
	require_once get_template_directory() . '/inc/customizer' . $file;
}
