<?php
/**
 * A function called via the 'init' hook that creates our custom pattern categories
 */


/**
 * Array of categories to be registered. The order here is reflected in certain
 * UI elements, so we're trying to keep these alphabetical by the 'label' field.
 */
function uds_wordpress_register_pattern_categories() {

	$patterns = array(
		array( 'slug' => 'call-to-action', 'label' => 'Call to Action' ),
		array( 'slug' => 'cards', 'label' => 'Cards'),
		array( 'slug' => 'image-and-text', 'label' => 'Image and text'),
		array( 'slug' => 'photo-cards', 'label' => 'Photo Cards' ),
		array( 'slug' => 'news-and-events', 'label' => 'News and Events'),
		array( 'slug' => 'page-starters', 'label' => 'Page Starters'),
		array( 'slug' => 'quotes', 'label' => 'Quotes' ),
		array( 'slug' => 'video-and-text', 'label' => 'Video and Text'),
		array( 'slug' => 'miscellaneous', 'label' => 'Miscellaneous'),
	);

	if( function_exists( 'register_block_pattern_category' ) ) {
		foreach( $patterns as $thisPattern ) {
			register_block_pattern_category(
				$thisPattern['slug'],
				array( 'label' => __( $thisPattern['label'], 'uds-wordpress-theme' ) )
			);
		}
	}
}
add_action( 'init', 'uds_wordpress_register_pattern_categories' );
