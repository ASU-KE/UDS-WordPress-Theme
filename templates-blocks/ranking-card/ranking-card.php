<?php
/**
 * UDS Ranking Card Block
 *
 * @package UDS WordPress Theme
 *
 * A block for displaying ASU rankings with title, rank number, source, and description.
 * Based on the Unity Design System RankingCard component.
 *
 * Typical structure:
 * - Rank number (large, prominent)
 * - Title/headline
 * - Source attribution
 * - Description text
 */

// Get field values
$title = get_field('title');
$rank_number = get_field('rank_number');
$rank_source = get_field('rank_source');
$description = get_field('description');

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if (isset($block['className']) && !empty($block['className'])) {
	$additional_classes = trim(sanitize_text_field($block['className']));
}

// Sanitize the values
$title = $title ? sanitize_text_field($title) : '';
$rank_number = $rank_number ? sanitize_text_field($rank_number) : '';
$rank_source = $rank_source ? sanitize_text_field($rank_source) : '';
$description = $description ? sanitize_textarea_field($description) : '';
?>

<div class="uds-ranking-card <?php echo esc_attr($additional_classes); ?>">
	<?php if ($rank_number) : ?>
		<div class="ranking-card-number">
			<?php echo esc_html($rank_number); ?>
		</div>
	<?php endif; ?>

	<?php if ($title) : ?>
		<h3 class="ranking-card-title"><?php echo esc_html($title); ?></h3>
	<?php endif; ?>

	<?php if ($rank_source) : ?>
		<p class="ranking-card-source"><?php echo esc_html($rank_source); ?></p>
	<?php endif; ?>

	<?php if ($description) : ?>
		<div class="ranking-card-description">
			<?php echo esc_html($description); ?>
		</div>
	<?php endif; ?>
</div>
