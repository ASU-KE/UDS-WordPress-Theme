<?php

/**
 * Displays the hero content on the top of a page.
 * Should be called within the loop. (Displays the page title if not enabled.)
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Determine the source of our main hero media. Options are 'url', for external images
 * from a full URL, or a file from the site's Media Library. We check the user's choice,
 * then pull the value from the appropriate field.
 */
$category = '';
if (is_category()) {
	$category = get_queried_object();
}

//$single_word_highlight = sanitize_text_field(get_field('single_word_highlight', $category));

/*

	<div class="v1-uds-hero <?php echo $hero_size_class; ?> hero-<?php echo $media_type; ?>">


		<div class="container v1-uds-hero-container <?php echo $has_buttons_class; ?> lazyloaded">
			<div class="container px-0">
				<div class="row">
					<div class="col col-lg-8">
						<?php
						if (!empty($hero_title)) {

							// Determine if there is any kind of highlighting to apply.
							if ($apply_highlighting) {
								// Yes. Highlighting has been chosen.
								$title_highlight_type = get_field('title_highlight_type', $category);

								switch ($title_highlight_type) {
									case 'word':
										/**
										 * For single-word highlighting, we ensure the following:
										 * - A word was actually provided
										 * - That word is in the title
										 *
										 * If both those are true, then we replace the word with the same word wrapped in a span
										 * of the approprite class. Otherwise, we fall back on the default title behavior.
										 */
										/*
										if (!empty($single_word_highlight) && false !== strpos($hero_title, $single_word_highlight)) {
											$title_string = str_replace(
												$single_word_highlight,
												'<span class="' . $hero_highlight . '">' . $single_word_highlight . '</span>',
												$hero_title
											);
										} else {
											// Word not found. Just present the title with the appropriate text color class.
											echo '<h1><span class="' . $title_color_class . '">' . $hero_title . '</span></h1>';
										}
										echo '<h1 class="text-' . $title_color . '">' . $title_string . '</h1>';
										break;
									case 'all':
									default:
										// Full title highlight. Wrap the entire text in a <span> of the chosen style.
										echo '<h1><span class="' . $hero_highlight . '">' . $hero_title . '</span></h1>';
										break;
								}
							} else {
								// No highlighting. Just present the title with the appropriate text color class.
								echo '<h1><span class="' . $title_color_class . '">' . $hero_title . '</span></h1>';
							}
						}
						?>
					</div>
				</div>
				<div class="row">
					<div class="col col-lg-8">
						<?php
						// Render any buttons we have added to the hero area.
						if (have_rows('hero_cta_buttons')) {
							echo '<div class="hero-buttons">';
							while (have_rows('hero_cta_buttons')) :
								the_row();
								$size = get_sub_field('button_size');
								$color = get_sub_field('button_color');
								$external_link = get_sub_field('external_link');
								$icon = get_sub_field('icon');

								// Get and format the output for an external link.
								if ($external_link) {
									$rel_text = 'target="_blank" rel="noopener noreferrer"';
								} else {
									$rel_text = '';
								}

								// Get the output for a button icon.
								if ($icon) {
									$icon_text = '<span class="fas fa-' . $icon . '"></span>&nbsp;';
								} else {
									$icon_text = '';
								}

								/**
								 * The label, URL and target values are inside an ACF 'Link' field.
								 * They do not have default values, like the other button fields,
								 * so we check here to see if they've been set, and apply some defaults.
								 */
								/*
								if (get_sub_field('button_link')) {
									$button_link_data = get_sub_field('button_link');
									$button_label     = sanitize_text_field($button_link_data['title']);
									$button_url       = esc_url($button_link_data['url']);
									$button_target    = $button_link_data['target'];

									// Button target is a checkbox. If it's checked, we want target to be '_blank'.
									if ($button_target) {
										$target_text = 'target="_blank"';
									} else {
										$target_text = '';
									}
								} else {
									// The link field was not filled out. Create some defaults.
									$button_label  = 'Label Missing!';
									$button_url    = '#';
									$target_text   = '';
								}

								$text = '<a class="btn btn-%3$s btn-%4$s mr-2 mb-2" href="%1$s" %5$s %6$s >%7$s %2$s</a>';
								echo wp_kses(sprintf($text, $button_url, $button_label, $size, $color, $target_text, $rel_text, $icon_text), wp_kses_allowed_html('post'));
							endwhile;
							echo '</div>';
						} else {

						?>
					</div>
				</div>
			</div>
		</div>
	</div>
*/
?>

<?php
$hero_size = get_field('hero_size', $category);
// Determine the hero size class. Default to medium.
switch ($hero_size) {
	case 'small':
		$hero_size_class = 'uds-hero-sm';
		break;
	case 'medium':
		$hero_size_class = 'uds-hero-md';
		break;
	case 'large':
		$hero_size_class = 'uds-hero-lg';
		break;
	default:
		$hero_size_class = 'uds-hero-md';
		break;
}
// Check to see if we have buttons, in order to apply a specific class if so.
// Note: this checks both the 'new' hero buttons, and the 'old' url field.
$has_buttons_class = '';
if (have_rows('hero_cta_buttons') || get_field('hero_call_to_action_url', $category)) {
	$has_buttons_class = 'has-btn-row';
}
$media_source = get_field('media_source', $category);
switch ($media_source) {
	case 'url':
		/**
		 * If we're using the URL field, create a data structure that matches
		 * what we would get from the media library option - rather than create
		 * conditional logic when we're rendering the tag.
		 */
		$media_type = '';
		$hero_asset_data = array();
		$hero_asset_data['url'] = esc_url(get_field('hero_asset_url', $category));
		break;
	case 'local_video':
		$media_type = 'uds-video-hero';
		$hero_asset_data = get_field('video', $category);
		$hero_image_data = get_field('hero_asset_file', $category);
		break;
	default:
		$media_type = '';
		$hero_asset_data = get_field('hero_asset_file', $category);
		break;
}
$hero_title = wptexturize(wp_kses_post(get_field('hero_title', $category, false)));
$title_color = get_field('title_color', $category);
$title_color_class = ($title_color == 'white') ? 'text-white' : '';
$apply_highlighting = get_field('apply_highlighting', $category);
$hero_highlight = get_field('hero_highlight', $category);
$hero_highlight_class = $apply_highlighting ? $hero_highlight : '';
$hero_text = wptexturize(wp_kses_post(get_field('hero_text', $category, false)));

// Check for a hero bg image and if present build the hero. Otherwise show the title of the page.
if (!empty($hero_asset_data['url'])) :
?>
<div class="<?php echo "{$hero_size_class} {$has_buttons_class} {$media_type}" ?>">
	<div class="hero-overlay"></div>

	<?php if ($hero_image_data) { ?>
		<img class="hero" src="<?php echo $hero_image_data['url']; ?>" alt="<?php echo $hero_image_data['alt']; ?>" width="2560" height="512" loading="lazy" decoding="async" fetchpriority="high">
	<?php
	}

	if ('uds-video-hero' === $media_type) { ?>
	<video id="media-video" autoplay="" loop="">
		<source src="<?php echo $hero_asset_data['url']; ?>">
		<?php echo $hero_asset_data['alt']; ?>
	</video>
	<div class="video-hero-controls">
		<button id="playHeroVid" type="button" class="btn btn-circle btn-circle-alt-white btn-circle-large">
			<svg class="svg-inline--fa fa-play" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
				<path fill="currentColor" d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z">
				</path></svg><!-- <span class="fa fa-play"></span> Font Awesome fontawesome.com --><span class="visually-hidden">Play hero video</span>
		</button>
		<button id="pauseHeroVid" type="button" class="btn btn-circle btn-circle-alt-white btn-circle-large uds-video-btn-play"><svg class="svg-inline--fa fa-pause" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pause" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zm192 0c-26.5 0-48 21.5-48 48V400c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H240z"></path></svg><!-- <span class="fa fa-pause"></span> Font Awesome fontawesome.com --><span class="visually-hidden">Pause</span>
		</button>
	</div>
	<?php } ?>

	<h1><span class="<?php echo "{$title_color_class} {$hero_highlight_class}" ?>"><?php echo "{$hero_title}"?></span></h1>

	<?php if (!empty($hero_text)) { ?>
	<div class="content">
		<p class="text-white"><?php echo "{$hero_text}"?></p>
	</div>
	<?php } ?>

	<?php if (!empty($has_buttons_class)) {
		/** For backwards compatability, if no buttons are found in the cta_buttons field,
		* check for values in the older fields and draw a single button if found. **/
		$cta_url = get_field('hero_call_to_action_url', $category);
		$cta_text = get_field('hero_call_to_action_text', $category);
		$cta_color = get_field('call_to_action_color', $category);
		?>
		<div class="btn-row">
		<?php
		if (!empty($cta_url) && !empty($cta_text)) {
			$text = '<a class="btn btn-%3$s" href="%1$s">%2$s</a>';
			echo wp_kses(sprintf($text, $cta_url, $cta_text, $cta_color), wp_kses_allowed_html('post'));
		} else { ?>
			<a href="#" class="btn btn-maroon" data-ga="Call to action" data-ga-name="onclick" data-ga-event="link" data-ga-action="click" data-ga-type="internal link" data-ga-region="main content" data-ga-secion="the new american university">Call to Action</a>
			<a href="#" class="btn btn-gold" data-ga="Call to action" data-ga-name="onclick" data-ga-event="link" data-ga-action="click" data-ga-type="internal link" data-ga-region="main content" data-ga-secion="the new american university">Second Call to Action</a>

		<?php  } ?>
		</div>
	<?php } ?>
</div>
<?php
// no media found, show the title area
else :

	if (!is_category() && !is_tax()) {
		echo '<section id="page-title"><div class="container"><div class="row"><div class="col-md-12">';
		if (!get_field('hide_page_title', $category)) {
			the_title('<h1 class="entry-title">', '</h1>');
		}
		echo '</div></div></div></section>';
	}

endif;
