<?php
/**
 * Single post partial template
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		if ( ! get_field( 'hide_page_title' ) ) {
			the_title( '<h1 class="entry-title">', '</h1>' );}
		?>

		<div class="entry-meta">

			<?php echo get_the_date( 'F d, Y' ); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->



	<div class="entry-content">

		<?php 
		the_content();
		$author_name = get_field( 'name' );
		$author_title = get_field( 'title' );
		$author_email = get_field( 'email' );
		$author_phone = get_field( 'phone' );
		if ( $author_name ) {
			echo '<h4><span class="highlight-gold">' . $author_name . '</span></h4>';
		}
		if ( $author_title ) {
			echo '<p>' . $author_title . '</p>';
		}
		if ( $author_email || $author_phone ) {
			echo '<p>';
			if ( $author_email ) {
				echo '<a href="mailto:' . $author_email . '"><i class="fas fa-envelope-square"></i> ' . $author_email . '</a>';
			}
			echo '</br>';
			if ( $author_phone ) {
				echo '<a href="tel:' . $author_phone . '"><i class="fas fa-phone-square"></i> ' . $author_phone . '</a>';
			}
			echo '</p>';
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
