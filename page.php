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
 * @package uds-wordpress
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="page-wrapper">

	<?php include get_template_directory() . '/hero.php'; ?>

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<?php
			get_template_part( 'templates-sidebar/sidebar', 'left' );

			if ( is_active_sidebar( 'sidebar-left' ) xor is_active_sidebar( 'sidebar-right' ) ) {
				$class = 'col-md-8';  // Sidebar + Main: col-md-12 - col-md-4 = col-md-8
			} elseif ( is_active_sidebar( 'sidebar-left' ) && is_active_sidebar( 'sidebar-right' ) ) {
				$class = 'col-md-6';  // 2 Sidebars + Main: col-md-12 - col-md-3 - col-md-3 = col-md-6
			} else {
				$class = 'col-md-12';
			}
			?>

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

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'templates-global/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
