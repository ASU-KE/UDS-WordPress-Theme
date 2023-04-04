<?php
/**
 * Title: Sidebar Left Page with breadcrumbs
 * Slug: sidebar-left-page-with-breadcrumbs
 * Description: Page starter with left-hand sidebar and breadcrumbs at the top
 * Categories: pages
 * Keywords: sidebar, columns, two, breadcrumbs
 * Viewport Width: 1200
 * Block Types: core/post-content
 * Post Types: page
 * Inserter: true
 */

?>
<!-- wp:unityblocks/hero {"mediaId":4863,"mediaUrl":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/medium-hero-placeholder.png","subTitleText":"Page starter","titleText":"Sidebar left with breadcrumbs","contentsText":"A two column layout with the main content on the right and the Yoast breadcrumb block","hideContents":"yes"} -->
<div id="unityblocks-hero" class="wp-block-unityblocks-hero hide-content" data-herotype="heading-hero" data-image="{&quot;url&quot;:&quot;<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/patterns/images/medium-hero-placeholder.png&quot;,&quot;altText&quot;:&quot;&quot;,&quot;cssClass&quot;:[],&quot;size&quot;:&quot;medium&quot;}" data-subtitle="{&quot;text&quot;:&quot;Page starter&quot;,&quot;highlightColor&quot;:&quot;white&quot;,&quot;maxWidth&quot;:&quot;&quot;,&quot;cssClass&quot;:[]}" data-title="{&quot;text&quot;:&quot;Sidebar left with breadcrumbs&quot;,&quot;highlightColor&quot;:&quot;gold&quot;,&quot;maxWidth&quot;:&quot;&quot;,&quot;cssClass&quot;:[]}" data-contents="[{&quot;text&quot;:&quot;A two column layout with the main content on the right and the Yoast breadcrumb block&quot;,&quot;maxWidth&quot;:&quot;&quot;,&quot;cssClass&quot;:[],&quot;highlightColor&quot;:&quot;white&quot;}]" data-contentscolor="white"></div>
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

<!-- wp:wp-bootstrap-blocks/row {"template":"1-2","className":"justify-content-between"} -->
<!-- wp:wp-bootstrap-blocks/column {"sizeMd":4,"className":"mb-6 mb-lg-0"} -->
<!-- wp:shortcode -->
[uds-sidebar-menu menu="your-menu-name-here"]
<!-- /wp:shortcode -->
<!-- /wp:wp-bootstrap-blocks/column -->

<!-- wp:wp-bootstrap-blocks/column {"sizeMd":7} -->
<!-- wp:heading {"className":"mt-0"} -->
<h2 class="wp-block-heading mt-0">Content area</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lead"} -->
<p class="lead">This is a paragraph that has been given the "lead" class for when you want to emphasize something.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
<!-- /wp:paragraph -->
<!-- /wp:wp-bootstrap-blocks/column -->
<!-- /wp:wp-bootstrap-blocks/row -->
<!-- /wp:wp-bootstrap-blocks/container -->
