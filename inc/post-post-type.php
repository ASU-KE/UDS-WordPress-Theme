<?php
/**
 * This file is for posts post type
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'wprocs_remove_excerpt_from_news' ) ) {
function wprocs_remove_excerpt_from_news() {
    remove_post_type_support( 'post', 'excerpt' );
}
add_action( 'init', 'wprocs_remove_excerpt_from_news' );
}
