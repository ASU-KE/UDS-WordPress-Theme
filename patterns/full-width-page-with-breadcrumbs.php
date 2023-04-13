<?php
/**
 * Title: Full-width page with breadcrumbs
 * Slug: full-width-page-with-breadcrumbs
 * Description: A full-width page starter, with breadcrumbs at the top.
 * Categories: page-starters
 * Keywords: page, full-width, breadcrumbs
 * Viewport Width: 1920
 * Block Types:
 * Post Types: page
 * Inserter: true
 */

?>
<!-- wp:unityblocks/hero {"mediaId":5279,"mediaUrl":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/medium-hero-placeholder.png","subTitleText":"Starter page","titleText":"Full width with breadcrumbs","contentsText":"A single column layout with the Yoast breadcrumb block","hideContents":"yes"} -->
<div id="unityblocks-hero" class="wp-block-unityblocks-hero hide-content" data-herotype="heading-hero" data-image="{&quot;url&quot;:&quot;<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/medium-hero-placeholder.png&quot;,&quot;altText&quot;:&quot;&quot;,&quot;cssClass&quot;:[],&quot;size&quot;:&quot;medium&quot;}" data-subtitle="{&quot;text&quot;:&quot;Starter page&quot;,&quot;highlightColor&quot;:&quot;white&quot;,&quot;maxWidth&quot;:&quot;&quot;,&quot;cssClass&quot;:[]}" data-title="{&quot;text&quot;:&quot;Full width with breadcrumbs&quot;,&quot;highlightColor&quot;:&quot;gold&quot;,&quot;maxWidth&quot;:&quot;&quot;,&quot;cssClass&quot;:[]}" data-contents="[{&quot;text&quot;:&quot;A single column layout with the Yoast breadcrumb block&quot;,&quot;maxWidth&quot;:&quot;&quot;,&quot;cssClass&quot;:[],&quot;highlightColor&quot;:&quot;white&quot;}]" data-contentscolor="white"></div>
<!-- /wp:unityblocks/hero -->

<!-- wp:wp-bootstrap-blocks/container {"marginAfter":"mb-0"} -->
<!-- wp:wp-bootstrap-blocks/row {"template":"custom","className":"mb-6 mb-xl-10"} -->
<!-- wp:wp-bootstrap-blocks/column {"sizeXs":0} -->
<!-- wp:yoast-seo/breadcrumbs {"className":"py-4 mb-0"} /-->

<!-- wp:separator {"className":"my-0"} -->
<hr class="wp-block-separator has-alpha-channel-opacity my-0"/>
<!-- /wp:separator -->
<!-- /wp:wp-bootstrap-blocks/column -->
<!-- /wp:wp-bootstrap-blocks/row -->

<!-- wp:wp-bootstrap-blocks/row {"template":"custom"} -->
<!-- wp:wp-bootstrap-blocks/column {"sizeXs":0} -->
<!-- wp:heading {"className":"mt-0"} -->
<h2 class="wp-block-heading mt-0">Content area</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lead"} -->
<p class="lead">This is a paragraph that has been given the "lead" class for when you want to emphasize something.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This type of layout is <strong>not</strong> optimal for text, as running text across the full content area like this violates the design standard calling for no more than 72 characters per line.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>There is a pattern that will let you easily insert a row whose columns will automatically resize to stay as close to the standard as possible at different screen sizes.</p>
<!-- /wp:paragraph -->
<!-- /wp:wp-bootstrap-blocks/column -->
<!-- /wp:wp-bootstrap-blocks/row -->
<!-- /wp:wp-bootstrap-blocks/container -->
