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
 * Loops through an array of block folder names and includes the 'register.php'
 * from within each one.
 *
 * When creating a new block, add the folder name to the $block_includes array
 * below. The folder should contain a 'register.php' file that does the actual
 * block registration, along with your block template(s).
 *
 * Note: Blocks appear in the block picker IN THE ORDER THEY ARE LISTED HERE.
 * When adding a new block, please make sure to insert it an alphabetical order.
 */
function my_acf_blocks_init() {
	// Check to see if we have ACF Pro for block support.
	if ( function_exists( 'acf_register_block_type' ) ) {

		// Array of block folders to use. Each must have a 'register.php' file.
		$block_includes = array(
			'/alert',
			'/background-section', // UDS Background section.
			'/banner',             // UDS banner block.
			'/blockquote',         // Combination of UDS block quote and testimonial.
			'/button',             // Button block for UDS theme.
			'/content-sections',   // Miscellaneous content sections.
			'/foldable-card',      // UDS Foldable card block.
			'/grid-links',         // UDS Grid Links.
			'/headings',           // A UDS Headings block.
			'/image',              // UDS Image block with caption and shadow options.
			'/modals',             // UDS windows modal block.
			'/overlay-card',       // UDS Program Cards.
			'/profile', // Individual person profile (non-iSearch).
			'/show-more',          // Show more button.
			'/tabbed-panels',      // UDS Tabbed panels block.
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
	register_block_type( get_template_directory() . '/templates-blocks/cards' );
	register_block_type( get_template_directory() . '/templates-blocks/hero-video' );
}
