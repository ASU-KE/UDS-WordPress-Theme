<?php
/**
 * UDS Image Compare Block
 *
 * @package UDS WordPress Theme
 */

    $description      = get_field( 'description' );
    $orientation      = get_field( 'orientation' );
    $slide_mode       = get_field( 'slide_mode' ); // 'drag' or 'hover'
    $initial_position = get_field( 'initial_position' );
    $show_handle_icon = get_field( 'show_handle_icon' );
    $before_image     = get_field( 'before_image' );
    $after_image      = get_field( 'after_image' );

    // If additional classes were requested, clean up the input and add them.
    $additional_classes = '';
    if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
        $additional_classes = trim( sanitize_text_field( $block['className'] ) );
    }

    // Unique block ID
    $block_id = isset( $block['id'] ) ? esc_attr( $block['id'] ) : 'uds-ic-' . uniqid();

    $is_vertical = ( 'vertical' === $orientation );

    // Set initial position to 0–100, default to 50.
    $position = isset( $initial_position ) ? (int) $initial_position : 50;
    $position = max( 0, min( 100, $position ) );

    // Resolve image URLs and alt text.
    $before_url = '';
    $before_alt = '';
    $after_url  = '';
    $after_alt  = '';

    if ( is_array( $before_image ) ) {
        $before_url = isset( $before_image['url'] ) ? esc_url( $before_image['url'] ) : '';
        $before_alt = isset( $before_image['alt'] ) ? esc_attr( $before_image['alt'] ) : '';
    } elseif ( ! empty( $before_image ) ) {
        $before_url = esc_url( $before_image );
    }

    if ( is_array( $after_image ) ) {
        $after_url = isset( $after_image['url'] ) ? esc_url( $after_image['url'] ) : '';
        $after_alt = isset( $after_image['alt'] ) ? esc_attr( $after_image['alt'] ) : '';
    } elseif ( ! empty( $after_image ) ) {
        $after_url = esc_url( $after_image );
    }

    // Return early if no images are provided.
    if ( empty( $before_url ) && empty( $after_url ) ) {
        return;
    }

    $orientation_class = $is_vertical ? 'uds-image-compare--vertical' : 'uds-image-compare--horizontal';

    $custom_width  = get_field( 'width' );
    $custom_height = get_field( 'height' );

    // --uds-ic-pos sets the initial handle position before JS runs.
    $inline_style  = '--uds-ic-pos: ' . $position . '%';
    $inline_style .= $custom_width  ? '; width: '  . intval( $custom_width )  . 'px' : '';

    $wrapper_style = $custom_height ? 'height: ' . intval( $custom_height ) . 'px' : '';
?>

<section
    id="<?php echo $block_id; ?>"
    class="uds-image-compare <?php echo esc_attr( $additional_classes ); ?>"
    style="<?php echo esc_attr( $inline_style ); ?>"
    data-slide-mode="<?php echo esc_attr( $slide_mode ? $slide_mode : 'drag' ); ?>"
    data-initial-position="<?php echo $position; ?>"
    aria-label="<?php esc_attr_e( 'Image comparison slider', 'uds-wordpress-theme' ); ?>"
>
    <div
        class="uds-image-compare-wrapper <?php echo esc_attr( $orientation_class ); ?>"
        <?php if ( $wrapper_style ) : ?>style="<?php echo esc_attr( $wrapper_style ); ?>"<?php endif; ?>
        role="group"
    >
        <?php if ( $before_url ) : ?>
        <div class="uds-image-compare-before" aria-label="<?php esc_attr_e( 'Before', 'uds-wordpress-theme' ); ?>">
            <img
                src="<?php echo $before_url; ?>"
                alt="<?php echo $before_alt; ?>"
                draggable="false"
            >
        </div>
        <?php endif; ?>

        <?php if ( $after_url ) : ?>
        <div class="uds-image-compare-after" aria-label="<?php esc_attr_e( 'After', 'uds-wordpress-theme' ); ?>">
            <img
                src="<?php echo $after_url; ?>"
                alt="<?php echo $after_alt; ?>"
                draggable="false"
            >
        </div>
        <?php endif; ?>

        <div
            class="uds-image-compare-handle"
            role="slider"
            aria-label="<?php esc_attr_e( 'Image comparison handle', 'uds-wordpress-theme' ); ?>"
            aria-valuemin="0"
            aria-valuemax="100"
            aria-valuenow="<?php echo $position; ?>"
            tabindex="0"
        >
            <div class="uds-image-compare-divider"></div>
            <?php if ( $show_handle_icon ) : ?>
            <div class="uds-image-compare-icon" aria-hidden="true">
                <?php if ( $is_vertical ) : ?>
                <i class="fas fa-up-down" aria-hidden="true"></i>
                <?php else : ?>
                <i class="fas fa-left-right" aria-hidden="true"></i>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
   
    <?php if ( $description ) : ?>
        <p class="uds-image-compare-description">
            <?php echo esc_html( $description ); ?>
        </p>
    <?php endif; ?>
</section>
