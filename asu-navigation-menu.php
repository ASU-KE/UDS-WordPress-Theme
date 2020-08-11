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
// vd($menu_items);


/**
 * Get the maximum depth of this particular menu item by inspecting
 * the 'children' sub-array at each level to determine whether or not
 * it is empty
 *
 * @param Array $item array of top-level menu items
 * @return String Maximum depth of the menu: single, children, or grandchildren
 */
function get_menu_depth( $item = null ) {
	if( empty( $item ) ) {
		wp_die( 'Cannot find depth of a menu item that was not provided, or is empty.' );
	}

	// presume that we do not have any children or grandchildren
	$depth = 'single';

	if( !empty( $item['children'] ) ) {
		// we have at least children, since the array is not empty
		$depth = 'children';

		// check for any grandchildren, exiting if we find any
		foreach( $item['children'] as $child ) {
			if( !empty( $child['children'] ) ) {
				$depth = 'grandchildren';
				break;
			}
		}
	}

	return $depth;
}

/**
 * Renders the individual links from the provided child/grandchild list
 *
 * @param Array $children The array of links for one column
 * @return String $links A string containing all the <a> tags for the column
 */
function render_column_links ( $children = array() ) {

	if( empty( $children ) ) {
		return 'No Menu Links';
	}

	$links = "";

	foreach ($children as $child) {
		$link = '<a class="dropdown-item" href="%1$s" title="%2$s">%2$s</a>';
		$links .= wp_kses(sprintf($link, $child['url'], $child['title']), wp_kses_allowed_html('post'));
	}

	return $links;
}

/**
 * Renders the top-level link, either as a normal nav link, or a drop-down link
 * Note that we're using 'default' to render our actual default, and not testing
 * for the 'single' case
 *
 * @param Array $item the navigation item whose link we want to render
 * @return String $link the rendered navigation link
 */
function render_nav_item_link( $item ) {
	$link = "";

	switch( $item['depth'] ) {

		case 'children':
		case 'grandchildren':
			$template = '<a class="nav-link" href="%1$s" id="dropdown-one-col" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			%2$s
			<span class="fa fa-chevron-down"></span>
			</a>';
			$link = wp_kses(sprintf($template, $item['url'], $item['title']), wp_kses_allowed_html('post'));
			return $link;
		break;

		default:
			$template = '<a class="nav-link" href="%1$s" title="%2$s">%2$s</a>';
			$link = wp_kses(sprintf($template, $item['url'], $item['title']), wp_kses_allowed_html('post'));
			return $link;
	}
}


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
