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
	$item['depth'] = asu_wp2020_get_menu_depth($item);

	// check if menu item is a CTA Button
	$isCtaButton = $item['cta_button'];
	$ctaButtonColor = $item['cta_color'];

	// render each item based on the depth
	switch ($item['depth']) :
		/*
		 * Items with no children are rendered as basic menu item links
		 */
		case 'single':
			echo asu_wp2020_render_nav_item_link('single', $item);
			break;

		/*
		 * Items with children, but no grandchilren, are rendered as single-column
		 * drop-downs with the parent name as the column heading and the children
		 * as the menu items
		 */
		case 'children':
?>
			<div class="nav-item dropdown">
				<?php echo asu_wp2020_render_nav_item_link('dropdown', $item); ?>
				<div class="dropdown-menu dropdown-columns" aria-labelledby="dropdown-one-col">
					<div class="dropdown-col">
						<?php echo asu_wp2020_render_column_links($item['children']); ?>
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
			// if there are more than 3 three columns, we have a megamenu to render
			if (count($item['children']) > 3) :
			?>
				<div class="nav-item dropdown megamenu">
					<?php echo asu_wp2020_render_nav_item_link('megamenu', $item); ?>
					<div class="dropdown-menu" aria-labelledby="megamenu-one-col">
						<div class="container">
							<div class="row">
								<?php
								$megaCtaWrapper = '<div class="row with-buttons"><div class="col-lg-12">%1$s</div></div>';
								$megaCtaButtons = '';

								// outer loop - columns
								foreach ($item['children'] as $child) :
									// if $child is flagged as a CTA button, it is a mega-menu CTA button, outside of columns
									if ($child['cta_button']) {
										$megaCtaButtons .= asu_wp2020_render_nav_cta_button($child['cta_color'], $item);
										continue;
									}

									$column = '<div class="col-lg">';
									$column .= "<h3>" . wp_kses($child['title'], wp_kses_allowed_html('post')) . "</h3>";
									$column .= asu_wp2020_render_column_links($child['children']); // inner loop - column links
									$column .= '</div>';

									// output this column
									echo $column;
								endforeach;
								?>
							</div>
							<?php
							if ($megaCtaButtons > '') {
								echo wp_kses(sprintf($megaCtaWrapper, $megaCtaButtons), wp_kses_allowed_html('post'));
							}
							?>
						</div>
					</div>
				</div>
			<?php

			else :
				// nope, we are rendering a multi-column dropdown
			?>
				<div class="nav-item dropdown">
					<?php echo asu_wp2020_render_nav_item_link('dropdown', $item); ?>
					<div class="dropdown-menu dropdown-columns" aria-labelledby="dropdown-one-col">
						<?php
						// outer loop
						foreach ($item['children'] as $child) :
							$column = '<div class="dropdown-col">';
							$column .= "<h3>" . wp_kses($child['title'], wp_kses_allowed_html('post')) . "</h3>";
							$column .= asu_wp2020_render_column_links($child['children']); // inner loop
							$column .= '</div>';

							// output this column
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
