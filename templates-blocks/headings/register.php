<?php
/**
 * Block Registration
 *
 * Block name: Headings
 * Author: Walt
 * Version: 1.0
 *
 * @package UDS WordPress Theme
 *
 * Notes: A UDS block, for creating a branded heading tag. Allows for selecting H1 through
 * H4, and applying all approved highlight styles from the UDS XD file:
 *
 * - none (black text)
 * - black text on gold bg
 * - white text on black bg
 * - black text on white bg
 */

acf_register_block_type(
	array(
		'name'              => 'headings', // internal name, like a slug.
		'title'             => __( 'UDS Heading', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'A UDS heading block based on WS2.0.', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M6.2 5.2v13.4l5.8-4.8 5.8 4.8V5.2z"></path></svg>', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/headings/headings.php', // location of the block's template.
		'category'          => 'text', // category this block appears in.
		'keywords'          => array( 'heading', 'title', 'highlight' ),
		'supports'          => array(
			'align' => false, // Disable the align button in the editor toolbar.
			'html' => false, // Disable the use of html editor.
		),
		'mode'              => 'preview', // make this block default to preview mode when added to the page.
		'example'  => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'level'                   => '1',
					'text_highlight'        => 'highlight-gold',
					'text'          => 'your heading text',
				),
			),
		),
	)
);
