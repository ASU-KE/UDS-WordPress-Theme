<?php
/*
 * Pitchfork Unity Header, Nav Walker, buttons (prop)
 * Extends native Nav Walker.
 * Returns a small serialized array to be included in the buttons prop for the ASU React Header.
 */

if ( ! class_exists('UDS_React_Header_CTAButtons') ) {

    class UDS_React_Header_CTAButtons extends Walker_Nav_Menu {

		function start_lvl( &$output, $depth = 0, $args = null ) {
			$output .= '';
		}

		function end_lvl( &$output, $depth = 0, $args = null ) {
			$output .= '';
		}

        function start_el(&$output, $item, $depth=0, $args=[], $id=0) {

			// Unserialize contatenated $output string as array.
			// If this is the first object, it'll be empty. Even if there are no CTA buttons
			// to render, let's return an empty array rather than an empty string.

			if ( empty($output)) {
				$prop = array();
			} else {
				$prop = maybe_unserialize($output);
			}

			// Gather ACF properties from the menu item.
			$isCTA = false;
			$btnColor = "";
			$isCTA = get_field('menu_cta_button', $item);
			$btnColor = get_field('menu_cta_button_color', $item);

			// The button color for these CTA buttons allows for only maroon or gold.
			// The "dark" option actually renders as gray (because dark is not a supported option?).
			// Reroute to a default color of maroon instead.
			// $btnColor = get_field('menu_cta_button_color', $item);
			// if ('dark' == $btnColor) {
			// 	$btnColor = 'maroon';
			// }


			/**
			 * Depth 0: First level
			 * - If CTA button = true, render the button.
			 * - Explicitly check to see if the item has children to avoid accidental duplication
			 * - of level one items that are both marked CTA and have subsequent items.
			 *
			 * Depth > 0: Ignore completely.
			 * These particular CTA buttons are only found on the first level of the nav_menu object.
			 */
			if ( $depth == 0 ) {

				// Check for the presence of children.
				if ( $args->walker->has_children ) {
					$output .= '';
					return;
				}

				// Is this marked as a CTA button?
				if ( $isCTA ) {

					// Create $entry object from $item data.
					$entry = new stdClass();
					$entry->id = $item->ID;
					$entry->href = $item->url;
					$entry->text = $item->title;
					$entry->color = $btnColor;

					// Push into array
					$prop[] = $entry;
				}

			} else if ( $depth > 0 ) {

				// Double check, just in case wp_nav_menu is called without a depth argument.
				// We'll ignore anything else other than the initial depth of $items.
				$output .= '';
				return;

			}

			// Convert $prop back to a string so it can be passed to the next iteration of start_el.
			$output = maybe_serialize($prop);

        }

        function end_el(&$output, $item, $depth=0, $args=[], $id=0) {
            $output .= '';
        }
    }
}
