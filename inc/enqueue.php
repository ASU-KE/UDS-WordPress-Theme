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

		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/theme.min.css');
		wp_enqueue_style('uds-wordpress-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version);

		wp_enqueue_script('jquery');

		$uds_header_vendor_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/uds-header/vendor.umd.js' );
		wp_enqueue_script( 'uds-header-vendor', get_template_directory_uri() . '/js/uds-header/vendor.umd.js', array( 'wp-element', 'wp-components' ), $uds_header_vendor_version, true );

		$uds_header_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/uds-header/asuHeader.umd.js' );
		wp_enqueue_script( 'uds-header', get_template_directory_uri() . '/js/uds-header/asuHeader.umd.js', array( 'wp-element', 'wp-components' ), $uds_header_version, true );

		// TODO: disabled until UDS build setup is fixed
		// $uds_cookie_consent_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/uds-cookie-consent/cookieConsent.production.js' );
		// wp_enqueue_script( 'uds-cookie-consent', get_template_directory_uri() . '/js/uds-cookie-consent/cookieConsent.production.js', array( 'wp-element', 'wp-components' ), $uds_cookie_consent_version, true );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.js' );
		wp_enqueue_script( 'uds-wordpress-scripts', get_template_directory_uri() . '/js/theme.js', array( 'wp-element', 'wp-components' ), $js_version, true );

		$fa_js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/fontawesome/all.min.js' );
		wp_enqueue_script( 'uds-wordpress-fa-scripts', get_template_directory_uri() . '/js/fontawesome/all.min.js', array(), $fa_js_version, true );

		$js_hero_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/hero_video.js');
		wp_enqueue_script('uds-wordpress-hero-video-scripts', get_template_directory_uri() . '/js/hero_video.js', array(), $js_hero_version, true);

		$js_overlay_card_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/overlay-card.js');
		wp_enqueue_script('uds-wordpress-overlay-card-scripts', get_template_directory_uri() . '/js/overlay-card.js', array(), $js_overlay_card_version, true);

		$js_modals_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/modals.js');
		wp_enqueue_script('uds-wordpress-modals-scripts', get_template_directory_uri() . '/js/modals.js', array(), $js_modals_version, true);

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		$parent_org_name = get_theme_mod( 'parent_unit_name' );
		$parent_org_link = get_theme_mod( 'parent_unit_link' );

		// load current user status
		global $current_user;
/*
		$menu_name   = 'primary';
		$menu_items  = uds_react_get_menu_formatted_array( $menu_name );
		echo '<script>console.log("enqueue animate title")</script>';
		echo '<script>console.log('.json_encode($menu_items['animate-title']).')</script>';

		// wp_die( var_dump( $menu_items ) );

		// pass WordPress PHP variables to the uds-header-scripts script we enqueued above
		// These variables are props for the header React component
		wp_localize_script(
			'uds-wordpress-scripts', // the handle of the script to pass our variables
			'udsHeaderVars', // object name to access our PHP variables from in our script
			// register an array of variables we would like to use in our script
			array(
				'loggedIn' => is_user_logged_in(),
				'loginLink' => site_url() . '/wp-admin',
				'logoutLink' => wp_logout_url(),
				'userName' => $current_user->user_login,
				'navTree' => $menu_items['nav-items'],
				'mobileNavTree' => $menu_items['nav-items'], // define an alternate navigation menu for mobile view
				'expandOnHover' => $menu_items['expand-on-hover'],
				'baseUrl' => '/', // this could be very important for subfolder multisites where the menu base url (e.g. Home) must point to the current subsite, not the root.
				'logo' => $menu_items['logo-override'],
				// [
				// 	'alt' => 'alt text',        // default: 'Arizona State University'
				// 	'src' => '/wp-content/uploads/2022/11/US-Navy-logo.jpg',        // default: 'arizona-state-university-logo-vertical.png'
				// 	'mobileSrc' => '/wp-content/uploads/2022/11/US-Navy-logo.jpg',  // default: 'arizona-state-university-logo.png'
				// 	'brandLink' => 'https://asu.edu',  // default: 'https://asu.edu'
				// ],
				'isPartner' => $menu_items['show-partner-logo'],
				'partnerLogo' => $menu_items['partner-logo'],
				'title' => get_bloginfo(),
				'animateTitle' => $menu_items['animate-title'],
				'parentOrg' => $parent_org_name,
				'parentOrgUrl' => $parent_org_link,
				'breakpoint' => $menu_items['mobile-menu-breakpoint'],
				'buttons' => $menu_items['cta-buttons'],
			)
		);
	}
} // End of if function_exists( 'uds_wp_scripts' ). */
add_action( 'wp_enqueue_scripts', 'uds_wp_scripts' );



if (!function_exists('uds_wp_admin_scripts')) {
	/**
	 * Load admin JavaScript and CSS sources.
	 */
	function uds_wp_admin_scripts()
	{
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get('Version');

		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/admin.css');
		wp_enqueue_style('uds-wordpress-admin-styles', get_template_directory_uri() . '/css/admin.css', array(), $css_version);

		$fa_js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/fontawesome/all.min.js');
		wp_enqueue_script('uds-wordpress-fa-scripts', get_template_directory_uri() . '/js/fontawesome/all.min.js', array(), $fa_js_version, true);

		$js_core_list_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/core-list-block.js');
		wp_enqueue_script('uds-wordpress-admin-scripts', get_template_directory_uri() . '/js/core-list-block.js', array(), $js_core_list_version);

		$js_divider_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/core-divider.js');
		wp_enqueue_script('uds-wordpress-admin-divider-script', get_template_directory_uri() . '/js/core-divider.js', array(), $js_divider_version);

		$js_heading_highlights = $theme_version . '.' . filemtime(get_template_directory() . '/js/heading-highlights.js');
		wp_enqueue_script('uds-wordpress-admin-js-heading-highlights', get_template_directory_uri() . '/js/heading-highlights.js', array('wp-rich-text', 'wp-element', 'wp-editor'), $js_heading_highlights);

		$js_admin_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/admin.js');
		wp_enqueue_script('uds-wordpress-admin-admin-script', get_template_directory_uri() . '/js/admin.js', array(), $js_admin_version);

		$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/theme.min.js');
		wp_enqueue_script('uds-wordpress-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true);

		$js_image_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/core-image-block.js');
		wp_enqueue_script('uds-wordpress-admin-core-image-script', get_template_directory_uri() . '/js/core-image-block.js', array(), $js_image_version);
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
		add_editor_style('css/theme.min.css');
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
