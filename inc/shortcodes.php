<?php
/**
 * Added shortcodes to the theme. Deployed as a temporary work around to other features
 * that are expected to be available in future versions of WordPress.
 *
 * @package uds-wordpress-theme
 */

/**
 * Shortcode [uds-sidebar-menu].
 * Replicates a function call to return a wp_nav_menu object.
 * References the nav menu custom walker to produce the correct markup.
 *
 * @param array $atts Shortcode attributes.
 */
function uds_wordpress_shortcode_sidebar_menu( $atts ) {
	$args = shortcode_atts(
		array(
			'menu'            => '',
			'title'           => '',
		),
		$atts
	);

	$menu = $args['menu'];
	$title = $args['title'];

	$wrapper = '<nav class="sidebar accordion" aria-label="Secondary">';

	if ( ! empty( $title ) ) {
		$sidebar_title = '<div class="nav-text">' . $title . '</div>';
	} else {
		$sidebar_title = '';
	}

	$sidebar = wp_nav_menu(
		array(
			'menu'            => $menu,
			'echo'            => false,
			'walker'          => new Uds_Custom_Walker_Widget_Nav_Menu(),
			'items-wrap'      => '%3$s',
		)
	);

	return $wrapper . $sidebar_title . $sidebar . '</nav>';
}

// @codingStandardsIgnoreStart
add_shortcode( 'uds-sidebar-menu', 'uds_wordpress_shortcode_sidebar_menu' );
 //@codingStandardsIgnoreEnd
