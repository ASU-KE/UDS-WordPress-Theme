<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'uds_wp_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function uds_wp_posted_on() {
		$time_string = '<span class="fas fa-calendar-day"></span><time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( is_user_logged_in() ) {
			// Modify the time stamp to include both sets of dates if there is a user logged in.
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<span class="fas fa-calendar-day"></span><time class="entry-date published" datetime="%1$s">%2$s</time>  <time class="updated text-gray-4 pl-1" datetime="%3$s"> (Last updated: %4$s) </time>';
			}
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on   = apply_filters(
			'uds_wp_posted_on',
			sprintf(
				'<span class="posted-on">%1$s</span>',
				apply_filters( 'uds_wp_posted_on_time', $time_string )
			)
		);
		echo $posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'uds_wp_entry_footer' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function uds_wp_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			 // Translators: used between list items, there is a space after the comma.
			$categories_list = preg_replace( '/<a /', '<a class="btn btn-tag btn-tag-alt-white"', get_the_category_list( ' ' ) );

			if ( $categories_list && uds_wp_categorized_blog() ) {
				if ( ! is_single() ) {
					printf( '<div class="card-tags">%s</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				} else {
					printf( '<div class="category-tags">%s</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'uds-wordpress-theme' ) );
			if ( $tags_list ) {
				/* translators: %s: Tags of current post */
				printf( '<div class="tags-links"><span class="fas fa-tags" title="Tags"></span>%s</div>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'uds-wordpress-theme' ), esc_html__( '1 Comment', 'uds-wordpress-theme' ), esc_html__( '% Comments', 'uds-wordpress-theme' ) );
			echo '</span>';
		}
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'uds-wordpress-theme' ),
				the_title( '<span class="sr-only">"', '"</span>', false )
			),
			'<div class="edit-link my-1">',
			'</div>'
		);
	}
}

if ( ! function_exists( 'uds_wp_categorized_blog' ) ) {
	/**
	 * Returns true if a blog has more than 1 category.
	 *
	 * @return bool
	 */
	function uds_wp_categorized_blog() {
		$all_the_cool_cats = get_transient( 'uds_wp_categories' );
		if ( false === $all_the_cool_cats ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories(
				array(
					'fields'     => 'ids',
					'hide_empty' => 1,
					// We only need to know if there is more than one category.
					'number'     => 2,
				)
			);
			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );
			set_transient( 'uds_wp_categories', $all_the_cool_cats );
		}
		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so uds_wp_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so uds_wp_categorized_blog should return false.
			return false;
		}
	}
}

add_action( 'edit_category', 'uds_wp_category_transient_flusher' );
add_action( 'save_post', 'uds_wp_category_transient_flusher' );

if ( ! function_exists( 'uds_wp_category_transient_flusher' ) ) {
	/**
	 * Flush out the transients used in uds_wp_categorized_blog.
	 */
	function uds_wp_category_transient_flusher() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		// Like, beat it. Dig?
		delete_transient( 'uds_wp_categories' );
	}
}

if ( ! function_exists( 'uds_wp_body_attributes' ) ) {
	/**
	 * Displays the attributes for the body element.
	 */
	function uds_wp_body_attributes() {
		/**
		 * Filters the body attributes.
		 *
		 * @param array $atts An associative array of attributes.
		 */
		$atts = array_unique( apply_filters( 'uds_wp_body_attributes', $atts = array() ) );
		if ( ! is_array( $atts ) || empty( $atts ) ) {
			return;
		}
		$attributes = '';
		foreach ( $atts as $name => $value ) {
			if ( $value ) {
				$attributes .= sanitize_key( $name ) . '="' . esc_attr( $value ) . '" ';
			} else {
				$attributes .= sanitize_key( $name ) . ' ';
			}
		}
		echo trim( $attributes ); // phpcs:ignore WordPress.Security.EscapeOutput
	}
}

if ( ! function_exists( 'uds_assign_featured_image' ) ) {
	/**
	 * Assign default featured image to each post
	 * Get the first core/image block and assign it as a featured image if the field is empty
	 * if no core/image then get the featured image of the primary category and assign it to the post .
	 */
	function uds_assign_featured_image() {
		global $post;
		$attached_image_id = '';

		// Check to see if the post object exists and if there is a featured image.
		// Post object won't exist at all until the first save.
		if ( ( is_object( $post ) ) && ( ! has_post_thumbnail( $post->ID ) ) ) {

			// Scan the post content, identify the first core/image block found and assign to featured image.
			if ( has_blocks( $post->post_content ) ) {

				$blocks = parse_blocks( $post->post_content );
				foreach ( $blocks as $value ) {
					if ( 'core/image' == $value['blockName'] ) {
						$attached_image_id = $value['attrs']['id'];
						break;
					}
				}
			}

			// If we found a suitable image, assign it as the featured image.
			// Then bail early.
			if ( ! empty( $attached_image_id ) ) {
				set_post_thumbnail( $post->ID, $attached_image_id );
				return;
			}

			// Still here. Next, let's look for a featured category.
			// That's a specific feature from Yoast SEO, so we'll look for the function first.

			if ( function_exists( 'yoast_get_primary_term_id' ) ) {

				// Returns false if there is no primary category set.
				$primary_category_id = yoast_get_primary_term_id( 'category', $post->ID );

				// Get the ACF image field assigned to the featured category and assign it to the post.
				if ( $primary_category_id ) {

					$primary_category_term = get_term( $primary_category_id );
					$hero_asset_data = get_field( 'hero_asset_file', $primary_category_term );

					// Check to see if there is an image in the field from ACF.
					if ( ! empty( $hero_asset_data ) ) {
						set_post_thumbnail( $post->ID, $hero_asset_data['ID'] );
					}               
				}           
			}       
		}

	}
	add_action( 'save_post', 'uds_assign_featured_image' );
	add_action( 'draft_to_publish', 'uds_assign_featured_image' );
	add_action( 'new_to_publish', 'uds_assign_featured_image' );
	add_action( 'pending_to_publish', 'uds_assign_featured_image' );
	add_action( 'future_to_publish', 'uds_assign_featured_image' );
}
