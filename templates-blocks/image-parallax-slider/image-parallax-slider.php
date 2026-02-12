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
$foreground_aria_label = get_field( 'uds_parallax_foreground_aria_label' );
$foreground_alignment = get_field( 'uds_parallax_foreground_alignment' );
$foreground_offset_percent = get_field( 'uds_parallax_foreground_offset_percent' );
$container_height = get_field( 'uds_parallax_container_height' );
$bg_position = get_field( 'uds_parallax_bg_position' );
$bg_size = get_field( 'uds_parallax_bg_size' );
$fg_width = get_field( 'uds_parallax_foreground_width' );
$fg_height = get_field( 'uds_parallax_foreground_height' );

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

// Set defaults for new fields
if ( ! $bg_position ) {
	$bg_position = 'center';
}

if ( ! $bg_size ) {
	$bg_size = 'cover';
}

// Set aria-label - use custom label or fall back to image alt text
$aria_label = $foreground_aria_label ? $foreground_aria_label : $foreground_image['alt'];
if ( empty( $aria_label ) ) {
	$aria_label = 'Decorative image';
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
if ( $foreground_alignment === 'left' || $foreground_alignment === 'right' ) {
	$classes .= 'align-' . esc_attr( $foreground_alignment ) . ' ';
}
if ( $foreground_alignment === 'offset-left' ) {
	$classes .= 'offset-left ';
}
if ( $foreground_alignment === 'offset-right' ) {
	$classes .= 'offset-right ';
}
$classes .= $additional_classes;

// Build inline styles for foreground image if width/height are set
$fg_style = '';
if ( $fg_width && is_numeric( $fg_width ) ) {
	$fg_style .= 'width: ' . intval( $fg_width ) . 'px; ';
}
if ( $fg_height && is_numeric( $fg_height ) ) {
	$fg_style .= 'height: ' . intval( $fg_height ) . 'px; ';
}

?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $classes ); ?>" data-parallax-block="true"<?php if ( $container_height && is_numeric( $container_height ) ) { echo ' style="' . esc_attr( 'min-height: ' . intval( $container_height ) . 'px' ) . '"'; } ?>>
	<?php
		// Build style attribute for parallax-container
		$parallax_container_style = '';
		if ( $container_height && is_numeric( $container_height ) ) {
			$parallax_container_style .= 'min-height: ' . intval( $container_height ) . 'px; ';
		}
		$parallax_container_style = trim( $parallax_container_style );
	?>
	<div class="parallax-container" data-bg-size="<?php echo esc_attr( $bg_size ); ?>"<?php if ( ! empty( $parallax_container_style ) ) { echo ' style="' . esc_attr( $parallax_container_style ) . '"'; } ?>>
		<!-- Background Image -->
		<img src="<?php echo esc_url( $background_image['url'] ); ?>" 
			alt="<?php echo esc_attr( $background_image['alt'] ); ?>" 
			data-parallax-factor="1.2"
			style="object-fit: <?php echo esc_attr( $bg_size ); ?>; width: 100%; height: 100%;" />
		
		<!-- Parallax Container Content with Foreground Image -->
		<div class="parallax-container-content"
			role="img"
			aria-label="<?php echo esc_attr( $aria_label ); ?>"
			<?php if ( ! empty( $fg_style ) ) { echo 'data-no-scale="' . esc_attr( 'true' ) . '" '; } ?>
			style="background-image: url('<?php echo esc_url( $foreground_image['url'] ); ?>');<?php if ( ! empty( $fg_style ) ) { echo ' ' . esc_attr( trim( $fg_style ) ); } ?><?php
				if ( $foreground_alignment === 'offset-left' && $foreground_offset_percent !== '' ) {
					echo ' position: absolute; left: ' . floatval( $foreground_offset_percent ) . '%;';
				}
				if ( $foreground_alignment === 'offset-right' && $foreground_offset_percent !== '' ) {
					echo ' position: absolute; right: ' . floatval( $foreground_offset_percent ) . '%;';
				}
			?>">
		</div>
	</div>
	
	<!-- Pause Button for Accessibility -->
	<button class="parallax-pause-btn" aria-label="Pause parallax animation" data-parallax-control="pause">
		<span class="pause-icon" aria-hidden="true">⏸</span>
		<span class="play-icon" aria-hidden="true" style="display: none;">▶</span>
	</button>
</div>
