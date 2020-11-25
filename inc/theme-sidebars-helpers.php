<?php
/**
 * Helper functions for displaying page sidebar options in the Content Editor.
 *
 * @package uds-wordpress-theme
 */

if ( ! function_exists( 'uds_wp_get_sidebar_layouts' ) ) {
	/**
	 * Build options array with helper thumbnail images to display sidebar layout options in the page editor
	 *
	 * @param Inherit $inherit is for the default option 'inherit' in sidebar options.
	 */
	function uds_wp_get_sidebar_layouts( $inherit = false ) {
		$layouts = array();

		if ( $inherit ) {
			$layouts['inherit'] = array(
				'title' => __( 'Inherit', 'uds-wordpress-theme' ),
				'img' => get_template_directory_uri() . '/img/admin/inherit.png',
			);
		}

		$layouts['left'] = array(
			'title' => __( 'Left sidebar', 'uds-wordpress-theme' ),
			'img' => get_template_directory_uri() . '/img/admin/content_sid_left.png',
		);

		$layouts['right'] = array(
			'title' => __( 'Right sidebar', 'uds-wordpress-theme' ),
			'img' => get_template_directory_uri() . '/img/admin/content_sid_right.png',
		);

		return $layouts;
	}
}

if ( ! function_exists( 'uds_wp_get_sidebars_list' ) ) {
	/**
	 * Return array of all registered sidebars
	 *
	 * @param Inherit $inherit is for the default option 'inherit' in sidebar options.
	 */
	function uds_wp_get_sidebars_list( $inherit = false ) {
		global $wp_registered_sidebars;
		$sidebars = array();

		if ( $inherit ) {
			$sidebars['inherit'] = __( 'Inherit', 'uds-wordpress-theme' );
		}

		if ( ! empty( $wp_registered_sidebars ) ) {
			foreach ( $wp_registered_sidebars as $sidebar ) {
				$sidebars[ $sidebar['id'] ] = $sidebar['name'];
			}
		}

		return $sidebars;
	}
}

if ( ! function_exists( 'uds_wp_get_post_meta' ) ) {
	/**
	 * Get post meta with default values by $post_id and $field =false
	 *
	 * @param post_id $post_id is for the ID.
	 * @param field   $field is false.
	 */
	function uds_wp_get_post_meta( $post_id, $field = false ) {
		$defaults = array(
			'use_sidebar' => 'fixed',
			'sidebar' => 0,
		);
		$meta = get_post_meta( $post_id, '_uds_wp_meta', true );
		$meta = wp_parse_args( (array) $meta, $defaults );
		if ( $field ) {
			if ( isset( $meta[ $field ] ) ) {
				return $meta[ $field ];
			} else {
				return false;
			}
		}
		return $meta;
	}
}
