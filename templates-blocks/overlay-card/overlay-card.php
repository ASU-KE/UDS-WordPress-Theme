<?php

/**
 * UDS Overlay Card Block
 *
 * @package UDS WordPress Theme
 * @author Zainab Alsidiki
 */

$card_title = get_field('title');
$card_description = get_field('description');
$with_desc_class = $card_description ? 'with-desc' : '';

$image = get_field('image');
if (!$image) {
	$image = array(
		'url' => 'https://thesundevils.com/common/controls/image_handler.aspx?thumb_id=0&image_path=/images/2020/4/27/ASU_Sun_Devil_Athetics_Video_Background_77.jpg',
	);
}
$button = get_field('button');
if (!$button) {
	$button = array(
		'external_link' => '/',
		'button_color' => 'gray',
		'icon' => 'fas fa-arrow-right',
		'button_size' => 'normal',
		'button_link' => array(
			'title' => 'Add a button',
			'url' => '/',
			'target' => '_blank',
		),
	);
}
$hover_image = get_field('hover_image');
if (!$hover_image) {
	$hover_image = array(
		'url' => 'https://thesundevils.com/common/controls/image_handler.aspx?thumb_id=0&image_path=/images/2020/4/27/ASU_Sun_Devil_Athetics_Video_Background_76.jpg',
	);
}

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if (isset($block['className']) && !empty($block['className'])) {
	$additional_classes = trim(sanitize_text_field($block['className']));
}

?>

<div class="home-overlay-card card <?php echo $with_desc_class . ' ' . $additional_classes; ?>">




	<!-- <div class="card-content">-->
	<?php
	if ($card_title) {
		// echo '<h3 class="' . $with_desc_class . '">' . $card_title . '</h3>'; .
		echo '<div class="card-header ' . $with_desc_class . '">
				<h3 class="card-title">' . $card_title . '</h3>
			</div>';
	}
	if ($card_description) {
		// echo '<p>' . $card_description . '</p>'; .
		echo '<div class="card-body">
				<p class="card-text">' . $card_description . '</p>
			</div>';
	}
	?>
	<?php if ($button) { ?>
		<div class="overlay-card-button <?php echo $with_desc_class; ?>">
			<?php
			// Get our ACF Field values.
			$external_link = isset($button['external_link']) ? $button['external_link'] : false;
			$button_color  = isset($button['button_color']) ? $button['button_color'] : 'gray';
			$button_size   = isset($button['button_size']) ? $button['button_size'] : 'normal';
			$button_icon   = isset($button['icon']) ? $button['icon'] : '';

			$button_link = isset($button['button_link']) ? $button['button_link'] : null;
			if ($button_link) {
				$button_label  = isset($button_link['title']) ? $button_link['title'] : '';
				$button_url    = isset($button_link['url']) ? $button_link['url'] : '/';
				$button_target = isset($button_link['target']) ? $button_link['target'] : '_blank';
			} else {
				$button_label  = '';
				$button_url = '/';
				$button_target = '_blank';
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
			if ($button_icon && $button_label) {
				$button_icon = sanitize_text_field($button_icon);
				$icon_span = '<span class="fas fa-' . $button_icon . '"></span>&nbsp;&nbsp;';
			} elseif ($button_icon && !$button_label) {
				$button_icon = sanitize_text_field($button_icon);
				$icon_span = '<span class="fas fa-' . $button_icon . '"></span>';
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
			<a href="<?php echo $button_url; ?>" class="btn <?php echo $button_size; ?> btn-<?php echo $button_color; ?>" data-ga="<?php echo esc_attr($button_label); ?>" data-ga-name="onclick" data-ga-event="link" data-ga-action="click" data-ga-type="<?php echo (strpos($button_url, 'asu.edu') !== false || strpos($button_url, '/') === 0) ? 'internal link' : 'external link'; ?>" data-ga-region="main content" data-ga-section="overlay card" <?php echo $rel; ?> <?php echo $target_text; ?>><?php echo $icon_span; ?><?php echo $button_label; ?></a>
		</div>
	<?php } //End of the button
	?>
	<!-- </div> -->


	<?php if ($image) { ?>
		<img class="card-image" src="<?php echo $image['url']; ?>" alt="<?php echo isset($image['alt']) ? $image['alt'] : ''; ?>" title="<?php echo isset($image['title']) ? $image['title'] : ''; ?>" />
	<?php } ?>
	<?php if ($hover_image) { ?>
		<img class="hover-image" src="<?php echo $hover_image['url']; ?>" alt="<?php echo isset($hover_image['alt']) ? $hover_image['alt'] : ''; ?>" title="<?php echo isset($hover_image['title']) ? $hover_image['title'] : ''; ?>" />
	<?php } ?>


</div>
