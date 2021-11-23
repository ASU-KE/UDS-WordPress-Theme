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
		'description'       => __( 'A wrapper to apply a background color or texture to a container.', 'uds-wordpress-theme' ),
		'icon'              => 'star-filled',
		'render_template'   => 'templates-blocks/background-section/background-section.php',
		'enqueue_script'    => get_template_directory_uri() . '/templates-blocks/background-section/background-section.js',
		'category'          => 'layout',
		'keywords'          => array( 'background', 'section' ),
		'supports'          => array(
			'align' => false,
			'jsx' => true,
		),
		'mode'              => 'edit',
	)
);
