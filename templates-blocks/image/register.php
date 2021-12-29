<?php
/**
 * Block Registration
 *
 * Block name: UDS Image block
 * Author: Zainab Alsidiki
 * Version: 0.1
 *
 * @package UDS WordPress Theme
 *
 * Notes: A block for UDS images with caption and shadow options.
 */

acf_register_block_type(
	array(
		'name'              => 'uds-image',
		'title'             => __( 'UDS image', 'uds-wordpress-theme' ),
		'description'       => __( 'A block for UDS images with caption and shadow options', 'uds-wordpress-theme' ),
		'icon'              => 'cover-image',
		'render_template'   => 'templates-blocks/image/image.php',
		'category'          => 'uds',
		'keywords'          => array( 'image', 'images', 'caption', 'uds' ),
		'supports'          => array(
			'align' => false,
		),
		'mode'              => 'edit',
	)
);
