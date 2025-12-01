<?php

/**
 * Localize_script function for component footer.
 * 
 * This script extracts WordPress footer configuration and formats it for
 * the React ASU Footer component. It follows the same pattern as the header
 * localizer script, converting WordPress theme customizer settings and
 * navigation menus into props that can be consumed by the React component.
 * 
 * The React footer expects two main props:
 * - social: Contains logo information and social media links
 * - contact: Contains contact information and footer navigation columns
 */

add_action('wp_enqueue_scripts', 'uds_localize_component_footer_script', 99);
if (!function_exists('uds_localize_component_footer_script')) {

	function uds_localize_component_footer_script()
	{

		// Get clean site url
		$domain_text = site_url();
		$domain = parse_url($domain_text, PHP_URL_HOST);

		/**
		 * UDS Footer: Social Media links
		 */
		$social_media_links = array();
		if (has_nav_menu('social-media')) {
			// If we are not the main site, and we want to use a parent menu,
			if (is_multisite() && !is_main_site() && true === get_theme_mod('use_main_site_social_menu')) {
				// Switch our database context to the 'main' blog of our multisite.
				switch_to_blog(get_main_site_id());
			}

			$menu_name = 'social-media';
			$locations = get_nav_menu_locations();
			if (isset($locations[$menu_name])) {
				$social_menu_id = $locations[$menu_name];
				$social_menu = wp_get_nav_menu_object($social_menu_id);
				$social_items = wp_get_nav_menu_items($social_menu->term_id);

				if ($social_items) {
					foreach ($social_items as $item) {
						$social_media_links[] = array(
							'url' => $item->url,
							'title' => $item->title,
							'external' => get_field('menu_external_link', $item->ID) ? true : false,
							'target_blank' => get_field('menu_target_blank', $item->ID) ? '_blank' : '_self'
						);
					}
				}
			}

			// Switch back if we switched earlier
			if (is_multisite() && ms_is_switched()) {
				restore_current_blog();
			}
		}

		/**
		 * UDS Footer: Contact Information
		 */
		$contact_info = array(
			'unitName' => '',
			'contactUrl' => get_theme_mod('contact_url', ''),
			'contributeUrl' => get_theme_mod('contribute_url', ''),
			'contributeText' => get_theme_mod('contribute_text', 'Contribute')
		);

		// Get unit name (either site name or custom text)
		$footer_unit_name_type = get_theme_mod('footer_unit_name_type', 'site_name');
		if ('custom' === $footer_unit_name_type) {
			$contact_info['unitName'] = get_theme_mod('footer_unit_name_text', get_bloginfo('name'));
		} else {
			$contact_info['unitName'] = get_bloginfo('name');
		}

		/**
		 * UDS Footer: Logo settings
		 */
		$footer_logo = array(
			'type' => get_theme_mod('footer_logo_type', 'asu'),
			'url' => '',
			'alt' => get_bloginfo('name') . ' Logo',
			'link' => get_theme_mod('footer_logo_link', home_url('/'))
		);

		// Determine logo URL based on type
		$logo_type = get_theme_mod('footer_logo_type', 'asu');
		$logo_select = get_theme_mod('logo_select');
		$logo_url = get_theme_mod('logo_url');

		if ($logo_type === 'asu') {
			$footer_logo['url'] = get_template_directory_uri() . '/dist/img/asu-logo/asu-university-horiz-white.png';
			$footer_logo['alt'] = 'Arizona State University';
			$footer_logo['link'] = 'https://asu.edu';
		} else {
			// Check for preset logo selection
			if ($logo_select && $logo_select !== 'none') {
				// Load array of endorsed units (if function exists)
				if (function_exists('uds_wp_theme_get_endorsed_unit_logos')) {
					$endorsed_logos = uds_wp_theme_get_endorsed_unit_logos();
					foreach ($endorsed_logos as $unit) {
						if ($unit['slug'] === $logo_select) {
							$footer_logo['url'] = get_template_directory_uri() . '/dist/img/endorsed-logo/' . $unit['filename'];
							break;
						}
					}
				}
			} elseif ($logo_url && $logo_url !== '') {
				$footer_logo['url'] = $logo_url;
			} else {
				// Fall back to ASU logo
				$footer_logo['url'] = get_template_directory_uri() . '/dist/img/asu-logo/asu-university-horiz-white.png';
				$footer_logo['alt'] = 'Arizona State University';
				$footer_logo['link'] = 'https://asu.edu';
			}
		}

		/**
		 * UDS Footer: Menu settings and navigation
		 */
		$footer_menu_items = array();
		$menu_name = 'footer';

		// Check if we should use main site menu
		if (is_multisite() && !is_main_site() && true === get_theme_mod('use_main_site_footer_menu')) {
			switch_to_blog(get_main_site_id());
		}

		if (has_nav_menu($menu_name) && function_exists('uds_wp_get_menu_formatted_array')) {
			$footer_menu_items = uds_wp_get_menu_formatted_array($menu_name);
		}

		// Switch back if we switched earlier
		if (is_multisite() && ms_is_switched()) {
			restore_current_blog();
		}

		/**
		 * UDS Footer: Row visibility settings
		 */
		$footer_settings = array(
			'brandingRowEnabled' => get_theme_mod('footer_row_branding', 'enabled') === 'enabled',
			'actionRowEnabled' => get_theme_mod('footer_row_actions', 'enabled') === 'enabled'
		);

		/**
		 * UDS Footer: Format data for React component props
		 */
		$footer_social = null;
		if ($footer_settings['brandingRowEnabled'] && (!empty($social_media_links) || $footer_logo['url'])) {
			$media_links = array();
			
			// Convert social media links to expected format
			foreach ($social_media_links as $link) {
				$platform = strtolower($link['title']);
				if (strpos($platform, 'facebook') !== false) {
					$media_links['facebook'] = $link['url'];
				} elseif (strpos($platform, 'twitter') !== false) {
					$media_links['twitter'] = $link['url'];
				} elseif (strpos($platform, 'linkedin') !== false) {
					$media_links['linkedIn'] = $link['url'];
				} elseif (strpos($platform, 'instagram') !== false) {
					$media_links['instagram'] = $link['url'];
				} elseif (strpos($platform, 'youtube') !== false) {
					$media_links['youtube'] = $link['url'];
				}
			}
			
			$footer_social = array(
				'logoUrl' => $footer_logo['link'],
				'unitLogo' => $footer_logo['url'],
				'mediaLinks' => $media_links
			);
		}

		$footer_contact = null;
		if ($footer_settings['actionRowEnabled']) {
			$contact_columns = array();
			
			// Convert footer menu items to columns format
			foreach ($footer_menu_items as $item) {
				if (!empty($item['children'])) {
					$column_links = array();
					foreach ($item['children'] as $child) {
						$column_links[] = array(
							'url' => $child['url'],
							'text' => $child['title'],
							'title' => $child['title']
						);
					}
					
					$contact_columns[] = array(
						'title' => $item['title'],
						'links' => $column_links
					);
				}
			}
			
			$footer_contact = array(
				'title' => $contact_info['unitName'],
				'contactLink' => $contact_info['contactUrl'],
				'contributionLink' => $contact_info['contributeUrl'],
				'columns' => $contact_columns
			);
		}

		/**
		 * Prep localized array items for wp_localize_script below.
		 */
		$localized_array = array(
			'social' => $footer_social,
			'contact' => $footer_contact,
			'settings' => $footer_settings,
			'site' => $domain,
			'baseUrl' => home_url('/'),
		);

		// Pass WordPress PHP variables to the footer scripts
		// These variables are props for the footer React component
		wp_localize_script(
			'uds-wordpress-scripts', // the handle of the script to pass our variables
			'udsFooterVars', // object name to access our PHP variables from in our script
			$localized_array
		);
	}
}