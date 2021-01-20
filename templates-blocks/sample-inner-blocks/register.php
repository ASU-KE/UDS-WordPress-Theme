<?php
/**
 * Block Registration
 *
 * Block name: Sample
 * Author: Walt
 * Version: 1.0
 *
 * @package UDS WordPress Theme
 *
 * Notes: A simple block, for demonstration purposes, that creates a stylized message
 * across the entire content area. This block is attempting to use the settings we are
 * most likely to want, but you can find all of the available settings in the ACF
 * documentation here:
 * https://www.advancedcustomfields.com/resources/acf_register_block_type/
 *
 * Note: for the icon, you can use any Dashicon:
 * https://developer.wordpress.org/resource/dashicons, OR an actual <SVG></SVG> tag
 * with all the required content. In this example, I'm using a dashicon.
 */

acf_register_block_type(
	array(
		'name'              => 'sample-inner-blocks', // internal name, like a slug.
		'title'             => __( 'Sample with Inner Blocks', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'A sample block using the Inner Blocks feature', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => 'table-row-after', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/sample-inner-blocks/sample-inner-blocks.php', // location of the block's template.
		'category'          => 'layout', // category this block appears in.
		'keywords'          => array( 'callout', 'quote', 'text' ),
		'supports'          => array(
			'align'         => false, // Remove the block align button in the editor toolbar.
			'jsx'           => true, // Support JSX tags, such as <InnerBlocks />.
			'mode'          => false, // Turns off the mode-switching button (this block wants to be in preview).
		),
		'mode'              => 'preview', // make this block default to full edit mode when added to the page.
		'example'  => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'background_pattern'        => 'network',
					'background_color_variant'  => 'white',
				),
			),
		),
	)
);
