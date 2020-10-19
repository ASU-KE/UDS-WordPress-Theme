<?php
/**
 * Theme basic setup
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'uds_wp_setup' );

if ( ! function_exists( 'uds_wp_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function uds_wp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on this theme, use a find and replace
		 * to change 'uds-wordpress-theme' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'uds-wordpress-theme', get_template_directory() . '/languages' );

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
				'primary' => __( 'Main Menu', 'uds-wordpress-theme' ),
				'footer' => __( 'Footer Menu', 'uds-wordpress-theme' ),
				'social-media' => __( 'Social Media Menu', 'uds-wordpress-theme' ),
			)
		);

		/*
		 * Generate example footer menu, if it doesn't already exist;  add example links to assist site builders.
		 *
		 */
		$menu_name   = 'Footer Menu';
		$menu_exists = wp_get_nav_menu_object( $menu_name );

		// If it doesn't exist, let's create it.
		if ( ! $menu_exists ) {
			$menu_id = wp_create_nav_menu( $menu_name );

			if ( $menu_id > 0 ) {
				// Get all menu locations.
				$locations = get_theme_mod( 'nav_menu_locations' );

				// Assign our new MENU at our theme's footer menu location.
				$locations['footer'] = $menu_id;
				set_theme_mod( 'nav_menu_locations', $locations );
			}

			/*****************************************
			 * Column One
			 */
			// Set up example menu header for column 1.
			$menu_item_id = wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'   => __( 'Example Column One', 'uds-wordpress-theme' ),
					'menu-item-url'     => '#',
					'menu-item-status'  => 'publish',
				)
			);

			// Set up example menu item for column 1.
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => __( 'Example Link 1', 'uds-wordpress-theme' ),
					'menu-item-parent-id' => $menu_item_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish',
				)
			);

			// Set up example menu item for column 1.
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => __( 'Example Link 2', 'uds-wordpress-theme' ),
					'menu-item-parent-id' => $menu_item_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish',
				)
			);

			/*****************************************
			 * Column Two
			 */
			// Set up example menu header for column 2.
			$menu_item_id = wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'   => __( 'Example Column Two', 'uds-wordpress-theme' ),
					'menu-item-url'     => '#',
					'menu-item-status'  => 'publish',
				)
			);

			// Set up example menu item for column 2.
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => __( 'Example Link 3', 'uds-wordpress-theme' ),
					'menu-item-parent-id' => $menu_item_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish',
				)
			);

			// Set up example menu item for column 2.
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => __( 'Example Link 4', 'uds-wordpress-theme' ),
					'menu-item-parent-id' => $menu_item_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish',
				)
			);
		}

		/*
		 * Generate example footer menu, if it doesn't already exist;  add example links to assist site builders.
		 *
		 */
		$menu_name   = 'Main Menu';
		$menu_exists = wp_get_nav_menu_object( $menu_name );

		// If it doesn't exist, let's create it.
		if ( ! $menu_exists ) {
			$menu_id = wp_create_nav_menu( $menu_name );

			if ( $menu_id > 0 ) {
				// Get all menu locations.
				$locations = get_theme_mod( 'nav_menu_locations' );

				// Assign our new MENU at our theme's footer menu location.
				$locations['primary'] = $menu_id;
				set_theme_mod( 'nav_menu_locations', $locations );
			}

			/*****************************************
			 * Menu Link
			 */
			$menu_item_id = wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'   => __( 'Example Link', 'uds-wordpress-theme' ),
					'menu-item-url'     => '#',
					'menu-item-status'  => 'publish',
				)
			);

			/*****************************************
			 * One Column Dropdown
			 */
			// Set up example dropdown activator.
			$menu_item_id = wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'   => __( 'Example Dropdown', 'uds-wordpress-theme' ),
					'menu-item-url'     => '#',
					'menu-item-status'  => 'publish',
				)
			);

			// Set up example menu item.
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => __( 'Example Link 1', 'uds-wordpress-theme' ),
					'menu-item-parent-id' => $menu_item_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish',
				)
			);

			// Set up example menu item.
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => __( 'Example Link 2', 'uds-wordpress-theme' ),
					'menu-item-parent-id' => $menu_item_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish',
				)
			);

			/*****************************************
			 * Two Column Dropdown
			 */
			// Set up example dropdown activator.
			$menu_item_id = wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'   => __( 'Example Two Column', 'uds-wordpress-theme' ),
					'menu-item-url'     => '#',
					'menu-item-status'  => 'publish',
				)
			);

			// Set up example column header for column 1.
			$column_header_id = wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => __( 'Example Column One', 'uds-wordpress-theme' ),
					'menu-item-parent-id' => $menu_item_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish',
				)
			);

			// Set up example menu item for column.
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => __( 'Example Link 3', 'uds-wordpress-theme' ),
					'menu-item-parent-id' => $column_header_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish',
				)
			);

			// Set up example menu item for column 2.
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => __( 'Example Link 4', 'uds-wordpress-theme' ),
					'menu-item-parent-id' => $column_header_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish',
				)
			);

			// Set up example column header for column 2.
			$column_header_id = wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => __( 'Example Column Two', 'uds-wordpress-theme' ),
					'menu-item-parent-id' => $menu_item_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish',
				)
			);

			// Set up example menu item for column.
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => __( 'Example Link 5', 'uds-wordpress-theme' ),
					'menu-item-parent-id' => $column_header_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish',
				)
			);

			// Set up example menu item for column 2.
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'     => __( 'Example Link 6', 'uds-wordpress-theme' ),
					'menu-item-parent-id' => $column_header_id,
					'menu-item-url'       => '#',
					'menu-item-status'    => 'publish',
				)
			);
		}

		/*
		 * Generate example social media menu, if it doesn't already exist;  add example link to assist site builders.
		 *
		 */
		$menu_name   = 'Social Media';
		$menu_exists = wp_get_nav_menu_object( $menu_name );

		// If it doesn't exist, let's create it.
		if ( ! $menu_exists ) {
			$menu_id = wp_create_nav_menu( $menu_name );

			if ( $menu_id > 0 ) {
				// Get all menu locations.
				$locations = get_theme_mod( 'nav_menu_locations' );

				// Assign our new MENU at our theme's footer menu location.
				$locations['social-media'] = $menu_id;
				set_theme_mod( 'nav_menu_locations', $locations );
			}

			/*****************************************
			 * Example Twitter Link
			 */
			$menu_item_id = wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'   => __( 'fa-twitter-square', 'uds-wordpress-theme' ),
					'menu-item-url'     => '#',
					'menu-item-status'  => 'publish',
				)
			);
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
		uds_wp_setup_theme_default_settings();
	}
}


add_filter( 'excerpt_more', 'uds_wp_custom_excerpt_more' );

if ( ! function_exists( 'uds_wp_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function uds_wp_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

add_filter( 'wp_trim_excerpt', 'uds_wp_all_excerpts_get_more_link' );

if ( ! function_exists( 'uds_wp_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function uds_wp_all_excerpts_get_more_link( $post_excerpt ) {
		if ( ! is_admin() ) {
			$post_excerpt = $post_excerpt . ' [...]<p><a class="btn btn-secondary understrap-read-more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __(
				'Read More...',
				'uds-wordpress-theme'
			) . '</a></p>';
		}
		return $post_excerpt;
	}
}
