<?php

/* Get sidebar layouts */
if ( !function_exists( 'uds_wp_get_sidebar_layouts' ) ):
	function uds_wp_get_sidebar_layouts( $inherit = false ) {

		$layouts = array();

		if ( $inherit ) {
			$layouts['inherit'] = array( 'title' => __( 'Inherit', THEME_SLUG ), 'img' => IMG_URI . '/admin/inherit.png' );
		}

		$layouts['none'] = array( 'title' => __( 'Full width', THEME_SLUG ), 'img' => IMG_URI . '/admin/content_no_sid.png' );
		$layouts['fixed'] = array( 'title' => __( 'Fixed width', THEME_SLUG ), 'img' => IMG_URI . '/admin/content_fixed.png' );
		$layouts['left'] = array( 'title' => __( 'Left sidebar', THEME_SLUG ), 'img' => IMG_URI . '/admin/content_sid_left.png' );
		$layouts['right'] = array( 'title' => __( 'Right sidebar', THEME_SLUG ), 'img' => IMG_URI . '/admin/content_sid_right.png' );

		return $layouts;
	}
endif;

/* Get all sidebars */
if ( !function_exists( 'uds_wp_get_sidebars_list' ) ):
	function uds_wp_get_sidebars_list( $inherit = false ) {

		$sidebars = array();

		if ( $inherit ) {
			$sidebars['inherit'] = __( 'Inherit', THEME_SLUG );
		}


		global $wp_registered_sidebars;

		if ( !empty( $wp_registered_sidebars ) ) {

			foreach ( $wp_registered_sidebars as $sidebar ) {
				$sidebars[$sidebar['id']] = $sidebar['name'];
			}

		}


		return $sidebars;
	}
endif;


/* Get post meta with default values */
if ( !function_exists( 'uds_wp_get_post_meta' ) ):
	function uds_wp_get_post_meta( $post_id, $field = false ) {

		$defaults = array(
			'use_sidebar' => 'fixed',
			'sidebar' => 0
		);

		$meta = get_post_meta( $post_id, '_asu_wp2020_meta', true );
		$meta = wp_parse_args( (array) $meta, $defaults );

		if ( $field ) {
			if ( isset( $meta[$field] ) ) {
				return $meta[$field];
			} else {
				return false;
			}
		}

		return $meta;
	}
endif;

















?>
