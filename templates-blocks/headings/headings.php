
<?php
/**
 * UDS Headings Block
 *
 * @package UDS WordPress Theme
 *
 * This is a UDS heading block to replace the standard heading block.
 */

$startTag = '<h' . get_field( 'level' ) . '>';
$endTag = '</h' . get_field( 'level' ) . '>';
$highlightClass = get_field( 'text_highlight' );
    if( $highlightClass == 'none' ) {
        $highlightClass = '';
    }

$headerText = get_field( 'text' );

echo $startTag . ' <span class="' . $highlightClass . '">' . $headerText . '</span>' . $endTag;
?>


