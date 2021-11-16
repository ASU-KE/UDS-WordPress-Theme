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
		'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="556" height="287" viewBox="0 0 556 287"><image width="556" height="287" xlink:href="data:img/png;base64,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"/><image x="137" y="89" width="282" height="109" xlink:href="data:img/png;base64,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"/></svg>',
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
