<?php
/**
 * UDS Headings Block
 *
 * @package UDS WordPress Theme
 *
 * This is a UDS heading block to replace the standard heading block.
 */

$start_tag = '<h' . get_field( 'level' ) . '>';
$end_tag = '</h' . get_field( 'level' ) . '>';
$highlight_class = get_field( 'text_highlight' );
if ( 'none' == $highlight_class ) {
	$highlight_class = '';
}

$header_text = get_field( 'text' );

echo $start_tag . ' <span class="' . $highlight_class . '">' . $header_text . '</span>' . $end_tag;
?>


