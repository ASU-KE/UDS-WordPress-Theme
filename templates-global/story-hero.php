<?php
/**
 * Displays the story hero image or background color on the top of a post.
 * Should always return some kind of formatting based on the default settings within ACF.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Determine if the user has chosen a background color or an image.
 */
$bgchoice = get_field( 'uds_story_hero_background_choice' );
$hero_size = get_field( 'uds_story_hero_background_image_size' );

// Build initial section tag with correct hero size.
$section_open = '<section class="uds-story-hero entry-header';
$section_close = '">';

if ( 'large' === $hero_size ) {
	$section_open .= ' uds-story-hero-lg';
}

if ( 'image' === $bgchoice ) {

	echo $section_open . $section_close;

	$bgimage = get_field( 'uds_story_hero_background_image' );
	if ( ! empty( $bgimage ) ) {
		echo '<img class="hero" src="' . esc_url( $bgimage['url'] ) . '" alt="' . esc_attr( $bgimage['alt'] ) . '" />';
	}
} else {

	// 'color' === $bgchoice
	$bgcolor = get_field( 'uds_story_hero_background_color' );

	if ( ! empty( $bgcolor ) ) {

		echo $section_open . ' no-image ' . $bgcolor . $section_close;

	} else {

		// This should never really be possible given a default ACF control value.
		echo $section_open . $section_close;

	}
}

// Return the rest of the section.
?>

	<div class="content">
		<p class="meta entry-meta"><?php echo uds_wp_posted_on(); ?></p>
		<?php
		/*
		If ( function_exists( 'yoast_breadcrumb' ) ) {
			echo '<div class="bg-white"><nav aria-label="breadcrumbs">';
			$breadcrumb_output = yoast_breadcrumb( '<ol class="breadcrumb">', '</ol>', false );
			echo preg_replace( '#</?span[^>]*>#is', '', $breadcrumb_output );
			echo '</div></nav>';
			*
		}
		*/

		?>
		<?php the_title( '<h1 class="article entry-title">', '</h1>' ); ?>

	</div>
</section>
