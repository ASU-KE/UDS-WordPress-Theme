<?php
/**
 * Block Registration
 *
 * Block name: UDS Single Tab block
 * Author: Zainab Alsidiki
 * Version: 0.1
 *
 * @package UDS WordPress Theme
 *
 * Notes: A block for single tab, to be used inside the tabs and accordions container
 */

acf_register_block_type(
	array(
		'name'              => 'uds-single-tab',
		'title'             => __( 'UDS Single Tab', 'uds-wordpress-theme' ),
		'description'       => __( 'A wrapper to apply a background color or texture to a container.', 'uds-wordpress-theme' ),
		'icon'              => 'table-row-after',
		'render_template'   => 'templates-blocks/single-tab/single-tab.php',
		'category'          => 'layout',
		'keywords'          => array( 'tabs', 'tab'),
		'parent'            => array('acf/tabs-accordions-container'),
		'supports'          => array(
			'align' => false,
			'jsx' => true,
		),
		'mode'              => 'edit',
	)
);
