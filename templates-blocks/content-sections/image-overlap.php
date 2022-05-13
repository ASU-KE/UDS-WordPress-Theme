<?php
/**
 * UDS Content Sections: Content Image Overlap
 *
 * @package UDS WordPress Theme
 */

// Get the background image, or set a placeholder if there isn't one.
$background = get_field( 'uds_image_overlap_background' );
$image_size = get_field( 'uds_image_overlap_image_size' );

if ( ! $background ) {
	$background['url'] = 'https://via.placeholder.com/960x640/191919/FAFAFA.png?text=image+placeholder';
	$background['alt'] = 'A placeholder image';
}

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}

// Determine if the content is on the left, or the right.
$orientation = get_field( 'uds_image_overlap_orientation' );


// Combine the base, orientation, and advanced classes into one string.
$classes = 'uds-image-overlap ';
$image_class = '';
if ( 'left' === $orientation ) {
	$classes .= 'content-left ';
	$image_class = 'ml-auto';
}

$classes .= $additional_classes;

// Set up a list of allowed blocks inside inner content.
$allowed_blocks = array(
	'core/heading',
	'core/paragraph',
	'core/separator',
	'core/html',
	'core/list',
	'acf/uds-button',
	'acf/uds-card',
	'acf/headings',
);

// Pre-populate the InnerBlocks area with some content.
$template = array(
	array(
		'core/heading',
		array(
			'mode' => 'preview',
		),
	),
	array(
		'core/paragraph',
		array(
			'content' => 'Edit this block to select an image.',
		),
	),
	array(
		'acf/uds-button',
		array(
			'mode' => 'preview',
			'data' => array(
				'button_label' => 'Default button',
				'button_color' => 'maroon',
				'button_size' => 'default',
			),
		),
	),
);

// Echo the block.
echo '<div class="' . $classes . '">';
echo '<img class="img-fluid uds_image_overlap_image_size_'.$image_size.' '.$image_class.'" src="' . $background['url'] . '" alt="' . $background['alt'] . '" />';
echo '<div class="content-wrapper">';
echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '" />';
echo '</div>';
echo '</div>';

?>
