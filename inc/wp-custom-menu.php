<?php
/**
 * Helper functions for building ASU Web Standards 2.0 menus.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'uds_wp_get_menu_array' ) ) {
	/**
	 * Load requested menu object and format into hierarchical array
	 * for the custom WP nav menu builders.
	 *
	 * @param string $menu_name Slug name of desired menu.
	 */
	function uds_wp_get_menu_formatted_array( $menu_name ) {

		$locations = get_nav_menu_locations();
		if ( isset( $locations[ $menu_name ] ) ) {
			$menu_object = wp_get_nav_menu_object( $locations[ $menu_name ] );
			$array_menu = wp_get_nav_menu_items( $menu_object->term_id );

			// array_menu will return false if there are no menu options.
			if ( ! $array_menu ) {
				$array_menu = array();
			}

			/**
			 * Constructing a menu array
			 */

			/**
			 * Step 1: Loop through ALL source menu items we retreived from WordPress,
			 * and add any that DO NOT HAVE a parent item. These would then be
			 * the top-level menu items. We call our menu holding array $menu.
			 */
			$menu = array();
			foreach ( $array_menu as $m ) {
				if ( empty( $m->menu_item_parent ) ) {
					$menu[ $m->ID ] = array();
					$menu[ $m->ID ]['ID']         = $m->ID;
					$menu[ $m->ID ]['order']      = $m->menu_order;
					$menu[ $m->ID ]['title']      = $m->title;
					$menu[ $m->ID ]['url']        = $m->url;
					$menu[ $m->ID ]['cta_button'] = get_field( 'menu_cta_button', $m );
					$menu[ $m->ID ]['cta_color']  = get_field( 'menu_cta_button_color', $m );
					$menu[ $m->ID ]['parent']     = $m->menu_item_parent;
					$menu[ $m->ID ]['children']   = array();
				}
			}


			/**
			 * Step 2: Loop through ALL source menu items again. If an item has a parent, AND
			 * that parent is in the array we just made in step 1, it is a child item of
			 * a top-level menu item. We place that item's information as a new element in
			 * the $dropdown array.
			 *
			 * The item's information will have the id of the parent item as well.
			 */
			$dropdown = array();
			foreach ( $array_menu as $m ) {
				if ( ! empty( $m->menu_item_parent ) && array_key_exists( $m->menu_item_parent, $menu ) ) {
					$dropdown[ $m->ID ] = array();
					$dropdown[ $m->ID ]['ID']         = $m->ID;
					$dropdown[ $m->ID ]['order']      = $m->menu_order;
					$dropdown[ $m->ID ]['title']      = $m->title;
					$dropdown[ $m->ID ]['url']        = $m->url;
					$dropdown[ $m->ID ]['cta_button'] = get_field( 'menu_cta_button', $m );
					$dropdown[ $m->ID ]['cta_color']  = get_field( 'menu_cta_button_color', $m );
					$dropdown[ $m->ID ]['parent']     = $m->menu_item_parent;
					$dropdown[ $m->ID ]['children']   = array();

					/**
					 * Add the current child's data to the existing $menu array under 'children',
					 * and then under this item's ID, for that parent ID
					 */
					$menu[ $m->menu_item_parent ]['children'][ $m->ID ] = $dropdown[ $m->ID ];
				}
			}

			/**
			 * Step 3: Loop through every source menu item a third time. If this item has a
			 * parent value, but that value IS NOT IN the top-level menu array, build an array
			 * of data for this menu item
			 */
			$column = array();

			foreach ( $array_menu as $m ) {
				if ( $m->menu_item_parent && ! array_key_exists( $m->menu_item_parent, $menu ) ) {
					$column[ $m->ID ] = array();
					$column[ $m->ID ]['ID']         = $m->ID;
					$column[ $m->ID ]['order']      = $m->menu_order;
					$column[ $m->ID ]['title']      = $m->title;
					$column[ $m->ID ]['url']        = $m->url;
					$column[ $m->ID ]['cta_button'] = get_field( 'menu_cta_button', $m );
					$column[ $m->ID ]['cta_color']  = get_field( 'menu_cta_button_color', $m );

					/**
					 * Add this item's data as a child to the $dropdown array we created in step 2.
					 * Place it under the parent, then under 'children', in a new array with ID of this item's ID.
					 */
					$dropdown[ $m->menu_item_parent ]['children'][ $m->ID ] = $column[ $m->ID ];

					/**
					 * Determine this item's top-menu item (grandparent) by getting the parent ID of this item's parent.
					 * Adding a check here to ensure that there is a parent array in the parent of this item for us to
					 * add anything to.
					 */
					if ( array_key_exists( 'parent', $dropdown[ $m->menu_item_parent ] ) ) {
						$top_menu = $dropdown[ $m->menu_item_parent ]['parent'];
						$menu[ $top_menu ]['children'][ $m->menu_item_parent ]['children'][ $m->ID ] = $column[ $m->ID ];
					}
				}
			}

			return $menu;
		} else {
			return;
		}
	}
}

if ( ! function_exists( 'uds_wp_get_menu_depth' ) ) {
	/**
	 * Get the depth of this particular menu item in its hierarchy by inspecting
	 * the 'children' sub-array at each level to determine whether or not
	 * it is empty.
	 *
	 * @param Array $item  Array of top-level menu items.
	 * @return String      Maximum depth of the menu: single, children, or grandchildren.
	 */
	function uds_wp_get_menu_depth( $item = null ) {
		if ( empty( $item ) ) {
			wp_die( 'Cannot find depth of a menu item that was not provided, or is empty.' );
		}

		// presume that we do not have any children or grandchildren.
		$depth = 'single';

		if ( ! empty( $item['children'] ) ) {
			// we have at least children, since the array is not empty.
			$depth = 'children';

			// check for any grandchildren, exiting if we find any.
			foreach ( $item['children'] as $child ) {
				if ( ! empty( $child['children'] ) ) {
					$depth = 'grandchildren';
					break;
				}
			}
		}

		return $depth;
	}
}

if ( ! function_exists( 'uds_wp_render_column_links' ) ) {
	/**
	 * Renders the individual links from the provided child/grandchild list
	 *
	 * @param array $children The array of links for one column.
	 *
	 * @return string A string containing all the <a> tags for the column.
	 */
	function uds_wp_render_column_links( $children = array() ) {

		if ( empty( $children ) ) {
			return 'No Menu Links';
		}

		$links = '';

		foreach ( $children as $child ) {
			// check if menu item is a CTA Button.
			$is_cta_button = $child['cta_button'];
			$cta_button_color = $child['cta_color'];

			if ( $is_cta_button ) {
				$links .= uds_wp_render_nav_cta_button( $cta_button_color, $child );
			} else {
				$link = '<a class="dropdown-item" href="%1$s" title="%2$s">%2$s</a>';
				$links .= wp_kses( sprintf( $link, $child['url'], $child['title'] ), wp_kses_allowed_html( 'post' ) );
			}
		}

		return $links;
	}
}

if ( ! function_exists( 'uds_wp_render_nav_item_link' ) ) {
	/**
	 * Renders the top-level link, either as a normal nav link or a drop-down link
	 * Note that we're using the 'default:' case to render our actual default, and
	 * not testing explicitly for the 'single' case of menu depth.
	 *
	 * @param string $menu_type The type of menu, used in the markup id and class names.
	 * @param array  $item      The navigation item whose link we want to render.
	 *
	 * @return string            The rendered navigation link
	 */
	function uds_wp_render_nav_item_link( $menu_type, $item ) {
		$link = '';

		switch ( $item['depth'] ) {

			case 'children':
			case 'grandchildren':
				$template = '<a class="nav-link" href="%1$s" id="%2$s-one-col" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			%3$s
			<span class="fa fa-chevron-down"></span>
			</a>';
				$link = wp_kses( sprintf( $template, $item['url'], $menu_type, $item['title'] ), wp_kses_allowed_html( 'post' ) );
				return $link;
				break;

			default:
				$template = '<a class="nav-link" href="%1$s" title="%2$s">%2$s</a>';
				$link = wp_kses( sprintf( $template, $item['url'], $item['title'] ), wp_kses_allowed_html( 'post' ) );
				return $link;
		}
	}
}

if ( ! function_exists( 'uds_wp_render_nav_cta_button' ) ) {
	/**
	 * Renders menu link as a CTA button.
	 *
	 * @param string $cta_color The color slug, used in the markup id and class names.
	 * @param array  $item      The navigation item whose CTA button we want to render.
	 *
	 * @return string           The rendered button
	 */
	function uds_wp_render_nav_cta_button( $cta_color, $item ) {
		$button = '';

		$template = '<a href="%1$s" class="btn btn-sm btn-%2$s">%3$s</a>';
		$button = wp_kses( sprintf( $template, $item['url'], $cta_color, $item['title'] ), wp_kses_allowed_html( 'post' ) );
		return $button;
	}
}
