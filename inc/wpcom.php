<?php
/**
 * WordPress.com-specific functions and definitions
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'asu_wp2020_wpcom_setup' );

if ( ! function_exists( 'asu_wp2020_wpcom_setup' ) ) {
	/**
	 * Adds support for wp.com-specific theme functions.
	 *
	 * @global array $themecolors
	 */
	function asu_wp2020_wpcom_setup() {
		global $themecolors;

		// Set theme colors for third party services.
		if ( ! isset( $themecolors ) ) {
			$themecolors = array(
				'bg'     => '',
				'border' => '',
				'text'   => '',
				'link'   => '',
				'url'    => '',
			);
		}

		/* Add WP.com print styles */
		add_theme_support( 'print-styles' );
	}
}

add_action( 'wp_enqueue_scripts', 'asu_wp2020_wpcom_styles' );

if ( ! function_exists( 'asu_wp2020_wpcom_styles' ) ) {
	/**
	 * WordPress.com-specific styles
	 */
	function asu_wp2020_wpcom_styles() {
		wp_enqueue_style( 'understrap-wpcom', get_template_directory_uri() . '/inc/style-wpcom.css', array(), '20160411' );
	}
}
