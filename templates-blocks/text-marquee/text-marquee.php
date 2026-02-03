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
		<span class="marquee-text"><?php echo wp_kses_post( $marquee_text ); ?></span>
		<span class="marquee-text" aria-hidden="true"><?php echo wp_kses_post( $marquee_text ); ?></span>
		<span class="marquee-text" aria-hidden="true"><?php echo wp_kses_post( $marquee_text ); ?></span>
		<span class="marquee-text" aria-hidden="true"><?php echo wp_kses_post( $marquee_text ); ?></span>
	</div>
	<div class="uds-marquee-controls buttons">
	<button id="playMarquee" type="button" class="btn btn-circle btn-circle-large uds-marquee-play-btn" data-ga="play text marquee" data-ga-name="onclick" data-ga-event="button" data-ga-action="click" data-ga-type="animation play" data-ga-region="text marquee" data-ga-section="text marquee">
        <svg class="svg-inline--fa fa-play" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
            <path fill="currentColor" d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"></path>
        </svg>
        <span class="visually-hidden">Play text marquee</span>
    </button>
    <button id="pauseMarquee" type="button" class="btn btn-circle btn-circle-large uds-marquee-pause-btn" data-ga="pause text marquee" data-ga-name="onclick" data-ga-event="button" data-ga-action="click" data-ga-type="animation pause" data-ga-region="text marquee" data-ga-section="text marquee">
        <svg class="svg-inline--fa fa-pause" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pause" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
            <path fill="currentColor" d="M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zm192 0c-26.5 0-48 21.5-48 48V400c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H240z"></path>
        </svg>
        <span class="visually-hidden">Pause text marquee</span>
    </button>
	</div>
</div>
