<?php
/**
 * Custom hooks
 *
 * @package uds-wordpress-theme
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
			esc_url( __( 'http://wordpress.org/', 'uds-wordpress-theme' ) ),
			sprintf(
				/* translators: WordPress */
				esc_html__( 'Proudly powered by %s', 'uds-wordpress-theme' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: 1: Theme name, 2: Theme author */
				esc_html__( 'Theme: %1$s by %2$s.', 'uds-wordpress-theme' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'http://understrap.com', 'uds-wordpress-theme' ) ) . '">understrap.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: Theme version */
				esc_html__( 'Version: %1$s', 'uds-wordpress-theme' ),
				$the_theme->get( 'Version' )
			)
		);

		echo apply_filters( 'uds_wp_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

/**
 * In Sept. 2010, The upstream Bootstrap replaced 'active' with 'is-active', but
 * ONLY in sidebar menus. This filter searches the classes of a menu item, and
 * replaces 'active' with 'is-active' - but only after checking to make sure this
 * is a sidebar nav walker that is running.
 */
if ( ! function_exists( 'uds_wp_replace_active' ) ) {
	function uds_wp_replace_active( $classes, $items, $args = '' ) {
		if ( is_a( $args->walker, 'Uds_Custom_Walker_Widget_Nav_Menu' ) ) {
			foreach( $classes as $key => &$val ) {
				if ( 'active' === trim($val) ) {
					$classes[$key] = 'is-active';
				}
			}
		}

		return $classes;
	}
}
add_filter( 'nav_menu_css_class', 'uds_wp_replace_active', 20, 4);
