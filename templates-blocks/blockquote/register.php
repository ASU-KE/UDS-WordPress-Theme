<?php
/**
 * Block Registration
 *
 * Block name: Blockquote
 * Author: Walt
 * Version: 1.0
 *
 * @package UDS WordPress Theme
 *
 * Notes: A blockquote to be used within the UDS Wordpress theme. This block is attempting to use the settings we are
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
		'name'              => 'blockquote', // internal name, like a slug.
		'title'             => __( 'UDS Blockquote', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'A blockquote block to be used in the UDS theme', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => 'format-quote', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/blockquote/blockquote.php', // location of the block's template.
		'category'          => 'layout', // category this block appears in.
		'keywords'          => array( 'callout', 'quote', 'text' ),
		'supports'          => array(
			'align' => false, // Remove the align button in the editor toolbar.
		),
		'mode'              => 'edit', // make this block default to full edit mode when added to the page.
		'example'  => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'title'                   => 'A Block Quote Block',
					'background_style'        => 'network-white',
					'container_type'          => 'container-fluid',
					'add_inner_container'     => true,
					'content'                 => 'Lorem ipsum sit dolor amet.',
				),
			),
		),
	)
);
