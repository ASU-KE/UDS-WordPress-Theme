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
						<a
							class="img-link"
							href="https://www.asu.edu/rankings"
							data-ga-footer-type="internal link"
							data-ga-footer-section="secondary footer"
							data-ga-footer="#1 in the u.s. for innovation"
						>
							<img src="<?php echo get_template_directory_uri(); ?>/dist/img/innovation-lockup/on-gold/footer-rank.png" alt="ASU is number one in the U.S. for innovation.">
						</a>
						<nav class="nav" aria-label="University Services">
							<a class="nav-link" href="https://www.asu.edu/about/locations-maps" data-ga-footer-type="internal link" data-ga-footer-section="secondary footer" data-ga-footer="Maps and Locations">Maps and Locations</a>
							<a class="nav-link" href="https://cfo.asu.edu/applicant" data-ga-footer-type="internal link" data-ga-footer-section="secondary footer" data-ga-footer="Jobs">Jobs</a>
							<a class="nav-link" href="https://search.asu.edu/?search-tabs=web_dir_faculty_staff" data-ga-footer-type="internal link" data-ga-footer-section="secondary footer" data-ga-footer="Directory">Directory</a>
							<a class="nav-link" href="https://www.asu.edu/about/contact" data-ga-footer-type="internal link" data-ga-footer-section="secondary footer" data-ga-footer="Contact ASU">Contact ASU</a>
							<a class="nav-link" href="https://my.asu.edu" data-ga-footer-type="internal link" data-ga-footer-section="secondary footer" data-ga-footer="My ASU">My ASU</a>
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

<div id="cookieConsentContainer"></div>
</body>

</html>
