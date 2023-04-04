<?php
/**
 * A function called via the 'init' hook that creates our custom pattern categories
 */


/**
 * Array of patterns to be registered. The order here is reflected in certain
 * UI elements, so we're trying to keep these alphabetical by the 'label' field.
 */
function uds_wordpress_register_pattern_categories() {

	$patterns = array(
		array( 'slug' => 'call-to-action', 'label' => 'Calls to Action' ),
		array( 'slug' => 'dynamic', 'label' => 'Dynamic'),
		array( 'slug' => 'images', 'label' => 'Images' ),
		array( 'slug' => 'layouts', 'label' => 'Layouts'),
		array( 'slug' => 'pages', 'label' => 'Page Starters'),
		array( 'slug' => 'photocards' , 'label' => 'Photo Cards' ),
		array( 'slug' => 'quotes', 'label' => 'Quotes' ),
		array( 'slug' => 'uds-cards', 'label' => 'UDS Cards')



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
