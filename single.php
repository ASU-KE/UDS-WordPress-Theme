<?php
/**
 * The template for displaying all single posts.
 *
 * This template includes an intrinsic Bootstrap container to make the process of
 * content creation easier for the post author. To escape from the original container
 * and layout other parts of the page, consider inserting a custom HTML block to deliver the closing <div>'s.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="skip-to-content">

	<?php

	while ( have_posts() ) {

		the_post();

		get_template_part( 'templates-global/global-banner' );
		get_template_part( 'templates-global/story-hero' );

		?>

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

			<?php
			// TODO: Identify how we will add and control the social media "intent to repost" icons. Sample markup follows.

			// <header class="entry-header">
			// <div class="row" id="social-media">
			// <nav class="nav flaot-left" aria-label="Social Media">
			// <a class="nav-link text-maroon" href="#"><span title="Facebook" class="fab fa-facebook-square"></span></a>
			// <a class="nav-link text-maroon" href="#"><span title="Twitter" class="fab fa-twitter-square"></span></a>
			// <a class="nav-link text-maroon" href="#"><span title="LinkedIn" class="fab fa-linkedin"></span></a>
			// </ul>
			// </div>

			the_content();

			$author_name = get_field( 'name' );
			$author_title = get_field( 'title' );
			$author_email = get_field( 'email' );
			$author_phone = get_field( 'phone' );
			if ( $author_name || $author_title || $author_email || $author_phone ) {
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
						echo '<span class="fas fa-envelope-square"></span><a href="mailto:' . $author_email . '">' . $author_email . '</a>';
					}
					echo '</br>';
					if ( $author_phone ) {
						echo '<span class="fas fa-phone-square"></span><a href="tel:' . $author_phone . '">' . $author_phone . '</a>';
					}
					echo '</p>';
				}
				echo '</div>';
			}


			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'uds-wordpress-theme' ),
					'after'  => '</div>',
				)
			);

			?>

			<footer class="entry-footer">

				<?php uds_wp_entry_footer(); ?>

			</footer><!-- .entry-footer -->

		</article><!-- #post-## -->

		<?php
	}

	echo '</main><!-- #main -->';

	get_footer();
