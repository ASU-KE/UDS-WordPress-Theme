<?php
/**
 * Create sample menus upon theme activation.
 *
 * @package uds-wordpress-theme
 */

add_action( 'switch_theme', 'uds_wordpress_build_sample_menus' );

/**
 * Generates example menus if they don't already exist.
 */
function uds_wordpress_build_sample_menus() {

	// Generate example footer menu.
	$menu_name   = 'Example Footer Menu';
	$menu_exists = wp_get_nav_menu_object( $menu_name );

	// If it doesn't exist, let's create it.
	if ( ! $menu_exists ) {
		$menu_id = wp_create_nav_menu( $menu_name );

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

	// Generate example main menu.
	$menu_name   = 'Example Main Menu';
	$menu_exists = wp_get_nav_menu_object( $menu_name );

	// If it doesn't exist, let's create it.
	if ( ! $menu_exists ) {
		$menu_id = wp_create_nav_menu( $menu_name );

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

	// Generate example social media menu.
	$menu_name   = 'Example Social Media';
	$menu_exists = wp_get_nav_menu_object( $menu_name );

	// If it doesn't exist, let's create it.
	if ( ! $menu_exists ) {
		$menu_id = wp_create_nav_menu( $menu_name );

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
}
