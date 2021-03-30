<?php
/**
 * UDS Headings Block
 *
 * @package UDS WordPress Theme
 *
 * This is a UDS heading block to replace the standard heading block.
 */

/**
 * Additional classes can be added by use of the 'advanced' field in the
 * Gutenburg editor, and the application of a smaller 'article' size on
 * H1 tags. Both of these are applied to the H1 tag itself, while color
 * highlights are applied to the inner <span> tag.
 */

 // If additional classes were requested, clean up the input and add them.
$additional_classes = array();
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	array_push( $additional_classes, trim( sanitize_text_field( $block['className'] ) ) );
}

// If the 'smaller size' checkbox was checked, add the 'article' class.
if ( get_field( 'smaller_size' ) ) {
	array_push( $additional_classes, 'article' );
}

// If 'extra space' was requested, add 3rem (mt-6) to the top of this header.
if ( get_field( 'uds_heading_add_spacing' ) ) {
	array_push( $additional_classes, 'mt-6' );
}

// make a string out of our additional classes, if any were provided.
if ( ! empty( $additional_classes ) ) {
	$additional_classes_text = 'class="' . implode( ' ', $additional_classes ) . '"';
} else {
	$additional_classes_text = '';
}

// Build text for an ID, if text for a named anchor was provided.
$anchor_text = '';
if ( get_field( 'uds_heading_anchor_text' ) ) {
	$anchor_text = 'id="' . sanitize_text_field( get_field( 'uds_heading_anchor_text' ) ) . '"';
}

// Setup our variables.
$start_tag = '<h' . get_field( 'level' ) . ' ' . $anchor_text . ' ' . $additional_classes_text . '>';
$end_tag = '</h' . get_field( 'level' ) . '>';
$highlight_class = get_field( 'text_highlight' );
$named_anchor_text = get_field( 'uds_heading_anchor_text' );

// Create the highlight class text if a highlight color was chosen.
$highlight_text = '';
if ( 'none' !== $highlight_class ) {
	$highlight_text = 'class="' . $highlight_class . '"';
}

// Sanitize header text field.
$header_text = sanitize_text_field( get_field( 'text' ) );

// Construct the heading tag.
echo $start_tag . ' <span ' . $highlight_text . '>' . $header_text . '</span>' . $end_tag;
?>
