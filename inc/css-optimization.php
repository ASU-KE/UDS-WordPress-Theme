<?php

/**
 * CSS Optimization
 * 
 * Implements critical CSS extraction, unused CSS removal, and optimized
 * CSS delivery for better performance.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('uds_critical_css_inline')) {
	/**
	 * Inline critical CSS for above-the-fold content
	 */
	function uds_critical_css_inline() {
		// Critical CSS for above-the-fold content
		$critical_css = "
		/* Critical CSS - Above the fold */
		body { font-family: Arial, sans-serif; margin: 0; }
		.header-main { background: #8C1D40; }
		.site-navigation { display: flex; align-items: center; }
		.hero-section { min-height: 400px; }
		.container { max-width: 1200px; margin: 0 auto; padding: 0 15px; }
		.sr-only { position: absolute !important; width: 1px !important; height: 1px !important; }
		.btn { display: inline-block; padding: 0.5rem 1rem; border: 1px solid transparent; }
		.btn-maroon { background-color: #8C1D40; color: white; }
		.btn-gold { background-color: #FFC627; color: #191919; }
		/* Loading spinner for deferred content */
		.loading { opacity: 0; transition: opacity 0.3s ease; }
		.loaded { opacity: 1; }
		";
		
		echo '<style id="uds-critical-css">' . $critical_css . '</style>' . "\n";
	}
}
add_action('wp_head', 'uds_critical_css_inline', 3);

if (!function_exists('uds_defer_non_critical_css')) {
	/**
	 * Defer non-critical CSS loading
	 */
	function uds_defer_non_critical_css($html, $handle, $href, $media) {
		// Don't defer critical stylesheets
		if ($handle === 'uds-wordpress-styles') {
			// Convert main CSS to non-render blocking
			$html = str_replace("rel='stylesheet'", "rel='preload' as='style' onload=\"this.onload=null;this.rel='stylesheet'\"", $html);
			$html .= '<noscript><link rel="stylesheet" href="' . $href . '"></noscript>';
		}
		
		return $html;
	}
}
// Uncomment to enable non-critical CSS deferring (can cause FOUC)
// add_filter('style_loader_tag', 'uds_defer_non_critical_css', 10, 4);

if (!function_exists('uds_remove_unused_css_features')) {
	/**
	 * Remove unused CSS features and dependencies
	 */
	function uds_remove_unused_css_features() {
		// Remove unused WordPress CSS
		wp_dequeue_style('wp-block-library-theme');
		wp_dequeue_style('classic-theme-styles');
		
		// Remove unused WooCommerce styles if not an e-commerce site
		if (!class_exists('WooCommerce')) {
			wp_dequeue_style('woocommerce-general');
			wp_dequeue_style('woocommerce-layout');
			wp_dequeue_style('woocommerce-smallscreen');
		}
		
		// Remove Contact Form 7 styles if not used on current page
		if (!is_page() || !has_shortcode(get_post()->post_content, 'contact-form-7')) {
			wp_dequeue_style('contact-form-7');
		}
	}
}
add_action('wp_enqueue_scripts', 'uds_remove_unused_css_features', 100);

if (!function_exists('uds_optimize_google_fonts')) {
	/**
	 * Optimize Google Fonts loading
	 */
	function uds_optimize_google_fonts() {
		// Remove default WordPress Google Fonts and add optimized versions
		wp_dequeue_style('wp-block-library-theme');
		
		// Add optimized Google Fonts with font-display: swap
		$fonts_url = 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap';
		wp_enqueue_style('uds-google-fonts', $fonts_url, array(), null);
	}
}
add_action('wp_enqueue_scripts', 'uds_optimize_google_fonts', 5);

if (!function_exists('uds_add_css_media_queries')) {
	/**
	 * Add media queries to CSS for conditional loading
	 */
	function uds_add_css_media_queries($tag, $handle, $href, $media) {
		// Load print styles only when needed
		if (strpos($handle, 'print') !== false) {
			$tag = str_replace("media='all'", "media='print'", $tag);
		}
		
		// Load admin bar styles only for logged-in users
		if ($handle === 'admin-bar' && !is_user_logged_in()) {
			return '';
		}
		
		return $tag;
	}
}
add_filter('style_loader_tag', 'uds_add_css_media_queries', 10, 4);

if (!function_exists('uds_add_css_preconnect_hints')) {
	/**
	 * Add preconnect hints for CSS dependencies
	 */
	function uds_add_css_preconnect_hints() {
		// Preconnect to Google Fonts
		echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
		echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
	}
}
add_action('wp_head', 'uds_add_css_preconnect_hints', 1);