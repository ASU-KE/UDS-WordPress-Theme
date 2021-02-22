<?php
/**
 * The template for displaying all single posts.
 *
 * This template includes an intrinsic Bootstrap container to make the process of
 * content creation easier for the post author. To escape from the original container
 * and layout other parts of the page, consider inserting a custom HTML block to deliver the closing <div>'s.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="skip-to-content">

	<?php

	while ( have_posts() ) {

		the_post();

		// Remove support for the global hero template part. Intended for pages, primarily.
		// get_template_part( 'templates-global/hero' ); .

		get_template_part( 'templates-global/global-banner' );

		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="col">';

		get_template_part( 'templates-loop/content', 'single' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

		echo '</div>';
		echo '</div>';
		echo '</div>';

	}
	?>

</main><!-- #main -->

<?php
get_footer();
