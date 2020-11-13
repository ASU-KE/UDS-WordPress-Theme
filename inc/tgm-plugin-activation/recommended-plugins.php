<?php
/**
 * This file contains the code that recommends or reqiuires plugins to be present.
 * Based on the included TGMPA library.
 * See: http://tgmpluginactivation.com/ for details.
 *
 * @package uds-wordpress-theme
 */

add_action( 'tgmpa_register', 'uds_wp_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function uds_wp_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// The 'is_callable' setting in the array should check for ACF or ACF Pro.
		array(
			'name'        => 'Advanced Custom Fields',
			'slug'        => 'advanced-custom-fields',
			'is_callable' => 'get_field',
			'required'    => 'false',
		),

	);

	/*
	 * Array of configuration settings.
	 */
	$config = array(
		'id'           => 'uds-wordpress-theme',   // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
