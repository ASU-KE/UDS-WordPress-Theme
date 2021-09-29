<?php
/**
 * UDS Foldable card block
 *
 * @package UDS WordPress Theme
 */

 $image_id = 'uds_image_' . $block['id'];
 $image_data = get_field( 'uds_image_image_file' );
 $image_url = $image_data['url'];
 $image_alt = $image_data['alt'];
 $image_title = $image_data['title'];
 $image_caption = $image_data['caption']? $image_data['caption']:get_field( 'uds_image_caption' );
 $image_shadow = get_field( 'uds_image_shadow_effect' );
 $image_small_size = get_field( 'uds_image_small_size' );

 if ($image_shadow){
	 $image_shadow_class = ' uds-img-drop-shadow';
 }
 else {
	 $image_shadow_class = '';
 }

if ($image_caption){
	$image_caption_text='
 <figcaption class="figure-caption uds-figure-caption">
 	<span class="uds-caption-text">
 		'. $image_caption .'
 	</span>
 </figcaption>';
} else {
	$image_caption_text='';
}
$additional_classes = '';
if ( ! empty( $block['className'] ) ) {
	$additional_classes = $block['className'];
}







?>

<?php if ($image_small_size) echo '<div style="width:25%;">'; ?>
<div class="uds-img <?php echo $additional_classes.$image_shadow_class; ?>">
          <figure class="figure uds-figure">
            <img
              alt="<?php echo $image_alt; ?>"
							title="<?php echo $image_title; ?>"
              class="uds-img figure-img img-fluid"
              src="<?php echo $image_url; ?>"
            />
            <?php echo $image_caption_text; ?>
          </figure>
        </div>
<?php if ($image_small_size) echo '</div>'; ?>
