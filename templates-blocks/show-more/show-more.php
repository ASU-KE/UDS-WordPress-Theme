<?php
/**
 * UDS Show More Button Block
 *
 * @package UDS WordPress Theme
 * @author Zainab Alsidiki
 *
 * This is a show more button block for using within the UDS WordPress theme. This button allows to hide some content and only show when the button is clicked.
 */

/**
 * Get values from ACF fields
 */

// Multiple values are taken from the 'button_link' field.
$button_link = get_field( 'uds_block_show_more_button_button_link' );
if ( $button_link ) {
	$button_label = sanitize_text_field( $button_link['title'] );
	$button_url = "#";
} else {
	$button_label = 'Read more';
	$button_url = '#';
}


$button_color = get_field( 'uds_block_show_more_button_button_color' )? get_field( 'uds_block_show_more_button_button_color' ): 'mroon';
$button_size = get_field( 'uds_block_show_more_button_button_size' );


// Set button size class if default is not chosen.
if ( 'default' !== $button_size ) {
	$button_size = 'btn-' . $button_size;
} else {
	$button_size = 'default';
}

// If user has chosen an icon construct the markup span.
if ( get_field( 'uds_block_show_more_button_icon' ) ) {
	$button_icon = sanitize_text_field( get_field( 'uds_block_show_more_button_icon' ) );
	$icon_span = '<span class="fas fa-' . $button_icon . '"></span>&nbsp;&nbsp;';
} else {
	$icon_span = '';
}


	$show_more_button_classes = 'text-center uds-show-btn uds-show-more-btn';
	$show_more_button_icon = ' <i class="fas fa-chevron-down"></i>';


// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}


?>

<div class="uds-button <?php echo $additional_classes; ?> <?php echo $show_more_button_classes; ?>" btn-title="<?php echo $button_label; ?>">
	<a href="<?php echo esc_url( $button_url ); ?>" class="btn <?php echo $button_size; ?> btn-<?php echo $button_color; ?>"> <?php echo $icon_span; ?><?php echo $button_label . $show_more_button_icon; ?> </a>
</div>
