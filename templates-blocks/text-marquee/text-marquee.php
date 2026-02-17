<?php
/**
 * UDS Text Marquee Block
 *
 * @package UDS WordPress Theme
 *
 * An accessible text marquee block with animation controls and pause functionality.
 */

// Get ACF field values
$content_areas_count = get_field( 'content_areas_count' );
$marquee_text = get_field( 'marquee_text' );
$marquee_text_2 = get_field( 'marquee_text_2' );
$marquee_text_3 = get_field( 'marquee_text_3' );
$marquee_text_4 = get_field( 'marquee_text_4' );
$animation_duration = get_field( 'animation_duration' );
$reverse_direction = get_field( 'reverse_direction' );
$font_size = get_field( 'font_size' );
$font_weight = get_field( 'font_weight' );

// Set default values if fields are empty
$content_areas_count = $content_areas_count ? intval( $content_areas_count ) : 1;
$marquee_text = $marquee_text ? $marquee_text : 'Enter your scrolling text here';
$animation_duration = $animation_duration ? intval( $animation_duration ) : 10;
$reverse_direction = $reverse_direction ? 'reverse' : 'normal';
$font_size = $font_size ? floatval( $font_size ) : 1.5;
$font_weight = $font_weight && 'default' !== $font_weight ? $font_weight : '';

// Build array of text content based on number of content areas
$text_contents = array();
switch ( $content_areas_count ) {
	case 2:
		// Alternate between two texts
		$text_contents = array(
			$marquee_text,
			$marquee_text_2 ? $marquee_text_2 : $marquee_text,
			$marquee_text,
			$marquee_text_2 ? $marquee_text_2 : $marquee_text,
		);
		break;
	case 4:
		// Unique text in each position
		$text_contents = array(
			$marquee_text,
			$marquee_text_2 ? $marquee_text_2 : $marquee_text,
			$marquee_text_3 ? $marquee_text_3 : $marquee_text,
			$marquee_text_4 ? $marquee_text_4 : $marquee_text,
		);
		break;
	default:
		// Repeat same text in all positions
		$text_contents = array( $marquee_text, $marquee_text, $marquee_text, $marquee_text );
		break;
}

// Generate unique ID for this block instance
$block_id = 'marquee-' . $block['id'];

// Get additional classes if any
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}

// Build text classes
$text_classes = array();
if ( ! empty( $font_weight ) ) {
	$text_classes[] = 'font-weight-' . $font_weight;
}

// Build inline styles for marquee track (animation properties)
$track_inline_styles = array();
$track_inline_styles[] = '--marquee-duration: ' . esc_attr( $animation_duration ) . 's';
$track_inline_styles[] = '--marquee-direction: ' . esc_attr( $reverse_direction );
$track_inline_styles[] = '--marquee-font-size: ' . esc_attr( $font_size ) . 'rem';
$track_style_attr = 'style="' . implode( '; ', $track_inline_styles ) . ';"';

// Build inline styles for marquee text spans
$text_inline_styles = array();
if ( $font_size ) {
	$text_inline_styles[] = 'font-size: ' . esc_attr( $font_size ) . 'rem';
}

// Get text color from Gutenberg block attributes
$text_color = '';
if ( isset( $block['textColor'] ) ) {
	// Preset color (e.g., 'primary', 'secondary')
	$text_color = 'has-' . $block['textColor'] . '-color';
} elseif ( isset( $block['style']['color']['text'] ) ) {
	// Custom color
	$text_inline_styles[] = 'color: ' . esc_attr( $block['style']['color']['text'] );
}

$text_style_attr = ! empty( $text_inline_styles ) ? 'style="' . implode( '; ', $text_inline_styles ) . ';"' : '';

// Get background color from block supports
$bg_color = '';
if ( isset( $block['backgroundColor'] ) ) {
	$bg_color = 'has-' . $block['backgroundColor'] . '-background-color';
}

?>

<div class="uds-text-marquee-wrapper <?php echo esc_attr( $additional_classes ); ?> <?php echo esc_attr( $bg_color ); ?> <?php echo esc_attr( $text_color ); ?>" 
     id="<?php echo esc_attr( $block_id ); ?>"
     data-animation-duration="<?php echo esc_attr( $animation_duration ); ?>"
     data-direction="<?php echo esc_attr( $reverse_direction ); ?>"
     role="region"
     aria-label="Scrolling text">
     
	<div class="uds-marquee-content">
		<div class="uds-marquee-track <?php echo esc_attr( implode( ' ', $text_classes ) ); ?>" <?php echo $track_style_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- esc_attr() applied to each style value. ?>>
			<?php foreach ( $text_contents as $index => $text_content ) : ?>
				<span class="marquee-text" <?php echo 0 !== $index ? 'aria-hidden="true" ' : ''; ?><?php echo $text_style_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- esc_attr() applied to each style value. ?>><?php echo wp_kses_post( $text_content ); ?></span>
			<?php endforeach; ?>
		</div>
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
