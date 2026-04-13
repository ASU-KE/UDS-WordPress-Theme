<?php
/**
 * UDS Process Stages Block
 *
 * @package UDS Process Stages
 * @author Divyesh Patel
 */

$block_id = 'process-stages-' . $block['id'];
$layout_horizontal = get_field('uds_layout_horizontal');
$stages = get_field('uds_stages');
// Options: none, bounce, pulse
$animation = get_field('uds_animation');
$animation_class = ($animation && $animation !== 'none') ? 'animate-' . $animation : '';

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}

if ($stages && count($stages) != 0): ?>
    <section 
        id="<?php echo esc_attr($block_id); ?>"
        class="uds-process-flow 
            <?php echo $layout_horizontal === false ? 'layout-vertical' : ''; ?> 
            <?php echo esc_attr($animation_class); ?> 
            <?php echo esc_attr($additional_classes); ?>"
        data-layout="<?php echo esc_attr($layout_horizontal) ? 'horizontal' : 'vertical'; ?>"
        aria-label="<?php esc_attr_e( 'Process stages', 'uds-wordpress-theme' ); ?>"
        >
        <?php /* Purely decorative connector lines – hidden from assistive technology */ ?>
        <svg class="process-svg" aria-hidden="true" focusable="false"></svg>

        <ol class="process-container">
            <?php foreach ($stages as $index => $stage):
                $title = $stage['stage_title'];
                $img   = $stage['stage_image'];
                $desc  = $stage['stage_content'];
            ?>
                <li class="process-step">
                    <div class="image-wrapper">
                        <?php if ($img): ?>
                            <?php echo wp_get_attachment_image($img, 'thumbnail', false, ['class' => 'round-img']); ?>    
                        <?php else: ?>    
                            <div class="placeholder-circle" role="img" aria-label="<?php echo esc_attr( sprintf( __( 'Step %d', 'uds-wordpress-theme' ), $index + 1 ) ); ?>"></div>
                        <?php endif; ?>
                        <?php /* Step number is a visual aid only; step order is conveyed by the <ol> */ ?>
                        <div class="image-number fs-1" aria-hidden="true"><?php echo $index + 1; ?>.</div>
                    </div>

                    <div class="content-wrapper">
                        <h5 class="step-title"><?php echo esc_html($title); ?></h5>
                        <p class="step-desc"><?php echo esc_html($desc); ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </section>
<?php endif; ?>