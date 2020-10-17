<?php
/**
 * Remove the WordPress Core Custom Fields metabox in Page and Post content (superceded by ACF)
 *
 * @package uds-wordpress
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


function uds_wp_remove_metaboxes() {
	remove_meta_box( 'postcustom', 'page', 'normal' ); // removes custom fields for pages
	remove_meta_box( 'postcustom', 'post', 'normal' ); // removes custom fields for posts
}
add_action( 'admin_menu', 'uds_wp_remove_metaboxes' );
