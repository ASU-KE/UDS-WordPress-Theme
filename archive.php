<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo $container_classes; ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Check for the left sidebar and open the primary div -->
			<?php get_template_part( 'templates-global/left-sidebar-check' ); ?>

			<div class="<?php echo $content_classes; ?>">

			<main class="site-main" id="main">

				<?php
				if ( have_posts() ) {
					?>
					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					<?php
					// Start the loop.
					while ( have_posts() ) {
						the_post();

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

			</main><!-- #main -->

			<?php
			// Display the pagination component.
			uds_wp_pagination();
			?>
</div>
	  <?php
			// Check for the right sidebar.
			get_template_part( 'templates-global/right-sidebar-check' );
		?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
