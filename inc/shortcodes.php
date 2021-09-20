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

	if( ! empty( $args[ 'id' ] ) ) {
		wp_die( var_dump( $args['menu'] ) );
	}

	$wrapper = '<div aria-controls="' . $menu . '" aria-expanded="false" class="sidebar-toggler" data-target="#' . $menu . '" data-toggle="collapse"><p>Select Section </p><span class="fas fa-chevron-up" /></div>';
	$wrapper .= '<nav class="sidebar collapse" id="' . $menu . '" aria-label="Secondary">';

	if ( ! empty( $title ) ) {
		$sidebar_title = '<h3>' . $title . '</h3>';
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

	return $wrapper . $sidebar . '</nav>';
}

// phpcs:disable WPThemeReview.PluginTerritory.ForbiddenFunctions.plugin_territory_add_shortcode
add_shortcode( 'uds-sidebar-menu', 'uds_wordpress_shortcode_sidebar_menu' );
// phpcs:enable WPThemeReview.PluginTerritory.ForbiddenFunctions.plugin_territory_add_shortcode
