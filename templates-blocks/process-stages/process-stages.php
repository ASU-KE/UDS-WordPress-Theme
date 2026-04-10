<?php
/**
 * UDS Process Stages Block
 *
 * @package UDS Process Stages
 * @author Divyesh Patel
 */

$process_title = get_field('uds_title');
$layout_horizontal = get_field('uds_layout_horizontal');
$stages = get_field('uds_stages');

if ($stages && count($stages) != 0): ?>
    <section class="uds-process-flow <?php echo $layout_horizontal !== true ? 'layout-vertical' : ''; ?>" data-layout="<?php echo $layout_horizontal ? 'horizontal' : 'vertical'; ?>">
        <svg class="process-svg"></svg>

        <?php if ($process_title): ?>
            <h2 class="process-flow-title"><?php echo esc_html($process_title); ?></h2>
        <?php endif; ?>

        <div class="process-container">
            <?php foreach ($stages as $index => $stage):
                $title = $stage['stage_title'];
                $img   = $stage['stage_image'];
                $desc  = $stage['stage_content'];
            ?>
                <div class="process-step">
                    <div class="image-wrapper">
                        <?php if ($img): ?>
                            <?php echo wp_get_attachment_image($img, 'thumbnail', false, ['class' => 'round-img']); ?>    
                        <?php else: ?>    
                            <div class="placeholder-circle"></div>
                        <?php endif; ?>
                        <div class="image-number fs-1"><?php echo $index + 1; ?>.</div>
                    </div>

                    <div class="content-wrapper">
                        <h5 class="step-title"><?php echo esc_html($title); ?></h5>
                        <p class="step-desc"><?php echo esc_html($desc); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>