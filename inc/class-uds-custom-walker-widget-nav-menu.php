<?php
/**
 * Navigation menu walker class
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*
 * Class Name: Uds_Custom_Walker_Widget_Nav_Menu
 * Description: A custom Nav Walker class to generate ASU Web Standards-compliant menus for widget-based menus (sidebars, etc.)
 */

/* Check if Class Exists. */
if ( ! class_exists( 'Uds_Custom_Walker_Widget_Nav_Menu' ) ) {
	/**
	 * Custom Walker for navigation menu class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class Uds_Custom_Walker_Widget_Nav_Menu extends Walker_Nav_Menu {
		/**
		 * Starts the list before child elements are added, to add a wrapper tag for the child menu.
		 *
		 * @param output $output to append additional content to the menu output.
		 *
		 * @param depth  $depth the depth of the menu item.
		 *
		 * @param args   $args navigation menu arguments.
		 */
		public function start_lvl( &$output, $depth = 0, $args = null ) {
			global $parent_menu_item_id;
			if ( 0 === $depth ) {
				$output .= '<div id="menu-content-of-' . $parent_menu_item_id . '" class="card-body collapse" aria-labelledby="' . $parent_menu_item_id . '" data-parent=".sidebar">';
			} else {
				$output .= '<div class="card-body pt-2">';
			}
		}
		/**
		 * Ends the list of after child elements are added, to add a close tag for the child menu.
		 *
		 * @param output $output to append additional content to the menu output.
		 *
		 * @param depth  $depth the depth of the menu item.
		 *
		 * @param args   $args navigation mwnu arguments.
		 */
		public function end_lvl( &$output, $depth = 0, $args = array() ) {
			if ( 0 === $depth ) {
				$output .= "\n</div></div>\n";
			} else {
				$output .= "\n</div>\n";
			}
		}
		/**
		 * Starts the menu element output.
		 *
		 * @param output $output to append additional content to the menu output.
		 *
		 * @param item   $item the menu item.
		 *
		 * @param depth  $depth the depth of the menu item.
		 *
		 * @param args   $args navigation mwnu arguments.
		 *
		 * @param id     $id the current item id.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $wp_query, $wpdb, $parent_menu_item_id;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$class_names = '';
			$value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
			$parent_menu_item_id = esc_attr( $id );
			$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
			$has_children = $wpdb->get_var(
				$wpdb->prepare(
					"SELECT COUNT(meta_id)
                            FROM wp_postmeta
                            WHERE meta_key='_menu_item_menu_item_parent'
                            AND meta_value=%s", // '" . $item->ID . "'"
					$item->ID
				)
			);

			$output .= $indent . ' ';
			if ( 0 === $depth && $has_children > 0 ) {
				$attributes = ' href="#menu-content-of-' . $parent_menu_item_id . '" ';
				$attributes .= ' data-toggle="collapse" role="button" aria-expanded="false" role="button" aria-controls="menu-content-of-' . $parent_menu_item_id . '"';
				$wrapper = '<div class="card card-foldable">
					<div class="card-header">';
						$end_wrapper = '</div>';
						$classes[] = 'collapsed nav-link';
			} elseif ($has_children > 0) {
				$attributes = ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
				$classes[] = 'nav-link';
				$wrapper = '<div class="test-zainab">';
				$end_wrapper = '</div>';
			}else {
				$attributes = ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
				$classes[] = 'nav-link';
				$wrapper = '<div class="nav-link-container">';
				$end_wrapper = '</div>';
			}
			$is_external_link = get_field( 'menu_external_link', $item->ID );
			if ( $is_external_link ) {
				$is_external_link   = 'rel="noreferrer noopener"';
			}
			$is_target_blank    = get_field( 'menu_target_blank', $item->ID );
			if ( $is_target_blank ) {
				$is_target_blank = 'target=_blank';
			}
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';
			$item_output  = $wrapper;
			$item_output .= $args->before;
			$item_output .= '<a' . $id . $value . $attributes . $value . $class_names . $is_external_link . $is_target_blank . '>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			// Add the drop down arrow to the parent menu item if the item level is 0 and has children.
			if ( 0 === $depth && $has_children > 0 ) {
				$item_output .= '<span class="fas fa-chevron-down"></span>';
			}

			// Add external link icon if it has been requested. Using extra-small size here.
			if ( $is_external_link ) {
				$item_output .= '&nbsp;&nbsp;<i class="fas fa-external-link-alt fa-xs"></i>';
			}

			$item_output .= '</a>';
			$item_output .= $args->after;
			$item_output  .= $end_wrapper;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

	}
}
