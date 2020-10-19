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
if ( ! function_exists( 'uds_wp_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function uds_wp_customize_preview_js() {
		wp_enqueue_script(
			'uds_wp_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'uds_wp_customize_preview_js' );
