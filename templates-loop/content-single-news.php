<?php
/**
 * Single post partial template
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

	<?php
if ( function_exists('yoast_breadcrumb') ) {
	echo '<div class="bg-white"><nav aria-label="breadcrumbs">';
  $breadcrumb_output=yoast_breadcrumb( '<ol class="breadcrumb">','</ol>', false );
	echo preg_replace('#</?span[^>]*>#is', '', $breadcrumb_output);
	echo '</div></nav>';
}
?>

		<?php
		if ( ! get_field( 'hide_page_title' ) ) {
			the_title( '<h1 class="entry-title">', '</h1>' );}
		?>


		<div class="row" id="social-media">
			<nav class="nav flaot-left" aria-label="Social Media">
				<a class="nav-link text-maroon" href="#"><span title="Facebook" class="fab fa-facebook-square"></span></a>
				<a class="nav-link text-maroon" href="#"><span title="Twitter" class="fab fa-twitter-square"></span></a>
				<a class="nav-link text-maroon" href="#"><span title="LinkedIn" class="fab fa-linkedin"></span></a>
			</ul>
		</div>



		<div class="entry-meta">

			<p><?php echo get_the_date( 'F d, Y' ); ?></p>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->



	<div class="entry-content">

		<?php
		the_content();

		$author_name = get_field( 'name' );
		$author_title = get_field( 'title' );
		$author_email = get_field( 'email' );
		$author_phone = get_field( 'phone' );
		if ( $author_name|| $author_title|| $author_email || $author_phone ){
		echo '<div class="author_info">';
		if ( $author_name ) {
			echo '<h4><span class="highlight-gold">' . $author_name . '</span></h4>';
		}
		if ( $author_title ) {
			echo '<p>' . $author_title . '</p>';
		}
		if ( $author_email || $author_phone ) {
			echo '<p>';
			if ( $author_email ) {
				echo '<a href="mailto:' . $author_email . '"><i class="fas fa-envelope-square"></i>' . $author_email . '</a>';
			}
			echo '</br>';
			if ( $author_phone ) {
				echo '<a href="tel:' . $author_phone . '"><i class="fas fa-phone-square"></i>' . $author_phone . '</a>';
			}
			echo '</p>';
		}
		echo '</div>';
	}
		?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'uds-wordpress-theme' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php uds_wp_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
