<?php
/**
 * Block Registration
 *
 * Block name: Background Section
 * Author: Steve Ryan
 * Version: 0.1
 *
 * @package UDS WordPress Theme
 *
 * Notes: A block indicated by the UDS design document as a necessary "wrapper" for the application
 * of a background texture or color to a standard Bootstrap container. This does not have a direct correlation to
 * a specific element within the design system. But the specs for padding/margins are at the following page:
 * Home --> Spacing and layout --> Section spacing
 */

acf_register_block_type(
	array(
		'name'              => 'background-section',
		'title'             => __( 'UDS Background Section', 'uds-wordpress-theme' ),
		'description'       => __( 'Creates a container that can have a background image, pattern, or color, and uses Inner Blocks for content.', 'uds-wordpress-theme' ),
		'icon'              => 'star-filled',
		'render_template'   => 'templates-blocks/background-section/background-section.php',
		'category'          => 'uds',
		'keywords'          => array( 'background', 'section', 'image' ),
		'enqueue_script'    => get_template_directory_uri() . '/templates-blocks/background-section/background-section.js',
		'supports'          => array(
			'align' => false,
			'jsx' => true,
		),
		'mode'              => 'edit',
		'example'  => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'uds_background_section_choice'    => 'pattern',
					'uds_background_section_pattern'   => 'network-white',
				),
			),
		),
	)
);
