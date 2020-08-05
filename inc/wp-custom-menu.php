<?php
/**
 * Load requested menu object and format into hierarchical array for the custom WP nav menu builders.
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if (!function_exists('asu_wp2020_get_menu_array')) {
	/**
	 * Build menu array for .
	 *
	 * @param string $menu_name Slug name of desired menu.
	 */
	function asu_wp2020_get_menu_formatted_array($menu_name)
	{
		if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
			$menu_object = wp_get_nav_menu_object($locations[$menu_name]);
			$array_menu = wp_get_nav_menu_items($menu_object->term_id);

			$menu = array();
			foreach ($array_menu as $m) {
				if (empty($m->menu_item_parent)) {
					$menu[$m->ID] = array();
					$menu[$m->ID]['ID']          =   $m->ID;
					$menu[$m->ID]['order']       =   $m->menu_order;
					$menu[$m->ID]['title']       =   $m->title;
					$menu[$m->ID]['url']         =   $m->url;
					$menu[$m->ID]['parent']      =   $m->menu_item_parent;
					$menu[$m->ID]['children']    =   array();
				}
			}

			$dropdown = array();
			foreach ($array_menu as $m) {
				if (!empty($m->menu_item_parent) && array_key_exists($m->menu_item_parent, $menu)) {
					$dropdown[$m->ID] = array();
					$dropdown[$m->ID]['ID']       =   $m->ID;
					$dropdown[$m->ID]['order']    =   $m->menu_order;
					$dropdown[$m->ID]['title']    =   $m->title;
					$dropdown[$m->ID]['url']      =   $m->url;
					$dropdown[$m->ID]['parent']   =   $m->menu_item_parent;
					$dropdown[$m->ID]['children'] =   array();

					$menu[$m->menu_item_parent]['children'][$m->ID] = $dropdown[$m->ID];
				}
			}

			$column = array();
			foreach ($array_menu as $m) {
				if ($m->menu_item_parent && !array_key_exists($m->menu_item_parent, $menu)) {
					$column[$m->ID] = array();
					$column[$m->ID]['ID']       =   $m->ID;
					$column[$m->ID]['order']    =   $m->menu_order;
					$column[$m->ID]['title']    =   $m->title;
					$column[$m->ID]['url']      =   $m->url;

					$dropdown[$m->menu_item_parent]['children'][$m->ID] = $column[$m->ID];

					$top_menu = $dropdown[$m->menu_item_parent]['parent'];
					$menu[$top_menu]['children'][$m->menu_item_parent]['children'][$m->ID] = $column[$m->ID];
				}
			}

			// vd($dropdown);
			// vdd($menu);

			return $menu;
		} else {
			return;
		}
	}
}
