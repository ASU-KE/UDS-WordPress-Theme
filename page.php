<?php
/**
 * The default template in use by all pages within the UDS-WordPress theme.
 *
 * All content is expected to be wrapped by ASU Bootstrap container and row blocks,
 * both of which are included with the theme.
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

			// Check for v1 Hero option. Load page template if option enabled.
			// Keeps the layout of the deprecated field group in tact - above the global banner.
			if ( get_field( 'uds-depreciation-panel-v1-hero', 'options' ) ) {
				get_template_part( 'templates-depreciated/hero' );
			}

			get_template_part( 'templates-global/global-banner' );

			the_content();

			// Display the edit post button to logged in users.
			echo '<footer class="entry-footer"><div class="container"><div class="row"><div class="col-md-12">';
			edit_post_link( __( 'Edit', 'uds-wordpress-theme' ), '<span class="edit-link">', '</span>' );
			echo '</div></div></div></footer><!-- end .entry-footer -->';
		}

		?>

	</main><!-- #main -->

<?php
get_footer();
