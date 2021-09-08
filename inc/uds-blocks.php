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
			'/modals', // UDS windows modal block.
			'/banner', // UDS banner block.
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


add_filter( 'render_block', 'wrap_table_block', 10, 2 );
function wrap_table_block( $block_content, $block ) {
  if ( 'core/image' === $block['blockName'] ) {
		$block_content = str_replace('wp-block-image', 'uds-figure figure', $block_content);
		$block_content = str_replace('<figcaption>', '<figcaption class="uds-figure-caption figure-caption"><span class="uds-caption-text">', $block_content);
		$block_content = str_replace('</figcaption>', '</span></figcaption>', $block_content);
		$block_content = str_replace('wp-image-', 'uds-img figure-img img-fluid wp-image-', $block_content);
    $block_content = '<div class="uds-img uds-img-drop-shadow">' . $block_content . '</div>';
  }
  return $block_content;
}

/*add_action('init', function() {
    register_block_type('core/image', array(
      'render_callback' => function($attributes, $content) {

        $new_content = "<div class='uds-img uds-img-drop-shadow'><figure class='uds-figure figure'>";

        if ($attributes['ids']) {


          //$src    = wp_get_attachment_url($attachment_id);
          //$srcset = wp_get_attachment_image_srcset($attachment_id, $attributes['sizeSlug'], null);
          //$sizes  = wp_get_attachment_image_sizes($attachment_id, $attributes['sizeSlug'], null);

        //  $new_content .= "<li class='blocks-gallery-item'><figure><input type='checkbox' name='wp-image-{$attachment_id}' id='wp-image-{$attachment_id}' /><div class='gallery-item-modal'><label for='wp-image-{$attachment_id}'><img src='{$src}' alt='' /></label></div><label for='wp-image-{$attachment_id}'><img src='{$src}' data-id='{$attachment_id}' data-full-url='{$src}' data-link='' srcset='{$srcset}' sizes='{$sizes}' class='wp-image-{$attachment_id}' alt='' /></label></figure></li>";
        }

        $new_content .= '</figure>';

        return $new_content;
      },
    ));
  }, 10, 1);*/
