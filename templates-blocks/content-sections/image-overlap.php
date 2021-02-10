<?php
/**
 * UDS Content Sections: Content Image Overlap
 *
 * @package UDS WordPress Theme
 *
 */

$background = get_field('uds_image_overlap_background');
$orientation = get_field('uds_image_overlap_orientation');

// Allowed blocks inside inner content.
$allowed_blocks = array( 'core/heading', 'core/paragraph', 'core/separator', 'core/html', 'core/list');

// Pre-populate the InnerBlocks area with some content.
$template = array(
	array('core/heading', array(
		'level' => 3,
		'content' => 'Title Goes Here',
	)),
    array( 'core/paragraph', array(
        'content' => 'Creating daily standups with the possibility to make the logo bigger. Execute analytics yet take this offline. Repurpose below the line with the possibility to infiltrate new markets. Growing first party data and try to create synergy.',
	)),
);

// Echo the block.
if ( $background ) {

	if ( "left" === $orientation ) {
		echo '<div class="uds-image-overlap content-left">';
	} else {
		echo '<div class="uds-image-overlap">';
	}

	echo '<img class="img-fluid" src="' . $background['url'] . '" alt="' . $background['alt'] . '" />';
	echo '<div class="content-wrapper">';
	echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '" />';
	echo '</div>';
	echo '</div>';
}

?>
