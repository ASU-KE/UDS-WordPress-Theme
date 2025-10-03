<?php
/**
 * UDS Timeline Block
 *
 * @package UDS WordPress Theme
 * @author GitHub Copilot
 *
 * A block for creating chronological timelines with various layout options:
 * - Vertical or horizontal orientation
 * - Multiple style variations
 * - Optional animations
 * - Carousel functionality for overflow items
 * - Responsive design
 */

// Get field values
$timeline_layout = get_field('timeline_layout') ?: 'vertical';
$timeline_style = get_field('timeline_style') ?: 'default';
$show_animations = get_field('show_animations');
$visible_items = get_field('visible_items') ?: 4;
$timeline_items = get_field('timeline_items') ?: array();

// Generate unique ID for this timeline instance
$timeline_id = 'timeline-' . uniqid();

// Determine if we need carousel functionality
$use_carousel = count($timeline_items) > $visible_items && $visible_items > 0;

// Build CSS classes
$timeline_classes = array(
	'uds-timeline',
	'uds-timeline--' . $timeline_layout,
	'uds-timeline--style-' . $timeline_style,
);

if ($show_animations) {
	$timeline_classes[] = 'uds-timeline--animated';
}

if ($use_carousel) {
	$timeline_classes[] = 'uds-timeline--carousel';
	$timeline_classes[] = 'glide';
}

$timeline_class_string = implode(' ', $timeline_classes);

// If no items, show a placeholder in the editor
if (empty($timeline_items)) {
	if (is_admin() || (defined('REST_REQUEST') && REST_REQUEST)) {
		echo '<div class="acf-placeholder" style="padding: 2rem; border: 2px dashed #ccc; text-align: center; color: #666; background: #f9f9f9; border-radius: 8px; margin: 1rem 0;">
			<i class="fas fa-clock" style="font-size: 2rem; margin-bottom: 1rem; display: block; color: #8c1d40;"></i>
			<h3 style="margin-bottom: 0.5rem; color: #8c1d40;">Timeline Block</h3>
			<p style="margin: 0;">Add timeline items to get started with your chronological timeline.</p>
		</div>';
	}
	return;
}
?>

<div class="<?php echo esc_attr($timeline_class_string); ?>" id="<?php echo esc_attr($timeline_id); ?>" role="region" aria-label="Timeline of events">
	<?php if ($use_carousel): ?>
		<div class="glide__track" data-glide-el="track">
			<ul class="glide__slides uds-timeline__list" role="list">
	<?php else: ?>
		<div class="uds-timeline__list" role="list">
	<?php endif; ?>

		<?php 
		foreach ($timeline_items as $index => $item): 
			$title = $item['title'] ?? '';
			$date = $item['date'] ?? '';
			$content = $item['content'] ?? '';
			$image = $item['image'] ?? null;
			$url = $item['url'] ?? '';
			
			// Build item classes
			$item_classes = array('uds-timeline__item');
			
			if ($use_carousel) {
				$item_classes[] = 'glide__slide';
			}
			
			// Hide items beyond visible limit when not using carousel
			if (!$use_carousel && $visible_items > 0 && $index >= $visible_items) {
				$item_classes[] = 'uds-timeline__item--hidden';
			}
			
			$item_class_string = implode(' ', $item_classes);
		?>
			<div class="<?php echo esc_attr($item_class_string); ?>" role="listitem">
				<div class="uds-timeline__item-content">
					<?php if ($image): ?>
						<div class="uds-timeline__item-image">
							<?php if ($url): ?>
								<a href="<?php echo esc_url($url); ?>" class="uds-timeline__item-link">
							<?php endif; ?>
								<img src="<?php echo esc_url($image['url']); ?>" 
								     alt="<?php echo esc_attr($image['alt'] ?: $title); ?>" 
								     class="uds-timeline__image">
							<?php if ($url): ?>
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					
					<div class="uds-timeline__item-details">
						<?php if ($date): ?>
							<div class="uds-timeline__item-date">
								<?php echo esc_html($date); ?>
							</div>
						<?php endif; ?>
						
						<?php if ($title): ?>
							<h3 class="uds-timeline__item-title">
								<?php if ($url): ?>
									<a href="<?php echo esc_url($url); ?>" class="uds-timeline__item-link">
								<?php endif; ?>
									<?php echo esc_html($title); ?>
								<?php if ($url): ?>
									</a>
								<?php endif; ?>
							</h3>
						<?php endif; ?>
						
						<?php if ($content): ?>
							<div class="uds-timeline__item-content-text">
								<?php echo wp_kses_post($content); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="uds-timeline__connector"></div>
			</div>
		<?php endforeach; ?>
		
	<?php if ($use_carousel): ?>
			</ul>
		</div>
		
		<!-- Carousel navigation -->
		<div class="glide__arrows" data-glide-el="controls" role="group" aria-label="Timeline navigation">
			<button class="glide__arrow glide__arrow--left" data-glide-dir="<" aria-label="Previous timeline items">
				<i class="fas fa-chevron-left" aria-hidden="true"></i>
			</button>
			<button class="glide__arrow glide__arrow--right" data-glide-dir=">" aria-label="Next timeline items">
				<i class="fas fa-chevron-right" aria-hidden="true"></i>
			</button>
		</div>
		
		<div class="glide__bullets" data-glide-el="controls[nav]" role="group" aria-label="Timeline page indicators">
			<?php 
			$total_pages = $visible_items > 0 ? ceil(count($timeline_items) / $visible_items) : 1;
			for ($i = 0; $i < $total_pages; $i++): 
			?>
				<button class="glide__bullet" data-glide-dir="=<?php echo $i; ?>" aria-label="Go to timeline page <?php echo ($i + 1); ?>"></button>
			<?php endfor; ?>
		</div>
	<?php else: ?>
		</div>
	<?php endif; ?>
</div>

<?php if ($use_carousel): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
	<?php
	// Calculate items per view based on layout
	$items_per_view = $timeline_layout === 'horizontal' ? min(intval($visible_items), 3) : 1;
	?>
	
	var timeline = new Glide('#<?php echo esc_js($timeline_id); ?>', {
		type: 'carousel',
		perView: <?php echo intval($items_per_view); ?>,
		gap: 30,
		breakpoints: {
			768: {
				perView: 1
			}
		}
	});
	
	timeline.mount();
});
</script>
<?php endif; ?>