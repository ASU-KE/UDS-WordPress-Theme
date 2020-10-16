<?php
/**
 * Helper functions for building ASU Web Standards 2.0 menus.
 *
 * @package uds-wordpress
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if (!function_exists('uds_wp_get_menu_array')) {
	/**
	 * Load requested menu object and format into hierarchical array
	 * for the custom WP nav menu builders.
	 *
	 * @param string $menu_name Slug name of desired menu.
	 */
	function uds_wp_get_menu_formatted_array($menu_name)
	{
		if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
			$menu_object = wp_get_nav_menu_object($locations[$menu_name]);
			$array_menu = wp_get_nav_menu_items($menu_object->term_id);

			$menu = array();
			foreach ($array_menu as $m) {
				if (empty($m->menu_item_parent)) {
					$menu[$m->ID] = array();
					$menu[$m->ID]['ID']         = $m->ID;
					$menu[$m->ID]['order']      = $m->menu_order;
					$menu[$m->ID]['title']      = $m->title;
					$menu[$m->ID]['url']        = $m->url;
					$menu[$m->ID]['cta_button'] = get_field('menu_cta_button', $m);
					$menu[$m->ID]['cta_color']  = get_field('menu_cta_button_color', $m);
					$menu[$m->ID]['parent']     = $m->menu_item_parent;
					$menu[$m->ID]['children']   = array();
				}
			}

			$dropdown = array();
			foreach ($array_menu as $m) {
				if (!empty($m->menu_item_parent) && array_key_exists($m->menu_item_parent, $menu)) {
					$dropdown[$m->ID] = array();
					$dropdown[$m->ID]['ID']         =   $m->ID;
					$dropdown[$m->ID]['order']      =   $m->menu_order;
					$dropdown[$m->ID]['title']      =   $m->title;
					$dropdown[$m->ID]['url']        =   $m->url;
					$dropdown[$m->ID]['cta_button'] = get_field('menu_cta_button', $m);
					$dropdown[$m->ID]['cta_color']  = get_field('menu_cta_button_color', $m);
					$dropdown[$m->ID]['parent']     =   $m->menu_item_parent;
					$dropdown[$m->ID]['children']   =   array();

					$menu[$m->menu_item_parent]['children'][$m->ID] = $dropdown[$m->ID];
				}
			}

			$column = array();
			foreach ($array_menu as $m) {
				if ($m->menu_item_parent && !array_key_exists($m->menu_item_parent, $menu)) {
					$column[$m->ID] = array();
					$column[$m->ID]['ID']         =   $m->ID;
					$column[$m->ID]['order']      =   $m->menu_order;
					$column[$m->ID]['title']      =   $m->title;
					$column[$m->ID]['url']        =   $m->url;
					$column[$m->ID]['cta_button'] = get_field('menu_cta_button', $m);
					$column[$m->ID]['cta_color']  = get_field('menu_cta_button_color', $m);

					$dropdown[$m->menu_item_parent]['children'][$m->ID] = $column[$m->ID];

					$top_menu = $dropdown[$m->menu_item_parent]['parent'];
					$menu[$top_menu]['children'][$m->menu_item_parent]['children'][$m->ID] = $column[$m->ID];
				}
			}

			return $menu;
		} else {
			return;
		}
	}
}

if (!function_exists('uds_wp_get_menu_depth')) {
	/**
	 * Get the depth of this particular menu item in its hierarchy by inspecting
	 * the 'children' sub-array at each level to determine whether or not
	 * it is empty
	 *
	 * @param Array $item array of top-level menu items
	 * @return String Maximum depth of the menu: single, children, or grandchildren
	 */
	function uds_wp_get_menu_depth($item = null)
	{
		if (empty($item)) {
			wp_die('Cannot find depth of a menu item that was not provided, or is empty.');
		}

		// presume that we do not have any children or grandchildren
		$depth = 'single';

		if (!empty($item['children'])) {
			// we have at least children, since the array is not empty
			$depth = 'children';

			// check for any grandchildren, exiting if we find any
			foreach ($item['children'] as $child) {
				if (!empty($child['children'])) {
					$depth = 'grandchildren';
					break;
				}
			}
		}

		return $depth;
	}
}

if (!function_exists('uds_wp_render_column_links')) {
	/**
	 * Renders the individual links from the provided child/grandchild list
	 *
	 * @param Array $children The array of links for one column
	 * @return String $links A string containing all the <a> tags for the column
	 */
	function uds_wp_render_column_links($children = array())
	{

		if (empty($children)) {
			return 'No Menu Links';
		}

		$links = "";

		foreach ($children as $child) {
			// check if menu item is a CTA Button
			$isCtaButton = $child['cta_button'];
			$ctaButtonColor = $child['cta_color'];

			if ($isCtaButton) {
				$links .= uds_wp_render_nav_cta_button($ctaButtonColor, $child);
			} else {
				$link = '<a class="dropdown-item" href="%1$s" title="%2$s">%2$s</a>';
				$links .= wp_kses(sprintf($link, $child['url'], $child['title']), wp_kses_allowed_html('post'));
			}
		}

		return $links;
	}
}

if (!function_exists('uds_wp_render_nav_item_link')) {
	/**
	 * Renders the top-level link, either as a normal nav link or a drop-down link
	 * Note that we're using the 'default:' case to render our actual default, and
	 * not testing explicitly for the 'single' case of menu depth.
	 *
	 * @param String $menuType The type of menu, used in the markup id and class names
	 * @param Array $item The navigation item whose link we want to render
	 * @return String $link The rendered navigation link
	 */
	function uds_wp_render_nav_item_link($menuType, $item)
	{
		$link = "";

		switch ($item['depth']) {

			case 'children':
			case 'grandchildren':
				$template = '<a class="nav-link" href="%1$s" id="%2$s-one-col" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			%3$s
			<span class="fa fa-chevron-down"></span>
			</a>';
				$link = wp_kses(sprintf($template, $item['url'], $menuType, $item['title']), wp_kses_allowed_html('post'));
				return $link;
				break;

			default:
				$template = '<a class="nav-link" href="%1$s" title="%2$s">%2$s</a>';
				$link = wp_kses(sprintf($template, $item['url'], $item['title']), wp_kses_allowed_html('post'));
				return $link;
		}
	}
}

if (!function_exists('uds_wp_render_nav_cta_button')) {
	/**
	 * Renders menu link as a CTA button.
	 *
	 * @param String $ctaColor The color slug, used in the markup id and class names
	 * @param Array $item The navigation item whose CTA button we want to render
	 * @return String $button The rendered button
	 */
	function uds_wp_render_nav_cta_button($ctaColor, $item)
	{
		$button = '';

		$template = '<a href="%1$s" class="btn btn-sm btn-%2$s">%3$s</a>';
		$button = wp_kses(sprintf($template, $item['url'], $ctaColor, $item['title']), wp_kses_allowed_html('post'));
		return $button;
	}
}
