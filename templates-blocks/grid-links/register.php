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
		'example'           => array(
			'attributes' => array(
				'mode' => 'preview', // show the actual card view for the preview when adding this block.
				'data' => array(
					'uds_grid_links_source'  => 'arbitrary',
					'uds_grid_links_columns' => 'three-columns',
					'uds_grid_links_color'   => 'none',
					'uds_grid_links_created' => '',
				),
			),
		),
	)
);
