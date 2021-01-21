<?php
/**
 * UDS WordPress Theme enqueue scripts
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'uds_wp_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function uds_wp_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'uds-wordpress-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'uds-wordpress-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );


		$fa_js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/fontawesome/all.min.js' );
		wp_enqueue_script( 'uds-wordpress-fa-scripts', get_template_directory_uri() . '/js/fontawesome/all.min.js', array(), $fa_js_version, true );

		$header_js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/bootstrap-asu/global-header.js' );
		wp_enqueue_script( 'uds-wordpress-header-scripts', get_template_directory_uri() . '/js/bootstrap-asu/global-header.js', array(), $header_js_version, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // End of if function_exists( 'uds_wp_scripts' ).
add_action( 'wp_enqueue_scripts', 'uds_wp_scripts' );



if ( ! function_exists( 'uds_wp_admin_scripts' ) ) {
	/**
	 * Load admin JavaScript and CSS sources.
	 */
	function uds_wp_admin_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/admin.css' );
		wp_enqueue_style( 'uds-wordpress-admin-styles', get_template_directory_uri() . '/css/admin.css', array(), $css_version );
	}
} // End of if function_exists( 'uds_wp_scripts' ).
add_action( 'admin_enqueue_scripts', 'uds_wp_admin_scripts' );




if ( ! function_exists( 'uds_wp_metaboxes_scripts' ) ) {
	/**
	 * Add metabox script and call it on admin side only.
	 */
	function uds_wp_metaboxes_scripts() {
		global $pagenow;
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );
		$js_admin_blocks_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/admin-blocks.js' );
		$css_metaboxes_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/admin.min.css' );
		if ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) {

			wp_enqueue_script( 'uds-wordpress-sidebar-metabox-scripts', get_template_directory_uri() . '/js/admin-blocks.js', array( 'jquery' ), $js_admin_blocks_version, true );
			wp_enqueue_style( 'uds-wordpress-sidebar-metabox-styles', get_template_directory_uri() . '/css/admin.min.css', array(), $css_metaboxes_version );
		}
	}
} // End of if function_exists( 'uds_wp_metaboxes_scripts' ).
add_action( 'admin_enqueue_scripts', 'uds_wp_metaboxes_scripts' );
