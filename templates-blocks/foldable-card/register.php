<?php
/**
 * Block Registration
 *
 * Block name: UDS Foldable card block
 * Author: Zainab Alsidiki
 * Version: 0.1
 *
 * @package UDS WordPress Theme
 *
 * Notes: A block for the Foldable card that can be used as accordions when multiple cards are added into one group with class accordion.
 */

acf_register_block_type(
	array(
		'name'              => 'uds-foldable-card',
		'title'             => __( 'UDS Foldable Card', 'uds-wordpress-theme' ),
		'description'       => __( 'A Foldable card block that can be used as accordions when multiple cards are added into one group.', 'uds-wordpress-theme' ),
		'icon'              => 'archive',
		'render_template'   => 'templates-blocks/foldable-card/foldable-card.php',
		'enqueue_script'    => get_template_directory_uri() . '/templates-blocks/foldable-card/foldable-card.js',
		'category'          => 'uds',
		'keywords'          => array( 'accordions', 'accordion', 'foldable', 'card'),
		'supports'          => array(
			'align' => false,
			'jsx' => true,
		),
		'mode'              => 'edit',
		'example'           => array(
			'attributes' => array(
				'mode' => 'preview', // show the actual card view for the preview when adding this block.
				'data' => array(
					'uds_single_accordion_title'      => 'Foldable card title',
					'uds_single_accordion_title_icon' => 'fas fa-calendar-alt',
					'uds_single_accordion_collapsed'  => true,
				),
			),
		),
	),
);
