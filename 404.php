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
$custom_page_id = get_theme_mod( '404_page_id' );

get_header();

?>
<main id="skip-to-content" <?php post_class(); ?>>
		<?php
		// if we have chosen a custom page type.
		if ( 'custom' === $page_type ) {

			$query = new WP_Query( array( 'page_id' => $custom_page_id ) );

			if ( $query->have_posts() ) {
				$query->the_post();
				$not_found_page = get_post();
				wp_reset_postdata();
			} else {
				$not_found_page = null;
			}

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
			if ($image_404) {
				?>
			<div class="uds-hero-md has-btn-row">
				<div class="hero-overlay"></div>
				<?php $image_404 = wp_kses( $image_404, wp_kses_allowed_html( 'post' ) ); ?>
				<img class="hero" src="<?php echo $image_404; ?>" alt="404 - Not Found" width="2560" height="512" loading="lazy" decoding="async" fetchpriority="high">
				<h1><span class="highlight-gold"><?php esc_html_e( '404 - Not Found', 'uds-wordpress-theme' ); ?></span></h1>
				<div class="content">
					<p class="text-white"><?php esc_html_e( 'It looks like nothing was found! Maybe try a search?', 'uds-wordpress-theme' ); ?></p>
				</div>
				<div class="btn-row">
						<div class="col col-lg-8 ">
							<form action="https://search.asu.edu/search" class="form-inline navbar-mobile-search" method="get" name="gs" mptid="2">
								<input aria-label="header-mid-search" class="form-control" name="q" placeholder="Search asu.edu" type="search" mptid="INPUT;name:gs;0">
								<input name="url_host" type="hidden" value="
								<?php
									$search_site_url = site_url();
									$search_site_url = preg_replace('#^https?://#i', '', $search_site_url);
									echo $search_site_url;
								?>">
								<input name="site" type="hidden" value="default_collection">
								<input name="sort" type="hidden" value="date:D:L:d1">
								<input name="output" type="hidden" value="xml_no_dtd">
								<input name="ie" type="hidden" value="UTF-8">
								<input name="oe" type="hidden" value="UTF-8">
								<input name="client" type="hidden" value="asu_frontend">
								<input name="proxystylesheet" type="hidden" value="asu_frontend">
							</form>
						</div><!-- .page-content -->
				</div>
			</div>
			<?php
			} else {
			?>
			<div class="bg network-white pb-5 pt-5">
				<div class="container">
					<div class="row">
						<div class="col col-lg-8">
							<h1 class="heading heading-one col-md-12">
								<span class="highlight highlight-gold highlight-heading-one">
									<?php esc_html_e( '404 - Not Found', 'uds-wordpress-theme' ); ?>
								</span>
							</h1>
						</div>
					</div>
					<div class="row">
						<div class="col col-lg-8 ">
							<h4><?php esc_html_e( 'It looks like nothing was found! Maybe try a search?', 'uds-wordpress-theme' ); ?></h4>
							<form action="https://search.asu.edu/search" class="form-inline navbar-mobile-search" method="get" name="gs" mptid="2">
								<input aria-label="header-mid-search" class="form-control" name="q" placeholder="Search asu.edu" type="search" mptid="INPUT;name:gs;0">
								<input name="url_host" type="hidden" value="
								<?php
									$search_site_url = site_url();
									$search_site_url = preg_replace('#^https?://#i', '', $search_site_url);
									echo $search_site_url;
								?>">
								<input name="site" type="hidden" value="default_collection">
								<input name="sort" type="hidden" value="date:D:L:d1">
								<input name="output" type="hidden" value="xml_no_dtd">
								<input name="ie" type="hidden" value="UTF-8">
								<input name="oe" type="hidden" value="UTF-8">
								<input name="client" type="hidden" value="asu_frontend">
								<input name="proxystylesheet" type="hidden" value="asu_frontend">
							</form>
						</div><!-- .page-content -->
					</div>
				</div>
			</div>
			<?php
			}
		}
		?>


</main>
<?php
get_footer();
