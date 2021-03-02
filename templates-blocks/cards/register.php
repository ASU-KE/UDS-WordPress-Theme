<?php
/**
 * Block Registration
 *
 * Block name: Card
 * Author: Walt
 * Version: 1.0
 *
 * @package UDS WordPress Theme
 *
 * Notes: UDS Card block
 *
 * Note: for the icon, you can use any Dashicon:
 * https://developer.wordpress.org/resource/dashicons, OR an actual <SVG></SVG> tag
 * with all the required content. In this example, I'm using a dashicon.
 */

acf_register_block_type(
	array(
		'name'              => 'uds-card', // internal name, like a slug.
		'title'             => __( 'UDS Card', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'A block for building static versions of UDS basic, story, and event cards', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-heading" viewBox="0 0 16 16">
		<path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
		<path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z"/>
	  </svg>', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/cards/card.php', // location of the block's template.
		'category'          => 'layout', // category this block appears in.
		'keywords'          => array( 'card', 'cards', 'content' ),
		'supports'          => array(
			'align' => false, // Remove the align button in the editor toolbar.
		),
		'mode'              => 'preview', // make this block default to preview mode when added to the page.
		'example'           => array(
			'attributes' => array(
				'mode' => 'preview', // show the actual card view for the preview when adding this block.
				'data' => array(
					'title'      => 'A Sample Block',
					'body_text'  => 'Lorem ipsum sit dolor amet.',
					'card_style' => 'basic',
				),
			),
		),
	)
);
