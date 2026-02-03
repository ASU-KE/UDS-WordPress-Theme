<?php
/**
 * UDS Text Marquee Block
 *
 * @package UDS WordPress Theme
 *
 * An accessible text marquee block with animation controls and pause functionality.
 */

// Get ACF field values
$marquee_text = get_field( 'marquee_text' );
$animation_duration = get_field( 'animation_duration' );
$reverse_direction = get_field( 'reverse_direction' );

// Set default values if fields are empty
$marquee_text = $marquee_text ? $marquee_text : 'Enter your scrolling text here';
$animation_duration = $animation_duration ? intval( $animation_duration ) : 10;
$reverse_direction = $reverse_direction ? 'reverse' : 'normal';

// Generate unique ID for this block instance
$block_id = 'marquee-' . $block['id'];

// Get additional classes if any
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}

// Get text color and background color from block supports
$text_color = '';
$bg_color = '';
if ( isset( $block['textColor'] ) ) {
	$text_color = 'has-' . $block['textColor'] . '-color';
}
if ( isset( $block['backgroundColor'] ) ) {
	$bg_color = 'has-' . $block['backgroundColor'] . '-background-color';
}

// Get custom text color if set
$inline_style = '';
if ( isset( $block['style']['color']['text'] ) ) {
	$inline_style = 'style="color: ' . esc_attr( $block['style']['color']['text'] ) . ';"';
}

?>

<div class="uds-text-marquee-wrapper <?php echo esc_attr( $additional_classes ); ?> <?php echo esc_attr( $bg_color ); ?>" 
     id="<?php echo esc_attr( $block_id ); ?>"
     data-animation-duration="<?php echo esc_attr( $animation_duration ); ?>"
     data-direction="<?php echo esc_attr( $reverse_direction ); ?>"
     role="region"
     aria-label="Scrolling text">
     
	<div class="uds-marquee-content <?php echo esc_attr( $text_color ); ?>" <?php echo $inline_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- esc_attr() applied to the color value within the inline style. ?>>
		<span class="marquee-text" aria-live="off"><?php echo wp_kses_post( $marquee_text ); ?></span>
		<span class="marquee-text" aria-hidden="true"><?php echo wp_kses_post( $marquee_text ); ?></span>
	</div>
	
	<button class="uds-marquee-pause-btn" 
	        aria-label="Pause scrolling text"
	        aria-pressed="false"
	        type="button">
		<span class="pause-icon" aria-hidden="true">⏸</span>
		<span class="play-icon" aria-hidden="true" style="display: none;">▶</span>
		<span class="sr-only">Pause</span>
	</button>
</div>
