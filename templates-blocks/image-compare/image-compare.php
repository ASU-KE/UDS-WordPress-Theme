<?php
/**
 * UDS Image Compare Block
 *
 * @package UDS WordPress Theme
 */

    $description = get_field( 'description' );
    $orientation = get_field( 'orientation' );
    $slide_mode = get_field( 'slide_mode' );
    $initial_position = get_field( 'initial_position' );
    $show_handle_icon = get_field( 'show_handle_icon' );
    $before_image = get_field( 'before_image' );
    $after_image = get_field( 'after_image' );

    // If additional classes were requested, clean up the input and add them.
    $additional_classes = '';
    if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
        $additional_classes = trim( sanitize_text_field( $block['className'] ) );
    }
?>

<section class="uds-image-compare <?php echo $additional_classes; ?>">
    <p><?php echo $description; ?></p>
</section>