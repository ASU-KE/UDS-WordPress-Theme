<?php
/**
 * @package uds-wordpress-theme
 */

/**
 * custom theme settings -
 * 1) header
 */

if( function_exists('acf_add_options_page') ) {

	/**
	 * Restrict access to this options page to admin role only.
	 * The "enhanced multsite" section within will be restricted to super-admin only.
	 * Effectively prevents those settings from even showing up on a single site install of the theme.
	 */

	acf_add_options_page(array(
        'page_title'    => 'UDS Advanced Settings',
        'menu_title'    => 'UDS Advanced Settings',
        'menu_slug'     => 'uds-advanced-settings',
		'parent_slug'   => 'options-general.php',
        'capability'    => 'manage_options',
        'redirect'      => false,
    ));

}

/**
 * Add custom location rule to ACF to enable checking if the site is multisite.
 */
add_action('acf/init', 'pitchfork_init_multisite_location_rule');
function pitchfork_init_multisite_location_rule() {

    // Check function exists, then include and register the custom location type class.
    if( function_exists('acf_register_location_type') ) {
        include_once( get_template_directory() . '/inc/class-acf-add-multisite-location.php' );
        acf_register_location_type( 'UDS_ACF_Location_Is_Multisite' );
    }
}

