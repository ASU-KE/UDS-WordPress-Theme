<?php
/**
 * Block Registration
 *
 * Block name: UDS Person Profile
 * Author: Walter McConnell
 * Version: 1.0
 *
 * @package UDS WordPress Theme
 *
 * Notes: UDS Person Profile
 *
 * Note: for the icon, you can use any Dashicon:
 * https://developer.wordpress.org/resource/dashicons, OR an actual <SVG></SVG> tag
 * with all the required content. In this example, I'm using a dashicon.
 */

acf_register_block_type(
	array(
		'name'              => 'uds-person-profile', // internal name, like a slug.
		'title'             => __( 'UDS Person Profile', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'A block for building a single UDS profile', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => 'users', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/profile/profile.php', // location of the block's template.
		'category'          => 'uds', // category this block appears in.
		'keywords'          => array( 'person', 'profile', 'uds' ),
		'supports'          => array(
			'align' => false, // Remove the align button in the editor toolbar.
		),
		'mode'              => 'preview', // make this block default to preview mode when added to the page.
		'example'           => array(
			'attributes' => array(
				'mode' => 'preview', // show the actual card view for the preview when adding this block.
				'data' => array(
					'name'        => 'Jane Q. Public',
					'title'       => 'Professor of Logic, University of Science',
					'image'       => array(
						'url'     => 'https://via.placeholder.com/240x240?text=Placeholder+Image',
						'alt'     => 'image placeholder',
					),
					'profile'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque bibendum, nunc finibus porttitor eleifend, ligula orci ultricies felis, cursus convallis nibh quam in odio. Vivamus quis mauris velit. Sed vel massa commodo lacus sollicitudin vulputate. Cras eget consequat sapien. ',
					'email'       => 'janeq@science.edu',
					'phone'       => '(555) 555-1212',
					'url'         => 'https://science.edu/faculty/jqpublic'
				),
			),
		),
	)
);
