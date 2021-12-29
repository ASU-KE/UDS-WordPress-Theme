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

	// Make local variables out of our shortcode args.
	$menu = $args['menu'];
	$title = $args['title'];

	// Create a slug version of the menu name for use as an ID.
	$slug = sanitize_title( $menu );

	// Create the wrapper around the sidebar menu, with an <h3> title if provided.
	$wrapper = '<div aria-controls="' . $slug . '" aria-expanded="false" class="sidebar-toggler" data-target="#' . $slug . '" data-toggle="collapse"><p>Select Section </p><span class="fas fa-chevron-up" /></div>';
	$wrapper .= '<nav class="sidebar collapse" id="' . $slug . '" aria-label="Secondary">';

	if ( ! empty( $title ) ) {
		$sidebar_title = '<h3>' . $title . '</h3>';
	} else {
		$sidebar_title = '';
	}

	// Build the menu with our nav walker.
	$sidebar = wp_nav_menu(
		array(
			'menu'            => $menu,
			'echo'            => false,
			'walker'          => new Uds_Custom_Walker_Widget_Nav_Menu(),
			'items-wrap'      => '%3$s',
		)
	);

	// Return the menu inside the wrapper.
	return $wrapper . $sidebar . '</nav>';
}

// phpcs:disable WPThemeReview.PluginTerritory.ForbiddenFunctions.plugin_territory_add_shortcode
add_shortcode( 'uds-sidebar-menu', 'uds_wordpress_shortcode_sidebar_menu' );
// phpcs:enable WPThemeReview.PluginTerritory.ForbiddenFunctions.plugin_territory_add_shortcode
