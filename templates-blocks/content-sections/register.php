<?php
/**
 * Block Registration
 *
 * Block name: Content Image Overlap
 * Author: Steve Ryan
 * Version: 0.1
 *
 * @package UDS WordPress Theme
 *
 * Notes: A block created from the XD design document directly, as opposed to "downstream"
 * from the UDS Boostrap project. Notes found with the Misc. Content section under the heading of Content Image Overlap
 */

acf_register_block_type(
	array(
		'name'              => 'content-image-overlap', // internal name, like a slug.
		'title'             => __( 'Content Image Overlap', 'uds-wordpress-theme' ), // name the user will see.
		'description'       => __( 'From the misc content section of the UDS design docs.', 'uds-wordpress-theme' ), // description the user will see.
		'icon'              => 'star-filled', // Dashicon, or custom SVG code, for the icon.
		'render_template'   => 'templates-blocks/content-sections/image-overlap.php', // location of the block's template.
		'category'          => 'layout', // category this block appears in.
		'keywords'          => array( 'overlap', 'content', 'section' ),
		'supports'          => array(
			'align' => false, // Remove the align button in the editor toolbar.
		),
		'mode'              => 'edit', // make this block default to full edit mode when added to the page.
		// 'example'  => array(
		// 	'attributes' => array(
		// 		'mode' => 'preview',
		// 		'data' => array(
		// 			'title'                   => 'A Sample Block',
		// 			'background_style'        => 'network-white',
		// 			'container_type'          => 'container-fluid',
		// 			'add_inner_container'     => true,
		// 			'content'                 => 'Lorem ipsum sit dolor amet.',
		// 		),
		// 	),
		// ),
	)
);
