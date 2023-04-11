<?php
/**
 * Title: Full-width page starter
 * Slug: full-width-page-starter
 * Description: A basic hero with a standard container below it
 * Categories: page-starters
 * Keywords: full-width
 * Viewport Width: 1920
 * Block Types: core/post-content
 * Post Types: page
 * Inserter: true
 */

?>
<!-- wp:unityblocks/hero {"mediaId":4863,"mediaUrl":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/medium-hero-placeholder.png","subTitleText":"Page starter","titleText":"Full content width","contentsText":"A single column layout using the full content width.","hideContents":"yes"} -->
<div id="unityblocks-hero" class="wp-block-unityblocks-hero hide-content" data-herotype="heading-hero" data-image="{&quot;url&quot;:&quot;<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/medium-hero-placeholder.png&quot;,&quot;altText&quot;:&quot;&quot;,&quot;cssClass&quot;:[],&quot;size&quot;:&quot;medium&quot;}" data-subtitle="{&quot;text&quot;:&quot;Page starter&quot;,&quot;highlightColor&quot;:&quot;white&quot;,&quot;maxWidth&quot;:&quot;&quot;,&quot;cssClass&quot;:[]}" data-title="{&quot;text&quot;:&quot;Full content width&quot;,&quot;highlightColor&quot;:&quot;gold&quot;,&quot;maxWidth&quot;:&quot;&quot;,&quot;cssClass&quot;:[]}" data-contents="[{&quot;text&quot;:&quot;A single column layout using the full content width.&quot;,&quot;maxWidth&quot;:&quot;&quot;,&quot;cssClass&quot;:[],&quot;highlightColor&quot;:&quot;white&quot;}]" data-contentscolor="white"></div>
<!-- /wp:unityblocks/hero -->

<!-- wp:wp-bootstrap-blocks/container {"marginAfter":"mb-0"} -->
<!-- wp:wp-bootstrap-blocks/row {"template":"custom"} -->
<!-- wp:wp-bootstrap-blocks/column {"sizeXs":0} -->
<!-- wp:heading -->
<h2 class="wp-block-heading">Full content width</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lead"} -->
<p class="lead">This is a paragraph that has been given the "lead" class for when you want to emphasize something.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This layout is <strong>not</strong> optimal for text, as running text across the full content area like this violates the design standard calling for no more than 72 characters per line.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>There is a pattern that lets you easily drop in a row whose columns will resize automatically to stay as close as possible to the standards.</p>
<!-- /wp:paragraph -->
<!-- /wp:wp-bootstrap-blocks/column -->
<!-- /wp:wp-bootstrap-blocks/row -->
<!-- /wp:wp-bootstrap-blocks/container -->
