<?php
/**
 * Title: Card on photo
 * Slug: card-on-photo
 * Description: Call to action with a "card" on the left
 * Categories: uds-cards
 * Keywords: call, action, card
 * Viewport Width: 1920
 * Block Types: 
 * Post Types: 
 * Inserter: true
 */

?>
<!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/fff.jpg","dimRatio":0,"minHeight":420,"isDark":false} -->
<div class="wp-block-cover is-light" style="min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/fff.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:wp-bootstrap-blocks/container {"marginAfter":"mb-0"} -->
<!-- wp:wp-bootstrap-blocks/row {"template":"custom"} -->
<!-- wp:wp-bootstrap-blocks/column {"sizeLg":4,"sizeMd":6} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|uds-size-4","right":"var:preset|spacing|uds-size-4","bottom":"var:preset|spacing|uds-size-4","left":"var:preset|spacing|uds-size-4"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--uds-size-4);padding-right:var(--wp--preset--spacing--uds-size-4);padding-bottom:var(--wp--preset--spacing--uds-size-4);padding-left:var(--wp--preset--spacing--uds-size-4)"><!-- wp:heading {"level":3} -->
<h3>Lorem ipsum</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<!-- /wp:paragraph -->

<!-- wp:acf/uds-button {"name":"acf/uds-button","data":{"tag_type":"link","_tag_type":"field_6269c6c11bb7d","button_link":"","_button_link":"field_60522a8361f39","external_link":"0","_external_link":"field_601e39a0afff2","button_color":"maroon","_button_color":"field_601f031d80f7e","button_size":"default","_button_size":"field_601f61b7ff690","icon":"","_icon":"field_602c30da61fbb","remove_outer_div":"0","_remove_outer_div":"field_6269bd7ae75f4","button_attributes":"","_button_attributes":"field_626b104524e2a"},"mode":"preview"} /--></div>
<!-- /wp:group -->
<!-- /wp:wp-bootstrap-blocks/column -->
<!-- /wp:wp-bootstrap-blocks/row -->
<!-- /wp:wp-bootstrap-blocks/container --></div></div>
<!-- /wp:cover -->
