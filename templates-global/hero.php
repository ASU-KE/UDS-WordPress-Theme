<?php

/**
 * Displays the hero content on the top of a page.
 * Should be called within the loop. (Displays the page title if not enabled.)
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$category = is_category() ? get_queried_object() : '';

$hero_size = get_field('hero_size', $category);
// Determine the hero size class. Default to medium.
$hero_size_class = match ($hero_size) {
    'small' => 'uds-hero-sm',
    'large' => 'uds-hero-lg',
    default => 'uds-hero-md',
};

// Check to see if we have buttons, in order to apply a specific class if so.
$has_buttons_class = (have_rows('hero_cta_buttons') || get_field('hero_call_to_action_url', $category)) ? 'has-btn-row' : '';

// Determine the source of our main hero media.
$media_source = get_field('media_source', $category);
switch ($media_source) {
    case 'url':
        $media_type = '';
        $hero_asset_data = ['url' => esc_url(get_field('hero_asset_url', $category))];
		$hero_image_data = $hero_asset_data;
        break;
    case 'local_video':
        $media_type = 'uds-video-hero';
        $hero_asset_data = get_field('video', $category);
        $hero_image_data = get_field('hero_asset_file', $category);
        break;
    default:
        $media_type = '';
        $hero_asset_data = get_field('hero_asset_file', $category);
        $hero_image_data = $hero_asset_data;
        break;
}
$hero_title = wptexturize(wp_kses_post(get_field('hero_title', $category, false)));
$title_color = get_field('title_color', $category);
$title_color_class = ($title_color == 'white') ? 'text-white' : '';
$apply_highlighting = get_field('apply_highlighting', $category);
$hero_highlight = get_field('hero_highlight', $category);
$hero_highlight_class = $apply_highlighting ? $hero_highlight : '';
$hero_text = wptexturize(wp_kses_post(get_field('hero_text', $category, false)));
$subtitle_text = wptexturize(wp_kses_post(get_field('subtitle_text', $category, false)));
$subtitle_style = get_field('subtitle_style', $category);

$title_string = $hero_title;
$title_open_markup = '<h1>';
$title_close_markup = '</h1>';

if (!empty($hero_asset_data['url'])) : ?>
    <div class="<?php echo "{$hero_size_class} {$has_buttons_class} {$media_type}" ?>">
        <div class="hero-overlay"></div>

        <?php if (!empty($hero_image_data)) : ?>
            <img class="hero" src="<?php echo $hero_image_data['url']; ?>" alt="<?php echo $hero_image_data['alt']; ?>" width="2560" height="512" loading="lazy" decoding="async" fetchpriority="high">
        <?php endif; ?>

        <?php if ('uds-video-hero' === $media_type) : ?>
            <video id="media-video" autoplay loop muted>
                <source src="<?php echo $hero_asset_data['url']; ?>">
                <?php echo $hero_asset_data['alt']; ?>
            </video>
            <div class="video-hero-controls">
                <button id="playHeroVid" type="button" class="btn btn-circle btn-circle-alt-white btn-circle-large" data-ga="play hero video" data-ga-name="onclick" data-ga-event="button" data-ga-action="click" data-ga-type="video play" data-ga-region="hero" data-ga-section="hero video">
                    <svg class="svg-inline--fa fa-play" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"></path>
                    </svg>
                    <span class="visually-hidden">Play hero video</span>
                </button>
                <button id="pauseHeroVid" type="button" class="btn btn-circle btn-circle-alt-white btn-circle-large uds-video-btn-play" data-ga="pause hero video" data-ga-name="onclick" data-ga-event="button" data-ga-action="click" data-ga-type="video pause" data-ga-region="hero" data-ga-section="hero video">
                    <svg class="svg-inline--fa fa-pause" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pause" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zm192 0c-26.5 0-48 21.5-48 48V400c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H240z"></path>
                    </svg>
                    <span class="visually-hidden">Pause</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if (!empty($subtitle_text)) : ?>
            <div role="doc-subtitle"><span class="<?php echo $subtitle_style; ?>"><?php echo $subtitle_text; ?></span></div>
        <?php endif; ?>

        <?php
        if (!$apply_highlighting) {
            if ('text-white' == $title_color_class) {
                $title_open_markup = '<h1 class="' . $title_color_class . '">';
            }
        } else {
            $title_highlight_type = get_field('title_highlight_type', $category);
            switch ($title_highlight_type) {
                case 'word':
					$title_open_markup = '<h1 class="' . $title_color_class . '">';
                    $single_word_highlight = get_field('single_word_highlight', $category);
                    if (!empty($single_word_highlight) && false !== strpos($hero_title, $single_word_highlight)) {
                        $title_string = str_replace(
                            $single_word_highlight,
                            '<span class="' . $hero_highlight . '" style="margin-left: 0;">' . $single_word_highlight . '</span>',
                            $hero_title
                        );
					}
                    break;
                case 'all':
                default:
                    $title_string = '<span class="' . $hero_highlight . '">' . $hero_title . '</span>';
                    break;
            }
        }

        echo $title_open_markup . $title_string . $title_close_markup;

        if (!empty($hero_text)) : ?>
            <div class="content">
                <p class="<?php echo $title_color_class; ?>"><?php echo $hero_text; ?></p>
            </div>
        <?php endif;

        if (!empty($has_buttons_class)) {
            if (have_rows('hero_cta_buttons')) : ?>
                <div class="btn-row">
                    <?php while (have_rows('hero_cta_buttons')) : the_row();
                        $size = get_sub_field('button_size');
                        $color = get_sub_field('button_color');
                        $external_link = get_sub_field('external_link');
                        $icon = get_sub_field('icon');

                        $rel_text = $external_link ? 'target="_blank" rel="noopener noreferrer"' : '';
                        $icon_text = $icon ? '<span class="fas fa-' . $icon . '"></span>&nbsp;' : '';

                        $button_link_data = get_sub_field('button_link');
                        if ($button_link_data) {
                            $button_label = sanitize_text_field($button_link_data['title']);
                            $button_url = esc_url($button_link_data['url']);
                            $button_target = $button_link_data['target'];
                            $target_text = $button_target ? 'target="_blank"' : '';
                        } else {
                            $button_label = 'Label Missing!';
                            $button_url = '#';
                            $target_text = '';
                        }

                        $text = '<a class="btn btn-%3$s btn-%4$s" href="%1$s" %5$s %6$s data-ga="%2$s" data-ga-name="onclick" data-ga-event="link" data-ga-action="click" data-ga-type="' . (strpos($button_url, 'asu.edu') !== false || strpos($button_url, '/') === 0 ? 'internal link' : 'external link') . '" data-ga-region="hero" data-ga-section="hero cta">%7$s %2$s</a>';
                        echo wp_kses(sprintf($text, $button_url, $button_label, $size, $color, $target_text, $rel_text, $icon_text), wp_kses_allowed_html('post'));
                    endwhile; ?>
                </div>
            <?php else :
                $cta_url = get_field('hero_call_to_action_url', $category);
                $cta_text = get_field('hero_call_to_action_text', $category);
                $cta_color = get_field('call_to_action_color', $category);

                if (!empty($cta_url) && !empty($cta_text)) {
                    $text = '<a class="btn btn-%3$s" href="%1$s" data-ga="%2$s" data-ga-name="onclick" data-ga-event="link" data-ga-action="click" data-ga-type="' . (strpos($cta_url, 'asu.edu') !== false || strpos($cta_url, '/') === 0 ? 'internal link' : 'external link') . '" data-ga-region="hero" data-ga-section="hero cta">%2$s</a>';
                    echo wp_kses(sprintf($text, $cta_url, $cta_text, $cta_color), wp_kses_allowed_html('post'));
                }
            endif;
        } ?>
    </div>
<?php else :
    if (!is_category() && !is_tax()) {
        echo '<section id="page-title"><div class="container"><div class="row"><div class="col-md-12">';
        if (!get_field('hide_page_title', $category)) {
            the_title('<h1 class="entry-title">', '</h1>');
        }
        echo '</div></div></div></section>';
    }
endif;
