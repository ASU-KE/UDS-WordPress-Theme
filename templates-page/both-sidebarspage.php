<?php
/**
 * Template Name: Left and Right Sidebar Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

// TODO: Custom Hero function
?>

<div class="wrapper" id="page-wrapper">

	<div class="container" id="content">

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

				<main class="site-main" id="main" role="main">

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

			<?php get_template_part( 'templates-sidebar/sidebar', 'right' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
