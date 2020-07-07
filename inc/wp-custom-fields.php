<?php
/**
 * Remove the WordPress Core Custom Fields metabox in Page and Post content (superceded by ACF)
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


function asu_wp2020_remove_metaboxes() {
 remove_meta_box( 'postcustom' , 'page' , 'normal' ); //removes custom fields for pages
 remove_meta_box( 'postcustom' , 'post' , 'normal' ); //removes custom fields for posts
}
add_action( 'admin_menu' , 'asu_wp2020_remove_metaboxes' );
