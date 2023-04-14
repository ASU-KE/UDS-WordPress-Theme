<?php
/**
 * Pitchfork Unity Header, Nav Walker, NavTree (prop)
 * Extends native Nav Walker.
 *
 * Returns a serialized array to be included in the navTree and mobileNavTree
 * props for the ASU React Header.
 */

if ( ! class_exists('UDS_React_Header_Navtree') ) {

    class UDS_React_Header_Navtree extends Walker_Nav_Menu {

		function start_lvl( &$output, $depth = 0, $args = null ) {
			$output .= '';
		}

		function end_lvl( &$output, $depth = 0, $args = null ) {
			$output .= '';
		}

        function start_el(&$output, $item, $depth=0, $args=[], $id=0) {

			// Unserialize contatenated $output string as array.
			// If this is the first object, it'll be empty. Set it up with default structure.

			if ( empty($output)) {
				$start_navTree = new stdClass();
				$start_navTree->href = get_home_url();
				$start_navTree->text = 'Home';
				$start_navTree->type = 'icon-home';

				// There is not normally a menu item associated with the home page, but the
				// home icon can still be underlined if we are on the home page.
				// Use is_front_page() and assign selected class to home icon if true.
				if (is_front_page()) {
					$start_navTree->selected = true;
				}

				$prop = array();
				$prop[] = $start_navTree;

			} else {
				$prop = maybe_unserialize($output);
			}

			// Gather ACF properties from the menu item.
			$isCTA = false;
			//$exIcon = false;
			$btnColor = "";
			$isCTA = get_field('menu_cta_button', $item);
			//$exIcon = get_field('menu_external_link', $item);
			$btnColor = get_field('menu_cta_button_color', $item);

			// Create $entry object from $item data. Prep to insert into the correct place.
			$entry = new stdClass();
			$entry->id = $item->ID;
			$entry->href = $item->url;
			$entry->text = $item->title;
			$entry->target = $item->target;
			$entry->title = $item->attr_title;
			$entry->color = $btnColor;
			//$entry->exIcon = $exIcon;

			/**
			 * Depth 0: First level
			 * - If CTA button = true, skip. Create additional walker to output separate prop.
			 * - If has children, create empty items property (array, array) to receive addtl links.
			 *
			 * Depth 1: Second level
			 * - If has children, treat as a type:headline. It's a column header.
			 * - If no children, check if CTA. IF true, treat as mega menu CTA. (The odd one.)
			 * - If no children and no CTA, treat as link in dropdown or mega menu column.
			 * - Find menu item parent and place in the correct place.
			 *
			 * Depth 2: Third level
			 * - Check if CTA. If true, it's a CTA that ends a column in a mega menu. type=button.
			 * - If not, treat as link in mega menu column.
			 * - In either case, push back into ->items of grandparent.
			 *
			 * Depth > 2: Invalid. Ignore the entry.
			 */
			if ( $depth == 0 ) {

				// Is this a CTA button?
				// Bail if so. This is a button and there's another walker for that.
				if ( $isCTA ) {
					$output .= '';
					return;
				}

				// Check for the presence of children. Add array wrapper for future depth.
				if ( $args->walker->has_children ) {
					$entry->items = array();
				}

				// Add active menu class if $item is the current menu item or is the current item's ancestor.
				if ( ( $item->current ) || ( $item->current_item_ancestor ) ) {
					$entry->selected = true;
				}

				// All good. Push this to the main array.
				$prop[] = $entry;

			} else if ( $depth == 1 ) {

				$parentKey = array_key_last($prop);

				/**
				 * This is either a CTA at the bottom of a 1col dropdown or the oddball CTA
				 * at the bottom of the mega menu. Mechanically, the oddball will have at least
				 * three additional sibling links (mega menu, not a dropdown) and all of those siblings
				 * should have children. (Siblings are col heads, children are links.)
				 *
				 * For now, leave mega menu CTA button option unsupported. Render all level 2 CTA buttons
				 * as column "footer" buttons instead.
				 */
				if ( $isCTA ) {
					$entry->type = 'button';
					//$output .= '';
					//return;
				}

				/**
				 * Checking "has children" second. Will override the CTA button choice above if
				 * user made a mistake and wanted a CTA button that should be a col header instead.
				 *
				 * If it has direct children, this entry needs to be column header.
				 */
				if ( $args->walker->has_children ) {
					// Set the type.
					$entry->type = 'heading';

					// Also, we'll need to wrap this in another empty array.
					// The children will be pushed into this array later in the script.
					$entry = array($entry);

					// Put it where it belongs.
					// array_key_last will provide the last array key for $prop.
					// Should work since we're building this in sequence.
					$prop[$parentKey]->items[] = $entry;

				} else {

					// Even if this isn't a heading (has children = false)
					// we may still need that extra array. If this is the first item
					// in a single col dropdown, we still need it.
					// Otherwise, push $entry into array created by this $items previous sibling.

					if ( empty($prop[$parentKey]->items)) {
						$entry = array($entry);
						$prop[$parentKey]->items[] = $entry;
					} else {
						$prop[$parentKey]->items[0][] = $entry;
					}

				}

			} else if ( $depth == 2 ) {

				// Check for column footer button presence.
				if ( $isCTA ) {
					$entry->type = 'button';
				}

				// Find the grandparent last key, and the parent->items last index key.
				$grandparentKey = array_key_last($prop);

				$parentItems = $prop[$grandparentKey]->items;
				$parentItemsKey = array_key_last($parentItems);

				// Push $entry into correct place.
				$prop[$grandparentKey]->items[$parentItemsKey][] = $entry;

			}

			// Convert $prop back to a string so it can be passed to the next iteration of start_el.
			$output = maybe_serialize($prop);

        }

        function end_el(&$output, $item, $depth=0, $args=[], $id=0) {
            $output .= '';
        }
    }
}
