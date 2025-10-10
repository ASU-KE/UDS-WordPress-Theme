<?php

/**
 * FontAwesome Optimization
 * 
 * Only loads the FontAwesome icons that are actually used on the site
 * to reduce JavaScript bundle size and improve performance.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('uds_get_used_fontawesome_icons')) {
	/**
	 * Get list of FontAwesome icons actually used in the theme
	 * This is a curated list based on theme analysis
	 */
	function uds_get_used_fontawesome_icons() {
		return array(
			// Solid icons (most commonly used)
			'angle-left',
			'angle-right', 
			'arrow-right',
			'bell',
			'calendar',
			'calendar-alt',
			'calendar-day',
			'chevron-down',
			'chevron-up',
			'circle-check',
			'circle-info',
			'envelope',
			'external-link-alt',
			'home',
			'search',
			'user',
			'phone',
			'map-marker-alt',
			'download',
			'play',
			'pause',
			'times',
			'bars',
			'info-circle',
			'exclamation-triangle',
			'check-circle',
			
			// Brand icons (social media, etc.)
			'facebook-square',
			'twitter-square',
			'linkedin',
			'youtube',
			'instagram',
			'github'
		);
	}
}

if (!function_exists('uds_should_load_fontawesome')) {
	/**
	 * Determine if FontAwesome should be loaded on current page
	 * Can be extended to check page content for FontAwesome usage
	 */
	function uds_should_load_fontawesome() {
		// Always load on admin pages for editing
		if (is_admin()) {
			return true;
		}
		
		// Load on pages that commonly use icons
		if (is_front_page() || is_home() || is_archive() || is_single()) {
			return true;
		}
		
		// Check if current page/post content contains FontAwesome classes
		global $post;
		if ($post && (strpos($post->post_content, 'fa-') !== false || strpos($post->post_content, 'fas ') !== false || strpos($post->post_content, 'fab ') !== false)) {
			return true;
		}
		
		return false;
	}
}

if (!function_exists('uds_enqueue_optimized_fontawesome')) {
	/**
	 * Conditionally enqueue FontAwesome based on page needs
	 */
	function uds_enqueue_optimized_fontawesome() {
		if (!uds_should_load_fontawesome()) {
			return;
		}
		
		// Use FontAwesome CSS for better performance than JS
		$theme_version = wp_get_theme()->get('Version');
		
		// Check if FontAwesome CSS exists
		$fa_css_path = get_template_directory() . '/src/css/fontawesome/all.css';
		if (file_exists($fa_css_path)) {
			$fa_version = $theme_version . '.' . filemtime($fa_css_path);
			wp_enqueue_style('uds-fontawesome', get_template_directory_uri() . '/src/css/fontawesome/all.css', array(), $fa_version);
		}
	}
}

// Hook into wp_enqueue_scripts with lower priority so it runs after main scripts
add_action('wp_enqueue_scripts', 'uds_enqueue_optimized_fontawesome', 15);