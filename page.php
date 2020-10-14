<?php
/**
 * Default Layout - Fixed Width
 *
 * Template for displaying a fixed-width page with sidebars,
 * if sidebars are enabled in the Customizer.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="page-wrapper">

	<?php include get_template_directory() . '/hero.php'; ?>


	<div class="<?php echo $container_classes;?>" id="content" tabindex="-1">
    <div class="row">

			<!-- Check for the left sidebar and open the primary div -->
			<?php get_template_part( 'templates-global/left-sidebar-check' ); ?>


		<div class="<?php echo $content_classes;?>">

			<div class="<?php echo $class; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> content-area" id="primary">

				<main class="site-main" id="main">

					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'templates-loop/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>

				</main><!-- #main -->

			</div><!-- #primary -->


		</div>

		<!-- Check for the right sidebar -->
		<?php get_template_part( 'templates-global/right-sidebar-check' ); ?>



	</div><!-- .row -->

</div><!-- #content -->
</div><!-- #page-wrapper -->

<?php
get_footer();
