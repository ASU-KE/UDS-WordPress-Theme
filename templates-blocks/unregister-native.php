<?php
/**
 * File: unregister-native.php
 *
 * @package UDS WordPress Theme
 */

if ( ! function_exists( 'uds_wordpress_unregister_native_blocks' ) ) {

	/**
	 * Gather the list of registered blocks, remove elements from the returned array.
	 */
	function uds_wordpress_unregister_native_blocks() {
		// Get the list of registered blocks including those added by plugins.
		$registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

		// Removing native blocks from the "text" category.
		unset( $registered_blocks['core/verse'] );
		unset( $registered_blocks['core/pullquote'] );
		unset( $registered_blocks['core/preformatted'] );

		// Strip the array down to just the keys.
		$registered_blocks = array_keys( $registered_blocks );

		return $registered_blocks;
	}

	add_filter( 'allowed_block_types', 'uds_wordpress_unregister_native_blocks' );
}
