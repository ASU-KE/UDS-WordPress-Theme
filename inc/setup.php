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
		add_theme_support( 'post-thumbnails', array( 'post' ) );

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

add_filter( 'excerpt_length', 'uds_wp_custom_excerpt_length', 999 );

if ( ! function_exists( 'uds_wp_custom_excerpt_length' ) ) {
	/**
	 * Set a max number of words for excerpt.
	 *
	 * @param int $length the number of words in excerpt.
	 */
	function uds_wp_custom_excerpt_length( $length ) {
		return 30;
	}
}

add_filter( 'get_the_archive_title', 'uds_wp_custom_archive_title' );

if ( ! function_exists( 'uds_wp_custom_archive_title' ) ) {

	/**
	 * Remove the default WordPress object label from archive title pages.
	 * https://developer.wordpress.org/reference/hooks/get_the_archive_title/#user-contributed-notes
	 *
	 * @param string $title archive title.
	 * @return string
	 */
	function uds_wp_custom_archive_title( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_tax() ) { // for custom post types.
			$title = sprintf( '%1$s', single_term_title( '', false ) );
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		}
		return $title;
	}
}

add_filter( 'post_thumbnail_html', 'uds_wp_remove_thumbnail_height_width_attr' );

if ( ! function_exists( 'uds_wp_remove_thumbnail_height_width_attr' ) ) {
	/**
	 * Filters the returned HTML of a post_thumbnail call and removes
	 * the embedded height and width attributes.
	 *
	 * @param string $html the inital returned result from the_post_thumbnail
	 * @link https://developer.wordpress.org/reference/functions/the_post_thumbnail/#comment-1945
	 */
	function uds_wp_remove_thumbnail_height_width_attr($html) {
		return preg_replace('/(width|height)="\d+"\s/', "", $html);
	}
}

