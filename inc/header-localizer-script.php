<?php

/**
 * localize_script function for component header.
 */

add_action('wp_enqueue_scripts', 'uds_localize_component_header_script', 99);
if (!function_exists('uds_localize_component_header_script')) {

	function uds_localize_component_header_script()
	{

		// load current user status
		global $current_user;
		//get clean site url
		$domain_text = site_url();
		$domain = parse_url($domain_text, PHP_URL_HOST);

		// Run through a few options in WordPress to get the menu object by its location ('primary')
		$menu_name = 'primary';
		$locations = get_nav_menu_locations();
		$primary_menu_id = isset($locations[$menu_name]) ? $locations[$menu_name] : null;
		$primary_menu = wp_get_nav_menu_object($primary_menu_id);


		/**
		 * UDS Header: Menu settings
		 * ACF options defined in options page located at options-general.php?page=uds-advanced-settings
		 *
		 * Handles situations in which ACF fields have not been set by exclusively setting default options.
		 */

		$animate_title = get_field('animate_title', 'options');
		$expand_on_hover = get_field('expand_on_hover', 'options');

		$mobile_menu_breakpoint = get_field('mobile_menu_breakpoint', 'options');
		if (empty($mobile_menu_breakpoint)) {
			$mobile_menu_breakpoint = 'Lg';
		}

		/**
		 * UDS Header: Logo settings
		 * Same options location as above. Both overrides are "opt-in" by design.
		 *
		 * Get each logo field. If checked, build formatted array, add to object - in enqueue, pull in from object
		 */
		$asu_logo_override_array = [];
		if (get_field('asu_logo_override', 'options')) {
			$asu_logo_override_array =
				[
					'alt' => get_field('asu_logo_override_alt_text', 'options'),   // default: 'Arizona State University'
					'src' => get_field('asu_logo_override_url', 'options'),        // default: 'arizona-state-university-logo-vertical.png'
					'mobileSrc' => get_field('asu_logo_override_mobile_logo_url', 'options'),  // default: 'arizona-state-university-logo.png'
					'brandLink' => get_field('asu_logo_override_link', 'options'),  // default: 'https://asu.edu'
				];
		}
		$show_partner_logo = get_field('add_partner_logo', 'options');
		$add_partner_logo_array = [];
		if (get_field('add_partner_logo', 'options')) {
			$add_partner_logo_array =
				[
					'alt' => get_field('partner_logo_alt_text', 'options'),        // default: 'Arizona State University'
					'src' => get_field('partner_logo_url', 'options'),        // default: 'arizona-state-university-logo-vertical.png'
					'mobileSrc' => get_field('partner_logo_mobile_url', 'options'),  // default: 'arizona-state-university-logo.png'
					'brandLink' => get_field('partner_logo_link', 'options'),  // default: 'https://asu.edu'
				];
		}

		$parent_org_name = get_theme_mod('parent_unit_name');
		$parent_org_link = get_theme_mod('parent_unit_link');
		$site_display_name = get_theme_mod('site_display_name');
		$nav_menu_enabled = get_theme_mod('header_navigation_menu');
		$alternate_home_url = get_theme_mod('alternate_home_url');


		$site_name = get_bloginfo('name');
		if (!empty(trim($site_display_name))) {
			$site_name = $site_display_name;
		}


		if (!$alternate_home_url) {
			$alternate_home_url = site_url();
		}


		//if nav menu is disabled ("Hide" option is selected), no need to build the nav items.
		if ($nav_menu_enabled == 'disabled') {
			$menu_items = [];
		} else {
			// Build navTree / mobileNavTree props using walker class.
			if (has_nav_menu('primary') && $primary_menu) {
				// Get menu items to check if menu has content
				$menu_items_check = wp_get_nav_menu_items($primary_menu->term_id);
				
				// Only call wp_nav_menu if the menu actually has visible items
				if ($menu_items_check && is_array($menu_items_check) && count($menu_items_check) > 0) {
					$menu_output = wp_nav_menu([
						'menu' => $primary_menu,
						'walker' => new UDS_React_Header_Navtree(),
						'echo' => false,
						'container' => '',
						'items_wrap' => '%3$s', // See: wp_nav_menu codex for why. Returns empty string.
						'fallback_cb' => '__return_empty_string', // Prevent any fallback output
					]);
					
					// Process the output from walker
					if (is_serialized($menu_output) && !empty($menu_output) && $menu_output !== 'a:0:{}') {
						$menu_items = maybe_unserialize($menu_output);
						// Ensure it's a proper array
						if (!is_array($menu_items)) {
							$menu_items = array();
						}
					} else {
						$menu_items = array();
					}
				} else {
					// Menu exists but has no items - return empty array
					$menu_items = array();
				}
			} elseif (is_multisite() && !is_main_site()) {
				//multisite subsite without primary menu set, get top level main menu instead
				switch_to_blog('1'); 	//switch to the main site of the network (it has ID 1)
				$multisite_locations = get_nav_menu_locations();
				$multisite_primary_menu_id = isset($multisite_locations['primary']) ? $multisite_locations['primary'] : null;
				$multisite_primary_menu = wp_get_nav_menu_object($multisite_primary_menu_id);
				if ($multisite_primary_menu) {
					// Get menu items to check if menu has content
					$multisite_menu_items_check = wp_get_nav_menu_items($multisite_primary_menu->term_id);
					
					// Only call wp_nav_menu if the menu actually has visible items
					if ($multisite_menu_items_check && is_array($multisite_menu_items_check) && count($multisite_menu_items_check) > 0) {
						$menu_output = wp_nav_menu([
							'menu' => $multisite_primary_menu,
							'walker' => new UDS_React_Header_Navtree(),
							'echo' => false,
							'container' => '',
							'items_wrap' => '%3$s', // See: wp_nav_menu codex for why. Returns empty string.
							'fallback_cb' => '__return_empty_string', // Prevent any fallback output
						]);
						
						// Process the output from walker
						if (is_serialized($menu_output) && !empty($menu_output) && $menu_output !== 'a:0:{}') {
							$menu_items = maybe_unserialize($menu_output);
							// Ensure it's a proper array
							if (!is_array($menu_items)) {
								$menu_items = array();
							}
						} else {
							$menu_items = array();
						}
					} else {
						// Multisite menu exists but has no items - return empty array
						$menu_items = array();
					}
				} else {
					$menu_items = array();
				}
				restore_current_blog();	//switch back to the current site
			} else {
				// No valid menu found, set to empty array
				$menu_items = array();
			}

			//Build ctaButton prop
			$cta_buttons = array();
			if (is_array($menu_items) && !empty($menu_items)) {
				foreach ($menu_items as $key => $item) {
					$itemType = $item->type ?? false;
					if ($itemType == 'button') {
						unset($menu_items[$key]);
						array_push($cta_buttons, $item);
					}
				}
			}
		}

		// Final validation: ensure menu_items is never "0", empty string, or invalid
		if ($menu_items === "0" || $menu_items === 0 || $menu_items === "" || !is_array($menu_items)) {
			$menu_items = array();
		}

		// Prep localized array items for wp_localize_script below.
		$localized_array = 	array(
			'loggedIn' => is_user_logged_in(),
			'loginLink' => site_url() . '/wp-admin' . '?redirect_to=' . $_SERVER['REQUEST_URI'],
			'logoutLink' => wp_logout_url(),
			'userName' => $current_user->user_login,
			'navTree' => $menu_items,
			'mobileNavTree' => $menu_items,
			'expandOnHover' => $expand_on_hover,
			'baseUrl' => $alternate_home_url,
			'logo' => $asu_logo_override_array,
			'isPartner' => $show_partner_logo,
			'partnerLogo' => $add_partner_logo_array,
			'title' => $site_name,
			'animateTitle' => $animate_title,
			'parentOrg' => $parent_org_name,
			'parentOrgUrl' => $parent_org_link,
			'breakpoint' => $mobile_menu_breakpoint,
			'buttons' => $cta_buttons,
			'searchUrl' => 'https://search.asu.edu/search',
			'site' => $domain,
		);
		//do_action('qm/debug', $localized_array);
		// pass WordPress PHP variables to the uds-header-scripts script we enqueued above
		// These variables are props for the header React component
		wp_localize_script(
			'uds-wordpress-scripts', // the handle of the script to pass our variables
			'udsHeaderVars', // object name to access our PHP variables from in our script
			$localized_array
		);
	}
}
