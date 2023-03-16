<?php
/**
 * A function called via the 'init' hook that creates our custom pattern categories
 */


/**
 * Array of patterns to be registered.
 */
function uds_wordpress_register_pattern_categories() {

	$patterns = array(
		array( 'slug' => 'photocards' , 'label' => 'Photo Cards' ),
		array( 'slug' => 'call-to-action', 'label' => 'Calls to Action' ),
		array( 'slug' => 'quotes', 'label' => 'Quotes' ),
		array( 'slug' => 'layouts', 'label' => 'Layouts'),
		array( 'slug' => 'uds-cards', 'label' => 'UDS Cards'),
		array( 'slug' => 'dynamic', 'label' => 'Dynamic')
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
