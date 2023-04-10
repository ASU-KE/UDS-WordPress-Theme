<?php
/**
 * Title: Image on left with text
 * Slug: image-left-with-text
 * Description: A full-width cover block with an image on the left and text on the right
 * Categories: call-to-action
 * Keywords: nsf, call, action
 * Viewport Width: 1920
 * Block Types: 
 * Post Types: 
 * Inserter: true
 */

?>
<!-- wp:cover {"dimRatio":60,"isDark":false} -->
<div class="wp-block-cover is-light"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:wp-bootstrap-blocks/container {"marginAfter":"mb-0"} -->
<!-- wp:wp-bootstrap-blocks/row {"template":"custom"} -->
<!-- wp:wp-bootstrap-blocks/column {"sizeMd":4,"lock":{"move":false,"remove":false},"className":"text-center"} -->
<!-- wp:image {"id":354,"width":125,"height":125,"sizeSlug":"full","linkDestination":"none","className":"is-style-uds-image"} -->
<figure class="wp-block-image size-full is-resized is-style-uds-image"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/fafafa" alt="" class="wp-image-354" width="125" height="125"/></figure>
<!-- /wp:image -->
<!-- /wp:wp-bootstrap-blocks/column -->

<!-- wp:wp-bootstrap-blocks/column {"sizeMd":8,"lock":{"move":false,"remove":false},"className":"d-flex justify-content-lg-center align-items-center"} -->
<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|asu-gold"}}}},"textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-color has-text-color has-link-color"><!-- wp:heading {"level":3,"className":"mt-0"} -->
<h3 class="wp-block-heading mt-0">Lorem ipsum</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lead"} -->
<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Lorem ipsum. <a href="#">Lorem ipsum dolor sit amet.</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- /wp:wp-bootstrap-blocks/column -->
<!-- /wp:wp-bootstrap-blocks/row -->
<!-- /wp:wp-bootstrap-blocks/container --></div></div>
<!-- /wp:cover -->
