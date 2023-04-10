<?php
/**
 * Title: Text and image left (Md)
 * Slug: text-and-image-left-md
 * Description: A two equal column layout with an image on the left.
 * Categories: images, layouts
 * Keywords: image, column, two, left, medium
 * Viewport Width: 1200
 * Block Types: 
 * Post Types: 
 * Inserter: true
 */

?>
<!-- wp:wp-bootstrap-blocks/row {"template":"custom","className":"justify-content-between my-6"} -->
<!-- wp:wp-bootstrap-blocks/column {"sizeMd":4} -->
<!-- wp:image {"align":"right","id":5196,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image alignright size-full"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/384x384.png" alt="" class="wp-image-5196"/></figure>
<!-- /wp:image -->
<!-- /wp:wp-bootstrap-blocks/column -->

<!-- wp:wp-bootstrap-blocks/column {"sizeMd":7} -->
<!-- wp:paragraph -->
<p>This is a standard image and text layout. In this case:</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-default"} -->
<ul class="uds-list is-style-default"><!-- wp:list-item -->
<li>The image gets 3 Bootstrap columns, for a natural width of 384px</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>The content gets 7 Bootstrap columns</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>The extra columns space is put between the image and text through a Bootstrap flex box class placed on the <strong>row</strong>.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<!-- /wp:paragraph -->
<!-- /wp:wp-bootstrap-blocks/column -->
<!-- /wp:wp-bootstrap-blocks/row -->
