<?php
/**
 * Block Registration
 *
 * Block name: UDS Tabs and Accordions container
 * Author: Zainab Alsidiki
 * Version: 0.1
 *
 * @package UDS WordPress Theme
 *
 * Notes: This is a "wrapper" container for Tabs and Accordions
 */

acf_register_block_type(
	array(
		'name'              => 'tabs-accordions-container',
		'title'             => __( 'UDS Tabs and Accordions container', 'uds-wordpress-theme' ),
		'description'       => __( 'A container for tabs and accordions single blocks', 'uds-wordpress-theme' ),
		'icon'              => 'editor-table',
		'render_template'   => 'templates-blocks/tabs-accordions-container/tabs-accordions-container.php',
		'category'          => 'layout',
		'keywords'          => array( 'tabs', 'accordions', 'tab', 'accordion', 'container' ),
		'supports'          => array(
			'align' => false,
			'jsx' => true,
		),
		'mode'              => 'edit',
	)
);
