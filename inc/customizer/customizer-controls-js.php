<?php
/**
 * UDS WordPress Theme Customizer
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'uds_wp_customize_controls_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function uds_wp_customize_controls_js() {
		wp_enqueue_script(
			'uds_wp_customizer_controls',
			get_template_directory_uri() . '/js/customizer-controls.js',
			array( 'customize-controls' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_controls_enqueue_scripts', 'uds_wp_customize_controls_js' );
