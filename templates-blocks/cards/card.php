<?php

/**
 * UDS Card Block
 *
 * @package UDS WordPress Theme
 * @author Walter McConnell
 *
 * A block for creating static versions of a UDS card. Supports the following features:
 *
 * - basic, story, and event card formats with
 * - vertical or horizontal cards
 * - blank, image, or icon header styles
 * - ability to add multiple buttons, links, or tags (or all three!)
 * - simple date and time values for event cards
 *
 * Note: horizontal cards have a different structure, so when horizontal is
 * chosen, a new <div> with the class 'card-content-wrapper' is added to
 * via two conditional statements.
 */

/** Determine card style classes to use. Rather than use actual class names in
 * in the ACF field group, we have it give us basic values and determine the
 * class names here
 */
$style = get_field('card_style');
switch ($style) {
	case 'degree':
		$style_class = 'card-degree';
		break;

	case 'event':
		$style_class = 'card-event';
		break;

	case 'story':
		$style_class = 'card-story';
		break;

	default:
		$style_class = '';
		break;
}

// Get the header style: none, image, or icon.
$header_style = get_field('header_style');

// Get the orientation value and set a class if horizontal.
if ('horizontal' == get_field('card_orientation')) {
	$orientation_class = 'card-horizontal';
} else {
	$orientation_class = '';
}

// If there's an icon, clean it up for use.
$icon_name = get_field('header_icon');

if ('icon' == $header_style && '' != $icon_name) {
	$icon_name = sanitize_text_field($icon_name);

/**
 * For legacy support, if the icon name does not start with 'fas' or 'fab'
 * we will presume we have only the icon base name (ex. just 'user' )
 * and apply the original 'fas fa-' version like this:
 *
 * if the icon name does NOT start with FAS or FAB
 * strip out 'fa-' if it is found (for cases like getting 'fa-user')
 * then prepend the result with 'fas fa-' like the original code did.
 */
if( $icon_name && false == preg_match('/^fa[sb]/', (string)$icon_name ) ) {
	$icon_name = str_ireplace('fa-', '', (string)$icon_name );
	$icon_name = trim('fas fa-' . $icon_name);
	}
}



// Get the icon color
$icon_color = get_field( 'card_icon_color' );


// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if (isset($block['className']) && !empty($block['className'])) {
	$additional_classes = trim(sanitize_text_field($block['className']));
}

// Get our image data from the array provided by ACF.
$image_url = '';
$image_alt = '';

$image_data = get_field('image');

if (!empty($image_data)) {
	$image_url = isset($image_data['url']) ? $image_data['url'] : '';
	$image_alt = isset($image_data['alt']) ? $image_data['alt'] : '';
}
?>

<!-- If it's an interactive card, use the interactive card format -->
<?php if ('interactive' == $style) : ?>
	<!-- open interactive card -->
	<div class="content-section text-white">
		<div class="image-holder">
			<img src="<?php $background_image = the_field('interactive_background_image');?>" alt="alt text" loading="lazy" decoding="async">
		</div>
		<div class="content-holder">
			<div class="content-bg">
				<h3><?php the_field('title'); ?></h3>
				<div class="hidden-details">
					<p class="long-text"><?php the_field('body_text', false, false); ?></p>
					<?php if (get_field('interactive_cta_url') && get_field('interactive_cta_button_text')) : ?>
					<a href="<?php $call_to_action_url = get_field('interactive_cta_url'); echo $call_to_action_url; ?>" class="btn btn-gold btn-sm" data-ga="call to action" data-ga-name="onclick" data-ga-event="link" data-ga-action="click" data-ga-type="<?php echo $data_ga_type = (str_contains($call_to_action_url, 'asu.edu') !== false || str_contains(substr($call_to_action_url, 0, 1), '/') !== false) ? 'internal link' : 'external link'; ?>" data-ga-region="main content" data-ga-section="<?php the_field('title', false, false); ?>"><?php $call_to_action = the_field('interactive_cta_button_text');  echo $call_to_action; ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div> <!-- close interactive card -->

	<!-- all other card types use the standard card format -->
<?php else : ?>
	<!-- open standard card -->
	<div class="card <?php echo $style_class; ?> <?php echo $orientation_class; ?> <?php echo $additional_classes; ?>">

	<!-- get header content based on header style -->

	<!-- image style header -->
	<?php if ('image' == $header_style) : ?>
		<img class="card-img-top" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
	<?php endif; ?>

	<!-- icon style header -->
	<?php if ('icon' == $header_style) : ?>
		<!-- render icon with color span if needed -->
		<?php if ('maroon' == $icon_color || 'gold' == $icon_color) : ?>
			<span class="text-<?php echo $icon_color; ?>">
		<?php endif; ?>

		<span class="<?php echo $icon_name;?> fa-2x card-icon-top"></span>

		<?php if ('maroon' == $icon_color || 'gold' == $icon_color): ?>
			</span>
		<?php endif; ?>
	<?php endif; ?>

	<!-- if horizontal, open content wrapper -->
	<?php if ('card-horizontal' == $orientation_class) : ?>
		<div class="card-content-wrapper">
	<?php endif; ?>

	<!-- card header -->
	<div class="card-header">
		<h3 class="card-title"><?php the_field('title', false, false); ?></h3>
	</div>

	<!-- card body -->
	<?php if ('' !== get_field('body_text')) : ?>
		<div class="card-body">
			<p class="card-text"><?php the_field('body_text', false, false); ?></p>
		</div>
	<?php endif; ?>

	<!-- event details for event style cards -->
	<?php if ('event' === get_field('card_style')) : ?>

		<!-- event date and time -->
		<?php if (get_field('start_date') || get_field('start_time')) : ?>
			<div class="card-event-details">
				<div class="card-event-icons">
					<div><i class="fas fa-calendar"></i></div>
					<div>
						<?php the_field('start_date'); ?><br>
						<?php the_field('start_time'); ?>
						<?php if (get_field('end_time')) : ?>
							&nbsp;&ndash;&nbsp;<?php the_field('end_time'); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<!-- event location -->
		<?php if (get_field('location')) : ?>
			<div class="card-event-details">
				<div class="card-event-icons">
					<div><i class="fas fa-map-marker-alt"></i></div>
					<div><?php echo sanitize_text_field(get_field('location')); ?></div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<!-- card buttons, links, and tags -->
	<!-- card buttons -->
	<?php if (get_field('buttons')) : ?>
		<?php if (have_rows('buttons')) : ?>
			<?php
			while (have_rows('buttons')) :
				the_row();
			?>
				<div class="card-button">
					<?php
					// Get our ACF Field values.
					$external_link = get_sub_field('card_buttons_external_link');
					$button_color  = get_sub_field('card_buttons_button_color');
					$button_size   = get_sub_field('card_buttons_button_size');
					$button_icon   = get_sub_field('card_buttons_icon');

					// Button text, URL, target attribute and ARIA label come from the ACF cloned fields for buttons.
					// These are stored in an array called 'link_values'.
					$link_values   = get_sub_field('card_buttons_button_link');
					// Sanitize the button values and check for missing values. If missing, set to a safe default to alert the editor.
					$button_label  = isset($link_values['title']) && !empty($link_values['title']) ? sanitize_text_field($link_values['title']) : 'Button label missing!';
					$button_url    = isset($link_values['url']) && !empty($link_values['url']) ? esc_url($link_values['url']) : '#';
					$button_target = isset($link_values['target']) ? $link_values['target'] : '';

					// set ARIA label if provided
					$aria_label    = get_sub_field('aria_label');
					if ($aria_label) {
						$aria_label = sanitize_text_field($aria_label);
					} else {
						$aria_label = $button_label;
					}

					// Set "rel" text if requested.
					if ($external_link) {
						$rel = 'target="_blank" rel="noopener noreferrer"';
					} else {
						$rel = '';
					}

					// Set the text for the button size class.
					if ('default' !== $button_size) {
						$button_size = 'btn-' . $button_size;
					} else {
						$button_size = '';
					}

					// Set the text for the icon, if requested.
					if ($button_icon) {
						$button_icon = sanitize_text_field($button_icon);
						$icon_span = '<span class="fas fa-' . $button_icon . '"></span>&nbsp;&nbsp;';
					} else {
						$icon_span = '';
					}

					// Set the text for a target of "_blank" if opening in a new tab.
					if ($button_target) {
						$target_text = 'target="' . $button_target . '"';
					} else {
						$target_text = '';
					}
					?>
					<?php echo "<a href=\"{$button_url}\" class=\"btn {$button_size} btn-{$button_color}\" {$rel} {$target_text} aria-label=\"{$aria_label}\"> {$icon_span} {$button_label}</a>";?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php endif; ?>

	<!-- card links -->
	<?php if (get_field('links')) : ?>
		<?php if (have_rows('links')) : ?>
			<div class="card-link">
				<?php
				while (have_rows('links')) :
					the_row();
				?>
					<?php
					// Get our ACF Field values.
					$link_text = get_sub_field('link_text');
					$link_url = get_sub_field('link_url');
					$external_link = get_sub_field('external_link');

					// Sanitize and check for missing values.
					$link_text = isset($link_text) && !empty($link_text) ? sanitize_text_field($link_text) : 'Link text missing!';
					$link_url = isset($link_url) && !empty($link_url) ? esc_url($link_url) : '#';

					// Set "rel" text if requested.
					if ($external_link) {
						$rel = 'target="_blank" rel="noopener noreferrer"';
					} else {
						$rel = '';
					}
					?>
					<a href="<?php echo $link_url; ?>" <?php echo $rel; ?>><?php echo $link_text; ?></a>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<!-- card tags -->
	<?php if (get_field('tags')) : ?>
		<?php if (have_rows('tags')) : ?>
			<div class="card-tags">
				<?php
				while (have_rows('tags')) :
					the_row();
				?>
					<?php
					$tag_label = sanitize_text_field(get_sub_field('tag_text'));
					$tag_url = esc_url(get_sub_field('tag_url'));
					?>
					<a class="btn btn-tag btn-tag-alt-white" href="<?php echo $tag_url; ?>"><?php echo $tag_label; ?></a>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<!-- close content wrapper if horizontal -->
	<?php if ('card-horizontal' == $orientation_class) : ?>
		</div>
	<?php endif; ?>

	</div> <!-- close standard card -->

<?php endif; ?>
