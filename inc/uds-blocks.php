<?php
/**
 * UDS Blocks
 *
 * This file is responsible for loading all of our block 'register.php' files
 * (found in the individual block folders) so that we can register our custom
 * blocks. We do this by hooking into ACF Pro's 'acf/init' action.
 *
 * When creating a new block, add the folder name to the $block_includes array
 * below. The folder should contain a 'register.php' file that does the actual
 * block registration, and your block template(s).
 */


function my_acf_blocks_init() {
	// Check to see if we have ACF Pro for block support.
	if( function_exists('acf_register_block_type') ) {

		// Array of block folders to use. Each must have a 'register.php' file.
		$block_includes = array (
			'/sample',                    // A sample block to be deleted at some point
		);

		// Loop through array items and include each register file.
		foreach ( $block_includes as $folder ) {
			require_once get_template_directory() . '/templates-blocks' . $folder . '/register.php';
		}
	}
}
add_action('acf/init', 'my_acf_blocks_init');
