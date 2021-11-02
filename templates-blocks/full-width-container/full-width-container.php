<?php
/**
 * UDS Full Width Container
 *
 * @package UDS WordPress Theme
 */



// Retrieve additional classes from the 'advanced' field in the editor.
$additional_classes = '';
if ( ! empty( $block['className'] ) ) {
	$additional_classes = $block['className'];
}


echo '</div>
</article>
</div></div></div>
';
	// Sets InnerBlocks with a Bootstrap blocks container as default content.
	$template = array(
		array(
				'wp-bootstrap-blocks/container',
				array(
					'marginAfter' => 'mb-0',
			    'isFluid' => true
				 ),
				array(
					array(
						'core/group',
						array(),
					),

				),
			),
		);

	echo '<InnerBlocks template="' . esc_attr( wp_json_encode( $template ) ) . '" />';
	echo '
	<div class="container single-news-post-container pt-md-4">
	<div class="row">
	<div class="col">
	<article class="post-1375 post type-post status-publish format-standard has-post-thumbnail hentry category-news category-uncategorized" id="post-1375">
<div class="entry-content">';


?>
