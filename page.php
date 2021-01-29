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
?>

	<main id="skip-to-content" <?php post_class(); ?>>

		<?php

		while ( have_posts() ) {

			the_post();

			get_template_part( 'templates-global/hero' );

			get_template_part( 'templates-global/global-banner' );

			the_content();

			// Display the edit post button to logged in users.
			echo '<footer class="entry-footer"><div class="container mb-2"><div class="row"><div class="col-md-12">';
			edit_post_link( __( 'Edit', 'uds-wordpress-theme' ), '<span class="edit-link">', '</span>' );
			echo '</div></div></div></footer><!-- end .entry-footer -->';
		}

		?>

	</main><!-- #main -->

<?php
get_footer();
