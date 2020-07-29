<?php

/**
 * The template for displaying the footer
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if ( is_array( get_option( 'asu_wp2020_theme_options' ) ) ) {
	$cOptions = get_option( 'asu_wp2020_theme_options' );
}
?>
<footer role="contentinfo">
	<div class="wrapper" id="wrapper-endorsed-footer">
		<div class="container" id="endorsed-footer">
			<div class="row">

				<div class="col-md" id="endorsed-logo">
					<?php
					//  =============================
					//  = Endorsed Logo                      =
					//  =============================
					// Do we have a Unit logo?
					$logo = '<img src="%1$s" alt="%2$s" />';

					// First, check for Preset Logo Selection
					if ( isset( $cOptions ) && array_key_exists( 'logo_select', $cOptions ) && $cOptions['logo_select'] !== 'none' ) {
						// load array of endorsed units
						$endorsedLogos = asu_wp2020_theme_get_endorsed_unit_logos();

						// lookup logo filename
						$filename = '';
						foreach ($endorsedLogos as $unit) {
							if ( $unit[ 'slug' ] ===  $cOptions['logo_select'] ) {
								$filename = $unit[ 'filename' ];
								break;
							}
						}
						echo wp_kses( sprintf( $logo, get_stylesheet_directory_uri() . '/img/endorsed-logo/' . $filename, get_bloginfo( 'name' ) . ' Logo', home_url( '/' ) ), wp_kses_allowed_html( 'post' ) );

						// Else, check for Logo URL
					} elseif ( isset( $cOptions ) && array_key_exists( 'logo_url', $cOptions ) && $cOptions['logo_url'] !== '' ) {
						echo wp_kses( sprintf( $logo, $cOptions['logo_url'], get_bloginfo( 'name' ) . ' Logo', home_url( '/' ) ), wp_kses_allowed_html( 'post' ) );

					}
					?>
				</div>



				<?php
									if 	( has_nav_menu( 'social_media' ) )  {

										wp_nav_menu(array(
											'theme_location'  => 'social_media',
											'container' => 'div',
											'container_class' => 'col-md',
											'container_id' => 'social-media',
											'menu_class'  => '',
											'items_wrap' => '<nav aria-label="Social Media" class="nav">%3$s</nav>',
											'walker'          => new Social_Media_Walker
										));

									}
								  	?>

			</div> <!-- row -->
		</div> <!-- endorsed-footer -->
	</div> <!-- wrapper-endorsed-footer -->

	<div class="wrapper" id="wrapper-footer-columns">
		<nav aria-label="Footer">
			<div class="container" id="footer-columns">
				<div class="row">


					<div class="col-xl" id="info-column">
						<?php
						//  =============================
						//  = Unit Name                 =
						//  =============================
						// $logo = '<a class="footer-logo-link" href="%3$s"><img class="footer-logo" src="%1$s" alt="%2$s"/></a><br>';
						$org_name = '<h5>%1$s</h5>';
						echo wp_kses( sprintf( $org_name, get_bloginfo( 'name' ) ), wp_kses_allowed_html( 'post' ) );
						?>
						<?php
						//  =============================
						//  = Contact Us Email or URL   =
						//  =============================
						$contactURL = '<p class="contact-link"><a href="%1$s%2$s%3$s" id="contact-us-link-in-footer">Contact Us</a></p>';

						// Do we have a contact?
						if ( isset( $cOptions ) &&
							array_key_exists( 'contact_email', $cOptions ) &&
							$cOptions['contact_email'] !== '' ) {
						$type       = '';
						$contactEmail    = $cOptions['contact_email'];
						$additional = '';

						if ( filter_var( $contactEmail, FILTER_VALIDATE_EMAIL ) ) {
							$type = 'mailto:';

							//  =============================
							//  = Contact Us Email Subject  =
							//  =============================

							// Do we have a subject line?
							if ( array_key_exists( 'contact_subject', $cOptions ) &&
								$cOptions['contact_subject'] !== '' ) {
							$additional .= '&subject=' . rawurlencode( $cOptions['contact_subject'] );
							}

							//  =============================
							//  = Contact Us Email Body     =
							//  =============================

							// Do we have a body?
							if ( array_key_exists( 'contact_body', $cOptions ) &&
								$cOptions['contact_body'] !== '' ) {
							$additional .= '&body=' . rawurlencode( $cOptions['contact_body'] );
							}

							// Fix the additional part
							if ( strlen( $additional ) > 0 ) {
							$additional = substr_replace( $additional, '?', 0, 1 );
							}
						}

						echo wp_kses( sprintf( $contactURL, $type, $contactEmail, $additional ), wp_kses_allowed_html( 'post' ) );
						}
						?>
						<?php
						//  =============================
						//  = Contribute Button         =
						//  =============================
						$contributeUrl = '<p class="contribute-button"><a href="%s" type="button" class="btn btn-gold">Contribute</a></p>';

						// Do we have a contribute?
						if ( isset( $cOptions ) &&
							array_key_exists( 'contribute_url', $cOptions ) &&
							$cOptions['contribute_url'] !== '' ) {
						echo wp_kses( sprintf( $contributeUrl, $cOptions['contribute_url'] ), wp_kses_allowed_html( 'post' ) );
						}
						?>
					</div>


<?php if ( is_active_sidebar( 'footeemenus' ) ) : ?>
							<?php dynamic_sidebar( 'footeemenus' ); ?>
							<?php //echo get_sidebar( 'footeemenus' ); ?>
							<?php  //the_widget('WP_Nav_Menu_Widget'); ?>
							<?php endif; ?>

							<?php
										/*		if 	( has_nav_menu( 'footer' ) )  {

													wp_nav_menu(array(
														'theme_location'  => 'footer',
														'container' => '',
														'container_class' => '',
														'container_id' => '',
														'menu_class'  => '',
														'items_wrap' => '<div id="%1$s" class="collapse card-body" aria-labelledby="header-%1$s">%3$s</div>',
														'walker'          => new Footer_Walker
													));

												}*/
											  	?>



					<div class="col-xl flex-footer">
						<div class="card card-foldable desktop-disable-xl">
							<div class="card-header">
								<h5>
									<a id="footlink-header-three" class="collapsed" data-toggle="collapse" href="#footlink-three" role="button" aria-expanded="false" aria-controls="footlink-three">Student Information
										<span class="fas fa-chevron-up"></span>
									</a>
								</h5>
							</div>
							<div id="footlink-three" class="collapse card-body" aria-labelledby="footlink-header-three">
								<a class="nav-link" href="#" title="link">Student Organization</a>
								<a class="nav-link" href="#" title="link">Inner Circle Newsletter</a>
								<a class="nav-link" href="#" title="link">For Your Parents</a>
								<a class="nav-link" href="#" title="link">Visit Campus</a>
								<a class="nav-link" href="#" title="link">K-12 Outreach</a>
								<a class="nav-link" href="#" title="link">Hire Our Graduates</a>
								<a class="nav-link" href="#" title="link">Hire an Intern</a>
							</div>
						</div>
					</div>

					<div class="col-xl flex-footer">
						<div class="card card-foldable desktop-disable-xl">
							<div class="card-header">
								<h5>
									<a id="footlink-header-four" class="collapsed" data-toggle="collapse" href="#footlink-four" role="button" aria-expanded="false" aria-controls="footlink-four">Column Number Four
										<span class="fas fa-chevron-up"></span>
									</a>
								</h5>
							</div>
							<div id="footlink-four" class="collapse card-body" aria-labelledby="footlink-header-four">
								<a class="nav-link" href="#" title="link">Student Organization</a>
								<a class="nav-link" href="#" title="link">Inner Circle Newsletter</a>
								<a class="nav-link" href="#" title="link">For Your Parents</a>
								<a class="nav-link" href="#" title="link">Visit Campus</a>
								<a class="nav-link" href="#" title="link">K-12 Outreach</a>
								<a class="nav-link" href="#" title="link">Hire Our Graduates</a>
								<a class="nav-link" href="#" title="link">Hire an Intern</a>
							</div>
						</div>
					</div>

					<div class="col-xl flex-footer">
						<div class="card card-foldable desktop-disable-xl">
							<div class="card-header">
								<h5>
									<a id="footlink-header-five" class="collapsed" data-toggle="collapse" href="#footlink-five" role="button" aria-expanded="false" aria-controls="footlink-five">Mambo Number Five
										<span class="fas fa-chevron-up"></span>
									</a>
								</h5>
							</div>
							<div id="footlink-five" class="collapse card-body" aria-labelledby="footlink-header-five">
								<a class="nav-link" href="#" title="link">Student Organization</a>
								<a class="nav-link" href="#" title="link">Inner Circle Newsletter</a>
								<a class="nav-link" href="#" title="link">For Your Parents</a>
								<a class="nav-link" href="#" title="link">Visit Campus</a>
								<a class="nav-link" href="#" title="link">K-12 Outreach</a>
								<a class="nav-link" href="#" title="link">Hire Our Graduates</a>
								<a class="nav-link" href="#" title="link">Hire an Intern</a>
							</div>
						</div>
					</div>

					<div class="col-xl flex-footer">
						<div class="card card-foldable desktop-disable-xl">
							<div class="card-header">
								<h5>
									<a id="footlink-header-six" class="collapsed" data-toggle="collapse" href="#footlink-six" role="button" aria-expanded="false" aria-controls="footlink-six">The Zen Master and the Hot Dog Vendor
										<span class="fas fa-chevron-up"></span>
									</a>
								</h5>
							</div>
							<div id="footlink-six" class="collapse card-body" aria-labelledby="footlink-header-six">
								<a class="nav-link" href="#" title="link">A Zen master</a>
								<a class="nav-link" href="#" title="link">Visiting New York City</a>
								<a class="nav-link" href="#" title="link">Walks up to</a>
								<a class="nav-link" href="#" title="link">A hot dog vendor and says</a>
								<a class="nav-link" href="#" title="link">Make me one with everything</a>
							</div>
						</div>
					</div>

				</div> <!-- row -->
			</div> <!-- footer-columns -->
		</nav>
	</div> <!-- wrapper-footer-columns -->

	<div class="wrapper" id="wrapper-footer-innovation">
		<div class="container" id="footer-innovation">
			<div class="row">
				<div class="col">
					<div class="d-flex footer-innovation-links">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/innovation-lockup/on-gold/200420-GlobalFooter-No1InnovationLockup.png" alt="Number one in the U.S. for innovation. #1 ASU, #2 Stanford, #3 MIT. - U.S. News and World Report, 5 years, 2016-2020">
						<nav class="nav" aria-label="University Services">
							<a class="nav-link" href="https://www.asu.edu/map/">Maps and Locations</a>
							<a class="nav-link" href="https://www.asu.edu/asujobs">Jobs</a>
							<a class="nav-link" href="https://isearch.asu.edu/">Directory</a>
							<a class="nav-link" href="https://www.asu.edu/contactasu/">Contact ASU</a>
							<a class="nav-link" href="https://my.asu.edu/">My ASU</a>
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
						<a class="nav-link" href="https://www.asu.edu/copyright/">Copyright and Trademark</a>
						<a class="nav-link" href="https://www.asu.edu/accessibility/">Accessibility</a>
						<a class="nav-link" href="https://www.asu.edu/privacy/">Privacy</a>
						<a class="nav-link" href="https://www.asu.edu/tou/">Terms of Use</a>
						<a class="nav-link" href="https://www.asu.edu/emergency/">Emergency</a>
					</nav>
				</div>
			</div>
		</div>
	</div> <!-- wrapper-footer-colophon -->
</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
