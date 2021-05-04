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

		get_template_part( 'templates-global/story-hero' );

		?>

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

			<?php
			// echo get_the_post_thumbnail( $post->ID, 'large' );
			the_content();

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
