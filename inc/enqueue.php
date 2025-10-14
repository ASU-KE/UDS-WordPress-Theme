<?php

/**
 * UDS WordPress Theme enqueue scripts
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('uds_wp_scripts')) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function uds_wp_scripts()
	{
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get('Version');

		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/css/theme.min.css');
		wp_enqueue_style('uds-wordpress-styles', get_template_directory_uri() . '/dist/css/theme.min.css', array(), $css_version);

		wp_enqueue_script('jquery');

		$uds_header_version = $theme_version . '.' . filemtime( get_template_directory() . '/src/js/uds/asuHeaderFooter.umd.js' );
		wp_enqueue_script( 'uds-header', get_template_directory_uri() . '/src/js/uds/asuHeaderFooter.umd.js', array( 'wp-element', 'wp-components' ), $uds_header_version, true );

		$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/js/theme.min.js');
		wp_enqueue_script('uds-wordpress-scripts', get_template_directory_uri() . '/dist/js/theme.min.js', array(), $js_version, true);

		$bs5_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/js/bootstrap.bundle.min.js');
		wp_enqueue_script('uds-bootstrap-scripts', get_template_directory_uri() . '/dist/js/bootstrap.bundle.min.js', array(), $bs5_version, true);

		$datalayer_version = $theme_version . '.' . filemtime(get_template_directory() . '/src/js/uds/data-layer.js');
		wp_enqueue_script('uds-data-layer', get_template_directory_uri() . '/src/js/uds/data-layer.js', array(), $datalayer_version, true);

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
} // End of if function_exists( 'uds_wp_scripts' ).
add_action('wp_enqueue_scripts', 'uds_wp_scripts');


if (!function_exists('uds_wp_disable_jquery_migrate')) {
	/**
	 * Disable jQuery Migrate on frontend for improved performance.
	 * jQuery core remains functional without jQuery Migrate.
	 */
	function uds_wp_disable_jquery_migrate($scripts)
	{
		if (!is_admin() && !empty($scripts->registered['jquery'])) {
			// Remove jquery-migrate from jQuery dependencies
			$scripts->registered['jquery']->deps = array_diff(
				$scripts->registered['jquery']->deps,
				array('jquery-migrate')
			);
		}
	}
}
add_action('wp_default_scripts', 'uds_wp_disable_jquery_migrate');



if (!function_exists('uds_wp_admin_scripts')) {
	/**
	 * Load admin JavaScript and CSS sources.
	 */
	function uds_wp_admin_scripts()
	{
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get('Version');

		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/css/admin.min.css');
		wp_enqueue_style('uds-wordpress-admin-styles', get_template_directory_uri() . '/dist/css/admin.min.css', array(), $css_version);

		$js_image_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/js/admin-bundle.js');
		wp_enqueue_script('uds-wordpress-admin-bundle-script', get_template_directory_uri() . '/dist/js/admin-bundle.js', array(), $js_image_version);

		if ( function_exists( 'get_current_screen' ) ) {
			$current_screen = get_current_screen();
			if ( $current_screen->id === 'post' || $current_screen->id === 'page' ) {
				$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/js/admin-core-bundle.js');
				wp_enqueue_script('uds-wordpress-admin-core-script', get_template_directory_uri() . '/dist/js/admin-core-bundle.js', array('lodash'), $js_version);
			}
		}

	}
} // End of if function_exists( 'uds_wp_scripts' ).
add_action('admin_enqueue_scripts', 'uds_wp_admin_scripts');


if (!function_exists('uds_wp_gutenberg_css')) {
	/**
	 * Load CSS styles in editor area.
	 */
	function uds_wp_gutenberg_css()
	{
		add_theme_support('editor-styles');
		add_editor_style('/dist/css/theme.min.css');
	}
} // End of if function_exists( 'uds_wp_gutenberg_css' ).
add_action('after_setup_theme', 'uds_wp_gutenberg_css');




if (!function_exists('uds_wp_theme_support_block_editor_opt_in')) {
	/**
	 * Opt in features for the theme and the block editor.
	 * From: https://developer.wordpress.org/block-editor/developers/themes/theme-support/
	 */
	function uds_wp_theme_support_block_editor_opt_in()
	{
		add_theme_support('disable-custom-font-sizes');
		add_theme_support('disable-custom-colors');
		add_theme_support('disable-custom-gradients');
		add_theme_support('responsive-embeds');

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name' => esc_attr__('ASU Gold', 'uds-wordpress-theme'),
					'slug' => 'asu-gold',
					'color' => '#ffc627',
				),
				array(
					'name' => esc_attr__('ASU Maroon', 'uds-wordpress-theme'),
					'slug' => 'asu-maroon',
					'color' => '#8c1d40',
				),
				array(
					'name' => esc_attr__('ASU Blue', 'uds-wordpress-theme'),
					'slug' => 'asu-blue',
					'color' => '#00A3E0',
				),
				array(
					'name' => esc_attr__('ASU Green', 'uds-wordpress-theme'),
					'slug' => 'asu-green',
					'color' => '#78BE20',
				),
				array(
					'name' => esc_attr__('ASU Orange', 'uds-wordpress-theme'),
					'slug' => 'asu-orange',
					'color' => '#ff7f32',
				),
				array(
					'name' => esc_attr__('ASU Gray 1', 'uds-wordpress-theme'),
					'slug' => 'asu-gray-1',
					'color' => '#fafafa',
				),
				array(
					'name' => esc_attr__('ASU Gray 2', 'uds-wordpress-theme'),
					'slug' => 'asu-gray-2',
					'color' => '#e8e8e8',
				),
				array(
					'name' => esc_attr__('ASU Gray 3', 'uds-wordpress-theme'),
					'slug' => 'asu-gray-3',
					'color' => '#d0d0d0',
				),
				array(
					'name' => esc_attr__('ASU Gray 4', 'uds-wordpress-theme'),
					'slug' => 'asu-gray-4',
					'color' => '#bfbfbf',
				),
				array(
					'name' => esc_attr__('ASU Gray 5', 'uds-wordpress-theme'),
					'slug' => 'asu-gray-5',
					'color' => '#747474',
				),
				array(
					'name' => esc_attr__('ASU Gray 6', 'uds-wordpress-theme'),
					'slug' => 'asu-gray-6',
					'color' => '#484848',
				),
				array(
					'name' => esc_attr__('ASU Gray 7', 'uds-wordpress-theme'),
					'slug' => 'asu-gray-7',
					'color' => '#191919',
				),
				array(
					'name' => esc_attr__('ASU White', 'uds-wordpress-theme'),
					'slug' => 'asu-white',
					'color' => '#ffffff',
				),
			)
		);
	}
} // End of if function_exists( 'uds_wp_theme_support_block_editor_opt_in' ).
add_action('after_setup_theme', 'uds_wp_theme_support_block_editor_opt_in');
