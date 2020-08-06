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

foreach ($menu_items as $item) :
	// vd($item);

	// if no children, basic menu link
	if (empty($item['menu_item_parent']) && empty($item['children'])) :
		$link = '<a class="nav-link" href="%1$s" title="%2$s">%2$s</a>';
		echo wp_kses(sprintf($link, $item['url'], $item['title']), wp_kses_allowed_html('post'));
	endif; // basic menu link

	// if menu item has children, we have a dropdown menu
	if (!empty($item['children'])) : ?>
		<div class="nav-item dropdown">
			<a class="nav-link" href="#" id="dropdown-one-col" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?= $item['title'] ?>
				<span class="fa fa-chevron-down"></span>
			</a>
			<div class="dropdown-menu dropdown-columns" aria-labelledby="dropdown-one-col">
				<?php
				// begin constructing the dropdown column
				$column = '<div class="dropdown-col">';

				foreach ($item['children'] as $child) :
					// if menu item has no children, this is a basic one-column dropdown
					if (empty($child['children'])) :
						$link = '<a class="dropdown-item" href="%1$s" title="%2$s">%2$s</a>';
						$column .= wp_kses(sprintf($link, $child['url'], $child['title']), wp_kses_allowed_html('post'));

					// with children, we have multiple columns to render
					else :
						// because we need to render multiple columns inside the dropdown,
						// we are intentionally resetting $column started above to generate this multi-column dropdown
						$column = '<div class="dropdown-col">';
						$column .= "<h3>" . wp_kses($child['title'], wp_kses_allowed_html('post')) . "</h3>";
						foreach ($child['children'] as $grandchild) :
							$link = '<a class="dropdown-item" href="%1$s" title="%2$s">%2$s</a>';
							$column .= wp_kses(sprintf($link, $grandchild['url'], $grandchild['title']), wp_kses_allowed_html('post'));
						endforeach;
						$column .= '</div>';

						// output this column
						echo $column;
					endif;
				endforeach;
				?>
			</div>
		</div>
<?php
	endif;

endforeach;
