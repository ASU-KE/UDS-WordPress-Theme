<?php
/**
 * UDS Background Section
 *
 * @package UDS WordPress Theme
 */

$choice = get_field( 'uds_background_section_choice' );
$pattern = get_field( 'uds_background_section_pattern' );
$preset = get_field( 'uds_background_section_preset' );
$color = get_field( 'uds_background_section_color' );
$innertext = get_field( 'uds_background_section_text' );
$upload = get_field( 'uds_background_section_upload_url' );
$innercolor = get_field( 'uds_background_inner_color' );
$repeat = get_field( 'uds_background_image_repeat' );
$position = get_field( 'uds_background_image_position' );
$size = get_field( 'uds_background_image_size' );

// Retrieve additional classes from the 'advanced' field in the editor.
$additional_classes = '';
if ( ! empty( $block['className'] ) ) {
	$additional_classes = $block['className'];
}

// Add the .text-white modifier to additional classes.
if ( 'text-white' === $innertext ) {
	$additional_classes = 'text-white ' . $additional_classes;
}

// Add inner text color modifier to code if the text should be white.


if ( $choice ) {

	// Produce the correct classes for the <section> element and echo it.
	// The $choice variable will be one of the following three values. It has a default value set by the ACF control.
	if ( 'color' === $choice ) {

		if ( 'custom' === $preset ) {
			// We're doing a custom background color.
			echo '<section class="uds-section bg-color ' . $additional_classes . '" style="background-color: ' . $color . ';" >';
		} else {
			// Background colors via utility BS4 classes.
			echo '<section class="uds-section bg-color ' . $preset . ' ' . $additional_classes . '" >';
		}
	} else if ( 'pattern' === $choice ) {

		// UDS Background patterns.
		echo '<section class="uds-section bg ' . $pattern . ' ' . $additional_classes . '" >';

	} else if ( 'upload' === $choice ) {

		// Build the inline style rule.
		$inline_style = 'background: url(' . $upload . ') ' . $position . ' / ' . $size . ' ' . $repeat . ';';

		// Set the basic utility class + inner bg color as classes.

		echo '<section class="uds-section media-file ' . $innercolor . ' ' . $additional_classes . '" style="' . $inline_style . '" >';

	}

	// Sets InnerBlocks with a Bootstrap blocks container as default content.
	$allowed_blocks = array( 'wp-bootstrap-blocks/container', 'core/html' );
	$template = array(
		array(
			'wp-bootstrap-blocks/container',
			array( 'marginAfter' => 'mb-0' ),
			array(

				array(
					'core/group',
					array(),
				),

			),
		),
	);



	echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '" />';
	echo '</section>';
}

?>
