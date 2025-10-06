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

		// Only load jQuery if needed (WordPress already provides it)
		wp_enqueue_script('jquery');

		// Resource hints are handled separately in wp_head action

		// Load ASU header with defer attribute for better performance
		$uds_header_version = $theme_version . '.' . filemtime( get_template_directory() . '/src/js/uds-asu-header/asuHeaderFooter.umd.js' );
		wp_enqueue_script( 'uds-header', get_template_directory_uri() . '/src/js/uds-asu-header/asuHeaderFooter.umd.js', array( 'wp-element', 'wp-components' ), $uds_header_version, true );

		// Load critical scripts first (without defer for immediate execution)
		if (file_exists(get_template_directory() . '/dist/js/theme-critical.min.js')) {
			$critical_js_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/js/theme-critical.min.js');
			wp_enqueue_script('uds-critical-scripts', get_template_directory_uri() . '/dist/js/theme-critical.min.js', array(), $critical_js_version, false);
		}
		
		// Load non-critical scripts with defer for better performance
		if (file_exists(get_template_directory() . '/dist/js/theme-deferred.min.js')) {
			$deferred_js_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/js/theme-deferred.min.js');
			wp_enqueue_script('uds-deferred-scripts', get_template_directory_uri() . '/dist/js/theme-deferred.min.js', array(), $deferred_js_version, true);
		}
		
		// Fallback to original theme.min.js if optimized versions don't exist
		if (!file_exists(get_template_directory() . '/dist/js/theme-critical.min.js')) {
			$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/js/theme.min.js');
			wp_enqueue_script('uds-wordpress-scripts', get_template_directory_uri() . '/dist/js/theme.min.js', array(), $js_version, true);
		}

		// Load Bootstrap bundle with defer (it's not critical for initial page render)
		$bs5_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/js/bootstrap.bundle.min.js');
		wp_enqueue_script('uds-bootstrap-scripts', get_template_directory_uri() . '/dist/js/bootstrap.bundle.min.js', array(), $bs5_version, true);

		// Only load comment reply script when actually needed
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
} // End of if function_exists( 'uds_wp_scripts' ).
add_action('wp_enqueue_scripts', 'uds_wp_scripts');

/**
 * Add defer attribute to non-critical scripts for better performance
 */
if (!function_exists('uds_add_defer_attribute')) {
	function uds_add_defer_attribute($tag, $handle, $src) {
		// List of script handles that should be deferred
		$defer_scripts = array(
			'uds-wordpress-scripts',
			'uds-deferred-scripts',
			'uds-bootstrap-scripts',
			'uds-header',
			'uds-fontawesome'
		);
		
		// Add defer attribute to specified scripts
		if (in_array($handle, $defer_scripts)) {
			return str_replace('<script ', '<script defer ', $tag);
		}
		
		return $tag;
	}
}
add_filter('script_loader_tag', 'uds_add_defer_attribute', 10, 3);

/**
 * Add resource hints for better performance
 */
if (!function_exists('uds_add_resource_hints')) {
	function uds_add_resource_hints() {
		// DNS prefetch for external domains
		echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">' . "\n";
		echo '<link rel="preconnect" href="//fonts.gstatic.com" crossorigin>' . "\n";
		
		// Preload critical CSS
		$theme_version = wp_get_theme()->get('Version');
		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/css/theme.min.css');
		echo '<link rel="preload" href="' . get_template_directory_uri() . '/dist/css/theme.min.css?ver=' . $css_version . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
		echo '<noscript><link rel="stylesheet" href="' . get_template_directory_uri() . '/dist/css/theme.min.css?ver=' . $css_version . '"></noscript>' . "\n";
	}
}
add_action('wp_head', 'uds_add_resource_hints', 1);



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
