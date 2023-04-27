<?php
/**
 * localize_script function for component header.
 */

add_action( 'wp_enqueue_scripts', 'uds_localize_component_header_script', 99 );
if ( ! function_exists( 'uds_localize_component_header_script' ) ) {

	function uds_localize_component_header_script() {

		// load current user status
		global $current_user;
		//get clean site url
		$domain_text = site_url();
		$domain = parse_url($domain_text, PHP_URL_HOST);

		// Run through a few options in WordPress to get the menu object by its location ('primary')
		$menu_name = 6;
		$locations = get_nav_menu_locations();
		do_action('qm/debug', $locations);
		$primary_menu_id = $locations[ $menu_name ] ;
		$primary_menu = wp_get_nav_menu_object( $primary_menu_id );
		/**
		 * UDS Header: Menu settings
		 * ACF options defined in options page located at options-general.php?page=pitchfork-settings
		 *
		 * Handles situations in which ACF fields have not been set by exclusively setting default options.
		 */

		$animate_title = get_field('animate_title', $primary_menu);
		$expand_on_hover = get_field('expand_on_hover', $primary_menu);

		$mobile_menu_breakpoint = get_field('mobile_menu_breakpoint', $primary_menu);
		if (empty($mobile_menu_breakpoint )) {
			$mobile_menu_breakpoint = 'Lg';
		}

		/**
		 * UDS Header: Logo settings
		 * Same options location as above. Both overrides are "opt-in" by design.
		 *
		 * Get each logo field. If checked, build formatted array, add to object - in enqueue, pull in from object
		 */
		$asu_logo_override_array = [];
		if(get_field('asu_logo_override', $primary_menu)) {
			$asu_logo_override_array =
			[
				'alt' => get_field('asu_logo_override_alt_text', $primary_menu),   // default: 'Arizona State University'
				'src' => get_field('asu_logo_override_url', $primary_menu),        // default: 'arizona-state-university-logo-vertical.png'
				'mobileSrc' => get_field('asu_logo_override_mobile_logo_url', $primary_menu),  // default: 'arizona-state-university-logo.png'
				'brandLink' => get_field('asu_logo_override_link', $primary_menu),  // default: 'https://asu.edu'
			];
		}
		$show_partner_logo = get_field('add_partner_logo', $primary_menu);
		$add_partner_logo_array = [];
		if(get_field('add_partner_logo', $primary_menu)) {
			$add_partner_logo_array =
			[
				'alt' => get_field('partner_logo_alt_text', $primary_menu),        // default: 'Arizona State University'
				'src' => get_field('partner_logo_url', $primary_menu),        // default: 'arizona-state-university-logo-vertical.png'
				'mobileSrc' => get_field('partner_logo_mobile_url', $primary_menu),  // default: 'arizona-state-university-logo.png'
				'brandLink' => get_field('partner_logo_link', $primary_menu),  // default: 'https://asu.edu'
			];
		}

		$parent_org_name = get_theme_mod( 'parent_unit_name' );
		$parent_org_link = get_theme_mod( 'parent_unit_link' );
		$site_title = false;
		$site_display_name = false;

		// Build navTree / mobileNavTree props using walker class.
		if ( has_nav_menu('primary')) {
			$menu_items = wp_nav_menu([
				'menu' => $primary_menu,
				'walker' => new UDS_React_Header_Navtree(),
				'echo' => false,
				'container' => '',
				'items_wrap' => '%3$s', // See: wp_nav_menu codex for why. Returns empty string.
			]);
		} else {
			$menu_items = array();
		}

		// Expected return from nav walker is a serialized array. But if the array is empty/error,
		// is_seralized() should return false. Explictly return an empty array if so.
		// Handles the use case where the menu is only composed of CTA buttons.
		if ( is_serialized( $menu_items )) {
			//echo('is_serialized ran');
			$menu_items = maybe_unserialize($menu_items);
		} else {
			//echo('is_serialized failed');
			$menu_items = array();
		}

		//Build ctaButton prop
		$cta_buttons = array();
		foreach ($menu_items as $key => $item) {
			$itemType = $item->type ?? false;
			if($itemType == 'button'){
				unset($menu_items[$key]);
				array_push($cta_buttons, $item);
			}
		}

		// If there are no CTA buttons defined in the menu, the CTA walker explicitly returns a
		// serlizized empty array. Shouldn't be any need to further check is_serialized().

		$cta_buttons = maybe_unserialize($cta_buttons);

		// Prep localized array items for wp_localize_script below.
		$localized_array = 	array(
			'loggedIn' => is_user_logged_in(),
			'loginLink' => site_url() . '/wp-admin',
			'logoutLink' => wp_logout_url(),
			'userName' => $current_user->user_login,
			'navTree' => $menu_items,
			'mobileNavTree' => $menu_items,
			'expandOnHover' => $expand_on_hover,
			'baseUrl' => site_url(),
			'logo' => $asu_logo_override_array,
			'isPartner' => $show_partner_logo,
			'partnerLogo' => $add_partner_logo_array,
			'title' => get_bloginfo(),
			'animateTitle' => $animate_title,
			'parentOrg' => $parent_org_name,
			'parentOrgUrl' => $parent_org_link,
			'breakpoint' => $mobile_menu_breakpoint,
			'buttons' => $cta_buttons,
			'searchUrl' => 'https://search.asu.edu/search',
			'site' => $domain,
		);
		do_action('qm/debug', $localized_array);
		// pass WordPress PHP variables to the uds-header-scripts script we enqueued above
		// These variables are props for the header React component
		wp_localize_script(
			'uds-wordpress-scripts', // the handle of the script to pass our variables
			'udsHeaderVars', // object name to access our PHP variables from in our script
			$localized_array
		);
	}
}

