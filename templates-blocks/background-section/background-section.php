<?php
/**
 * UDS Background Section
 *
 * @package UDS WordPress Theme
 */

$choice = get_field( 'uds_background_section_choice' );
$pattern = get_field( 'uds_background_section_pattern' );
$color = get_field( 'uds_background_section_color' );
$upload = get_field( 'uds_background_section_upload_url' );
$innercolor = get_field( 'uds_background_section_inner_color' );


// Allowed blocks inside inner content.
$allowed_blocks = array( 'wp-bootstrap-blocks/container', 'core/html');

// Pre-populate the InnerBlocks area with some content.
$template = array(
	array(
		'wp-bootstrap-blocks/container', array(
			"marginAfter" => "mb-0",
		)
	)
);

// Produce the correct classes for the <section> element.
// The $choice variable will be one of the following three values. It has a default value set by the ACF control.

if ( 'pattern' === $choice ) {

	// UDS Background patterns.
	$css_class = 'bg ' . $pattern . '"';

} else if ( 'color' === $choice ) {

	// Background colors via utility BS4 classes.
	$css_class = $color;

} else if ( 'upload' === $choice ) {

	// Background image. Sets the inline style + a generic class + a class for the inner container.
	$css_class = 'media-file ' . $innercolor;
	$inline_style = 'url(' . $upload . ');';

} else {
	$css_class = '';
}


// Echo the block.
if ( $choice ) {

	if ('upload' !== "$choice" ) {
		echo '<section class="uds-section ' . $css_class . '" >';
	} else {
		echo '<section class="uds-section ' . $css_class . '" style="background-image: ' . $inline_style . '" >';
	}

	echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '" />';
	echo '</section>';
}

?>
