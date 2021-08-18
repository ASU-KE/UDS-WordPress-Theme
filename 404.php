<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$image_404 = get_theme_mod( 'image_404' );

get_header();
?>
<main id="skip-to-content" <?php post_class(); ?>>
	<div class="wrapper" id="404-wrapper">
		<div class="v1-uds-hero uds-hero-lg hero-image">
			<?php $image_404 = wp_kses( $image_404, wp_kses_allowed_html( 'post' ) ); ?>
			<img src="<?php echo $image_404; ?>" alt="404 - Not Found" />
			<div class="container v1-uds-hero-container">
				<div class="container px-0 error-404 not-found">
					<div class="row">
						<div class="col col-lg-8">
							<h1 class="heading heading-one col-md-12 px-0">
								<span class="highlight highlight-gold highlight-heading-one">
									<?php esc_html_e( '404 - Not Found', 'uds-wordpress-theme' ); ?>
								</span>
							</h1>
						</div>
					</div>
					<div class="row">
						<div class="v1-uds-hero-text col col-lg-8 ">
							<p><?php esc_html_e( 'It looks like nothing was found! Maybe try a search?', 'uds-wordpress-theme' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .page-content -->
					</div>
				</div>
			</div>
		</div>
	</div><!-- #error-404-wrapper -->
</main>
<?php
get_footer();
