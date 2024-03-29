<?php
/**
 * UDS Grid Links
 *
 * @package UDS WordPress Theme
 */

$source = get_field( 'uds_grid_links_source' );
$columns = get_field( 'uds_grid_links_columns' );
$breakpoint = get_field( 'uds_grid_links_breakpoint' );
$color = get_field( 'uds_grid_links_color' );


// Retrieve additional classes from the 'advanced' field in the editor.
$additional_classes = '';
if ( ! empty( $block['className'] ) ) {
	$additional_classes = $block['className'];
}

// Add the required text-color modifier to the additional classes string.
if ( 'none' !== $color ) {
	$additional_classes = $color . ' ' . $additional_classes;
}

// Add the required column modifier to the additional classes string.
if ( 'mobile' !== $columns ) {
	$additional_classes = $columns . ' ' . $additional_classes;
}

echo '<div class="uds-grid-links ' . $additional_classes . '">';

// If then structure determines the actual <a> tags produced. Indicated with user choice for the source of the links.
// This field is a radio button with a default setting, so no need to see if it exists.
if ( 'arbitrary' === $source ) {

	// Check the rows of the repeater, build the links.
	if ( have_rows( 'uds_grid_links_created' ) ) :

		while ( have_rows( 'uds_grid_links_created' ) ) :
			the_row();

			// Reset all loop variables with each loop.
			$icon = '';
			$bg_image = '';
			$gridlink = '';
			$linkstring = '';

			$icon = get_sub_field( 'uds_grid_links_created_icon' );
			$bg_image = get_sub_field( 'uds_grid_links_created_bg' );
			$gridlink = get_sub_field( 'uds_grid_links_created_link' );

			if ( ! empty( $icon ) ) {
				$linkstring .= '<span class="fa-fw ' . $icon . '"></span>';
			}

			if ( ! empty( $gridlink ) ) {
				$link_url = $gridlink['url'];
				$link_title = $gridlink['title'];
				$link_target = $gridlink['target'] ? $gridlink['target'] : '_self';
			} else {
				$link_url = '#';
				$link_title = 'No link defined.';
				$link_target = '_self';
			}


			if ( ! empty( $bg_image ) ) {
				// If using an image background, configure the appropriate values and structure.
				$bg_image_url = $bg_image['url'];
				$bg_image_title = $bg_image['title'];
				$bg_image_alt = $bg_image['alt'];
				$bg_image = '<img src="' . $bg_image_url . '" title="' . $bg_image_title . '" alt="' . $bg_image_alt . '" />';
				$bg_image_class = 'grid-link-bg-img';
				$linkstring = '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '" class="' . $bg_image_class . '"><p>' . $linkstring . esc_html( $link_title ) . '</p>' . $bg_image . '</a>';
			} else {
				// With no image, our $linkstring can be much simpler.
				$linkstring = '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . $linkstring . esc_html( $link_title ) . '</a>';
			}

			echo $linkstring;

		endwhile;

	else :
		echo '<a href="#">No links defined.</a>';
	endif;

} else {

	// $content is equal to either "tag" or "category"
	if ( 'tag' === $source ) {
		$terms = get_field( 'uds_grid_links_tag' );
	} else {
		$terms = get_field( 'uds_grid_links_category' );
	}

	if ( $terms ) {
		foreach ( $terms as $gridterm ) {
			echo '<a href="' . esc_url( get_term_link( $gridterm ) ) . '">' . esc_html( $gridterm->name ) . '</a>';
		}
	} else {
		echo '<a href="#">No ' . $source . ' selected.</a>';
	}
}

// Close out the block.
echo '</div><!-- end .uds-grid-links -->';
