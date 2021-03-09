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

 // If additional classes were requested, add them.
$additional_classes = '';
if ( ! empty( $block['className'] ) ) {
	$additional_classes = sanitize_text_field( $block['className'] );
}

// If the 'smaller size' checkbox was checked, add the 'article' class.
if ( get_field( 'smaller_size' ) ) {
	$additional_classes .= ' article';
}

// Setup our variables.
$start_tag = '<h' . get_field( 'level' ) . ' class="' . trim( $additional_classes ) . '" >';
$end_tag = '</h' . get_field( 'level' ) . '>';
$highlight_class = get_field( 'text_highlight' );

// Dont use highlight class if none is selected.
if ( 'none' == $highlight_class ) {
	$highlight_class = '';
}

// Sanitize header text field.
$header_text = sanitize_text_field( get_field( 'text' ) );

// Construct the heading tag.
echo $start_tag . ' <span class="' . $highlight_class . '">' . $header_text . '</span>' . $end_tag;
?>
