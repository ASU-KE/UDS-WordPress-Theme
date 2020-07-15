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

$cOptions            = [];
$asu_hub_analytics   = 'disabled';
$site_ga_tracking_id = '';
$hotjar_site_id      = '';

// Check if we have Customizer options set
if (is_array(get_option('asu_wp2020_theme_options'))) {
	$cOptions = get_option('asu_wp2020_theme_options');
}

// Do we have an asu_hub_analytics setting?
if (!empty($cOptions['asu_hub_analytics'])) {
	$asu_hub_analytics = $cOptions['asu_hub_analytics'];
}
// Do we have an site_ga_tracking_id setting?
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

	<?php if (is_user_logged_in()) : ?>
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
	if (!empty($asu_hub_analytics) && $asu_hub_analytics === 'enable') {
		include get_template_directory() . '/inc/analytics/asu-hub-analytics-tracking-code.php';
	}
	?>
	<?php
	// Site Google Analytics
	if (!empty($site_ga_tracking_id)) {
		include get_template_directory() . '/inc/analytics/google-analytics-tracking-code.php';
	}
	?>
	<?php
	// Hotjar Analytics
	if (!empty($hotjar_site_id)) {
		include get_template_directory() . '/inc/analytics/hotjar-tracking-code.php';
	}
	?>
</head>

<body <?php body_class(); ?> <?php asu_wp2020_body_attributes(); ?>>
	<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'asu-web-standards'); ?></a>
	<?php do_action('wp_body_open'); ?>

	<div class="site" id="page">

		<header id="asu-header" class="">

			<div id="wrapper-header-top">
				<div class="container-lg">
					<div class="row">
						<div id="header-top" class="col-12">
							<nav class="nav" aria-label="Top">
								<a class="nav-link" href="#">ASU Home</a>
								<a class="nav-link" href="#">My ASU</a>
								<a class="nav-link" href="#">Colleges and Schools</a>
								<a class="nav-link" href="#">Sign in</a>
								<form class="form-inline" action="https://search.asu.edu/search" method="get" name="gs">
									<input class="form-control" type="search" name="q" placeholder="Search ASU" aria-label="Search">
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
				<div class="container-lg">
					<div class="row">
						<div id="header-main" class="col-12">
							<nav class="navbar navbar-expand-lg" aria-label="Main">

								<a class="navbar-brand" href="#">
									<img class="vert" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/asu_university_vert_maroongold.png" alt="ASU Logo Vertical" />
									<img class="horiz" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/asu_university_horiz_maroongold.png" alt="ASU Logo Horizontal" />
								</a>

								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menubar" aria-controls="menubar" aria-expanded="false" aria-label="Toggle navigation">
									<span title="Hamburger menu" class="fa fa-bars"></span>
								</button>

								<div class="navbar-container">
									<div class="title">
										<?php
										$parentOrg = '<span class="unit-name">%1$s</span>';
										if (isset($cOptions) && array_key_exists('parent_unit_name', $cOptions) && $cOptions['parent_unit_name'] !== '') {
											echo wp_kses(sprintf($parentOrg, $cOptions['parent_unit_name']), wp_kses_allowed_html('post'));
										}
										?>
										<span class="subdomain-name"><?php echo wp_kses(get_bloginfo('name'), wp_kses_allowed_html('strip')); ?></span>
										<!-- <span class="subdomain-name">Sub Domain Name</span> -->
									</div>

									<!-- markup for just a subdomain name
									<div class="title subdomain-name">
										School of Computing, Informatics, and Decisions Systems
									</div>
									-->

									<div class="collapse navbar-collapse w-100 justify-content-between" id="menubar">
										<div class="navbar-nav">

											<a class="nav-link nav-link-home active" href="/">
												<span class="d-lg-none">Home</span>
												<span title="Home" class="fas fa-fw fa-home"></span>
											</a>

											<!-- <a class="nav-link" href="#">Contact</a> -->

											<div class="nav-item dropdown">
												<a class="nav-link" href="#" id="dropdown-one-col" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Drop (1 Col)
													<span class="fa fa-chevron-down"></span>
												</a>
												<div class="dropdown-menu dropdown-columns" aria-labelledby="dropdown-one-col">
													<div class="dropdown-col">
														<a class="dropdown-item" href="#">Navigation Link</a>
														<a class="dropdown-item" href="#">Another Link</a>
														<a class="dropdown-item" href="#">Does this dropdown menu have a maximum
															width or will it go on forever?</a>
														<a href="#" class="btn btn-sm btn-dark">CTA Action 2</a>
													</div>
												</div>
											</div>

											<div class="nav-item dropdown">
												<a class="nav-link" href="#" id="dropdown-two-col" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Drop (2 col)
													<span class="fa fa-chevron-down"></span>
												</a>
												<div class="dropdown-menu dropdown-columns" aria-labelledby="dropdown-two-col">
													<div class="dropdown-col">
														<h3>Brady Header</h3>
														<a class="dropdown-item" href="#">Here's the story</a>
														<a class="dropdown-item" href="#">Of a man named Brady</a>
														<a class="dropdown-item" href="#">Who was busy with three</a>
														<a class="dropdown-item" href="#">Boys of his own</a>
													</div>
													<div class="dropdown-col">
														<h3>Last Call 'Em</h3>
														<a class="dropdown-item" href="#">Navigation Link</a>
														<a class="dropdown-item" href="#">Another Link as an example of when
															something wraps</a>
														<a class="dropdown-item" href="#">You Win A Prize</a>
														<a href="#" class="btn btn-sm btn-dark">CTA Action 2</a>
													</div>
												</div>
											</div>

											<div class="nav-item dropdown megamenu">
												<a class="nav-link" href="#" id="megamenu-three-col" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Mega Menu (3 col)
													<span class="fa fa-chevron-down"></span>
												</a>
												<div class="dropdown-menu" aria-labelledby="megamenu-three-col">
													<div class="container">
														<div class="row">
															<div class="col-lg-4">
																<h3>Column Header</h3>
																<a class="dropdown-item" href="#">Navigation Link</a>
																<a class="dropdown-item" href="#">Another Link</a>
																<a class="dropdown-item" href="#">The Batman Link</a>
																<a href="#" class="btn btn-sm btn-dark">CTA Action 2</a>
															</div>
															<div class="col-lg-4">
																<h3>Brady Header</h3>
																<a class="dropdown-item" href="#">Here's the story</a>
																<a class="dropdown-item" href="#">Of a man named Brady</a>
																<a class="dropdown-item" href="#">Who was busy with three</a>
																<a class="dropdown-item" href="#">Boys of his own</a>
															</div>
															<div class="col-lg-4">
																<h3>Last Call 'Em</h3>
																<a class="dropdown-item" href="#">Navigation Link</a>
																<a class="dropdown-item" href="#">Another Link as an example of
																	when something wraps</a>
																<a class="dropdown-item" href="#">You Win A Prize</a>
																<a href="#" class="btn btn-sm btn-dark">CTA Action 2</a>
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="nav-item dropdown megamenu">
												<a class="nav-link" href="#" id="megamenu-four-col" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Mega Menu (4 col)
													<span class="fa fa-chevron-down"></span>
												</a>
												<div class="dropdown-menu" aria-labelledby="megamenu-four-col">
													<div class="container">
														<div class="row">
															<div class="col-lg-3">
																<h3>Column One</h3>
																<a class="dropdown-item" href="#">Navigation Link</a>
																<a class="dropdown-item" href="#">Another Link</a>
																<a class="dropdown-item" href="#">will it go on forever?</a>
															</div>
															<div class="col-lg-3">
																<h3>Column Two</h3>
																<a class="dropdown-item" href="#">Navigation Link</a>
																<a class="dropdown-item" href="#">Another Link</a>
																<a class="dropdown-item" href="#">Does this dropdown menu</a>
															</div>
															<div class="col-lg-3">
																<h3>Column Two</h3>
																<a class="dropdown-item" href="#">Navigation Link</a>
																<a class="dropdown-item" href="#">Another Link</a>
																<a class="dropdown-item" href="#">Navigation Link</a>
																<a class="dropdown-item" href="#">Another Link</a>
																<a class="dropdown-item" href="#">Navigation Link</a>
																<a class="dropdown-item" href="#">Another Link</a>
															</div>
															<div class="col-lg-3">
																<h3>Column four</h3>
																<a class="dropdown-item" href="#">Navigation Link</a>
																<a class="dropdown-item" href="#">Another Link</a>
																<a class="dropdown-item" href="#">Does this dropdown menu</a>
																<a class="dropdown-item" href="#">Make my content shine</a>
															</div>
														</div>
														<div class="row with-buttons">
															<div class="col-lg-12">
																<a href="#" class="btn btn-sm btn-maroon">Mega Menu CTA 1</a>
																<a href="#" class="btn btn-sm btn-dark">Mega Menu CTA 2</a>
															</div>
														</div>

													</div><!-- end .container -->
												</div>

											</div>

											<div class="nav-item dropdown megamenu">
												<a class="nav-link" href="#" id="megamenu-five-col" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Mega Menu (5 col)
													<span class="fa fa-chevron-down"></span>
												</a>
												<div class="dropdown-menu" aria-labelledby="megamenu-five-col">

													<div class="container">
														<div class="row">
															<div class="col-lg">
																<h3>Column One</h3>
																<a class="dropdown-item" href="#">Navigation Link</a>
																<a class="dropdown-item" href="#">Another Link</a>
																<a class="dropdown-item" href="#">will it go on forever?</a>
																<a href="#" class="btn btn-sm btn-dark">CTA in Column</a>
															</div>
															<div class="col-lg">
																<h3>Column Two</h3>
																<a class="dropdown-item" href="#">Navigation Link</a>
																<a class="dropdown-item" href="#">Another Link</a>
																<a class="dropdown-item" href="#">Does this dropdown menu</a>
																<a href="#" class="btn btn-sm btn-dark">CTA in Column</a>
															</div>
															<div class="col-lg">
																<h3>Column Two</h3>
																<a class="dropdown-item" href="#">Navigation Link</a>
																<a class="dropdown-item" href="#">Another Link</a>
																<a class="dropdown-item" href="#">Does this dropdown menu</a>
																<a class="dropdown-item" href="#">Navigation Link</a>
																<a class="dropdown-item" href="#">Another Link</a>
																<a href="#" class="btn btn-sm btn-dark">CTA in Column</a>
															</div>
															<div class="col-lg">
																<h3>Column four</h3>
																<a class="dropdown-item" href="#">Navigation Link</a>
																<a class="dropdown-item" href="#">Another Link</a>
																<a class="dropdown-item" href="#">Does this dropdown menu</a>
																<a href="#" class="btn btn-sm btn-dark">CTA in Column</a>
															</div>
															<div class="col-lg">
																<h3>Mambo #5</h3>
																<a class="dropdown-item" href="#">Jump up and down and</a>
																<a class="dropdown-item" href="#">Shake your head to the
																	sound</a>
																<a class="dropdown-item" href="#">Put your hand on the
																	ground</a>
																<a class="dropdown-item" href="#">Take one step left and one
																	step right</a>
																<a class="dropdown-item" href="#">If it looks like this</a>
																<a class="dropdown-item" href="#">Then you doing it right</a>
															</div>
														</div>
													</div>
												</div>
											</div>

										</div><!-- end .navbar-nav -->

										<div class="navbar-mobile-footer">
											<form class="navbar-mobile-search">
												<input class="form-control" type="search" placeholder="Search ASU" aria-label="Search">
											</form>
											<div class="nav-grid">
												<a class="nav-link" href="#">ASU Home</a>
												<a class="nav-link" href="#">My ASU</a>
												<a class="nav-link" href="#">Colleges and Schools</a>
												<a class="nav-link" href="#">Sign in</a>
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
