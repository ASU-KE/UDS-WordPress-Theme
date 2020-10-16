<?php
/**
 * Custom hooks
 *
 * @package uds-wordpress
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'uds_wp_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function uds_wp_site_info() {
		do_action( 'uds_wp_site_info' );
	}
}

add_action( 'uds_wp_site_info', 'uds_wp_add_site_info' );
if ( ! function_exists( 'uds_wp_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function uds_wp_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'http://wordpress.org/', 'uds-wordpress' ) ),
			sprintf(
				/* translators: WordPress */
				esc_html__( 'Proudly powered by %s', 'uds-wordpress' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: 1: Theme name, 2: Theme author */
				esc_html__( 'Theme: %1$s by %2$s.', 'uds-wordpress' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'http://understrap.com', 'uds-wordpress' ) ) . '">understrap.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: Theme version */
				esc_html__( 'Version: %1$s', 'uds-wordpress' ),
				$the_theme->get( 'Version' )
			)
		);

		echo apply_filters( 'uds_wp_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
