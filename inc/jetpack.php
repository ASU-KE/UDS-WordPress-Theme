<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.me/
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'asu_wp2020_components_jetpack_setup' );

if ( ! function_exists( 'asu_wp2020_components_jetpack_setup' ) ) {
	/**
	 * Jetpack setup function.
	 *
	 * @link https://jetpack.me/support/infinite-scroll/
	 * @link https://jetpack.me/support/responsive-videos/
	 * @link https://jetpack.me/support/social-menu/
	 */
	function asu_wp2020_components_jetpack_setup() {
		// Add theme support for Infinite Scroll.
		add_theme_support(
			'infinite-scroll',
			array(
				'container' => 'main',
				'render'    => 'asu_wp2020_components_infinite_scroll_render',
				'footer'    => 'page',
			)
		);

		// Add theme support for Responsive Videos.
		add_theme_support( 'jetpack-responsive-videos' );

		// Add theme support for Social Menus.
		add_theme_support( 'jetpack-social-menu' );

	}
}

if ( ! function_exists( 'asu_wp2020_components_infinite_scroll_render' ) ) {
	/**
	 * Custom render function for Infinite Scroll.
	 */
	function asu_wp2020_components_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			if ( is_search() ) :
				get_template_part( 'templates-loop/content', 'search' );
			else :
				get_template_part( 'templates-loop/content', get_post_format() );
			endif;
		}
	}
}

if ( ! function_exists( 'asu_wp2020_components_social_menu' ) ) {
	/**
	 * Display Jetpack's social menu if available.
	 * Avoids fatal errors if Jetpack isn’t activated.
	 */
	function asu_wp2020_components_social_menu() {
		if ( ! function_exists( 'jetpack_social_menu' ) ) {
			// Return early if social menu is not available.
			return;
		} else {
			jetpack_social_menu();
		}
	}
}
