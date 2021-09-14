<?php
/**
 * Block Registration
 *
 * Block name: UDS Single Accordion block
 * Author: Zainab Alsidiki
 * Version: 0.1
 *
 * @package UDS WordPress Theme
 *
 * Notes: A block for single accordion, to be used inside the tabs and accordions container
 */

acf_register_block_type(
	array(
		'name'              => 'uds-single-accordion',
		'title'             => __( 'UDS Single Accordion', 'uds-wordpress-theme' ),
		'description'       => __( 'A wrapper to apply a background color or texture to a container.', 'uds-wordpress-theme' ),
		'icon'              => 'archive',
		'render_template'   => 'templates-blocks/single-accordion/single-accordion.php',
		'category'          => 'layout',
		'keywords'          => array( 'accordions', 'accordion'),
		'supports'          => array(
			'align' => false,
			'jsx' => true,
		),
		'mode'              => 'edit',
	)
);
