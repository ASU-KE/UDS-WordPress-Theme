<?php
/**
 * This file is for posts post type
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'custom_excerpt_length' ) ) {
	/**
	 * Set a max length for excerpt
	 *
	 * @param int $length the number of character in excerpt.
	 */
	function custom_excerpt_length( $length ) {
		return 50;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
}

if ( ! function_exists( 'uds_assign_featured_image' ) ) {
	/**
	 * Assign default featured image an excerpt to each post
	 * Get the first core/image block and assign it as a featured image if the field is empty
	 */
	function uds_assign_featured_image() {
		global $post;
		$attached_image_id = '';
		// Scan the post content, identify the first core/image block found and assign to featured image.
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
	add_action( 'the_post', 'uds_assign_featured_image' );
	add_action( 'save_post', 'uds_assign_featured_image' );
	add_action( 'draft_to_publish', 'uds_assign_featured_image' );
	add_action( 'new_to_publish', 'uds_assign_featured_image' );
	add_action( 'pending_to_publish', 'uds_assign_featured_image' );
	add_action( 'future_to_publish', 'uds_assign_featured_image' );

}


add_filter(
	'get_the_archive_title',
	function ( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_tax() ) { // for custom post types.
			$title = sprintf( '%1$s', single_term_title( '', false ) );
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		}
		return $title;
	}
);
