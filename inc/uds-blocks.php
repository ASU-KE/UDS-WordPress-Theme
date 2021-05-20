<?php
/**
 * File: uds-blocks.php
 *
 * @package UDS WordPress Theme
 *
 * This file is responsible for loading all of our block 'register.php' files
 * (found in the individual block folders) so that we can register our custom
 * blocks. We do this by hooking into ACF Pro's 'acf/init' action.
 */

/**
 * Register a custom block category for our blocks to live in.
 */
if ( ! function_exists( 'uds_custom_category' ) ) {
	/**
	 * Merges our custom category in with the others.
	 *
	 * @param array   $categories The existing block categories.
	 * @param WP_Post $post The current Post.
	 */
	function uds_custom_category( $categories, $post ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug' => 'uds',
					'title' => __( 'UDS', 'uds-wordpress-theme' ),
				),
			)
		);
	}
}
add_filter( 'block_categories', 'uds_custom_category', 10, 2 );

/**
 * Loops through an array of block folder names and includes the 'register.php'
 * from within each one.
 *
 * When creating a new block, add the folder name to the $block_includes array
 * below. The folder should contain a 'register.php' file that does the actual
 * block registration, along with your block template(s).
 */
function my_acf_blocks_init() {
	// Check to see if we have ACF Pro for block support.
	if ( function_exists( 'acf_register_block_type' ) ) {

		// Array of block folders to use. Each must have a 'register.php' file.
		$block_includes = array(
			'/blockquote', // Combination of UDS block quote and testimonial.
			'/alert',
			'/button', // Button block for UDS theme.
			'/cards', // UDS Cards.
			'/content-sections', // Miscellaneous content sections.
			'/headings', // A UDS Headings block.
			'/overlay-card', // UDS Program Cards.
			'/background-section', // UDS Background section.
			'/program-card', // UDS Program Cards.
			'/tabs', // UDS Tabs.
		);

		// Loop through array items and include each register file.
		foreach ( $block_includes as $folder ) {
			require_once get_template_directory() . '/templates-blocks' . $folder . '/register.php';
		}
	}
}
add_action( 'acf/init', 'my_acf_blocks_init' );


/**
 * The following function unregisters a few of the WordPress native blocks that
 * we will not be supporting in this theme.
 *
 * It fires after other plugins and the above block init function add their blocks
 * to the WP registry. Using those entries, it filters the list, removing the unsupported
 * blocks and returning a smaller array.
 *
 * Overwritable by a child theme.
 */

if ( ! function_exists( 'uds_wordpress_unregister_native_blocks' ) ) {

	/**
	 * Gather the list of registered blocks, remove elements from the returned array.
	 */
	function uds_wordpress_unregister_native_blocks() {
		// Get the list of registered blocks including those added by plugins.
		$registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

		// Removing native blocks from the "text" category.
		unset( $registered_blocks['core/verse'] );
		unset( $registered_blocks['core/pullquote'] );
		unset( $registered_blocks['core/preformatted'] );
		unset( $registered_blocks['core/cover'] );
		unset( $registered_blocks['core/file'] );
		unset( $registered_blocks['core/button'] );
		unset( $registered_blocks['core/buttons'] );
		unset( $registered_blocks['core/column'] );
		unset( $registered_blocks['core/columns'] );


		// Strip the array down to just the keys.
		$registered_blocks = array_keys( $registered_blocks );

		return $registered_blocks;
	}

	add_filter( 'allowed_block_types', 'uds_wordpress_unregister_native_blocks' );
}

// Deregister the core WordPress block patterns.
if ( ! function_exists( 'remove_core_patterns' ) ) {
	/**
	 * Removes theme support for 'core-block-patterns', which removes
	 * ALL core block patterns from the editor.
	 */
	function remove_core_patterns() {
		remove_theme_support( 'core-block-patterns' );
	}
	add_action( 'after_setup_theme', 'remove_core_patterns' );
}

/**
 * Automatically sync any JSON field configuration.
 * Courtesy of Delicious Brains and a developer blog post:
 * https://gist.github.com/polevaultweb/32056461d1e4b85426211d2e5f85a3eb
 * https://deliciousbrains.com/advanced-custom-fields-wordpress/
 */
function uds_sync_acf_fields_with_json() {
	if ( defined( 'DOING_AJAX' ) || defined( 'DOING_CRON' ) ) {
		return;
	}

	if ( ! function_exists( 'acf_get_field_groups' ) ) {
		return;
	}

	$groups = acf_get_field_groups();

	if ( empty( $groups ) ) {
		return;
	}

	$sync = array();

	foreach ( $groups as $group ) {
		$local    = acf_maybe_get( $group, 'local', false );
		$modified = acf_maybe_get( $group, 'modified', 0 );
		$private  = acf_maybe_get( $group, 'private', false );

		if ( 'json' !== $local || $private ) {
			// ignore DB / PHP / private field groups.
			continue;
		}

		if ( ! $group['ID'] ) {
			$sync[ $group['key'] ] = $group;
		} elseif ( $modified && $modified > get_post_modified_time( 'U', true, $group['ID'], true ) ) {
			$sync[ $group['key'] ] = $group;
		}
	}

	if ( empty( $sync ) ) {
		return;
	}

	foreach ( $sync as $key => $v ) {
		if ( acf_have_local_fields( $key ) ) {
			$sync[ $key ]['fields'] = acf_get_local_fields( $key );
		}

		acf_import_field_group( $sync[ $key ] );
	}
}
add_action( 'admin_init', 'uds_sync_acf_fields_with_json' );
