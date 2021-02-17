<?php
/**
 * Block Registration
 *
 * Block name: Button
 * Author: Justin Hollloway
 * Version: 1.0
 *
 * @package UDS WordPress Theme
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
