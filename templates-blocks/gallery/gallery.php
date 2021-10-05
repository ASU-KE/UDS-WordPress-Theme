<?php
/**
 * UDS gallery Block
 *
 * @package UDS WordPress Theme
 * @author Zainab Alsidiki
 *
 * This is the media gallery block for using within the UDS WordPress theme.
 */

/**
 * Get values from ACF fields
 */


 // Check tabs exists.
 if ( have_rows( 'uds_gallery_items' ) ) {
 	$slide_order = 0;
	$uds_gallery_slider_id='gallery_'.date( 'hisa' );

 	// Loop through rows.
 	while ( have_rows( 'uds_gallery_items' ) ) {
 		the_row();

 		// Load sub field value.
 				$is_active = '';
 		if ( 0 == $slide_order ) {
 			$is_active = 'active';
				}
 		$uds_gallery_slide_image = get_sub_field( 'uds_gallery_image' );
		$uds_gallery_slide_image_url = $uds_gallery_slide_image['url'];
		$uds_gallery_slide_image_title = $uds_gallery_slide_image['title'];
		$uds_gallery_slide_image_alt = $uds_gallery_slide_image['alt'];
		$uds_gallery_slide_single_image='<img class="d-block w-100" src="'.$uds_gallery_slide_image_url.'" title="'.$uds_gallery_slide_image_title.'" alt="'.$uds_gallery_slide_image_alt.'" />';
    $uds_gallery_slide_images[]= '<div class="carousel-item '.$is_active.'">'.$uds_gallery_slide_single_image.'</div>';
		$uds_gallery_slide_indicators[]='<li data-target="#'.$uds_gallery_slider_id.'" data-slide-to="'.$slide_order .'" class="'.$is_active.'">'.$uds_gallery_slide_single_image.'</li>';
		$slide_order++;
}
}

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}

?>


<div id="<?php echo $uds_gallery_slider_id;?>" class="uds-gallery-block carousel slide <?php echo $additional_classes;?>" data-interval="false">

  <div class="carousel-inner">
		<?php
		foreach ($uds_gallery_slide_images as $uds_gallery_slide_image) {
			echo $uds_gallery_slide_image;
		}
		?>


  </div>
	<div class="uds-gallery-controls border">
	<a class="carousel-control-prev" href="#<?php echo $uds_gallery_slider_id;?>" role="button" data-slide="prev">
		<span class="fa-stack">
			<i class="fas fa-circle fa-stack-2x" style="color: #fff;"></i>
			<i class="fas fa-chevron-left fa-stack-1x" style="color: black;"></i>
		</span>
		<span class="sr-only">Previous</span>
	</a>
	<ol class="carousel-indicators">
    <?php
		foreach ($uds_gallery_slide_indicators as $uds_gallery_slide_indicator) {
			echo $uds_gallery_slide_indicator;
		}
		?>
  </ol>
	<a class="carousel-control-next" href="#<?php echo $uds_gallery_slider_id;?>" role="button" data-slide="next">
		<span class="fa-stack" aria-hidden="true">
			<i class="fas fa-circle fa-stack-2x" style="color: #fff;"></i>
			<i class="fas fa-chevron-right fa-stack-1x" style="color: black;"></i>
		</span>
		<span class="sr-only">Next</span>
	</a>
</div>


</div>
