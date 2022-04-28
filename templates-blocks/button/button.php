<?php
/**
 * UDS Button Block
 *
 * @package UDS WordPress Theme
 * @author Justin Holloway
 *
 * This is a button block for using within the UDS WordPress theme. This button allows for selecting size and color.
 */

/**
 * Get values from ACF fields
 */

// Get the button type (link or actual button tag)
$button_tag_type = get_field( 'tag_type' );

// If button is not specifically selected, get the link and text from the button_link field
if ( 'button' !== $button_tag_type ) {
	// Multiple values are taken from the 'button_link' field.
	$button_link = get_field( 'button_link' );
	if ( $button_link ) {
		$button_label = trim( sanitize_text_field( $button_link['title'] ) );
		$button_url = $button_link['url'];
		$target = $button_link['target'];
	} else {
		// no link provided!
		$button_label = 'Button';
		$button_url = '#';
		$target = '';
	}
}else{
	// This is an actual button tag, so there is no URL - just a text label.
	$button_text = get_field( 'button_text' );
}

$button_color = get_field( 'button_color' );
$button_size = get_field( 'button_size' );
$external_link = get_field( 'external_link' );
$new_tab = get_field( 'new_tab' );
$remove_outer_div = get_field( 'remove_outer_div' );
$full_width = get_field( 'full_width' );


/**
 * Check to see if this is opening in a new tab, and add target attrribute if so.
 * The $target will be '_blank' if the user has checked that box, or an emtpy string
 * if they didn't
 */
if ( $target ) {
	$target_text = 'target="' . $target . '"';
} else {
	$target_text = '';
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

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}
?>

<?php if( false === $remove_outer_div ): ?>
	<div class="uds-button <?php echo $additional_classes; ?>">
<?php endif; ?>

	<?php
		// If we are NOT removing the outer div, then we have already applied $additional_classes above.
		// In that case, we empty out the string here, since it will also be applied to the <a> or <button> tag in the code below.
		if( false === $remove_outer_div ) {
			$additional_classes = '';
		}		
	?>

	<?php if( 'button' !== $button_tag_type ): // default to links unless specified ?>
		<a href="<?php echo esc_url( $button_url ); ?>" class="btn <?php echo $button_size; ?> btn-<?php echo $button_color; ?> <?php echo $additional_classes; ?>" <?php echo $target_text; ?> <?php echo $rel; ?>><?php echo $icon_span; ?><?php echo $button_label; ?></a>
	<?php else: ?>
		<button type="button" class="btn <?php echo $button_size; ?> btn-<?php echo $button_color; ?> <?php echo $additional_classes; ?>"><?php echo $icon_span; ?> <?php echo $button_text; ?></button>
	<?php endif; ?>

<?php if( false === $remove_outer_div ): ?>
	</div>
<?php endif; ?>
