<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$cOptions              = [];
$asu_hub_analytics     = 'disabled';
$site_gtm_container_id = '';
$site_ga_tracking_id   = '';
$hotjar_site_id        = '';
$nav_menu_enabled	   = '';

// Check if we have Customizer options set
if (is_array(get_option('asu_wp2020_theme_options'))) {
	$cOptions = get_option('asu_wp2020_theme_options');
}

// Is navigation menu enabled?
if (!empty($cOptions['header_navigation_menu'])) {
	$nav_menu_enabled = $cOptions['header_navigation_menu'];
}

// Do we have an asu_hub_analytics setting?
if (!empty($cOptions['asu_hub_analytics'])) {
	$asu_hub_analytics = $cOptions['asu_hub_analytics'];
}
// Do we have a site_gtm_container_id setting?
if (!empty($cOptions['site_gtm_container_id'])) {
	$site_gtm_container_id = $cOptions['site_gtm_container_id'];
}
// Do we have a site_ga_tracking_id setting?
if (!empty($cOptions['site_ga_tracking_id'])) {
	$site_ga_tracking_id = $cOptions['site_ga_tracking_id'];
}
// Do we have an hotjar_site_id setting?
if (!empty($cOptions['hotjar_site_id'])) {
	$hotjar_site_id = $cOptions['hotjar_site_id'];
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<?php if (is_user_logged_in() && !is_customize_preview()) :
		// shift page content below the WP Admin toolbar
	?>
		<style type="text/css" media="screen">
			#asu-header.fixed-top {
				top: 32px !important;
			}

			#wpadminbar {
				z-index: 999999 !important;
			}
		</style>
	<?php endif;

	// ASU Hub Analytics
	if (!empty($asu_hub_analytics) && $asu_hub_analytics === 'enabled') {
		include get_template_directory() . '/inc/analytics/asu-hub-analytics-tracking-code.php';
	}

	// Site Google Tag Manager
	if (!empty($site_gtm_container_id)) {
		include get_template_directory() . '/inc/analytics/google-tag-manager-tracking-code.php';
	}

	// Site Google Analytics
	if (!empty($site_ga_tracking_id)) {
		include get_template_directory() . '/inc/analytics/google-analytics-tracking-code.php';
	}

	// Hotjar Analytics
	if (!empty($hotjar_site_id)) {
		include get_template_directory() . '/inc/analytics/hotjar-tracking-code.php';
	}
	?>
</head>

<body <?php body_class(); ?> <?php asu_wp2020_body_attributes(); ?>>
	<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'asu-web-standards'); ?></a>
	<?php do_action('wp_body_open');

	// Site Google Tag Manager (noscript)
	if (!empty($site_gtm_container_id)) {
		include get_template_directory() . '/inc/analytics/google-tag-manager-noscript-code.php';
	}
	?>

	<div class="site" id="page">

		<header id="asu-header" class="fixed-top">
			<div id="wrapper-header-top">
				<div class="container-xl">
					<div class="row">
						<div id="header-top" class="col-12">
							<nav class="nav" aria-label="Top">
								<a class="nav-link sr-only sr-only-focusable" href="#skip-to-content">Skip to Content</a>
								<a class="nav-link sr-only sr-only-focusable" href="http://asu.edu/accessibility/feedback?a11yref=unity-design-system">Report an accessibility problem</a>
								<a class="nav-link" href="https://asu.edu">ASU Home</a>
								<a class="nav-link" href="https://my.asu.edu">My ASU</a>
								<a class="nav-link" href="https://asu.edu/about/colleges-and-schools">Colleges and Schools</a>
								<div class="nav-link login-status">
									<a class="signin" href="#">Sign In</a>
								</div>
								<form class="form-inline" action="https://search.asu.edu/search" method="get" name="gs">
									<input class="form-control" type="search" name="q" aria-labelledby="header-top-search" required>
									<label id="header-top-search">Search ASU</label>
									<input name="site" value="default_collection" type="hidden">
									<input name="sort" value="date:D:L:d1" type="hidden">
									<input name="output" value="xml_no_dtd" type="hidden">
									<input name="ie" value="UTF-8" type="hidden">
									<input name="oe" value="UTF-8" type="hidden">
									<input name="client" value="asu_frontend" type="hidden">
									<input name="proxystylesheet" value="asu_frontend" type="hidden">
								</form>
							</nav>
						</div>
					</div>
				</div>
			</div>

			<div id="wrapper-header-main">
				<div class="container-xl">
					<div class="row">
						<div id="header-main" class="col-12">
							<nav class="navbar navbar-expand-xl" aria-label="Main">

								<a class="navbar-brand" href="#">
									<img class="vert" src="<?php echo get_template_directory_uri(); ?>/img/logo/asu_university_vert_maroongold.png" alt="Arizona State University" />
									<img class="horiz" src="<?php echo get_template_directory_uri(); ?>/img/logo/asu_university_horiz_maroongold.png" alt="Arizona State University" />
								</a>

								<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#menubar" aria-controls="menubar" aria-expanded="false" aria-label="Toggle navigation">
									<span title="Open mobile menu" class="fa fa-bars"></span>
									<span title="Close mobile menu" class="fa-stack">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-times fa-stack-1x"></i>
									</span>
								</button>

								<div class="navbar-container <?php if(!$nav_menu_enabled) echo 'no-links'; ?>">

									<?php
									// if no parentUnit defined, render site (subdomain) name alone
									if (empty($cOptions['parent_unit_name'])) : ?>
										<div class="title subdomain-name">
											<?php echo wp_kses(get_bloginfo('name'), wp_kses_allowed_html('strip')); ?>
										</div>
									<?php
									// render both site (subdomain) and parentUnit in header
									else : ?>
										<div class="title">
											<?php
											$parentOrg = '<a href="%1$s" class="unit-name">%2$s</a>';
											if (isset($cOptions) && array_key_exists('parent_unit_name', $cOptions) && $cOptions['parent_unit_name'] !== '') {
												$parentOrgLink = '#';
												if (array_key_exists('parent_unit_link', $cOptions)) {
													$parentOrgLink = $cOptions['parent_unit_link'];
												}
												echo wp_kses(sprintf($parentOrg, $parentOrgLink, $cOptions['parent_unit_name']), wp_kses_allowed_html('post'));
											}
											?>
											<span class="subdomain-name"><?php echo wp_kses(get_bloginfo('name'), wp_kses_allowed_html('strip')); ?></span>
										</div>
									<?php
									endif;
									?>

									<div class="collapse navbar-collapse w-100 justify-content-between" id="menubar">
										<?php
										// if nav menu is enabled, render it
										if ('enabled' === $nav_menu_enabled) :
										?>
										<div class="navbar-nav">
											<?php
											// ======================
											// Create Main Navigation
											// ======================

											$current_url = add_query_arg($wp->query_string, '', home_url($wp->request));
											$we_are_on_the_homepage = (home_url() === $current_url);

											$home_icon_class = 'nav-link-home';
											if ($we_are_on_the_homepage) {
												$home_icon_class .= ' active';
											}
											?>

											<a class="nav-link <?php echo $home_icon_class ?>" href="<?php echo esc_url(home_url()); ?>">
												<span class="d-lg-none">Home</span>
												<span title="Home" class="fas fa-fw fa-home"></span>
											</a>

											<?php
											include get_template_directory() . '/asu-navigation-menu.php';
											?>
										</div><!-- end .navbar-nav -->
										<?php
										endif;
										?>

										<div class="navbar-mobile-footer">
											<form class="form-inline navbar-mobile-search" action="https://search.asu.edu/search" method="get" name="gs">
												<input class="form-control" type="search" name="q" aria-label="Search" placeholder="Search ASU">
												<input name="site" value="default_collection" type="hidden">
												<input name="sort" value="date:D:L:d1" type="hidden">
												<input name="output" value="xml_no_dtd" type="hidden">
												<input name="ie" value="UTF-8" type="hidden">
												<input name="oe" value="UTF-8" type="hidden">
												<input name="client" value="asu_frontend" type="hidden">
												<input name="proxystylesheet" value="asu_frontend" type="hidden">
											</form>
											<div class="nav-grid">
												<a class="nav-link" href="https://asu.edu">ASU Home</a>
												<a class="nav-link" href="https://my.asu.edu">My ASU</a>
												<a class="nav-link" href="https://asu.edu/about/colleges-and-schools">Colleges and Schools</a>
												<div class="nav-link login-status">
													Sparky<a class="signout" href="https://webapp4.asu.edu/myasu/Signout">Sign Out</a>
												</div>
											</div>
										</div>

									</div>
								</div>

							</nav>
						</div>
					</div>
				</div>
			</div>

		</header>
