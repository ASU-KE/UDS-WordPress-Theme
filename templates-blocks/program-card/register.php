<?php
/**
 * Block Registration
 *
 * Block name: Overlay Card
 * Author: Zainab
 * Version: 1.0
 *
 * @package UDS WordPress Theme
 *
 * Notes: UDS Program Card block
 *
 * Note: for the icon, you can use any Dashicon:
 * https://developer.wordpress.org/resource/dashicons, OR an actual <SVG></SVG> tag
 * with all the required content. In this example, I'm using a dashicon.
 */

acf_register_block_type(
	array(
		'name'              => 'uds-program-card', // internal name, like a slug.
		'title'             => __( 'UDS Overlay Card', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'A block for building program cards with gif image when hover over', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => 'admin-page', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/program-card/program-card.php', // location of the block's template.
		'category'          => 'uds', // category this block appears in.
		'keywords'          => array( 'card', 'cards', 'content', 'program', 'gif', 'overlay', 'uds' ),
		'supports'          => array(
			'align' => false, // Remove the align button in the editor toolbar.
		),
		'mode'              => 'preview', // make this block default to preview mode when added to the page.
		'example'           => array(
			'attributes' => array(
				'mode' => 'preview', // show the actual card view for the preview when adding this block.
				'data' => array(
					'title'        => 'Program title',
					'image'        => array(
						'url'  => 'https://via.placeholder.com/240x120?text=Placeholder+Image',
						'alt'  => 'image placeholder',
					),
					'hover_image'        => array(
						'url'  => 'https://via.placeholder.com/240x120?text=Placeholder+Image',
						'alt'  => 'image placeholder',
					),
					'button'        => array(
						'button_color'  => 'gold',
						'button_size'  => 'normal',
						'icon'  => 'fas fa-arrow-right',
					),
				),
			),
		),
	)
);
