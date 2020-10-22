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

<div class="wrapper" id="search-wrapper">

	<div class="<?php echo $container_classes; ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Check for the left sidebar and open the primary div -->
			<?php get_template_part( 'templates-global/left-sidebar-check' ); ?>

			<div class="<?php echo $content_classes; ?>">

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">

							<h1 class="page-title">
								<?php
								printf(
									/* translators: %s: query term */
									esc_html__( 'Search Results for: %s', 'uds-wordpress-theme' ),
									'<span>' . get_search_query() . '</span>'
								);
								?>
							</h1>

					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php
					while ( have_posts() ) :
						the_post();

						/*
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'templates-loop/content', 'search' );
					endwhile;
					?>

				<?php else : ?>

					<?php get_template_part( 'templates-loop/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php uds_wp_pagination(); ?>
		</div>
			<!-- Check for the right sidebar -->
			<?php get_template_part( 'templates-global/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #search-wrapper -->

<?php
get_footer();
