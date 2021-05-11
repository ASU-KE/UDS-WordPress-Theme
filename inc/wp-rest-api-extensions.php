<?php
 /**
  *  WP REST API Featured Images
  *
  *  Adds featured images to the REST API output for all public post types
  *  that support thumbnails.
  *
  *  source credit: https://github.com/BraadMartin/better-rest-api-featured-images
  *
  * @package uds-wordpress-theme
  */

/**
 * Register our featured_image field to all public post types
 * that support post thumbnails.
 *
 * @since  1.0.0
 */
function uds_rest_api_featured_images_init() {

	$post_types = get_post_types( array( 'public' => true ), 'objects' );

	foreach ( $post_types as $post_type ) {

		$post_type_name     = $post_type->name;
		$show_in_rest       = ( isset( $post_type->show_in_rest ) && $post_type->show_in_rest ) ? true : false;
		$supports_thumbnail = post_type_supports( $post_type_name, 'thumbnail' );

		// Only proceed if the post type is set to be accessible over the REST API
		// and supports featured images.
		if ( $show_in_rest && $supports_thumbnail ) {

			// Compatibility with the REST API v2 beta 9+.
			if ( function_exists( 'register_rest_field' ) ) {
				register_rest_field(
					$post_type_name,
					'uds_featured_image',
					array(
						'get_callback' => 'uds_rest_api_featured_images_get_field',
						'schema'       => null,
					)
				);
			} elseif ( function_exists( 'register_api_field' ) ) {
				register_api_field(
					$post_type_name,
					'uds_featured_image',
					array(
						'get_callback' => 'uds_rest_api_featured_images_get_field',
						'schema'       => null,
					)
				);
			}
		}
	}
}
add_action( 'init', 'uds_rest_api_featured_images_init', 12 );

/**
 * Return the featured_image field.
 *
 * @since   1.0.0
 *
 * @param   object $object      The response object.
 * @param   string $field_name  The name of the field to add.
 * @param   object $request     The WP_REST_Request object.
 *
 * @return  object|null
 */
function uds_rest_api_featured_images_get_field( $object, $field_name, $request ) {

	// Only proceed if the post has a featured image.
	if ( ! empty( $object['featured_media'] ) ) {
		$image_id = (int) $object['featured_media'];
	} elseif ( ! empty( $object['featured_image'] ) ) {
		// This was added for backwards compatibility with < WP REST API v2 Beta 11.
		$image_id = (int) $object['featured_image'];
	} else {
		return null;
	}

	$image = get_post( $image_id );

	if ( ! $image ) {
		return null;
	}

	// This is taken from WP_REST_Attachments_Controller::prepare_item_for_response().
	$featured_image['id']            = $image_id;
	$featured_image['alt_text']      = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
	$featured_image['caption']       = $image->post_excerpt;
	$featured_image['description']   = $image->post_content;
	$featured_image['media_type']    = wp_attachment_is_image( $image_id ) ? 'image' : 'file';
	$featured_image['media_details'] = wp_get_attachment_metadata( $image_id );
	$featured_image['post']          = ! empty( $image->post_parent ) ? (int) $image->post_parent : null;
	$featured_image['source_url']    = wp_get_attachment_url( $image_id );

	if ( empty( $featured_image['media_details'] ) ) {
		$featured_image['media_details'] = new stdClass();
	} elseif ( ! empty( $featured_image['media_details']['sizes'] ) ) {
		$img_url_basename = wp_basename( $featured_image['source_url'] );
		foreach ( $featured_image['media_details']['sizes'] as $size => &$size_data ) {
			$image_src = wp_get_attachment_image_src( $image_id, $size );
			if ( ! $image_src ) {
				continue;
			}
			$size_data['source_url'] = $image_src[0];
		}
	} elseif ( is_string( $featured_image['media_details'] ) ) {
		// This was added to work around conflicts with plugins that cause
		// wp_get_attachment_metadata() to return a string.
		$featured_image['media_details'] = new stdClass();
		$featured_image['media_details']->sizes = new stdClass();
	} else {
		$featured_image['media_details']['sizes'] = new stdClass();
	}

	return apply_filters( 'uds_rest_api_featured_image', $featured_image, $image_id );
}

/**
 * Register the ACF post author fields to add them to the /post API endpoint.
 *
 * @see https://since1979.dev/add-custom-acf-fields-to-the-wp-rest-api/
 * @uses register_rest_field() https://developer.wordpress.org/reference/functions/register_rest_field/
 * @uses array() https://www.php.net/manual/en/function.array.php
 */
function uds_register_news_author_api_fields() {
	register_rest_field(
		'post',
		'uds_news_author',
		array(
			'get_callback' => 'uds_get_news_author_api_field',
			'schema' => null,
		)
	);
}
add_action( 'rest_api_init', 'uds_register_news_author_api_fields' );

/**
 * Fetch and return the value of the uds_news_author ACF fields.
 *
 * @param   object $post      The Post object.
 *
 * @see https://since1979.dev/add-custom-acf-fields-to-the-wp-rest-api/
 * @uses get_field() https://www.advancedcustomfields.com/resources/get_field/
 */
function uds_get_news_author_api_field( $post ) {
	$uds_news_author_name = get_field( 'uds_news_author_name', $post['id'] );
	$uds_news_author_title = get_field( 'uds_news_author_title', $post['id'] );
	$uds_news_author_email = get_field( 'uds_news_author_email', $post['id'] );
	$uds_news_author_phone = get_field( 'uds_news_author_phone', $post['id'] );

	if (
		empty( $uds_news_author_name ) &&
		empty( $uds_news_author_title ) &&
		empty( $uds_news_author_email ) &&
		empty( $uds_news_author_phone )
	) {
		return null;
	}

	return array(
		'name' => $uds_news_author_name,
		'title' => $uds_news_author_title,
		'email' => $uds_news_author_email,
		'phone' => $uds_news_author_phone,
	);
}

/**
 * Register the ACF Story Hero fields for the /post API endpoint.
 *
 * @see https://since1979.dev/add-custom-acf-fields-to-the-wp-rest-api/
 * @uses register_rest_field() https://developer.wordpress.org/reference/functions/register_rest_field/
 * @uses array() https://www.php.net/manual/en/function.array.php
 */
function uds_register_post_story_hero_api_fields() {
	register_rest_field(
		'post',
		'uds_story_hero',
		array(
			'get_callback' => 'uds_get_post_story_hero_api_field',
			'schema' => null,
		)
	);
}
add_action( 'rest_api_init', 'uds_register_post_story_hero_api_fields' );

/**
 * Fetch and return the value of the uds_news_author ACF fields.
 *
 * @param   object $post      The Post object.
 *
 * @see https://since1979.dev/add-custom-acf-fields-to-the-wp-rest-api/
 * @uses get_field() https://www.advancedcustomfields.com/resources/get_field/
 */
function uds_get_post_story_hero_api_field( $post ) {
	$uds_story_hero_background_choice     = get_field( 'uds_story_hero_background_choice', $post['id'] );
	$uds_story_hero_background_color      = get_field( 'uds_story_hero_background_color', $post['id'] );
	$uds_story_hero_background_image      = get_field( 'uds_story_hero_background_image', $post['id'] );
	$uds_story_hero_background_image_size = get_field( 'uds_story_hero_background_image_size', $post['id'] );

	if (
		empty( $uds_story_hero_background_choice ) &&
		empty( $uds_story_hero_background_color ) &&
		empty( $uds_story_hero_background_image ) &&
		empty( $uds_story_hero_background_image_size )
	) {
		return null;
	}

	return array(
		'background_choice'     => $uds_story_hero_background_choice,
		'background_color'      => $uds_story_hero_background_color,
		'background_image'      => $uds_story_hero_background_image,
		'background_image_size' => $uds_story_hero_background_image_size,
	);
}
