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
$button_tag_type = get_field('tag_type');

// If button is not specifically selected, get the link and text from the button_link field
if ('button' !== $button_tag_type) {
	// Multiple values are taken from the 'button_link' field.
	$button_link = get_field('button_link');
	if ($button_link) {
		$button_label = trim(sanitize_text_field($button_link['title']));
		$button_url = $button_link['url'];
		$target = $button_link['target'];
	} else {
		// no link provided!
		$button_label = 'Button';
		$button_url = '#';
		$target = '';
	}
} else {
	// This is an actual button tag, so there is no URL - just a text label.
	$button_text = get_field('button_text');
}

$button_color = get_field('button_color');
$button_size = get_field('button_size');
$external_link = get_field('external_link');
$new_tab = get_field('new_tab');
$remove_outer_div = get_field('remove_outer_div');
$full_width = get_field('full_width');
$aria_label = get_field('aria_label');
$icon = get_field('icon');


/**
 * Check to see if this is opening in a new tab, and add target attrribute if so.
 * The $target will be '_blank' if the user has checked that box, or an emtpy string
 * if they didn't
 */
if ($target) {
	$target_text = 'target="' . $target . '"';
} else {
	$target_text = '';
}

// Check to see if this is an external link and if so add a rel. attribute.
if ($external_link) {
	$rel = 'target="_blank" rel="noopener noreferrer"';
} else {
	$rel = '';
}

// Set button size class if default is not chosen.
if ('default' !== $button_size) {
	$button_size = 'btn-' . $button_size;
} else {
	$button_size = '';
}

// If user has chosen an icon construct the markup span.
if ($icon) {
	$button_icon = sanitize_text_field($icon);
	$icon_span = "<span class='{$button_icon}'></span>&nbsp;&nbsp;";
} else {
	$icon_span = '';
}

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if (isset($block['className']) && !empty($block['className'])) {
	$additional_classes = trim(sanitize_text_field($block['className']));
}

// Get our attributes and add them as one big string.
$attribute_string = '';

// Check rows exists.
if (have_rows('button_attributes')) :

	// Loop through rows.
	while (have_rows('button_attributes')) : the_row();

		// Load sub field values.
		$attrName = trim(get_sub_field('attribute_name'));
		$attrValue = trim(get_sub_field('attribute_value'));

		// Append to our string
		$attribute_string .= $attrName . '="' . $attrValue . '" ';

	// End loop.
	endwhile;
endif;

?>

<?php if (!$remove_outer_div) : ?>
	<div class="uds-button <?php echo $additional_classes; ?>">

		<?php
		// Since we just applied the $additional_classes to the outer DIV, empty that string.
		// This way, we are not also adding it to the button/link below.
		$additional_classes = '';
		?>
	<?php endif; ?>

	<?php if ('button' !== $button_tag_type) : // default to links unless specified
	?>
		<a href="<?php echo esc_url($button_url); ?>" class="btn <?php echo "{$button_size} btn-{$button_color} {$additional_classes}"; ?>" <?php echo "{$attribute_string} {$target_text} {$rel} {$aria_label}"; ?>><?php echo $icon_span; ?><?php echo $button_label; ?> </a>
	<?php else : ?>
		<button type="button" class="btn <?php echo "{$button_size} btn-{$button_color} {$additional_classes}"; ?>" <?php echo $attribute_string; ?>><?php echo $icon_span; ?> <?php echo $button_text; ?></button>
	<?php endif; ?>

	<?php if (!$remove_outer_div) : ?>
	</div>
<?php endif; ?>
