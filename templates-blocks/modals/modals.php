<?php
/**
 * UDS Modals Block
 *
 * @package UDS WordPress Theme
 * @author Zainab Alsidiki
 *
 * This is the windows modal block for using within the UDS WordPress theme.
 */

/**
 * Get values from ACF fields
 */

// Multiple values are taken from the 'button_label' field.
$button_label = get_field( 'button_label' );
if ( $button_label ) {
	$button_label = sanitize_text_field( $button_label );
} else {
	$button_label = 'Show modal';
}

$button_color = get_field( 'button_color' );
$button_size = get_field( 'button_size' );



// Set button size class if default is not chosen.
if ( 'default' !== $button_size ) {
	$button_size = 'btn-' . $button_size;
} else {
	$button_size = '';
}

// If user has chosen an icon construct the markup span.
if ( get_field( 'icon' ) ) {
	$button_icon = sanitize_text_field( get_field( 'icon' ) );
	$icon_span = '<span class="fas fa-' . $button_icon . '"></span>&nbsp;&nbsp;';
} else {
	$icon_span = '';
}

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}


	$window_content = get_field( 'content' ) ? get_field( 'content' ) : ''




?>


<button class="openModalButton btn <?php echo $button_size; ?> btn-<?php echo $button_color; ?> <?php echo $additional_classes; ?>"><?php echo $icon_span; ?><?php echo $button_label; ?></button>

  <div class="uds-modal">
	<div class="uds-modal-container">
	  <button class="uds-modal-close-btn closeModalButton">
		<i class="fas fa-xmark fa-stack-1x"></i>
		<span class="sr-only">Close</span>
	  </button>
	  <?php echo $window_content; ?>
	</div>
  </div>
