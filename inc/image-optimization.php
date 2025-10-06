<?php

/**
 * Image Optimization
 * 
 * Implements lazy loading, WebP support, and responsive image loading
 * to improve page load performance.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('uds_add_lazy_loading_attributes')) {
	/**
	 * Add lazy loading attributes to images
	 */
	function uds_add_lazy_loading_attributes($attr, $attachment, $size) {
		// Don't add lazy loading to critical images (logos, hero images)
		if (strpos($attr['class'], 'asu-logo') !== false || 
		    strpos($attr['class'], 'hero-image') !== false ||
		    strpos($attr['class'], 'no-lazy') !== false) {
			return $attr;
		}
		
		// Add loading="lazy" for better performance
		$attr['loading'] = 'lazy';
		
		// Add decoding="async" for better rendering
		$attr['decoding'] = 'async';
		
		return $attr;
	}
}
add_filter('wp_get_attachment_image_attributes', 'uds_add_lazy_loading_attributes', 10, 3);

if (!function_exists('uds_add_webp_support')) {
	/**
	 * Add WebP support detection and serving
	 */
	function uds_add_webp_support() {
		// Add WebP detection script (only if WebP images exist)
		?>
		<script>
		(function() {
			// Check if browser supports WebP
			function supportsWebP(callback) {
				var webP = new Image();
				webP.onload = webP.onerror = function () {
					callback(webP.height == 2);
				};
				webP.src = "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA";
			}
			
			supportsWebP(function(supported) {
				if (supported) {
					document.documentElement.classList.add('webp-support');
				} else {
					document.documentElement.classList.add('no-webp-support');
				}
			});
		})();
		</script>
		<?php
	}
}
add_action('wp_head', 'uds_add_webp_support', 0);

if (!function_exists('uds_optimize_placeholder_images')) {
	/**
	 * Replace placeholder images with optimized versions
	 */
	function uds_optimize_placeholder_images($content) {
		// Replace via.placeholder.com with more optimized placeholders
		$content = preg_replace(
			'/https:\/\/via\.placeholder\.com\/(\d+)x(\d+)\/([^\/]+)\/([^\.]+)\.png\?text=([^"]+)/',
			'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22$1%22%20height%3D%22$2%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Crect%20width%3D%22100%25%22%20height%3D%22100%25%22%20fill%3D%22%23$3%22%2F%3E%3Ctext%20x%3D%2250%25%22%20y%3D%2250%25%22%20font-size%3D%2218%22%20text-anchor%3D%22middle%22%20alignment-baseline%3D%22middle%22%20font-family%3D%22monospace%22%20fill%3D%22%23$4%22%3E$5%3C%2Ftext%3E%3C%2Fsvg%3E',
			$content
		);
		
		return $content;
	}
}
add_filter('the_content', 'uds_optimize_placeholder_images');

if (!function_exists('uds_add_responsive_image_sizes')) {
	/**
	 * Add responsive image sizes for better performance
	 */
	function uds_add_responsive_image_sizes() {
		// Add custom image sizes for responsive design
		add_image_size('uds-mobile', 480, 320, false);
		add_image_size('uds-tablet', 768, 512, false);
		add_image_size('uds-desktop', 1200, 800, false);
		add_image_size('uds-hero', 1920, 1080, false);
	}
}
add_action('after_setup_theme', 'uds_add_responsive_image_sizes');

if (!function_exists('uds_preload_hero_images')) {
	/**
	 * Preload above-the-fold images (hero images, logos)
	 */
	function uds_preload_hero_images() {
		if (is_front_page() || is_home()) {
			// Preload ASU logo
			$logo_path = get_template_directory_uri() . '/dist/img/asu-logo/asu-university-horiz-maroongold.png';
			echo '<link rel="preload" as="image" href="' . $logo_path . '">' . "\n";
		}
	}
}
add_action('wp_head', 'uds_preload_hero_images', 2);