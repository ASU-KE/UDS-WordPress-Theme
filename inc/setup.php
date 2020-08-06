<?php
/**
 * Theme basic setup
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'asu_wp2020_setup' );

if ( ! function_exists( 'asu_wp2020_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function asu_wp2020_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on understrap, use a find and replace
		 * to change 'asu-web-standards' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'asu-web-standards', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Register nav menus.
		register_nav_menus(
			array(
				'primary-menu' => __( 'Primary Menu', 'asu-web-standards' ),
				'footer-menu' => __('Footer Menu', 'asu-web-standards'),
				'social-media' => __( 'Social Media Menu', 'asu-web-standards' )
			)
		);

		/*
		 * Generate header and footer menus, if they don't already exist;  add example links to assist site builders.
		 *
		 */
		$menu_name   = 'Footer Menu';
		$menu_exists = wp_get_nav_menu_object($menu_name);

		// If it doesn't exist, let's create it.
		if (!$menu_exists) {
			$menu_id = wp_create_nav_menu($menu_name);

			if ($menu_id > 0) {
				// Assign our new MENU at our theme's footer menu location
				set_theme_mod('nav_menu_locations', array('footer-menu' => $menu_id));
			}

			/*****************************************
			 * Column One
			 *****************************************/
			// Set up example menu header for column 1
			$menu_item_id = wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title'   =>  __('Column One', 'textdomain'),
				'menu-item-url'     => '#',
				'menu-item-status'  => 'publish'
			));

			// Set up example menu item for column 1
			wp_update_nav_menu_item($menu_id,
				0,
				array(
					'menu-item-title'     =>  __('Link 1', 'textdomain'),
					'menu-item-parent-id' => $menu_item_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish'
				)
			);

			// Set up example menu item for column 1
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title'     =>  __('Link 2', 'textdomain'),
				'menu-item-parent-id' => $menu_item_id,
				'menu-item-url'       => '#',
				'menu-item-status'    => 'publish'
			));

			/*****************************************
			 * Column Two
			 *****************************************/
			// Set up example menu header for column 2
			$menu_item_id = wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title'   =>  __('Column Two', 'textdomain'),
				'menu-item-url'     => '#',
				'menu-item-status'  => 'publish'
			));

			// Set up example menu item for column 2
			wp_update_nav_menu_item($menu_id,
				0,
				array(
					'menu-item-title'     =>  __('Link 3', 'textdomain'),
					'menu-item-parent-id' => $menu_item_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish'
				)
			);

			// Set up example menu item for column 2
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title'     =>  __('Link 4', 'textdomain'),
				'menu-item-parent-id' => $menu_item_id,
				'menu-item-url'       => '#',
				'menu-item-status'    => 'publish'
			));
		}

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Check and setup theme default settings.
		asu_wp2020_setup_theme_default_settings();
	}
}


add_filter( 'excerpt_more', 'asu_wp2020_custom_excerpt_more' );

if ( ! function_exists( 'asu_wp2020_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function asu_wp2020_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

add_filter( 'wp_trim_excerpt', 'asu_wp2020_all_excerpts_get_more_link' );

if ( ! function_exists( 'asu_wp2020_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function asu_wp2020_all_excerpts_get_more_link( $post_excerpt ) {
		if ( ! is_admin() ) {
			$post_excerpt = $post_excerpt . ' [...]<p><a class="btn btn-secondary understrap-read-more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __(
				'Read More...',
				'asu-web-standards'
			) . '</a></p>';
		}
		return $post_excerpt;
	}
}
