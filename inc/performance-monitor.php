<?php

/**
 * Performance Monitor
 * 
 * Provides performance monitoring, analysis tools, and optimization
 * recommendations for the UDS WordPress Theme.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('uds_add_performance_metrics')) {
	/**
	 * Add performance timing metrics to page
	 */
	function uds_add_performance_metrics() {
		if (WP_DEBUG || current_user_can('administrator')) {
			?>
			<script>
			// Performance monitoring script
			window.addEventListener('load', function() {
				if ('performance' in window) {
					var perfData = performance.timing;
					var pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
					var domContentLoaded = perfData.domContentLoadedEventEnd - perfData.navigationStart;
					var firstByte = perfData.responseStart - perfData.navigationStart;
					
					console.group('🚀 UDS Theme Performance Metrics');
					console.log('Page Load Time:', pageLoadTime + 'ms');
					console.log('DOM Content Loaded:', domContentLoaded + 'ms');
					console.log('Time to First Byte:', firstByte + 'ms');
					console.log('DNS Lookup:', (perfData.domainLookupEnd - perfData.domainLookupStart) + 'ms');
					console.log('Server Response:', (perfData.responseEnd - perfData.responseStart) + 'ms');
					console.groupEnd();
					
					// Log slow loading resources
					if (pageLoadTime > 3000) {
						console.warn('⚠️ Page load time exceeds 3 seconds. Consider optimization.');
					}
				}
			});
			</script>
			<?php
		}
	}
}
add_action('wp_footer', 'uds_add_performance_metrics');

if (!function_exists('uds_analyze_enqueued_assets')) {
	/**
	 * Analyze and report on enqueued assets
	 */
	function uds_analyze_enqueued_assets() {
		if (!WP_DEBUG || !current_user_can('administrator')) {
			return;
		}
		
		global $wp_scripts, $wp_styles;
		
		$script_size = 0;
		$style_size = 0;
		
		// Calculate total script sizes
		foreach ($wp_scripts->queue as $handle) {
			$src = $wp_scripts->registered[$handle]->src;
			if (strpos($src, get_template_directory_uri()) !== false) {
				$file_path = str_replace(get_template_directory_uri(), get_template_directory(), $src);
				if (file_exists($file_path)) {
					$script_size += filesize($file_path);
				}
			}
		}
		
		// Calculate total style sizes
		foreach ($wp_styles->queue as $handle) {
			$src = $wp_styles->registered[$handle]->src;
			if (strpos($src, get_template_directory_uri()) !== false) {
				$file_path = str_replace(get_template_directory_uri(), get_template_directory(), $src);
				if (file_exists($file_path)) {
					$style_size += filesize($file_path);
				}
			}
		}
		
		?>
		<script>
		console.group('📊 Asset Analysis');
		console.log('Total Script Size:', <?php echo round($script_size / 1024, 2); ?> + 'KB');
		console.log('Total Style Size:', <?php echo round($style_size / 1024, 2); ?> + 'KB');
		console.log('Scripts Enqueued:', <?php echo count($wp_scripts->queue); ?>);
		console.log('Styles Enqueued:', <?php echo count($wp_styles->queue); ?>);
		console.groupEnd();
		</script>
		<?php
	}
}
add_action('wp_footer', 'uds_analyze_enqueued_assets');

if (!function_exists('uds_add_performance_admin_notice')) {
	/**
	 * Add performance recommendations to admin
	 */
	function uds_add_performance_admin_notice() {
		if (!current_user_can('administrator')) {
			return;
		}
		
		$recommendations = array();
		
		// Check for large files
		$theme_js_size = 0;
		$theme_js_path = get_template_directory() . '/dist/js/theme.min.js';
		if (file_exists($theme_js_path)) {
			$theme_js_size = filesize($theme_js_path);
			if ($theme_js_size > 500000) { // 500KB
				$recommendations[] = 'Theme JavaScript bundle is ' . round($theme_js_size / 1024, 2) . 'KB. Consider code splitting.';
			}
		}
		
		$theme_css_size = 0;
		$theme_css_path = get_template_directory() . '/dist/css/theme.min.css';
		if (file_exists($theme_css_path)) {
			$theme_css_size = filesize($theme_css_path);
			if ($theme_css_size > 200000) { // 200KB
				$recommendations[] = 'Theme CSS bundle is ' . round($theme_css_size / 1024, 2) . 'KB. Consider unused CSS removal.';
			}
		}
		
		// Check if optimization files exist
		if (!file_exists(get_template_directory() . '/dist/js/theme-critical.min.js')) {
			$recommendations[] = 'Run "npm run build" to generate optimized JavaScript bundles.';
		}
		
		if (!empty($recommendations)) {
			?>
			<div class="notice notice-info is-dismissible">
				<h3>🚀 UDS Theme Performance Recommendations</h3>
				<ul>
					<?php foreach ($recommendations as $rec): ?>
						<li><?php echo esc_html($rec); ?></li>
					<?php endforeach; ?>
				</ul>
				<p><strong>For more performance tips, check the theme's README.md file.</strong></p>
			</div>
			<?php
		}
	}
}
add_action('admin_notices', 'uds_add_performance_admin_notice');

if (!function_exists('uds_performance_admin_menu')) {
	/**
	 * Add performance analysis page to admin menu
	 */
	function uds_performance_admin_menu() {
		add_theme_page(
			'Performance Analysis',
			'Performance',
			'manage_options',
			'uds-performance',
			'uds_performance_admin_page'
		);
	}
}
add_action('admin_menu', 'uds_performance_admin_menu');

if (!function_exists('uds_performance_admin_page')) {
	/**
	 * Performance analysis admin page
	 */
	function uds_performance_admin_page() {
		?>
		<div class="wrap">
			<h1>🚀 UDS Theme Performance Analysis</h1>
			
			<div class="card">
				<h2>Asset Sizes</h2>
				<?php
				$assets = array(
					'JavaScript (theme.min.js)' => '/dist/js/theme.min.js',
					'JavaScript (critical)' => '/dist/js/theme-critical.min.js',
					'JavaScript (deferred)' => '/dist/js/theme-deferred.min.js',
					'JavaScript (fontawesome)' => '/dist/js/fontawesome.min.js',
					'CSS (theme.min.css)' => '/dist/css/theme.min.css',
					'Bootstrap Bundle' => '/dist/js/bootstrap.bundle.min.js'
				);
				
				echo '<table class="widefat fixed striped">';
				echo '<thead><tr><th>Asset</th><th>Size</th><th>Status</th></tr></thead><tbody>';
				
				foreach ($assets as $name => $path) {
					$full_path = get_template_directory() . $path;
					if (file_exists($full_path)) {
						$size = filesize($full_path);
						$size_kb = round($size / 1024, 2);
						$status = $size_kb > 500 ? '⚠️ Large' : '✅ OK';
						echo "<tr><td>{$name}</td><td>{$size_kb} KB</td><td>{$status}</td></tr>";
					} else {
						echo "<tr><td>{$name}</td><td>-</td><td>❌ Missing</td></tr>";
					}
				}
				echo '</tbody></table>';
				?>
			</div>
			
			<div class="card">
				<h2>Performance Recommendations</h2>
				<ul>
					<li><strong>Enable GZIP compression</strong> on your web server</li>
					<li><strong>Use a CDN</strong> for static assets</li>
					<li><strong>Enable browser caching</strong> with proper cache headers</li>
					<li><strong>Optimize images</strong> using WebP format where possible</li>
					<li><strong>Use lazy loading</strong> for below-the-fold images</li>
					<li><strong>Minimize HTTP requests</strong> by combining CSS/JS files</li>
					<li><strong>Enable critical CSS</strong> for above-the-fold content</li>
				</ul>
			</div>
		</div>
		<?php
	}
}