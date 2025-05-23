<?php
/**
 * The template for displaying the footer
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php do_action( 'uds_wp_before_global_footer' ); ?>

<footer id="asu-footer">

	<div class="wrapper" id="wrapper-endorsed-footer">
		<?php uds_wp_render_footer_branding_row(); ?>
	</div> <!-- wrapper-endorsed-footer -->

	<?php do_action( 'uds_wp_before_global_footer_columns' ); ?>

	<div class="wrapper" id="wrapper-footer-columns">
		<?php uds_wp_render_footer_action_row(); ?>
	</div>

	<div class="wrapper" id="wrapper-footer-innovation">
		<div class="container" id="footer-innovation">
			<div class="row">
				<div class="col">
					<div class="d-flex footer-innovation-links">
						<a class="img-link" href="https://www.asu.edu/rankings">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/img/innovation-lockup/on-gold/footer-rank.png" alt="Repeatedly ranked #1, 20+ lists in the last 3 years">
					</a>
						<nav class="nav" aria-label="University Services">
							<a class="nav-link" href="https://www.asu.edu/about/locations-maps">Maps and Locations</a>
							<a class="nav-link" href="https://cfo.asu.edu/applicant">Jobs</a>
							<a class="nav-link" href="https://search.asu.edu/?search-tabs=web_dir_faculty_staff">Directory</a>
							<a class="nav-link" href="https://www.asu.edu/about/contact">Contact ASU</a>
							<a class="nav-link" href="https://my.asu.edu">My ASU</a>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- wrapper-footer-innovation -->

	<div class="wrapper" id="wrapper-footer-colophon">
		<div class="container" id="footer-colophon">
			<div class="row">
				<div class="col">
					<nav class="nav colophon" aria-label="University Legal and Compliance">
						<a class="nav-link" href="https://www.asu.edu/about/copyright-trademark">Copyright and Trademark</a>
						<a class="nav-link" href="https://accessibility.asu.edu/report">Accessibility</a>
						<a class="nav-link" href="https://www.asu.edu/about/privacy">Privacy</a>
						<a class="nav-link" href="https://www.asu.edu/about/terms-of-use">Terms of Use</a>
						<a class="nav-link" href="https://asu.edu/emergency/">Emergency</a>
					</nav>
				</div>
			</div>
		</div>
	</div> <!-- wrapper-footer-colophon -->
</footer>

<?php wp_footer(); ?>

</body>

</html>
