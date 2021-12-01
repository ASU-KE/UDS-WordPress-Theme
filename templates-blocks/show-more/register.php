<?php
/**
 * Block Registration
 *
 * Block name: Show More Button Block
 * Author: Zainab Alsidiki
 * Version: 1.0
 *
 * @package UDS WordPress Theme
 */

acf_register_block_type(
	array(
		'name'              => 'uds-show-more', // internal name, like a slug.
		'title'             => __( 'UDS Show more', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'UDS show more button with configurable size, color, and icon.', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => 'editor-insertmore', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/show-more/show-more.php', // location of the block's template.
		'enqueue_script'    => get_template_directory_uri() . '/js/show-more-btn.js', // Load javascript
		'category'          => 'uds', // category this block appears in.
		'keywords'          => array( 'button', 'show', 'more' ),
		'supports'          => array(
			'align' => false, // Remove the align button in the editor toolbar.
		),
		'mode'              => 'preview', // make this block default to full edit mode when added to the page.
		'example'  => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'button_link' => array(
						'title' => 'show more',
					),
					'button_color' => 'maroon',
					'button_size' => 'default',
				),
			),
		),
	)
);
