<?php
/**
 * The template for displaying the author pages
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package uds-wordpress
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="author-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<!-- Check for the left sidebar and open the primary div -->
			<?php get_template_part( 'templates-global/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<header class="page-header author-header">

					<?php
					if ( get_query_var( 'author_name' ) ) {
						$curauth = get_user_by( 'slug', get_query_var( 'author_name' ) );
					} else {
						$curauth = get_userdata( intval( $author ) );
					}
					?>

					<h1><?php echo esc_html__( 'About:', 'uds-wordpress' ) . ' ' . esc_html( $curauth->nickname ); ?></h1>

					<?php
					if ( ! empty( $curauth->ID ) ) {
						echo get_avatar( $curauth->ID );
					}
					?>

					<?php if ( ! empty( $curauth->user_url ) || ! empty( $curauth->user_description ) ) : ?>
						<dl>
							<?php if ( ! empty( $curauth->user_url ) ) : ?>
								<dt><?php esc_html_e( 'Website', 'uds-wordpress' ); ?></dt>
								<dd>
									<a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a>
								</dd>
							<?php endif; ?>

							<?php if ( ! empty( $curauth->user_description ) ) : ?>
								<dt><?php esc_html_e( 'Profile', 'uds-wordpress' ); ?></dt>
								<dd><?php echo esc_html( $curauth->user_description ); ?></dd>
							<?php endif; ?>
						</dl>
					<?php endif; ?>

					<h2><?php echo esc_html__( 'Posts by', 'uds-wordpress' ) . ' ' . esc_html( $curauth->nickname ); ?>:</h2>

				</header><!-- .page-header -->
					<!-- The Loop -->
					<?php
					if ( have_posts() ) {
						echo '<ul>';
						while ( have_posts() ) {
							the_post();
							echo '<li>';
								printf(
									'<a rel="bookmark" href="%1$s" title="%2$s %3$s">%3$s</a>',
									esc_url( apply_filters( 'the_permalink', get_permalink( $post ), $post ) ),
									esc_attr( __( 'Permanent Link:', 'uds-wordpress' ) ),
									get_the_title()
								);
								uds_wp_posted_on();
								esc_html_e( 'in', 'uds-wordpress' );
								the_category( '&' );
							echo '</li>';
						}
						echo '</ul>';
					} else {
						get_template_part( 'templates-loop/content', 'none' );
					}
					?>
					<!-- End Loop -->

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php uds_wp_pagination(); ?>

			<!-- Check for the right sidebar -->
			<?php get_template_part( 'templates-global/right-sidebar-check' ); ?>

		</div> <!-- .row -->

	</div><!-- #content -->

</div><!-- #author-wrapper -->

<?php
get_footer();
