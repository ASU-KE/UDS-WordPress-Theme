<?php

/**
 * The hero for our theme
 *
 * Displays the hero section
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$menu_name = 'primary';
$menu_items = asu_wp2020_get_menu_formatted_array($menu_name);

/**
 * Main navigation loop
 */
foreach ($menu_items as $item) :
	// evaluate item for: single, children (one column), or grandchildren (multiple columns)
	$item['depth'] = get_menu_depth( $item );


	// render each item based on the depth
	switch ($item['depth']) {
		/*
		 * Items with no children are rendered as basic menu item links
		 */
		case 'single':
			echo render_nav_item_link( $item );
			break;

		/*
		 * Items with children, but no grandchilren, are rendered as single-column
		 * drop-downs with the parent name as the column heading and the children
		 * as the menu items
		 */
		case 'children':
			?>
			<div class="nav-item dropdown">
				<?php echo render_nav_item_link( $item ); ?>
				<div class="dropdown-menu dropdown-columns" aria-labelledby="dropdown-one-col">
					<div class="dropdown-col">
						<?php echo render_column_links( $item['children'] ); ?>
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
			?>
			<div class="nav-item dropdown">
				<?php echo render_nav_item_link( $item ); ?>
				<div class="dropdown-menu dropdown-columns" aria-labelledby="dropdown-one-col">
				<?php

				// outer loop
				foreach ($item['children'] as $child) :
					$column = '<div class="dropdown-col">';
					$column .= "<h3>" . wp_kses($child['title'], wp_kses_allowed_html('post')) . "</h3>";
					$column .= render_column_links( $child['children'] ); // inner loop
					$column .= '</div>';

					// output this column
					echo $column;
				endforeach;
				?>
			</div>
		</div>
		<?php
			break;

		default:
			# code...
			break;
	}
endforeach;
