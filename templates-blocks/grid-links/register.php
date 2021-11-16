<?php
/**
 * Block Registration
 *
 * Block name: UDS Grid Links
 * Author: Steve Ryan
 * Version: 0.1
 *
 * @package UDS WordPress Theme
 */

$gridlinkicon =


acf_register_block_type(
	array(
		'name'              => 'grid links',
		'title'             => __( 'UDS Grid Links', 'uds-wordpress-theme' ),
		'description'       => __( 'A series of formatted links arranged in a grid.', 'uds-wordpress-theme' ),
		'icon'              => 'grid-view',
		'render_template'   => 'templates-blocks/grid-links/grid-links.php',
		'category'          => 'uds',
		'keywords'          => array( 'grid', 'links' ),
		'supports'          => array(
			'align' => false,
			'jsx' => true,
		),
		'mode'              => 'edit',
	)
);
