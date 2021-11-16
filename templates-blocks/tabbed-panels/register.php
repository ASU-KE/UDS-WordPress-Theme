<?php
/**
 * Block Registration
 *
 * Block name: UDS Tabbed panels block
 * Author: Zainab Alsidiki
 * Version: 0.1
 *
 * @package UDS WordPress Theme
 *
 * Notes: A block for the Tabbed panels.
 */

acf_register_block_type(
	array(
		'name'              => 'uds-tabbed-panels',
		'title'             => __( 'UDS Tabbed panels', 'uds-wordpress-theme' ),
		'description'       => __( 'A Tabbed panels block', 'uds-wordpress-theme' ),
		'icon'              => 'table-row-after',
		'render_template'   => 'templates-blocks/tabbed-panels/tabbed-panels.php',
		'category'          => 'uds',
		'keywords'          => array( 'tabs', 'tab', 'tabbed', 'panel', 'panels', 'nav'),
		'supports'          => array(
			'align' => false,
			'jsx' => true,
		),
		'mode'              => 'edit',
	)
);
