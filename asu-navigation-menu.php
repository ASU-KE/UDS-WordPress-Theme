<?php
/**
 * The template for ASU main navigation menus in Web Standards 2.0
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$menu_name = 'primary';
$menu_items = uds_wp_get_menu_formatted_array( $menu_name );

/**
 * Main navigation loop.
 */
foreach ( $menu_items as $item ) :
	// evaluate item for: single, children (one column), or grandchildren (multiple columns).
	$item['depth'] = uds_wp_get_menu_depth( $item );

	// check if menu item is a CTA Button.
	$is_cta_button = $item['cta_button'];
	$cta_button_color = $item['cta_color'];

	// render each item based on the depth.
	switch ( $item['depth'] ) :
		/*
		 * Items with no children are rendered as basic menu item links.
		 */
		case 'single':
			echo uds_wp_render_nav_item_link( 'single', $item );
			break;

		/*
		 * Items with children, but no grandchilren, are rendered as single-column
		 * drop-downs with the parent name as the column heading and the children
		 * as the menu items.
		 */
		case 'children':
			?>
			<div class="nav-item dropdown">
				<?php echo uds_wp_render_nav_item_link( 'dropdown', $item ); ?>
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
		 */
		case 'grandchildren':
			// if there are 3 or more columns, we have a megamenu to render.
			if ( count( $item['children'] ) > 2 ) :
				?>
				<div class="nav-item dropdown megamenu">
					<?php echo uds_wp_render_nav_item_link( 'megamenu', $item ); ?>
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

									$column = '<div class="col-lg">';
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
				// nope, we are rendering a multi-column dropdown.
				?>
				<div class="nav-item dropdown">
					<?php echo uds_wp_render_nav_item_link( 'dropdown', $item ); ?>
					<div class="dropdown-menu dropdown-columns" aria-labelledby="dropdown-one-col">
						<?php
						// outer loop.
						foreach ( $item['children'] as $child ) :
							$column = '<div class="dropdown-col">';
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
