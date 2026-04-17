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
$image_text_color = get_field('uds_image_text_color') ?: '#ffffff';

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
        <?php if ($animation && $animation !== 'none'): ?>
        <div class="uds-process-controls buttons">
            <button type="button" class="btn btn-circle btn-circle-large uds-process-play-btn" style="display:none;"
                data-ga="play process animation" data-ga-name="onclick" data-ga-event="button" data-ga-action="click" data-ga-type="animation play" data-ga-region="process stages" data-ga-section="process stages">
                <i class="fa fa-play" aria-hidden="true"></i>
                <span class="visually-hidden">Play animation</span>
            </button>
            <button type="button" class="btn btn-circle btn-circle-large uds-process-pause-btn"
                data-ga="pause process animation" data-ga-name="onclick" data-ga-event="button" data-ga-action="click" data-ga-type="animation pause" data-ga-region="process stages" data-ga-section="process stages">
                <i class="fa fa-pause" aria-hidden="true"></i>
                <span class="visually-hidden">Pause animation</span>
            </button>
        </div>
        <?php endif; ?>

        <ol class="process-container">
            <?php foreach ($stages as $index => $stage):
                $title = $stage['stage_title'];
                $img = $stage['stage_image'];
                $desc = $stage['stage_content'];
                $image_text = !empty($stage['stage_image_text']) ? $stage['stage_image_text'] : $index + 1;
            ?>
                <li class="process-step">
                    <div class="image-wrapper">
                        <?php if ($img): ?>
                            <?php echo wp_get_attachment_image($img, 'thumbnail', false, ['class' => 'round-img']); ?>
                        <?php else: ?>
                            <div class="placeholder-circle" role="img" aria-label="<?php echo esc_attr( sprintf( __( 'Step %d', 'uds-wordpress-theme' ), $index + 1 ) ); ?>"></div>
                        <?php endif; ?>
                        <div class="image-number fs-1" aria-hidden="true" style="color: <?php echo esc_attr($image_text_color); ?>;">
                            <?php echo esc_html($image_text); ?>
                        </div>
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