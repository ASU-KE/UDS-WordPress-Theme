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
$bgchoice = get_field('uds_story_hero_background_choice');
// $bgcolor = get_field('uds_story_hero_background_color');
// $bgimage = get_field('uds_story_hero_background_image');

if ( 'image' === $bgchoice ) {
	echo '<section class="uds-story-hero entry-header">';

	$bgimage = get_field('uds_story_hero_background_image');
	if( !empty( $bgimage ) ) {
		echo '<img class="hero" src="' . esc_url($bgimage['url']) . '" alt="' . esc_attr($bgimage['alt']) . '" />';
	}

} else {
	// 'color' === $bgchoice
	$bgcolor = get_field('uds_story_hero_background_color');
	if( !empty( $bgcolor ) ) {
		echo '<section class="uds-story-hero no-image ' . $bgcolor . ' entry-header">';
	}
	else echo '<section class="uds-story-hero no-image bg-gray-3 entry-header">';
}

// Return the rest of the section.
?>

<div class="content">
	<p class="meta entry-meta"><?php uds_wp_posted_on(); ?></p>
	<?php
/*	if ( function_exists( 'yoast_breadcrumb' ) ) {
		echo '<div class="bg-white"><nav aria-label="breadcrumbs">';
		$breadcrumb_output = yoast_breadcrumb( '<ol class="breadcrumb">', '</ol>', false );
		echo preg_replace( '#</?span[^>]*>#is', '', $breadcrumb_output );
		echo '</div></nav>';
	}*/
	?>
	<?php the_title( '<h1 class="article entry-title">', '</h1>' ); ?>
</div>
</section>
