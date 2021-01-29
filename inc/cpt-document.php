<?php
/**
 * Creates a custom post type for this theme called Landing Pages.
 *
 * Also handles some additional things like permalink rewriting for the new CPT.
 * Reference: https://gist.github.com/wpexplorer/9745717
 *
 * @package uds-wordpress-theme
 */

// Register Custom Post Type
function uds_wordpress_register_docs_cpt() {

	$labels = array(
		'name'                  => _x( 'Documents', 'Post Type General Name', 'uds_wordpress_theme' ),
		'singular_name'         => _x( 'Document', 'Post Type Singular Name', 'uds_wordpress_theme' ),
		'menu_name'             => __( 'Documents', 'uds_wordpress_theme' ),
		'name_admin_bar'        => __( 'Document', 'uds_wordpress_theme' ),
		'archives'              => __( 'Document Archives', 'uds_wordpress_theme' ),
		'attributes'            => __( 'Document Attributes', 'uds_wordpress_theme' ),
		'parent_item_colon'     => __( 'Parent Document:', 'uds_wordpress_theme' ),
		'all_items'             => __( 'All Documents', 'uds_wordpress_theme' ),
		'add_new_item'          => __( 'Add New Document', 'uds_wordpress_theme' ),
		'add_new'               => __( 'Add New', 'uds_wordpress_theme' ),
		'new_item'              => __( 'New Document', 'uds_wordpress_theme' ),
		'edit_item'             => __( 'Edit Document', 'uds_wordpress_theme' ),
		'update_item'           => __( 'Update Document', 'uds_wordpress_theme' ),
		'view_item'             => __( 'View Document', 'uds_wordpress_theme' ),
		'view_items'            => __( 'View Documents', 'uds_wordpress_theme' ),
		'search_items'          => __( 'Search Documents', 'uds_wordpress_theme' ),
		'not_found'             => __( 'Not found', 'uds_wordpress_theme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'uds_wordpress_theme' ),
		'featured_image'        => __( 'Featured Image', 'uds_wordpress_theme' ),
		'set_featured_image'    => __( 'Set featured image', 'uds_wordpress_theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'uds_wordpress_theme' ),
		'use_featured_image'    => __( 'Use as featured image', 'uds_wordpress_theme' ),
		'insert_into_item'      => __( 'Insert into document', 'uds_wordpress_theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this document', 'uds_wordpress_theme' ),
		'items_list'            => __( 'Documents list', 'uds_wordpress_theme' ),
		'items_list_navigation' => __( 'Documents list navigation', 'uds_wordpress_theme' ),
		'filter_items_list'     => __( 'Filter documents list', 'uds_wordpress_theme' ),
	);
	$args = array(
		'label'                 => __( 'Document', 'uds_wordpress_theme' ),
		'description'           => __( 'A post type intended for documentation purposes.', 'uds_wordpress_theme' ),
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
		'rewrite' 				=> array('slug' => 'docs'),
	);
	register_post_type( 'document', $args );

}
add_action( 'init', 'uds_wordpress_register_docs_cpt', 0 );
