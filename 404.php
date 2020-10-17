<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @package uds-wordpress-theme-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$image_404 = '';

if ( is_array( get_option( 'uds_wp_theme_options' ) ) ) {
	$cOptions = get_option( 'uds_wp_theme_options' );

	// Do we have a 404 image?
	if ( ! empty( $cOptions['image_404'] ) ) {
		$image_404 = $cOptions['image_404'];
	}
}

get_header();
?>

<div class="wrapper" id="404-wrapper">

	<div class="uds-hero uds-hero-lg" style="background-image: linear-gradient(180deg, #19191900 0%, #191919c9 100%), url('<?php echo wp_kses( $image_404, wp_kses_allowed_html( 'post' ) ); ?>'); width: 100vw; margin-left: calc(50% - 50vw); max-width: 100vw !important;">

		<div class="container uds-hero-container" id="content" tabindex="-1">

			<div class="row">

				<div class="col-md-12 content-area" id="primary">

					<main class="site-main" id="main">

						<section class="error-404 not-found">

							<header class="page-header">

								<h1 class="heading heading-one col-md-12">
									<span class="highlight highlight-gold highlight-heading-one"><?php esc_html_e( '404 - Not Found', 'uds-wordpress-theme' ); ?></span>
								</h1>

							</header><!-- .page-header -->

							<div class="page-content uds-hero-text">

								<p><?php esc_html_e( 'It looks like nothing was found! Maybe try a search?', 'uds-wordpress-theme' ); ?></p>

								<?php get_search_form(); ?>

							</div><!-- .page-content -->

						</section><!-- .error-404 -->

					</main><!-- #main -->

				</div><!-- #primary -->

			</div><!-- .row -->

		</div><!-- #content -->

	</div>

</div><!-- #error-404-wrapper -->

<?php
get_footer();
