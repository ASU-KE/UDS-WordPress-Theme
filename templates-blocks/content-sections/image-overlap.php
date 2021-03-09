<?php
/**
 * UDS Content Sections: Content Image Overlap
 *
 * @package UDS WordPress Theme
 */

// Get the background image, or set a placeholder if there isn't one.
$background = get_field( 'uds_image_overlap_background' );

if( ! $background ) {
	$background['url'] = "https://via.placeholder.com/960x640/191919/FAFAFA.png?text=image+placeholder";
	$background['alt'] = "A placeholder image";
}

// Retrieve additional classes from the 'advanced' field in the editor.
if ( ! empty( $block['className'] ) ) {
	$additional_classes = sanitize_text_field( $block['className'] );
}

// Determine if the content is on the left, or the right.
$orientation = get_field( 'uds_image_overlap_orientation' );


// Combine the base, orientation, and advanced classes into one string.
$classes = "uds-image-overlap ";

if ( 'left' === $orientation ) {
	$classes .= "content-left ";
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
	'acf/headings', );

// Pre-populate the InnerBlocks area with some content.
$template = array(
	array(
		'acf/headings',
		array(
			'mode' => 'preview',
			'data' => array(
				'text' => 'Placeholder title',
				'level' => '3',
				'text_highlight' => 'highlight-gold',
			),
		),
	),
	array(
		'core/paragraph',
		array(
			'content' => 'Click on the image placeholder area to add or change the image.',
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
echo '<img class="img-fluid" src="' . $background['url'] . '" alt="' . $background['alt'] . '" />';
echo '<div class="content-wrapper">';
echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '" />';
echo '</div>';
echo '</div>';

?>
