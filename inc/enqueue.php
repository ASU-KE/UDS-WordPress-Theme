<?php
/**
 * ASU Web Standards 2020 Theme enqueue scripts
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'asu_wp2020_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function asu_wp2020_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'asu-wp2020-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'asu-wp2020-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );

		$fa_js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/fontawesome/all.min.js' );
		wp_enqueue_script( 'asu-wp2020-fa-scripts', get_template_directory_uri() . '/js/fontawesome/all.min.js', array(), $fa_js_version, true );

		$header_js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/bootstrap-asu/global-header.js' );
		wp_enqueue_script( 'asu-wp2020-header-scripts', get_template_directory_uri() . '/js/bootstrap-asu/global-header.js', array(), $header_js_version, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // End of if function_exists( 'asu_wp2020_scripts' ).

add_action( 'wp_enqueue_scripts', 'asu_wp2020_scripts' );
