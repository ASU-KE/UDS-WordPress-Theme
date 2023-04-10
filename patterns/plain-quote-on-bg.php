<?php
/**
 * Title: Plain Quote on BG
 * Slug: plain-quote-on-bg
 * Description: A single UDS block quote in a cover block for use with a photo or patterned background
 * Categories: quotes
 * Keywords: quote, background, full
 * Viewport Width: 1920
 * Block Types: 
 * Post Types: 
 * Inserter: true
 */

?>
<!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/1920X480.png","id":5177,"dimRatio":50,"minHeight":480,"isDark":false} -->
<div class="wp-block-cover is-light" style="min-height:480px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-5177" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/1920X480.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:wp-bootstrap-blocks/container -->
<!-- wp:wp-bootstrap-blocks/row {"template":"2-1"} -->
<!-- wp:wp-bootstrap-blocks/column {"sizeMd":8} -->
<!-- wp:group {"textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-color has-text-color"><!-- wp:acf/uds-blockquote {"name":"acf/uds-blockquote","data":{"quote_text":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","_quote_text":"field_602c64c2f0dcd","name":"Lorem Ipsum","_name":"field_602c6539f0dce","description":"","_description":"field_602c658af0dcf","quote_image":"0","_quote_image":"field_602c6279c09d8","accent_none":"gold","_accent_none":"field_602c63e7c09db","background_color":"none","_background_color":"field_602c637dc09da","add_space":"0","_add_space":"field_603ffa83a5fbd"},"mode":"preview"} /--></div>
<!-- /wp:group -->
<!-- /wp:wp-bootstrap-blocks/column -->

<!-- wp:wp-bootstrap-blocks/column {"sizeMd":4,"className":"d-flex flex-column justify-content-lg-center align-items-center"} /-->
<!-- /wp:wp-bootstrap-blocks/row -->
<!-- /wp:wp-bootstrap-blocks/container --></div></div>
<!-- /wp:cover -->
