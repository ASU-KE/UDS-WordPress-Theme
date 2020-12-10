<?php
/**
 *
 * Displays all content within a dedicated col-8 area. Intended to be compatible with most native WP blocks.
 * Includes options for where to draw the sidebar's content and in what position to place the sidebar.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) {
	the_post();

	// First action: Read post meta to determine if page is left-sidebar or right.
	// Append that info to post_class below.

	$sidebar_position = get_field( 'page_sidebar_position' );
	if ( 'left' === $sidebar_position ) {
		$sidebar_position_class = 'sidebar-left';
	} else {
		$sidebar_position_class = '';
	}
	?>

	<main id="skip-to-content" <?php post_class( $sidebar_position_class ); ?>>

		<?php get_template_part( 'templates-global/hero'); ?>

		<?php get_template_part( 'templates-global/global-banner'); ?>

		<article class="container">
			<div class="row">
				<div class="col-md-8" id="primary">

					<?php the_content(); ?>

				</div>

				<aside class="col-md-4 widget-area" id="secondary">

					<?php dynamic_sidebar( 'sidebar' ); ?>

				</aside><!-- #secondary -->

			</div>
		</article>

		<?php

		// Display the edit post button to logged in users.
		echo '<footer class="entry-footer"><div class="container mb-2"><div class="row"><div class="col-md-12">';
		edit_post_link( __( 'Edit', 'uds-wordpress-theme' ), '<span class="edit-link">', '</span>' );
		echo '</div></div></div></footer><!-- end .entry-footer -->';

		?>

	</main><!-- #main -->

	<?php

	}

get_footer();
