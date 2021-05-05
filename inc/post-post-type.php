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

if ( ! function_exists( 'assign_featured_image_and_excerpt' ) ) {
	/**
	 * Assign default featured image an excerpt to each post
	 * Get the first core/image block and assign it as a featured image if the field is empty
	 * Get the ACF "excerpt" and assign the value to WP excerpt field if it was empty, or assign the excerpt field to ACF then make it empty.
	 */
	function ssign_featured_image_and_excerpt() {
		global $post;
		$attached_image_id = '';
		// To assign the featured image.
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
		// To assign the excerpt.
		if ( ! $post->post_excerpt ) {
			$post_excerpt_acf = get_field( 'excerpt', $post->ID );


			$post->post_excerpt = $post_excerpt_acf;
		} else {
			update_field( 'excerpt', $post->post_excerpt, $post->ID );
			$post->post_excerpt = '';
		}

	}
	add_action( 'the_post', 'ssign_featured_image_and_excerpt' );
	add_action( 'save_post', 'ssign_featured_image_and_excerpt' );
	add_action( 'draft_to_publish', 'ssign_featured_image_and_excerpt' );
	add_action( 'new_to_publish', 'ssign_featured_image_and_excerpt' );
	add_action( 'pending_to_publish', 'ssign_featured_image_and_excerpt' );
	add_action( 'future_to_publish', 'ssign_featured_image_and_excerpt' );

}
