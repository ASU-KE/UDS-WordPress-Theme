<?php
/**
 * UDS Headings Block
 *
 * @package UDS WordPress Theme
 *
 * This is a UDS heading block to replace the standard heading block.
 */

 // Setup our variables.
$start_tag = '<h' . get_field( 'level' ) . '>';
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


