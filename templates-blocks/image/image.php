<?php
/**
 * UDS Image Block
 *
 * ACF Pro block to create UDS standard image markup. Supports:
 * - UDS style captions
 * - UDS drop-shadow
 * - User-configurable scaling from 25% to 100% of the image
 *
 * @package UDS WordPress Theme
 */

 // Basic Image data.
 $image_id = 'uds_image_' . $block['id'];
 $image_data = get_field( 'uds_image_image_file' );
 $image_url = $image_data['url'];
 $image_alt = $image_data['alt'];
 $image_title = $image_data['title'];

 // Image scale value.
 $image_scale = get_field( 'uds_image_image_scale' );

 // If any scaling was provided, set $resized_image to TRUE.
 $resized_image = false;
 if( 100 != $image_scale ) {
	 $resized_image = true;
 }

 // Caption data.
 $caption_type = get_field( 'uds_image_caption_type' );
 $user_caption = get_field( 'uds_image_caption', false, false );
 $media_library_caption = $image_data['caption'];

 // Image effects.
 $image_shadow = get_field( 'uds_image_shadow_effect' );

// Create a CSS class for the drop-shadow if selected.
 if ($image_shadow){
	 $image_shadow_class = ' uds-img-drop-shadow';
 }
 else {
	 $image_shadow_class = '';
 }

// Set the image caption based on the user's choice. Default to no caption.
switch ($caption_type) {
	case 'library':
		$image_caption_text = $media_library_caption;
		break;

	case 'custom':
		$image_caption_text = $user_caption;
		break;

	case 'none':
	default:
		$image_caption_text = '';
}

// If there is a caption, create the HTML for it.
if ( ! empty( $image_caption_text ) ) {
	$image_caption_markup = '
	<figcaption class="figure-caption uds-figure-caption">
		<span class="uds-caption-text">
			'. $image_caption_text .'
		</span>
	</figcaption>';
}else{
	$image_caption_markup = '';
}

// Bring in any additional classes added by our users.
$additional_classes = '';
if ( ! empty( $block['className'] ) ) {
	$additional_classes = $block['className'];
}

// Render the block...
?>
<?php if ( $resized_image ) echo '<div class="uds-img-align-wrapper d-flex justify-content-' . get_field( 'uds_image_resized_image_alignment' ) . '"><div style="width: ' . $image_scale . '%">'; ?>
<div class="uds-img <?php echo $additional_classes . $image_shadow_class; ?>">
	<figure class="figure uds-figure">
		<img
			alt="<?php echo $image_alt; ?>"
			title="<?php echo $image_title; ?>"
			class="uds-img figure-img img-fluid"
			src="<?php echo $image_url; ?>"
		/>
		<?php echo $image_caption_markup; ?>
	</figure>
</div>
<?php if ( $resized_image ) echo '</div></div>'; ?>
