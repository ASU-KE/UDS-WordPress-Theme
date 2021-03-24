<?php
/**
 * Displays the hero content on the top of a page.
 * Should be called within the loop. (Displays the page title if not enabled.)
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Determine the source of our main hero media. Options are 'url', for external images
 * from a full URL, or a file from the site's Media Library. We check the user's choice,
 * then pull the value from the appropriate field.
 */
$media_source = get_field( 'media_source' );
switch ( $media_source ) {
	case 'url':
		$hero_asset_url = esc_url( get_field( 'hero_asset_url' ) );
		break;

	default:
		$hero_asset_url = get_field( 'hero_asset_file' );
		break;
}

/**
 * Allow certain tags within the title or body text of the hero area. This is a limited
 * set of tags to support forcing line breaks when appropriate, and applying highlight
 * classes via <span> tags.
 */
$hero_allowed_tags = array(
	'br'   => array(),
	'p'    => array(),
	'span' => array(
		'class' => array(),
	),
);

/**
 * Retrieve our field values. Note, we do not get button values here, as they are
 * retrieved later on when rendered, as they involve looping through a repeater
 * field.
 */
$hero_size = get_field( 'hero_size' );
$hero_title = wp_kses( get_field( 'hero_title' ), $hero_allowed_tags );
$hero_highlight = get_field( 'hero_highlight' );
$title_color = get_field( 'title_color' );
$hero_text = wp_kses( get_field( 'hero_text' ), $hero_allowed_tags );
$single_word_highlight = sanitize_text_field( get_field( 'single_word_highlight' ) );



/**
 * If the user has selected a highlight color for the title, use that. If
 * they didn't, use the value from the 'text color' field to determine the
 * color of the title.
 */

 // holds our final title style.
$hero_title_style = '';

if ( empty( $hero_highlight ) || 'none' == $hero_highlight ) {
	// we did not choose a highlight. Check for white text, and default to black.
	if ( 'white' == $title_color ) {
		$hero_title_style = 'text-white';
	} else {
		$hero_title_style = 'text-black';
	}
} else {
	// we chose a highlight style, so just use that.
	$hero_title_style = $hero_highlight;
}

// Determine the hero size class.
switch ( $hero_size ) {
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
		// Should there be a problem, default to medium size.
		$hero_size_class = 'uds-hero-md';
		break;
}

// Check for a hero bg image and if present build the hero. Otherwise show the title of the page.
if ( ! empty( $hero_asset_url ) ) :
	?>
<div class="uds-hero <?php echo $hero_size_class; ?>" >
	<img srcset="<?php echo $hero_asset_url; ?>" src="<?php echo $hero_asset_url; ?>"/>
	<div class="container uds-hero-container lazyloaded">

		<?php
		if ( ! empty( $hero_title ) ) {

			/**
			 * The user can choose between highlighting the whole title, just one word, or
			 * having no title highlight. Based on that choice, we apply highlighting in
			 * different way.
			 */
			$title_highlight_type = get_field( 'title_highlight_type' );

			switch ($title_highlight_type) {
				case 'all':
					// Full title highlight. Wrap the entire text in a <span> of the chosen style.
					echo '<h1><span class="' . $hero_title_style . '">' . $hero_title . '</span></h1>';
					break;
				case 'word':
					/**
					 * For single-word highlighting, we ensure the following:
					 * - A word was actually provided
					 * - That word is in the title
					 * - You did not choose style 'none', even though you provided a word.
					 *
					 * If all those are true, then we replace the word with the same word wrapped in a span
					 * of the approprite class. Otherwise, we fall back on the default title behavior.
					 */
					if( ! empty( $single_word_highlight ) && false !== strpos( $hero_title, $single_word_highlight ) && 'none' !== $hero_highlight) {
						$title_string = str_replace(
							$single_word_highlight,
							'<span class="' . $hero_title_style . '">' . $single_word_highlight . '</span>',
							$hero_title
						);
						echo '<h1 class="text-' . $title_color . '">' . $title_string . '</h1>';
					}else{
						// Display a normal title, but with the selected text color
						echo '<h1><span class="' . $hero_title_style . '">' . $hero_title . '</span></h1>';
					}
					break;
				case 'none':
					// User has chosen the 'none' highlight. Ignore highlight settings and use title color only.
					echo '<h1><span class="text-' . $title_color . '">' . $hero_title . '</span></h1>';
					break;
				default:
					// Display a normal title, but with the selected text color
					echo '<h1><span class="' . $hero_title_style . '">' . $title_string . '</span></h1>';
					break;
			}
		}else{
			wp_die( 'Title is empty!' );
		}

		if ( ! empty( $hero_text )  ) :
			?>
		<div class="uds-hero-text col-sm-12 col-md-7">
			<?php
			if ( ! empty( $hero_text ) ) {
				$text = '<p>%1$s</p>';
				echo wp_kses( sprintf( $text, $hero_text ), $hero_allowed_tags );
			}
			?>
		</div>
			<?php
		endif;
		?>
		<?php
			// Render any buttons we have added to the hero area.
			if( have_rows( 'hero_cta_buttons' ) ) {
				echo '<div class="hero-buttons">';
				while( have_rows( 'hero_cta_buttons' ) ) : the_row();
					$size = get_sub_field( 'button_size' );
					$color = get_sub_field( 'button_color' );
					/**
					 * The label, URL and target values are inside an ACF 'Link' field.
					 * They do not have default values, like the other button fields,
					 * so we check here to see if they've been set, and apply some defaults.
					 */
					if( get_sub_field( 'button_link' ) ) {
						$button_link_data = get_sub_field( 'button_link' );
						$button_label     = sanitize_text_field( $button_link_data['title'] );
						$button_url       = esc_url( $button_link_data['url'] );
						$button_target    = $button_link_data['target'];
					}else{
						$button_label  = 'Label Missing!';
						$button_url    = '#';
						$bugton_target = '_self';
					}

					$text = '<a class="btn btn-%3$s btn-%4$s mr-2 mb-2" href="%1$s">%2$s</a>';
					echo wp_kses( sprintf( $text, $button_url, $button_label, $size, $color), wp_kses_allowed_html( 'post' ) );
				endwhile;
				echo '</div>';
			}
		?>
	</div>
</div>
	<?php

else :

	echo '<section id="page-title"><div class="container"><div class="row"><div class="col-md-12">';
	if ( ! get_field( 'hide_page_title' ) ) {
		the_title( '<h1 class="entry-title">', '</h1>' ); }
	echo '</div></div></div></section>';

endif;
?>
