<?php
/**
 * UDS Button Block
 *
 * @package UDS WordPress Theme
 * @author Justin Holloway
 *
 * This is a button block for using within the UDS WordPress theme. This button allows for selecting size and color.
 */

// Get values from ACF.
$button_label = get_field( 'button_label' );
$button_url = get_field( 'button_url' );
$external_link = get_field( 'external_link' );
$button_color = get_field( 'button_color' );
$button_size = get_field( 'button_size' );
$new_tab = get_field( 'new_tab' );

// Check to see if this is opening in a new tab, and add target attrribute if so.
if ( $new_tab ) {
	$target = 'target="_blank"';
} else {
	$target = '';
}

// Check to see if this is an external link and if so add a rel. attribute.
if ( $external_link ) {
	$rel = 'rel="noopener noreferrer"';
} else {
	$rel = '';
}

// Set button size class if default is not chosen.
if ( 'default' !== $button_size ) {
	$button_size = 'btn-' . $button_size;
} else {
	$button_size = '';
}

// If user has chosen an icon construct the markup span.
if ( get_field( 'icon' ) ) {
	$button_icon = sanitize_text_field( get_field( 'icon' ) );
	$icon_span = '<span class="fas fa-' . $button_icon . '"></span>&nbsp;&nbsp;';
} else {
	$icon_span = '';
}

// Retrieve additional classes from the 'advanced' field in the editor.
if ( ! empty( $block['className'] ) ) {
	$additional_classes = sanitize_text_field( $block['className'] );
}

?>

<div class="uds-button">
	<a href="<?php echo $button_url; ?>" class="btn <?php echo $button_size; ?> btn-<?php echo $button_color; ?> <?php echo $additional_classes; ?>" <?php echo $target; ?> <?php echo $rel; ?>> <?php echo $icon_span; ?><?php echo $button_label; ?></a>
</div>
