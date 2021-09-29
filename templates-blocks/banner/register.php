<?php
/**
 * Block Registration
 *
 * Block name: Banner
 * Author: Walter McConnell
 * Version: 1.0
 *
 * @package UDS WordPress Theme
 *
 * A block for creating a dynamic UDS banner (such as a COVID banner)
 */

acf_register_block_type(
	array(
		'name'              => 'uds-banner', // internal name, like a slug.
		'title'             => __( 'UDS Banner', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'A UDS compliant banner, with customizable text and styles.', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => 'info-outline', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/banner/banner.php', // location of the block's template.
		'category'          => 'uds', // category this block appears in.
		'keywords'          => array( 'banner', 'message', 'text' ),
		'supports'          => array(
			'align' => false, // Remove the align button in the editor toolbar.
		),
		'mode'              => 'preview', // make this block default to full edit mode when added to the page.
		'example'  => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'alert_style'   => 'info',
					'alert_content' => 'Your alert text here.',
				),
			),
		),
	)
);
