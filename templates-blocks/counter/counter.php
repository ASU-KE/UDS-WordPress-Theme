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

$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
    $additional_classes = trim( sanitize_text_field( $block['className'] ) );
}

$wrapper_attributes = get_block_wrapper_attributes([
    'id'    => $block_id,
    'class' => 'uds-counter-container ' . $additional_classes,
]);
?>

<section <?php echo esc_attr( $wrapper_attributes ); ?> data-uds-counter-wrapper>
    <div class="uds-counter-content">
        <div
            class="uds-counter-number fs-2 fw-bold"
            data-uds-counter
            data-start="<?php echo esc_attr( $start_digit ); ?>"
            data-end="<?php echo esc_attr( $end_digit ); ?>"
            data-duration="<?php echo esc_attr( $duration ); ?>"
            data-step="<?php echo esc_attr( $steps_between ); ?>"
            aria-hidden="true"
            >
            <?php echo esc_html( number_format_i18n( $start_digit ) ); ?>
        </div>
        <?php /* visually-hidden live region: announces the final counter value to screen readers */ ?>
        <span class="visually-hidden" data-uds-counter-live role="status" aria-live="polite" aria-atomic="true">
            <?php echo esc_html( number_format_i18n( $end_digit ) ); ?>
        </span>
        <hr class="uds-counter-divider mt-0 mb-2" aria-hidden="true">
        <?php if ( $text ) : ?>
            <div class="uds-counter-text fs-6"><?php echo esc_html( $text ); ?></div>
        <?php endif; ?>
    </div>
</section>