<?php
/**
 * The template for ASU main navigation menus in Web Standards 2.0
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// initialize variables.
$menu_name   = 'primary';
$menu_items  = uds_wp_get_menu_formatted_array( $menu_name );
$current_uri = null;

// attempt to retrieve the current page's URL.
if ( isset( $_SERVER['REQUEST_URI'] ) ) {
	$clean_uri   = sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) );
	$current_uri = home_url( $clean_uri );
}

/**
 * Main navigation loop.
 */
foreach ( $menu_items as $item ) :
	/**
	 * The uds_wp_get_menu_dep() method does two things, returning the values in an array:
	 *
	 * 1) determines the depth of a particular top-level menu item
	 * (single, children, grandchildren) for deciding how to render it
	 *
	 *  2) determines whether or not the current top-level menu item contains the currently
	 * displayed page in order to highlight it if so
	 */

	// get an array for this menu item, and assign the depth to a local variable.
	// early attempts to use switch() with $item_data array values did not work.
	$item_data     = uds_wp_get_menu_depth( $item, $current_uri );
	$item['depth'] = $item_data['depth'];

	// set the CSS classname for this top-level item.
	if ( $item_data['has_current'] ) {
		$current_class = 'active';
	} else {
		$current_class = '';
	}

	// check if menu item is a CTA Button.
	$is_cta_button    = $item['cta_button'];
	$cta_button_color = $item['cta_color'];

	// render each item based on the depth.
	switch ( $item['depth'] ) :
		/*
		 * Items with no children are rendered as basic menu item links.
		 * Note: in this case, the 'active' menu item class is applied directly
		 * to the link, and this happens inside uds_wp_render_nav_item_link()
		 */
		case 'single':
		if (!$is_cta_button ){
			echo uds_wp_render_nav_item_link( 'single', $item, $item_data );
		}else {
				$cta_menu_btns[]=uds_wp_render_nav_item_link( 'single', $item, $item_data );
		}
			break;

		/*
		 * Items with children, but no grandchildren, are rendered as single-column
		 * drop-downs with the parent name as the column heading and the children
		 * as the menu items.
		 *
		 * Note: in the case of drop-downs, the highlight for the current top-level
		 * menu item needs to be applied to the containing <div> element, and NOT the link.
		 * This is done to match the way we are already handling the hover highlighting on
		 * menu items. Accordingly, we apply that class here in the markup before calling
		 * the method that creates the link.
		 */
		case 'children':
			?>
			<div class="nav-item dropdown <?php echo esc_attr( $current_class ); ?>">
				<?php echo uds_wp_render_nav_item_link( 'dropdown', $item, null ); ?>
				<div class="dropdown-menu dropdown-columns" aria-labelledby="dropdown-one-col">
					<div class="dropdown-col">
						<?php echo uds_wp_render_column_links( $item['children'] ); ?>
					</div>
				</div>
			</div>
			<?php
			break;

		/*
		 * Items with grandchildren are rendered as multi-column drop-downs,
		 * with the child-level title as the column heading, and the grandchildren as
		 * the menu items.
		 *
		 * Again, we apply the current menu item class to the containing <div> as we did above.
		 */
		case 'grandchildren':
			// if there are 3 or more columns, we have a megamenu to render.
			if ( count( $item['children'] ) > 2 ) :
				?>
				<div class="nav-item dropdown megamenu <?php echo esc_attr( $current_class ); ?>">
					<?php echo uds_wp_render_nav_item_link( 'megamenu', $item, null ); ?>
					<div class="dropdown-menu" aria-labelledby="megamenu-one-col">
						<div class="container">
							<div class="row">
								<?php
								$mega_cta_wrapper = '<div class="row with-buttons"><div class="col-lg-12">%1$s</div></div>';
								$mega_cta_buttons = '';

								// outer loop - columns.
								foreach ( $item['children'] as $child ) :
									// if $child is flagged as a CTA button, it is a mega-menu CTA button, outside of columns.
									if ( $child['cta_button'] ) {
										$mega_cta_buttons .= uds_wp_render_nav_cta_button( $child['cta_color'], $item );
										continue;
									}

									$column  = '<div class="col-lg">';
									$column .= '<h3>' . wp_kses( $child['title'], wp_kses_allowed_html( 'post' ) ) . '</h3>';
									$column .= uds_wp_render_column_links( $child['children'] ); // inner loop - column links.
									$column .= '</div>';

									// output this column.
									echo $column;
								endforeach;
								?>
							</div>
							<?php
							if ( $mega_cta_buttons > '' ) {
								echo wp_kses( sprintf( $mega_cta_wrapper, $mega_cta_buttons ), wp_kses_allowed_html( 'post' ) );
							}
							?>
						</div>
					</div>
				</div>
				<?php

			else :
				/**
				 * With fewer than three columns, we render a multi-column drop down. As with the other
				 * drop-downs, we are applying our current menu item highlighting here in the markup.
				 */
				?>
				<div class="nav-item dropdown <?php echo esc_attr( $current_class ); ?>">
					<?php echo uds_wp_render_nav_item_link( 'dropdown', $item, null ); ?>
					<div class="dropdown-menu dropdown-columns" aria-labelledby="dropdown-one-col">
						<?php
						// outer loop.
						foreach ( $item['children'] as $child ) :
							$column  = '<div class="dropdown-col">';
							$column .= '<h3>' . wp_kses( $child['title'], wp_kses_allowed_html( 'post' ) ) . '</h3>';
							$column .= uds_wp_render_column_links( $child['children'] ); // inner loop.
							$column .= '</div>';

							// output this column.
							echo $column;
						endforeach;
						?>
					</div>
				</div>
				<?php
			endif;
			break;

		default:
			break;
	endswitch;
endforeach;
