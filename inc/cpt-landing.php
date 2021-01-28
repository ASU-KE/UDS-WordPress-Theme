<?php
/**
 * Creates a custom post type for this theme called Landing Pages.
 * slug: landing
 *
 * Also handles some additional things like permalink rewriting for the new CPT.
 * Reference: https://gist.github.com/wpexplorer/9745717
 *
 * @package uds-wordpress-theme
 */

 // Register Custom Post Type
function uds_wordpress_register_landing_cpt() {

	$labels = array(
		'name'                  => _x( 'Landing Pages', 'Post Type General Name', 'uds_wordpress_theme' ),
		'singular_name'         => _x( 'Landing Page', 'Post Type Singular Name', 'uds_wordpress_theme' ),
		'menu_name'             => __( 'Landing Pages', 'uds_wordpress_theme' ),
		'name_admin_bar'        => __( 'Landing Page', 'uds_wordpress_theme' ),
		'archives'              => __( 'Landing Page Archives', 'uds_wordpress_theme' ),
		'attributes'            => __( 'Landing Page Attributes', 'uds_wordpress_theme' ),
		'parent_item_colon'     => __( 'Parent Page:', 'uds_wordpress_theme' ),
		'all_items'             => __( 'All Landing Pages', 'uds_wordpress_theme' ),
		'add_new_item'          => __( 'Add New Page', 'uds_wordpress_theme' ),
		'add_new'               => __( 'Add New', 'uds_wordpress_theme' ),
		'new_item'              => __( 'New Landing Page', 'uds_wordpress_theme' ),
		'edit_item'             => __( 'Edit Landing Page', 'uds_wordpress_theme' ),
		'update_item'           => __( 'Update Landing Page', 'uds_wordpress_theme' ),
		'view_item'             => __( 'View Landing Page', 'uds_wordpress_theme' ),
		'view_items'            => __( 'View Landing Pages', 'uds_wordpress_theme' ),
		'search_items'          => __( 'Search Landing Pages', 'uds_wordpress_theme' ),
		'not_found'             => __( 'Not found', 'uds_wordpress_theme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'uds_wordpress_theme' ),
		'featured_image'        => __( 'Featured Image', 'uds_wordpress_theme' ),
		'set_featured_image'    => __( 'Set featured image', 'uds_wordpress_theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'uds_wordpress_theme' ),
		'use_featured_image'    => __( 'Use as featured image', 'uds_wordpress_theme' ),
		'insert_into_item'      => __( 'Insert into landing page', 'uds_wordpress_theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this page', 'uds_wordpress_theme' ),
		'items_list'            => __( 'Pages list', 'uds_wordpress_theme' ),
		'items_list_navigation' => __( 'Pages list navigation', 'uds_wordpress_theme' ),
		'filter_items_list'     => __( 'Filter pages list', 'uds_wordpress_theme' ),
	);
	$args = array(
		'label'                 => __( 'Landing Page', 'uds_wordpress_theme' ),
		'description'           => __( 'A template with no pre-defined layouts', 'uds_wordpress_theme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields', 'page-attributes' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-airplane',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'landing', $args );

}
add_action( 'init', 'uds_wordpress_register_landing_cpt', 0 );

// /**
//  * 	Removes the custom post type slug for CPT "landing."
//  *  Reference: https://wordpress.stackexchange.com/a/204210/69368
//  */

// function uds_wordpress_remove_cpt_slug( $post_link, $post, $leavename ) {

//     if ( 'landing' != $post->post_type || 'publish' != $post->post_status ) {
//         return $post_link;
//     }

//     $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

//     return $post_link;
// }
// add_filter( 'post_type_link', 'uds_wordpress_remove_cpt_slug', 10, 3 );

// /**
//  * 	Handles all rewrite cases for collisions between CPT "landing" and normal pages.
//  *  Reference: https://wordpress.stackexchange.com/a/204210/69368
//  */

// function uds_wordpress_change_cpt_slug_struct( $query ) {

//     if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
//         return;
//     }

//     if ( ! empty( $query->query['name'] ) ) {
//         $query->set( 'post_type', array( 'post', 'landing', 'page' ) );
//     } elseif ( ! empty( $query->query['pagename'] ) && false === strpos( $query->query['pagename'], '/' ) ) {
//         $query->set( 'post_type', array( 'post', 'landing', 'page' ) );

//         // We also need to set the name query var since redirect_guess_404_permalink() relies on it.
//         $query->set( 'name', $query->query['pagename'] );
//     }
// }
// add_action( 'pre_get_posts', 'uds_wordpress_change_cpt_slug_struct' );
