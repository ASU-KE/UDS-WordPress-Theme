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
$category = '';
if ( is_category() ) {
	$category = get_queried_object();
}

$media_source = get_field( 'media_source', $category );
switch ( $media_source ) {
	case 'url':
		/**
		 * If we're using the URL field, create a data structure that matches
		 * what we would get from the media library option - rather than create
		 * conditional logic when we're rendering the tag.
		 */
		$media_type = 'url';
		$hero_asset_data = array();
		$hero_asset_data['url'] = esc_url( get_field( 'hero_asset_url', $category ) );
		break;
	case 'local_video':
		$media_type = 'video';
		$hero_asset_data = get_field( 'video', $category );
		$hero_image_data = get_field( 'hero_asset_file', $category );
		break;
	default:
		$media_type = 'image';
		$hero_asset_data = get_field( 'hero_asset_file', $category );
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
$hero_size = get_field( 'hero_size', $category );
$hero_title = wp_kses( get_field( 'hero_title', $category ), $hero_allowed_tags );
$apply_highlighting = get_field( 'apply_highlighting', $category );
$hero_highlight = get_field( 'hero_highlight', $category );
$title_color = get_field( 'title_color', $category );
$hero_text = wp_kses( get_field( 'hero_text', $category ), $hero_allowed_tags );
$single_word_highlight = sanitize_text_field( get_field( 'single_word_highlight', $category ) );

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

// Check to see if we have buttons, in order to apply a specific class if so.
// Note: this checks both the 'new' hero buttons, and the 'old' url field.
$has_buttons_class = '';
if ( have_rows( 'hero_cta_buttons' ) || get_field( 'hero_call_to_action_url', $category ) ) {
	$has_buttons_class = 'has-buttons';
}

// Check for a hero bg image and if present build the hero. Otherwise show the title of the page.
if ( ! empty( $hero_asset_data['url'] ) ) :
	?>
<div class="uds-hero <?php echo $hero_size_class; ?> hero-<?php echo $media_type; ?>" >

	<?php if ( 'video' === $media_type ) { ?>

			<video class="d-none d-sm-block" id="media-video" autoplay loop muted>
				<source src="<?php echo $hero_asset_data['url']; ?>" type="video/mp4">
				<?php echo $hero_asset_data['alt']; ?>
			</video>
		<?php if ( $hero_image_data ) { ?>
				<img
				class="d-block d-sm-none"
					srcset="<?php echo $hero_image_data['url']; ?>"
					src="<?php echo $hero_image_data['url']; ?>"
					alt="<?php echo $hero_image_data['alt']; ?>"
				/>

			<?php
		}
	} else {
		?>
	<img
		srcset="<?php echo $hero_asset_data['url']; ?>"
		src="<?php echo $hero_asset_data['url']; ?>"
		alt="
		<?php
		if ( 'image' == $media_type ) {
			echo $hero_asset_data['alt'];
		} else {
			echo 'Hero image';}
		?>
		"
	/>
	<?php } ?>
	<div class="container uds-hero-container <?php echo $has_buttons_class; ?> lazyloaded">
		<div class="container px-0">
		<div class="row">
			<div class="col col-lg-8">
		<?php
		if ( ! empty( $hero_title ) ) {

			// Determine if there is any kind of highlighting to apply.
			if ( $apply_highlighting ) {
				// Yes. Highlighting has been chosen.
				$title_highlight_type = get_field( 'title_highlight_type', $category );

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
		?>
			</div>
		</div>
		<?php
		if ( ! empty( $hero_text ) ) :
			?>
		<div class="row">
			<div class="uds-hero-text col col-lg-8">
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
		<div class="row">
			<div class="col col-lg-8">
		<?php
			// Render any buttons we have added to the hero area.
		if ( have_rows( 'hero_cta_buttons' ) ) {
			echo '<div class="hero-buttons">';
			while ( have_rows( 'hero_cta_buttons' ) ) :
				the_row();
				$size = get_sub_field( 'button_size' );
				$color = get_sub_field( 'button_color' );
				$external_link = get_sub_field( 'external_link' );

				if ( $external_link ) {
					$rel_text = 'rel="noopener noreferrer"';
				} else {
					$rel_text = '';
				}
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

					// Button target is a checkbox. If it's checked, we want target to be '_blank'.
					if ( $button_target ) {
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

				$text = '<a class="btn btn-%3$s btn-%4$s mr-2 mb-2" href="%1$s" %5$s %6$s >%2$s</a>';
				echo wp_kses( sprintf( $text, $button_url, $button_label, $size, $color, $target_text, $rel_text ), wp_kses_allowed_html( 'post' ) );
				endwhile;
			echo '</div>';
		} else {
			/**
			 * For backwards compatability, if no buttons are found in the cta_buttons
			 * field, check for values in the older fields and draw a single button
			 * if they're found.
			 */
			$cta_url = get_field( 'hero_call_to_action_url', $category );
			$cta_text = get_field( 'hero_call_to_action_text', $category );
			$cta_color = get_field( 'call_to_action_color', $category );

			if ( ! empty( $cta_url ) && ! empty( $cta_text ) ) {
				$text = '<a class="btn btn-%3$s" href="%1$s">%2$s</a>';
				echo wp_kses( sprintf( $text, $cta_url, $cta_text, $cta_color ), wp_kses_allowed_html( 'post' ) );
			}
		}
		?>
				</div>
				<?php if ( 'video' === $media_type ) { ?>
					<div class="hero-video-controls d-none d-sm-block">
			<button id="playHeroVid" type="button" class="btn btn-circle btn-circle-alt-white btn-circle-large" >
			<i class="fas fa-play"></i>
			<span class="sr-only">Play hero video</span>
		  </button>
				<button id="pauseHeroVid" type="button" class="btn btn-circle btn-circle-alt-white btn-circle-large" >
				<i class="fas fa-pause"></i>
				<span class="sr-only">Pause hero video</span>
			  </button>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
	<?php

else :

	echo '<section id="page-title"><div class="container"><div class="row"><div class="col-md-12">';
	if ( ! get_field( 'hide_page_title', $category ) ) {
		the_title( '<h1 class="entry-title">', '</h1>' ); }
	echo '</div></div></div></section>';

endif;
?>
