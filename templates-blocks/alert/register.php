<?php
/**
 * Block Registration
 *
 * Block name: Sample
 * Author: Earl Alexander, Walter McConnell
 * Version: 1.0
 *
 * @package UDS WordPress Theme
 *
 * A block for creating a static alert. It can be any one of the four approved
 * styles: alert, success, information, or error.
 */

acf_register_block_type(
	array(
		'name'              => 'uds-alert', // internal name, like a slug.
		'title'             => __( 'UDS Alert', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'A UDS compliant alert banner, with customizable text and styles.', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => 'warning', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/alert/alert.php', // location of the block's template.
		'category'          => 'uds', // category this block appears in.
		'keywords'          => array( 'alert', 'message', 'banner' ),
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
