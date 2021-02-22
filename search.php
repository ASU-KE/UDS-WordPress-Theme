<?php
/**
 * The template for displaying search results pages
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="skip-to-content" <?php post_class('container'); ?>>

	<div class="row">
		<div class="col">

			<?php
			if ( have_posts() ) {

				?>
				<h1 class="page-title">
					<?php
					printf(
						/* translators: %s: query term */
						esc_html__( 'Search Results for: %s', 'uds-wordpress-theme' ),
						'<span>' . get_search_query() . '</span>'
					);
					?>
				</h1>

				<?php
				// Start the loop.
				while ( have_posts() ) {
					the_post();
					get_template_part( 'templates-loop/content', 'search' );
				}
			} else {
				get_template_part( 'templates-loop/content', 'none' );
			}
			?>

		</div>
	</div>

	<div class="row">
		<div class="col">
			<!-- The pagination component -->
			<?php uds_wp_pagination(); ?>
		</div>
	</div>

</main><!-- #main -->

<?php
get_footer();

