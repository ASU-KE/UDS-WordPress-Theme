<?php
/**
 * Custom Navigation menu widget
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
require_once get_template_directory() . '/inc/class-custom-walker-nav-menu.php';
/**
 * Customize the navigation menu widget's wrapper and title's wrapper.
 *
 * @param args $args Array of nav menu arguments.
 */
function uds_wp_theme_custom_widget_title_tag( $args ) {
	if ( 'Navigation Menu' === $args[0]['widget_name'] ) {
		$args[0]['before_widget'] = '<nav id="' . $args[0]['widget_id'] . '" class="sidebar accordion" aria-label="Secondary">';
		$args[0]['after_widget'] = '</nav>';
		$args[0]['before_title'] = '<div class="nav-text">';
		$args[0]['after_title']  = '</div>';
	}
		return $args;
}
add_filter( 'dynamic_sidebar_params', 'uds_wp_theme_custom_widget_title_tag' );


/**
 * Replace current-menu-item class with active class.
 *
 * @param classes $classes is an array of the CSS classes that are applied to the menu item's individual element.
 *
 * @param item    $item is the current menu item.
 */
function uds_wp_theme_special_nav_class( $classes, $item ) {
	if ( in_array( 'current-menu-item', $classes ) ) {
		$classes = array_diff( $classes, array( 'current-menu-item', 'active' ) );
		$classes[] = 'active ';
	} else if ( in_array( 'current_page_item', $classes ) ) {
		$classes = array_diff( $classes, array( 'current_page_item', 'active' ) );
		$classes[] = 'active ';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'uds_wp_theme_special_nav_class', 10, 2 );


/**
 * Customize navigation menu arguments when the menu is not located on social-media section.
 *
 * @param args $args Array of nav menu arguments.
 */
function uds_wp_theme_navigation_menu_custom_walker( $args ) {
	if ( 'social-media' != $args['theme_location'] ) {
		return array_merge(
			$args,
			array(
				'container'            => '',
				'menu_class'           => '',
				'menu_id'              => '',
				'items_wrap'           => '%3$s',
				'walker'               => new Custom_Walker_Nav_Menu(),
			)
		);
	} else {
		return $args;
	}
}
add_filter( 'wp_nav_menu_args', 'uds_wp_theme_navigation_menu_custom_walker' );
