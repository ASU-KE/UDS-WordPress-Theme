<?php
/**
 * This file is for posts post type
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'wprocs_remove_excerpt_from_news' ) ) {
	/**
	 * Remove the original excerpt WP field from post
	 */
	function wprocs_remove_excerpt_from_news() {
		remove_post_type_support( 'post', 'excerpt' );
	}
	add_action( 'init', 'wprocs_remove_excerpt_from_news' );
}

if ( ! function_exists( 'assign_first_image_as_featured_image' ) ) {
	/**
	 * Get the first core/image block and assign it as a featured image if the field is empty
	 */
	function assign_first_image_as_featured_image() {
		global $post;
		$attached_image_id = '';
		if ( ! has_post_thumbnail( $post->ID ) ) {

			if ( has_blocks( $post->post_content ) ) {
				$blocks = parse_blocks( $post->post_content );
				foreach ( $blocks as $value ) {

					if ( 'core/image' == $value['blockName'] ) {

								  $attached_image_id = $value['attrs']['id'];
								  break;

					}
				}
			}

			if ( $attached_image_id ) {

				   set_post_thumbnail( $post->ID, $attached_image_id );

			}
		}
	}
	add_action( 'the_post', 'assign_first_image_as_featured_image' );
	add_action( 'save_post', 'assign_first_image_as_featured_image' );
	add_action( 'draft_to_publish', 'assign_first_image_as_featured_image' );
	add_action( 'new_to_publish', 'assign_first_image_as_featured_image' );
	add_action( 'pending_to_publish', 'assign_first_image_as_featured_image' );
	add_action( 'future_to_publish', 'assign_first_image_as_featured_image' );

}
