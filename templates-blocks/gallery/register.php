<?php
/**
 * Block Registration
 *
 * Block name: gallery
 * Author: Zainab Alsidiki
 * Version: 1.0
 *
 * @package UDS WordPress Theme
 */

acf_register_block_type(
	array(
		'name'              => 'uds-gallery', // internal name, like a slug.
		'title'             => __( 'UDS gallery', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'UDS media gallery block', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => 'format-gallery', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/gallery/gallery.php', // location of the block's template.
		'category'          => 'uds', // category this block appears in.
		'keywords'          => array( 'gallery', 'media', 'carousel' ),
		'supports'          => array(
			'align' => false, // Remove the align button in the editor toolbar.
		),
		'mode'              => 'edit', // make this block default to full edit mode when added to the page.
		'example'  => array(
			'attributes' => array(
				'mode' => 'edit',
				'data' => array(
					'button_link' => array(
						'title' => 'Your label',
					),
					'button_color' => 'maroon',
					'button_size' => 'default',
				),
			),
		),
	)
);
