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
$use_carousel = count($timeline_items) > $visible_items;

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
	if (is_admin()) {
		echo '<div class="acf-placeholder">Add timeline items to get started.</div>';
	}
	return;
}
?>

<div class="<?php echo esc_attr($timeline_class_string); ?>" id="<?php echo esc_attr($timeline_id); ?>">
	<?php if ($use_carousel): ?>
		<div class="glide__track" data-glide-el="track">
			<ul class="glide__slides uds-timeline__list">
	<?php else: ?>
		<div class="uds-timeline__list">
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
			
			if ($index >= $visible_items && !$use_carousel) {
				$item_classes[] = 'uds-timeline__item--hidden';
			}
			
			$item_class_string = implode(' ', $item_classes);
		?>
			<div class="<?php echo esc_attr($item_class_string); ?>">
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
		<div class="glide__arrows" data-glide-el="controls">
			<button class="glide__arrow glide__arrow--left" data-glide-dir="<">
				<i class="fas fa-chevron-left"></i>
			</button>
			<button class="glide__arrow glide__arrow--right" data-glide-dir=">">
				<i class="fas fa-chevron-right"></i>
			</button>
		</div>
		
		<div class="glide__bullets" data-glide-el="controls[nav]">
			<?php for ($i = 0; $i < ceil(count($timeline_items) / $visible_items); $i++): ?>
				<button class="glide__bullet" data-glide-dir="=<?php echo $i; ?>"></button>
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
	$items_per_view = $timeline_layout === 'horizontal' ? min($visible_items, 3) : 1;
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