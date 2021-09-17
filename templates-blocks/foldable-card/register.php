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
		'category'          => 'layout',
		'keywords'          => array( 'accordions', 'accordion', 'foldable', 'card'),
		'supports'          => array(
			'align' => false,
			'jsx' => true,
		),
		'mode'              => 'edit',
	)
);
