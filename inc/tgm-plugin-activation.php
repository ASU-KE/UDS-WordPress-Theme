<?php
/**
 * UDS WordPress Theme - recommended / required plugins
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$uds_wp_includes = array(
	'/class-tgm-plugin-activation.php',     // Load the TGM plugin class.
	'/recommended-plugins.php'      	    // Load our recommended plugins.
);

foreach ( $uds_wp_includes as $file ) {
	require_once get_template_directory() . '/inc/tgm-plugin-activation' . $file;
}
