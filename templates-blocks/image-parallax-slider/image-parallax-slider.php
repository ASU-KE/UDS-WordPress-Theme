<?php
/**
 * Image Parallax Slider Block
 *
 * Creates visually attractive blocks with images that move independently on scroll.
 * WCAG 2.1 compliant with reduced motion support.
 *
 * @package UDS WordPress Theme
 */

// Get the background image, or set a placeholder if there isn't one.
$background_image = get_field( 'uds_parallax_background_image' );
$foreground_image = get_field( 'uds_parallax_foreground_image' );
$foreground_alignment = get_field( 'uds_parallax_foreground_alignment' );

// Set placeholders if images are not provided
if ( ! $background_image ) {
	$background_image = array(
		'url' => 'https://via.placeholder.com/1920x1080/8C1D40/FFFFFF?text=Background+Image',
		'alt' => 'Background placeholder image',
	);
}

if ( ! $foreground_image ) {
	$foreground_image = array(
		'url' => 'https://via.placeholder.com/800x600/FFC627/000000?text=Foreground+Image',
		'alt' => 'Foreground placeholder image',
	);
}

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}

// Generate unique ID for this block instance
$block_id = 'parallax-' . $block['id'];

// Combine classes
$classes = 'uds-image-parallax-slider ';
$classes .= 'align-' . esc_attr( $foreground_alignment ) . ' ';
$classes .= $additional_classes;

?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $classes ); ?>" data-parallax-block="true">
	<div class="parallax-container">
		<!-- Background Image Layer -->
		<div class="parallax-layer parallax-background" data-parallax-speed="0.5">
			<img src="<?php echo esc_url( $background_image['url'] ); ?>" 
			     alt="<?php echo esc_attr( $background_image['alt'] ); ?>" 
			     class="parallax-bg-image" 
			     loading="lazy" />
		</div>
		
		<!-- Foreground Image Layer -->
		<div class="parallax-layer parallax-foreground" data-parallax-speed="1.5">
			<img src="<?php echo esc_url( $foreground_image['url'] ); ?>" 
			     alt="<?php echo esc_attr( $foreground_image['alt'] ); ?>" 
			     class="parallax-fg-image" 
			     loading="lazy" />
		</div>
	</div>
	
	<!-- Pause Button for Accessibility -->
	<button class="parallax-pause-btn" aria-label="Pause parallax animation" data-parallax-control="pause">
		<span class="pause-icon" aria-hidden="true">⏸</span>
		<span class="play-icon" aria-hidden="true" style="display: none;">▶</span>
	</button>
</div>
