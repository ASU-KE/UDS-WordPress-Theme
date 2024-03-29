<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Get theme mods from the Customizer.
$image_404 = get_theme_mod( 'image_404' );
$page_type = get_theme_mod( '404_page_type' );
$custom_page_name = get_the_title( get_theme_mod( '404_page_id' ) );

get_header();

?>
<main id="skip-to-content" <?php post_class(); ?>>
		<?php
		// if we have chosen a custom page type.
		if ( 'custom' === $page_type ) {

			// get the 404 page name from the customizer.
			$not_found_page = get_page_by_title( $custom_page_name );

			// get the blocks for the 404 page.
			$blocks = parse_blocks( $not_found_page->post_content );

			// create a var for the markup.
			$content = '';

			// loop through block.
			foreach ( $blocks as $block ) {

				// render this block into the content.
				$content .= render_block( $block );

			}

			// output the 404 page content - the blocks!
			echo $content;

		} else {
			// If we have chosen 'default' from the customizer.
			?>
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
			<?php

		}
		?>


</main>
<?php
get_footer();
