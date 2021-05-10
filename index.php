<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>


	<main id="skip-to-content" <?php post_class(); ?>>
		<div class="container py-6">
			<div class="row">
		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {

				the_post();

				get_template_part( 'templates-global/global-banner' );

				/*
				* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/

				get_template_part( 'templates-loop/content', get_post_format() );

			}
		} else {
			get_template_part( 'templates-loop/content', 'none' );
		}

		?>
	</div>
	</div>
	</main><!-- #main -->


<?php
get_footer();
