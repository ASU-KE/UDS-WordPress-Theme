<?php
/**
 * Remove the WordPress Core Custom Fields metabox in Page and Post content (superceded by ACF)
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Remove metaboxes for WordPress' basic custom fields.
 * This functionality will be replaced by Advanced Custom Fields.
 */
function uds_wp_remove_metaboxes() {
	remove_meta_box( 'postcustom', 'page', 'normal' ); // Remove custom fields for Pages.
	remove_meta_box( 'postcustom', 'post', 'normal' ); // Remove custom fields for Posts.
}
add_action( 'admin_menu', 'uds_wp_remove_metaboxes' );
