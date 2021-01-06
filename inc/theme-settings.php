<?php
/**
 * Check and setup theme's default settings
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'uds_wp_setup_theme_default_settings' ) ) {
	/**
	 * Store default theme settings in database.
	 */
	function uds_wp_setup_theme_default_settings() {
		$defaults = uds_wp_get_theme_default_settings();
		$settings = get_theme_mods();

		foreach ( $defaults as $setting_id => $default_value ) {
			// Check if setting is set, if not set it to its default value.
			if ( ! isset( $settings[ $setting_id ] ) ) {
				set_theme_mod( $setting_id, $default_value );
			}
		}
	}
}

if ( ! function_exists( 'uds_wp_get_theme_default_settings' ) ) {
	/**
	 * Retrieve default theme settings.
	 *
	 * @return array
	 */
	function uds_wp_get_theme_default_settings() {
		$defaults = array(
			'posts_index_style'      => 'default',   // Latest blog posts style.
			'sidebar_position'       => 'right',     // Sidebar position.
			'container_type'         => 'container', // Container width.
			'sitename_as_link'       => false, // default to the site title being plain text, NOT a link
			'footer_logo_type'       => 'asu', // default to the ASU logo. See img/unit-logos.json for options.
			'logo_select'            => 'none', // default the endorsed logo drop-down to none
			'footer_row_actions'     => 'enabled', // default to having the logo/social row in the footer enabled
			'footer_row_branding'    => 'enabled', // default to having the menu row in the footer enabled
			'header_navigation_menu' => 'enabled', // enable main nav menu by default.
			'nav_menu_locations'     => array( // enable example main, footer, and social media menus by default.
				'footer'       => 2,
				'primary'      => 3,
				'social-media' => 4,
			),
		);

		/**
		 * Filters the default theme settings.
		 *
		 * @param array $defaults Array of default theme settings.
		 */
		return apply_filters( 'uds_wp_theme_default_settings', $defaults );
	}
}
