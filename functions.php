<?php
/**
 * ASU Web Standards 2020 Theme functions and definitions
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$asu_wp2020_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/asu-favicons.php',                    // Enable ASU Favicons.
	'/wpautop.php',                         // Disable wpautop.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/wp-custom-fields.php',                // Disable WP Core custom fields metaboxes.
	'/advanced-custom-fields.php',          // Load integrated ACF plugin.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $asu_wp2020_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}
class Social_Media_Walker extends Walker_Nav_Menu{

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(
            ' '
        ,   apply_filters(
                'nav_menu_css_class'
            ,   array_filter( $classes ), $item
            )
        );

        ! empty ( $class_names )
            and $class_names = ' class="nav-link"';

        $attributes  = '';

        ! empty( $item->description )
            and $attributes .= ' title="'  . esc_attr( $item->description ) .'"';
        ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

				$output .= "";

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = $args->before
            . "<a id='menu-item-$item->ID' $class_names $attributes ><span class='fab $title'>"
            . '</span></a> '
            . $args->after;

        $output .= apply_filters(
            'walker_nav_menu_start_el'
        ,   $item_output
        ,   $item
        ,   $depth
        ,   $args
        );
    }
}


class Footer_Walker extends Walker_Nav_Menu{

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(
            ' '
        ,   apply_filters(
                'nav_menu_css_class'
            ,   array_filter( $classes ), $item
            )
        );

        ! empty ( $class_names )
            and $class_names = ' class="nav-link"';

        $attributes  = '';

				! empty( $item->attr_title )
            and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

				$output .= "";

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = $args->before
            . "<a $class_names $attributes > $title"
            . '</a> '
            . $args->after;

        $output .= apply_filters(
            'walker_nav_menu_start_el'
        ,   $item_output
        ,   $item
        ,   $depth
        ,   $args
        );
    }
}


function footer_custom_walker( $args ) {
	if ( ! isset( $args['theme_location'] ) || $args['theme_location'] == "" ) {
		$args['container'] = '';
		$args['container_class'] = '';
		$args['container_id'] = '';
		$args['items_wrap'] = '<div id="%1$s" class="collapse card-body" aria-labelledby="header-%1$s">%3$s</div>';
		$args['walker'] = new Footer_Walker();
  	}
	return $args;
}
add_filter( 'wp_nav_menu_args', 'footer_custom_walker' );
