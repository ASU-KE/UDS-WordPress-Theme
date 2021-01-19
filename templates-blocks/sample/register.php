<?php

/**
 * Block Registration
 *
 * Block name: Sample
 * Author: Walt
 * Version: 1.0
 *
 * Notes: A simple block, for demonstration purposes, that creates a stylized message
 * across the entire content area. This block is attempting to use as many settings
 * from 'acf_register_block_type' as it can, so that there are examples of how to use
 * them. You may end up removing some settings that are not needed.
 */
acf_register_block_type( array(
	'name'              => 'sample', // internal name, like a slug.
	'title'             => __('Sample Block'), // name the user will see.
	'description'       => __('A sample block for learning ACF Pro blocks.'), // description the user will see.
	'icon'              => '',// Dashicon, or custom SVG code, for the icon
	'render_template'   => 'templates-blocks/sample/sample.php', // location of the block's template.
	'category'          => 'UDS', // category this block appears in.
	'supports'          => array(
		'align' => false, // Remove the align button in the editor toolbar
	)
));
