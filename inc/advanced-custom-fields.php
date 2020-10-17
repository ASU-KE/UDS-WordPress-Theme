<?php
/**
 * Advanced Custom Fields Integration into Theme
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Define path and URL to the integrated ACF plugin in the theme.
define( 'ACF_PLUGIN_PATH', get_template_directory() . '/inc/acf/' );
define( 'ACF_PLUGIN_URL', get_template_directory_uri() . '/inc/acf/' );

// Include the ACF plugin.
include_once( ACF_PLUGIN_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
function uds_wp_acf_settings_url( $url ) {
	return ACF_PLUGIN_URL;
}
add_filter( 'acf/settings/url', 'uds_wp_acf_settings_url' );

// Show the ACF admin menu?
function uds_wp_acf_settings_show_admin( $show_admin ) {
	return true;
}
add_filter( 'acf/settings/show_admin', 'uds_wp_acf_settings_show_admin' );
