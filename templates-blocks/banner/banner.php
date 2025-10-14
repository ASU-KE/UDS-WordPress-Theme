<?php
/**
 * UDS Banner Block
 *
 * Provides an ACF block for creating UDS-compliant banners.
 *
 * @package UDS-WordPress-Theme
 */

// I had to force lower-case on the Fontawesome icon names for them to work.
$color = get_field( 'uds_banner_color' );
$icon = strtolower( get_field( 'uds_banner_icon' ) );
$banner_title = get_field( 'uds_banner_title' );
$body = get_field( 'uds_banner_text' );
$button_count = get_field( 'uds_banner_button_count' );
$show_close_button = get_field( 'show_close_button' );

/**
 * Buttons are part of an ACF form group, so we get the group first, then use
 * standard PHP array notation to get the sub-fields of the group. We first check
 * to see if we have any buttons by looking at the button count field. If we do,
 * we get the button group data, check to make sure it's an array (which it should be),
 * then pull out the text and URL for each button.
 */

// set some default values for the buttons, in case we don't have any button data.
$button_one_text = 'Default button 1 text';
$button_one_url = '#';
$button_two_text = 'Default button 2 text';
$button_two_url = '#';

if ( $button_count > 0 ) {
	$button_one_data = get_field( 'uds_button_1_settings' );
	if ( $button_one_data && is_array( $button_one_data ) ) {
		$button_one_text = $button_one_data['button_one_text'];
		$button_one_url = $button_one_data['button_one_url'];
	}
}
if ( 2 == $button_count ) {
	$button_two_data = get_field( 'uds_button_2_settings' );
	if ( $button_two_data && is_array( $button_two_data ) ) {
		$button_two_text = $button_two_data['button_two_text'];
		$button_two_url = $button_two_data['button_two_url'];
	}
}

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}

/**
 * There are conditions for rendering buttons: the number
 * of buttons, and which button color to use based on the background,
 * so there's a bit more work than just grabbing the values from ACF
 */

// we'll build a 'button block' based on those conditions.
$button_block = '';
$button_block_open = '<div class="banner-buttons">';
$button_block_close = '</div>';

// if our button count is more than zero, we have buttons to build.
if ( $button_count > 0 ) {

	// add the opening markup to our button block.
	$button_block .= $button_block_open;

	// set a button class to make sure we don't make black buttons on a black BG.
	// all banner colors, besides black, use the dark buttons.
	$button_class = 'dark';
	if ( 'black' == $color ) {
		$button_class = 'gold';
	}

	// if we got here we have more than zero buttons, so we will render button #1.
	$button_block .= '<a href="' . $button_one_url . '" class="btn btn-sm btn-' . $button_class . '" data-ga="' . esc_attr($button_one_text) . '" data-ga-name="onclick" data-ga-event="link" data-ga-action="click" data-ga-type="' . (strpos($button_one_url, 'asu.edu') !== false || strpos($button_one_url, '/') === 0 ? 'internal link' : 'external link') . '" data-ga-region="main content" data-ga-section="banner">' . $button_one_text . '</a>';

	// if we have two buttons (the maximum), we also render button #2.
	if ( 2 == $button_count ) {
		$button_block .= '<a href="' . $button_two_url . '" class="btn btn-sm btn-' . $button_class . '" data-ga="' . esc_attr($button_two_text) . '" data-ga-name="onclick" data-ga-event="link" data-ga-action="click" data-ga-type="' . (strpos($button_two_url, 'asu.edu') !== false || strpos($button_two_url, '/') === 0 ? 'internal link' : 'external link') . '" data-ga-region="main content" data-ga-section="banner">' . $button_two_text . '</a>';
	}

	// add the closing markup to the button block.
	$button_block .= $button_block_close;
}
?>

<div class="container-fluid banner-<?php echo $color; ?> <?php echo $additional_classes; ?>">
	<div class="container px-0">
		<div class="row">
			<div class="col">
				<div class="banner" role="banner">
					<div class="banner-icon">
						<span title="Banner" class="fas fa-<?php echo $icon; ?>"></span>
					</div>
					<div class="banner-content">
						<h3><?php echo $banner_title; ?></h3>
						<?php echo $body; ?>
					</div>
					<?php echo $button_block; ?>
					<?php if ( $show_close_button ) : ?>
						<div class="banner-close">
							<button type="button" class="btn btn-circle btn-circle-alt-white close" aria-label="Close" data-ga="banner close" data-ga-name="onclick" data-ga-event="button" data-ga-action="click" data-ga-type="close" data-ga-region="main content" data-ga-section="banner" onclick="event.target.parentNode.parentNode.style.display='none';">x</button>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
