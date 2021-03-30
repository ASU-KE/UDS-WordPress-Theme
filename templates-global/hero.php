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
		/**
		 * If we're using the URL field, create a data structure that matches
		 * what we would get from the media library option - rather than create
		 * conditional logic when we're rendering the tag.
		 */
		$hero_asset_data = array();
		$hero_asset_data['url'] = esc_url( get_field( 'hero_asset_url' ) );
		break;

	default:
		$hero_asset_data = get_field( 'hero_asset_file' );
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
$apply_highlighting = get_field( 'apply_highlighting' );
$hero_highlight = get_field( 'hero_highlight' );
$title_color = get_field( 'title_color' );
$hero_text = wp_kses( get_field( 'hero_text' ), $hero_allowed_tags );
$single_word_highlight = sanitize_text_field( get_field( 'single_word_highlight' ) );

// Determine the text color class. Default to white.
switch ( $title_color ) {
	case 'black':
		$title_color_class = 'text-black';
		break;
	case 'white':
	default:
		$title_color_class = 'text-white';
}

// Determine the hero size class. Default to medium.
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
		$hero_size_class = 'uds-hero-md';
		break;
}

// Check for a hero bg image and if present build the hero. Otherwise show the title of the page.
if ( ! empty( $hero_asset_data['url'] ) ) :
	?>
<div class="uds-hero <?php echo $hero_size_class; ?>" >

	<img
		srcset="<?php echo $hero_asset_data['url']; ?>"
		src="<?php echo $hero_asset_data['url']; ?>"
		alt="<?php echo $hero_asset_data['alt']; ?>"
	/>

	<div class="container uds-hero-container lazyloaded">

		<?php
		if ( ! empty( $hero_title ) ) {

			// Determine if there is any kind of highlighting to apply.
			if ( $apply_highlighting ) {
				// Yes. Highlighting has been chosen.
				$title_highlight_type = get_field( 'title_highlight_type' );

				switch ( $title_highlight_type ) {
					case 'word':
						/**
						 * For single-word highlighting, we ensure the following:
						 * - A word was actually provided
						 * - That word is in the title
						 *
						 * If both those are true, then we replace the word with the same word wrapped in a span
						 * of the approprite class. Otherwise, we fall back on the default title behavior.
						 */
						if ( ! empty( $single_word_highlight ) && false !== strpos( $hero_title, $single_word_highlight ) ) {
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

		if ( ! empty( $hero_text ) ) :
			?>
		<div class="row">
			<div class="uds-hero-text col col-lg-9">
				<?php
				if ( ! empty( $hero_text ) ) {
					$text = '<p>%1$s</p>';
					echo wp_kses( sprintf( $text, $hero_text ), $hero_allowed_tags );
				}
				?>
			</div>
		</div>
			<?php
		endif;
		?>
		<?php
			// Render any buttons we have added to the hero area.
		if ( have_rows( 'hero_cta_buttons' ) ) {
			echo '<div class="hero-buttons">';
			while ( have_rows( 'hero_cta_buttons' ) ) :
				the_row();
				$size = get_sub_field( 'button_size' );
				$color = get_sub_field( 'button_color' );
				/**
				 * The label, URL and target values are inside an ACF 'Link' field.
				 * They do not have default values, like the other button fields,
				 * so we check here to see if they've been set, and apply some defaults.
				 */
				if ( get_sub_field( 'button_link' ) ) {
					$button_link_data = get_sub_field( 'button_link' );
					$button_label     = sanitize_text_field( $button_link_data['title'] );
					$button_url       = esc_url( $button_link_data['url'] );
					$button_target    = $button_link_data['target'];
				} else {
					$button_label  = 'Label Missing!';
					$button_url    = '#';
					$button_target = '_self';
				}

				$text = '<a class="btn btn-%3$s btn-%4$s mr-2 mb-2" href="%1$s" target="%4%s">%2$s</a>';
				echo wp_kses( sprintf( $text, $button_url, $button_label, $size, $color, $button_target ), wp_kses_allowed_html( 'post' ) );
				endwhile;
			echo '</div>';
		} else {
			/**
			 * For backwards compatability, if no buttons are found in the cta_buttons
			 * field, check for values in the older fields and draw a single button
			 * if they're found.
			 */
			$cta_url = get_field( 'hero_call_to_action_url' );
			$cta_text = get_field( 'hero_call_to_action_text' );
			$cta_color = get_field( 'call_to_action_color' );

			if ( ! empty( $cta_url ) && ! empty( $cta_text ) ) {
				$text = '<a class="btn btn-%3$s" href="%1$s">%2$s</a>';
				echo wp_kses( sprintf( $text, $cta_url, $cta_text, $cta_color ), wp_kses_allowed_html( 'post' ) );
			}
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
