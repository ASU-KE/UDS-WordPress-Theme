<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'include_theme_file' ) ) {
	/**
	 * Include a file in this theme or child theme if its present in the child theme. We can't just
	 * always call include with get_stylesheet_directory()."filename" because that will require that the
	 * child theme always define that file. Instead we want the child theme to optionally override files
	 * that they want to change.
	 *
	 * @param string $filename  File name to be included.
	 */
	function include_theme_file( $filename ) {
		if ( file_exists( get_stylesheet_directory() . DIRECTORY_SEPARATOR . $filename ) ) {
			include( get_stylesheet_directory() . DIRECTORY_SEPARATOR . $filename );
		} else {
			include( $filename );
			// include will throw warnings if the file isn't found.
		}
	}
}


/**
 * Change the post edit link into a button
 *
 * @param string $output  Edited Post link content.
 */
function uds_wp_custom_edit_post_link( $output ) {
	$output = str_replace( 'class="post-edit-link"', 'class="post-edit-link btn btn-md btn-maroon"', $output );
	return $output;
}
add_filter( 'edit_post_link', 'uds_wp_custom_edit_post_link' );


/**
 * Only allow iframing of our content when the request for an iFrame is coming from
 * the same domain as the content to be put inside the iFrame. WordPress is using
 * iFrames to insert the block editor in various places now.
 *
 * Update March, 2022: removed a conditional that only sent these headers if we
 * WERE NOT in the customizer. They are now sent on all requests. The same
 * domain policy should allow the customizer, widget editor, and other Gutenberg
 * enabled areas, while preventing outside sites from iFraming our content.
 */
function uds_wp_add_x_frame_options_header() {
	// Prevent pages from being iframed.
	header( 'X-Frame-Options: SAMEORIGIN always' );
	// Add CSP frame ancestors for browsers that support this.
	header( "Content-Security-Policy: frame-ancestors 'self'" );
}
add_action( 'send_headers', 'uds_wp_add_x_frame_options_header' );

/**
 * Remove oembed <link> tags from <head> so that LinkedIn previews will work
 */
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );


if ( ! function_exists( 'uds_wp_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function uds_wp_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'uds_wp_body_classes' );


if ( ! function_exists( 'uds_wp_adjust_body_class' ) ) {
	/**
	 * Setup body classes.
	 *
	 * @param string $classes CSS classes.
	 *
	 * @return mixed
	 */
	function uds_wp_adjust_body_class( $classes ) {

		foreach ( $classes as $key => $value ) {
			if ( 'tag' === $value ) {
				unset( $classes[ $key ] );
			}
		}

		return $classes;
	}
}
// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.
add_filter( 'body_class', 'uds_wp_adjust_body_class' );


if ( ! function_exists( 'uds_wp_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function uds_wp_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="container navigation post-navigation">
			<h2 class="sr-only"><?php esc_html_e( 'Post navigation', 'uds-wordpress-theme' ); ?></h2>
			<div class="row nav-links justify-content-between">
				<?php
				if ( get_previous_post_link() ) {
					previous_post_link( '<span class="nav-previous">%link</span>', _x( '<i class="fa fa-angle-left"></i>&nbsp;%title', 'Previous post link', 'uds-wordpress-theme' ) );
				}
				if ( get_next_post_link() ) {
					next_post_link( '<span class="nav-next">%link</span>', _x( '%title&nbsp;<i class="fa fa-angle-right"></i>', 'Next post link', 'uds-wordpress-theme' ) );
				}
				?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
}


if ( ! function_exists( 'uds_wp_mobile_web_app_meta' ) ) {
	/**
	 * Add mobile-web-app meta.
	 */
	function uds_wp_mobile_web_app_meta() {
		 echo '<meta name="mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-title" content="' . esc_attr( get_bloginfo( 'name' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'uds_wp_mobile_web_app_meta' );


if ( ! function_exists( 'uds_wp_default_body_attributes' ) ) {
	/**
	 * Adds schema markup to the body element.
	 *
	 * @param array $atts An associative array of attributes.
	 * @return array
	 */
	function uds_wp_default_body_attributes( $atts ) {
		$atts['itemscope'] = '';
		$atts['itemtype']  = 'http://schema.org/WebSite';
		return $atts;
	}
}
add_filter( 'uds_wp_body_attributes', 'uds_wp_default_body_attributes' );


if ( ! function_exists( 'uds_wp_escape_the_archive_description' ) ) {
	/**
	 * Escapes the description for an author or post type archive.
	 *
	 * @param string $description Archive description.
	 * @return string Maybe escaped $description.
	 */
	function uds_wp_escape_the_archive_description( $description ) {
		if ( is_author() || is_post_type_archive() ) {
			return wp_kses_post( $description );
		} else {
			/*
			* All other descriptions are retrieved via term_description() which returns
			* a sanitized description.
			*/
			return $description;
		}
	}
} // End of if function_exists( 'uds_wp_escape_the_archive_description' ).
// Escapes all occurances of 'the_archive_description'.
add_filter( 'get_the_archive_description', 'uds_wp_escape_the_archive_description' );


if ( ! function_exists( 'uds_wp_kses_title' ) ) {
	/**
	 * Sanitizes data for allowed HTML tags for post title.
	 *
	 * @param string $data Post title to filter.
	 * @return string Filtered post title with allowed HTML tags and attributes intact.
	 */
	function uds_wp_kses_title( $data ) {
		// Tags not supported in HTML5 are not allowed.
		$allowed_tags = array(
			'abbr'             => array(),
			'aria-describedby' => true,
			'aria-details'     => true,
			'aria-label'       => true,
			'aria-labelledby'  => true,
			'aria-hidden'      => true,
			'b'                => array(),
			'bdo'              => array(
				'dir' => true,
			),
			'blockquote'       => array(
				'cite'     => true,
				'lang'     => true,
				'xml:lang' => true,
			),
			'cite'             => array(
				'dir'  => true,
				'lang' => true,
			),
			'dfn'              => array(),
			'em'               => array(),
			'i'                => array(
				'aria-describedby' => true,
				'aria-details'     => true,
				'aria-label'       => true,
				'aria-labelledby'  => true,
				'aria-hidden'      => true,
				'class'            => true,
			),
			'code'             => array(),
			'del'              => array(
				'datetime' => true,
			),
			'ins'              => array(
				'datetime' => true,
				'cite'     => true,
			),
			'kbd'              => array(),
			'mark'             => array(),
			'pre'              => array(
				'width' => true,
			),
			'q'                => array(
				'cite' => true,
			),
			's'                => array(),
			'samp'             => array(),
			'span'             => array(
				'dir'      => true,
				'align'    => true,
				'lang'     => true,
				'xml:lang' => true,
			),
			'small'            => array(),
			'strong'           => array(),
			'sub'              => array(),
			'sup'              => array(),
			'u'                => array(),
			'var'              => array(),
		);
		$allowed_tags = apply_filters( 'uds_wp_kses_title', $allowed_tags );

		return wp_kses( $data, $allowed_tags );
	}
} // End of if function_exists( 'uds_wp_kses_title' ).

// Escapes all occurances of 'the_title()' and 'get_the_title()'.
add_filter( 'the_title', 'uds_wp_kses_title' );

// Escapes all occurances of 'the_archive_title' and 'get_the_archive_title()'.
add_filter( 'get_the_archive_title', 'uds_wp_kses_title' );

/**
 * Renames the default page template. Includes better description of intended layout.
 *
 * @param string $label Returned label for the dropdown menu.
 */
function uds_filter_default_page_template_name( $label ) {
	return __( 'Sidebar (Default)', 'uds-wordpress-theme' );
}
add_filter( 'default_page_template_title', 'uds_filter_default_page_template_name', 10, 2 );

/**
 * WordPress 5.9 is injecting <SVG> tags between the WPAdmin Bar and our ASU global header,
 * and this is breaking our CSS that determines the margins on our content area, leaving a
 * gap between the main menu and the hero. This code, from a WordPress github conversation,
 * will remove those SVGs.
 *
 * This shold only be a temporary solution, as it looks like WordPress may fix this in an
 * upcoming release.
 */
 remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

 /* add empty dataLayer for Google Tag Manager event tracking */
 if ( ! function_exists( 'uds_wp_add_data_layer' ) ) {
	function uds_wp_add_data_layer() {
		 echo '<script> window.dataLayer = window.dataLayer || []; </script>';
	}
}
add_action( 'wp_head', 'uds_wp_add_data_layer', 0 );
