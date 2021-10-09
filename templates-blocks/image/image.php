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

/**
 * If any scaling was applied (i.e. the image size is not 100%), then we
 * wrap the image in a div for aligning the smaller image as desired, and
 * another div with the width (as a percentage) the user selected to do the
 * actual scaling.
 */
$resized_image = false;
$resized_image_start = '';
$resized_image_end = '';

if ( 100 != $image_scale ) {
	$resized_image = true;
	$resized_image_start = '<div class="uds-img-align-wrapper d-flex justify-content-' . get_field( 'uds_image_resized_image_alignment' ) . '">';
	$resized_image_start .= '<div style="width: ' . $image_scale . '%">';
	$resized_image_end = '</div></div>';
}

$image_with_text_wrap = get_field( 'uds_image_wrap_text_around_image' );
if ( $image_with_text_wrap ) {
	$resized_image_start = '<div style="width: ' . $image_scale . '%" class="uds-img-with-text-wrap float-' . get_field( 'uds_image_alignment_when_text_wrapped_around' ) . '">';
	$resized_image_end = '</div>';
}

// Caption data.
$caption_type = get_field( 'uds_image_caption_type' );
$user_caption = get_field( 'uds_image_caption', false, false );
$media_library_caption = $image_data['caption'];

// Image effects.
$image_shadow = get_field( 'uds_image_shadow_effect' );

// Create a CSS class for the drop-shadow if selected.
if ( $image_shadow ) {
	$image_shadow_class = ' uds-img-drop-shadow';
} else {
	$image_shadow_class = '';
}

// Set the image caption based on the user's choice, or default to none.
switch ( $caption_type ) {
	case 'custom':
		$image_caption_text = $user_caption;
		break;

	case 'library':
		$image_caption_text = $media_library_caption;
		break;

	default:
		$image_caption_text = '';
}

// If there is a caption, create the HTML for it.
if ( ! empty( $image_caption_text ) ) {
	$image_caption_markup = '
	<figcaption class="figure-caption uds-figure-caption">
		<span class="uds-caption-text">
			' . $image_caption_text . '
		</span>
	</figcaption>';
} else {
	$image_caption_markup = '';
}

// Bring in any additional classes added by our users.
$additional_classes = '';
if ( ! empty( $block['className'] ) ) {
	$additional_classes = $block['className'];
}

// Render the block.
?>
<?php echo $resized_image_start; ?>
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
<?php echo $resized_image_end; ?>
