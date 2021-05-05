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

function prefix_auto_featured_image() {
    global $post;
		$attached_image_id="";
    if (!has_post_thumbnail($post->ID)) {

			if ( has_blocks( $post->post_content ) ) {
			    $blocks = parse_blocks( $post->post_content );
			        foreach ( $blocks as $value ) {

			          if($value['blockName']=='core/image'){

									$attached_image_id= $value['attrs']['id'];
									break;

			          }

			         }
			      }

      if ($attached_image_id) {

                   set_post_thumbnail($post->ID, $attached_image_id);

         }
    }
}
add_action('the_post', 'prefix_auto_featured_image');
add_action('save_post', 'prefix_auto_featured_image');
add_action('draft_to_publish', 'prefix_auto_featured_image');
add_action('new_to_publish', 'prefix_auto_featured_image');
add_action('pending_to_publish', 'prefix_auto_featured_image');
add_action('future_to_publish', 'prefix_auto_featured_image');





/*
function mandatory_excerpt($data) {
  $excerpt = $data['post_excerpt'];

  if (empty($excerpt)) {
    if ($data['post_status'] === 'publish') {
      add_filter('redirect_post_location', 'excerpt_error_message_redirect', '99');
    }

    $data['post_status'] = 'draft';
  }

  return $data;
}

add_filter('wp_insert_post_data', 'mandatory_excerpt');

function excerpt_error_message_redirect($location) {
  //remove_filter('redirect_post_location', __FILTER__, '99');
	$location = str_replace('&message=6', '', $location);
  return add_query_arg('excerpt_required', 1, $location);
}

function excerpt_admin_notice() {
  if (!isset($_GET['excerpt_required'])) return;

  switch (absint($_GET['excerpt_required'])) {
    case 1:
      $message = 'Excerpt is required to publish a post.';
      break;
    default:
      $message = 'Unexpected error';
  }

  echo '<div id="notice" class="error"><p>' . $message . '</p></div>';
}

add_action('admin_notices', 'excerpt_admin_notice');
*/
