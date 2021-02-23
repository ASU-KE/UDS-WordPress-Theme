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
		'name'              => 'alert', // internal name, like a slug.
		'title'             => __( 'Alert Block', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'UDS alert block.', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => 'welcome-comments', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/alert/alert.php', // location of the block's template.
		'category'          => 'layout', // category this block appears in.
		'keywords'          => array( 'alert', 'message', 'text' ),
		'supports'          => array(
			'align' => false, // Remove the align button in the editor toolbar.
		),
		'mode'              => 'edit', // make this block default to full edit mode when added to the page.
		'example'  => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'alert_style'   => 'info',
					'alert_content' => 'Hello World!',
				),
			),
		),
	)
);
