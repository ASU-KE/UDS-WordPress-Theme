<?php
/**
 * Block Registration
 *
 * Block name: Button
 * Author: Justin Hollloway
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
		'name'              => 'uds-button', // internal name, like a slug.
		'title'             => __( 'UDS Button', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'A button block for the UDS.', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => 'button', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/uds-button/uds-button.php', // location of the block's template.
		'category'          => 'layout', // category this block appears in.
		'keywords'          => array( 'button', 'link' ),
		'supports'          => array(
			'align' => false, // Remove the align button in the editor toolbar.
		),
		'mode'              => 'edit', // make this block default to full edit mode when added to the page.
		'example'  => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'title'                   => 'A UDS Button Block',
					'background_style'        => 'network-white',
					'container_type'          => 'container-fluid',
					'add_inner_container'     => true,
					'content'                 => 'Lorem ipsum sit dolor amet.',
				),
			),
		),
	)
);
