<?php
/**
 * Block Registration
 *
 * Block name: Content Image Overlap
 * Author: Steve Ryan
 * Version: 0.1
 *
 * @package UDS WordPress Theme
 *
 * Notes: A block created from the XD design document directly, as opposed to "downstream"
 * from the UDS Boostrap project. Notes found with the Misc. Content section under the heading of Content Image Overlap
 */

acf_register_block_type(
	array(
		'name'              => 'content-image-overlap',
		'title'             => __( 'UDS Content Image Overlap', 'uds-wordpress-theme' ),
		'description'       => __( 'A stylized layout element with a prominent image, and a configurable content area.', 'uds-wordpress-theme' ),
		'icon'              => 'layout',
		'render_template'   => 'templates-blocks/content-sections/image-overlap.php',
		'category'          => 'uds',
		'keywords'          => array( 'overlap', 'content', 'section' ),
		'supports'          => array(
			'align' => false,
			'jsx' => true,
		),
		'mode'              => 'preview',
		'example'           => array(
			'attributes' => array(
				'mode' => 'preview', // show the actual card view for the preview when adding this block.
				'data' => array(),
			),
		),
	)
);
