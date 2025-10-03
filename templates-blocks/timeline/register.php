<?php
/**
 * Block Registration
 *
 * Block name: Timeline
 * Author: GitHub Copilot
 * Version: 1.0
 *
 * @package UDS WordPress Theme
 *
 * A block for creating chronological timelines with customizable layouts and animations.
 * Supports vertical/horizontal orientations, multiple styles, and carousel functionality.
 */

acf_register_block_type(
	array(
		'name'              => 'uds-timeline', // internal name, like a slug.
		'title'             => __( 'UDS Timeline', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'A block for displaying chronological events in an appealing timeline format.', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => 'clock', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/timeline/timeline.php', // location of the block's template.
		'enqueue_script'    => get_template_directory_uri() . '/src/js/custom/timeline.js',
		'category'          => 'uds', // category this block appears in.
		'keywords'          => array( 'timeline', 'chronological', 'events', 'history', 'steps' ),
		'supports'          => array(
			'align' => false, // Remove the align button in the editor toolbar.
		),
		'mode'              => 'preview', // make this block default to preview mode when added to the page.
		'example'           => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'timeline_layout' => 'vertical',
					'timeline_style' => 'default',
					'show_animations' => true,
					'visible_items' => 4,
					'timeline_items' => array(
						array(
							'title' => 'First Event',
							'date' => '2024-01-01',
							'content' => 'This is the first event in our timeline.',
							'image' => array(
								'url' => 'https://via.placeholder.com/300x200?text=Timeline+Event',
								'alt' => 'Timeline event image',
							),
							'url' => '#',
						),
						array(
							'title' => 'Second Event',
							'date' => '2024-06-01',
							'content' => 'This is the second event in our timeline.',
							'image' => array(
								'url' => 'https://via.placeholder.com/300x200?text=Timeline+Event',
								'alt' => 'Timeline event image',
							),
							'url' => '#',
						),
					),
				),
			),
		),
	)
);