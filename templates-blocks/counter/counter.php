<?php

$block_id = 'uds-counter-' . $block['id'];

$text = get_field( 'uds_text' );
$start_digit =  get_field( 'uds_start_digit' );
$end_digit =  get_field( 'uds_end_digit' );
$duration =  get_field( 'uds_duration' );
$steps_between = get_field( 'uds_steps_between' );

// Get additional classes if any
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="uds-counter_container <?php echo esc_attr( $additional_classes ); ?>">
    <div class="uds-counter_content">
        <div
            class="uds-counter_number fs-2 fw-bold"
            data-uds-counter
            data-start="<?php echo esc_attr( $start_digit ); ?>"
            data-end="<?php echo esc_attr( $end_digit ); ?>"
            data-duration="<?php echo esc_attr( $duration ); ?>"
            data-step="<?php echo esc_attr( $steps_between ); ?>"
            >
            <?php echo esc_html( number_format_i18n( $end_digit ) ); ?>
        </div>
        <hr class="uds-counter_divider mt-0 mb-2">
        <?php if ( $text ) : ?>
            <div class="uds-counter_text fs-6"><?php echo esc_html( $text ); ?></div>
        <?php endif; ?>
    </div>
</div>