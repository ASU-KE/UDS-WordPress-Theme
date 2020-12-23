<?php

/**
 * Render functions for use in templates and the customizer
 */


/**
 * Render parent unit name and link
 */
function uds_wp_render_parent_unit_name () {
	$parent_unit_name = get_theme_mod( 'parent_unit_name' );
	$parent_unit_link = get_theme_mod( 'parent_unit_link' );

	if( $parent_unit_name && !empty( $parent_unit_name ) ) {
		echo '<a class="unit-name" href="' . $parent_unit_link . '">' . $parent_unit_name . '</a>';
	}
}

/**
 * Render site name
 */
function uds_wp_render_subdomain_name() {
	echo '<span class="subdomain-name">' . get_bloginfo( 'name' ) . '</span>';
}

/**
 * Render Footer Logo
 */
function uds_wp_render_footer_logo() {
	$logo_select = get_theme_mod( 'logo_select' );
	$logo_url = get_theme_mod( 'logo_url' );
	$logo_template = '<img src="%1$s" alt="%2$s" />';

	// First, check for Preset Logo Selection.
	if ( $logo_select && 'none' !== $logo_select ) {
		// load array of endorsed units.
		$endorsed_logos = uds_wp_theme_get_endorsed_unit_logos();

		// lookup logo filename.
		$filename = '';
		foreach ( $endorsed_logos as $unit ) {
			if ( $unit['slug'] === $logo_select ) {
				$filename = $unit['filename'];
				break;
			}
		}
		echo wp_kses( sprintf( $logo_template, get_template_directory_uri() . '/img/endorsed-logo/' . $filename, get_bloginfo( 'name' ) . ' Logo', home_url( '/' ) ), wp_kses_allowed_html( 'post' ) );

	// Else, check for Logo URL.
	} elseif ( $logo_url && '' !== $logo_url ) {
		echo wp_kses( sprintf( $logo_template, $logo_url, get_bloginfo( 'name' ) . ' Logo', home_url( '/' ) ), wp_kses_allowed_html( 'post' ) );
	}
}

/**
 * Render the 'Contribute' button
 */
function uds_wp_render_contribute_button() {

	$show_button = get_theme_mod( 'show_contribute_button' );
	$contribute_url = get_theme_mod( 'contribute_url' );
	$contribute_template = '<p class="contribute-button"><a href="%s" type="button" class="btn btn-gold">Contribute</a></p>';

	// Do we have a contribute?
	if ( $show_button && $contribute_url && '' !== $contribute_url ) {
		echo wp_kses( sprintf( $contribute_template, $contribute_url ), wp_kses_allowed_html( 'post' ) );
	}
}

/**
 * Render Footer branding row (logo and social media icons together)
 */
function uds_wp_render_footer_branding_row() {
	$row_status = get_theme_mod( 'footer_row_branding' );

	if ( 'enabled' === $row_status ) {
		?>
		<div class="container" id="endorsed-footer">
			<div class="row">

				<div class="col-md" id="endorsed-logo">
					<?php uds_wp_render_footer_logo(); ?>
				</div>

				<div class="col-md" id="social-media">
					<div class="social-media-wrapper">
						<?php
						if ( has_nav_menu( 'social-media' ) ) {
							wp_nav_menu(
								array(
									'theme_location'  => 'social-media',
									// 'container' => 'div',
									// 'container_class' => 'col-md',
									// 'container_id' => 'social-media',
									'menu_class'  => '',
									'items_wrap' => '<nav aria-label="Social Media" class="nav">%3$s</nav>',
									'walker' => new WP_Social_Media_Walker(),
								)
							);
						}
						?>
					</div>
				</div>
			</div> <!-- row -->
		</div> <!-- endorsed-footer -->
		<?php
	}
}

/**
 * Render 'Contact Us' link in the footer
 */
function uds_wp_render_contact_link() {
// =============================
	$contact_url = get_theme_mod( 'contact_email' );
	$contact_template = '<p class="contact-link"><a href="%1$s">Contact Us</a></p>';

	if ( $contact_url && '' !== $contact_url ) {
		echo wp_kses( sprintf( $contact_template, $contact_url ), wp_kses_allowed_html( 'post' ) );
	}
}


/**
 * Render 'action' and menu row in footer
 */
function uds_wp_render_footer_action_row() {
	$action_row_status = get_theme_mod( 'footer_row_actions' );
	$org_name = wp_kses( get_bloginfo( 'name' ), array() );

	if ( 'enabled' === $action_row_status ) {
	?>
		<nav aria-label="Footer">
			<div class="container" id="footer-columns">
				<div class="row">

					<div class="col-xl-3" id="info-column">
						<h5><?php echo $org_name; ?></h5>
						<div class="contact-wrapper">
							<?php uds_wp_render_contact_link(); ?>
						</div>

						<div class="contribute-wrapper">
							<?php uds_wp_render_contribute_button(); ?>
						</div>
					</div>
					<?php include get_template_directory() . '/asu-footer-menu.php'; ?>
				</div> <!-- row -->
			</div> <!-- footer-columns -->
		</nav>
<?php }
}
