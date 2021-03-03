<?php
/**
 * Block Registration
 *
 * Block name: Blockquote
 * Version: 1.0
 *
 * @author Walt, Earl, Justin
 * @package UDS WordPress Theme
 *
 * Notes: A blockquote to be used within the UDS WordPress theme. It is a
 * combination of the UDS blockquote (which was not exactly well defined),
 * and the UDS Testimonial. It's basically block quote at large screens,
 * and the testimonial styling at mobile sizes. Supports:
 *
 *  image or no image, adjusting layout accordingly
 *  setting UDS approved background colors
 *  restricting large quotation mark color based on background color
 */

acf_register_block_type(
	array(
		'name'              => 'uds-blockquote', // internal name, like a slug.
		'title'             => __( 'UDS Blockquote', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'UDS styled block quotes, with or without an image', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => 'format-quote', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/blockquote/blockquote.php', // location of the block's template.
		'category'          => 'layout', // category this block appears in.
		'keywords'          => array( 'blockquote', 'block', 'quote' ),
		'supports'          => array(
			'align' => false, // Remove the align button in the editor toolbar.
		),
		'mode'              => 'preview', // make this block default to preview mode.
		'example'  => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'quote_text'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
					'name'        => 'Name of person',
					'description' => 'description here',
				),
			),
		),
	)
);
