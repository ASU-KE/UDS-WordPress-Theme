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
 * Register a custom block category for our blocks to live in. We hook into
 * the block_categories_all() filter to do this.
 */
if ( ! function_exists( 'uds_custom_category' ) ) {
	/**
	 * Merges our custom category in with the others.
	 *
	 * @param array                   $categories The existing block categories.
	 * @param WP_Block_Editor_Context $editor_context Editor context.
	 */
	function uds_custom_category( $categories, $editor_context ) {
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
add_filter( 'block_categories_all', 'uds_custom_category', 10, 2 );




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
		unset( $registered_blocks['core/file'] );
		unset( $registered_blocks['core/button'] );
		unset( $registered_blocks['core/buttons'] );
		unset( $registered_blocks['core/column'] );
		unset( $registered_blocks['core/columns'] );


		// Strip the array down to just the keys.
		$registered_blocks = array_keys( $registered_blocks );

		return $registered_blocks;
	}

	add_filter( 'allowed_block_types_all', 'uds_wordpress_unregister_native_blocks' );
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
 * Using new API to register ACF blocks with block.json in each block directory
 */
add_action( 'init', 'register_acf_blocks', 5 );
function register_acf_blocks() {
	register_block_type( get_template_directory() . '/templates-blocks/alert' );
	register_block_type( get_template_directory() . '/templates-blocks/background-section' );
	register_block_type( get_template_directory() . '/templates-blocks/banner' );
	register_block_type( get_template_directory() . '/templates-blocks/blockquote' );
	register_block_type( get_template_directory() . '/templates-blocks/button' );
	register_block_type( get_template_directory() . '/templates-blocks/cards' );
	register_block_type( get_template_directory() . '/templates-blocks/content-sections' );
	register_block_type( get_template_directory() . '/templates-blocks/foldable-card' );
	register_block_type( get_template_directory() . '/templates-blocks/grid-links' );
	register_block_type( get_template_directory() . '/templates-blocks/headings' );
	register_block_type( get_template_directory() . '/templates-blocks/image' );
	register_block_type( get_template_directory() . '/templates-blocks/modals' );
	register_block_type( get_template_directory() . '/templates-blocks/overlay-card' );
	register_block_type( get_template_directory() . '/templates-blocks/profile' );
	register_block_type( get_template_directory() . '/templates-blocks/show-more' );
	register_block_type( get_template_directory() . '/templates-blocks/tabbed-panels' );
}
