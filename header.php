<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<?php do_action('wp_body_open'); ?>
	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar">

			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'understrap'); ?></a>

			<nav id="main-nav" class="navbar navbar-expand-lg navbar-light static-top" aria-labelledby="main-nav-label">

				<h2 id="main-nav-label" class="sr-only">
					<?php esc_html_e('Main Navigation', 'understrap'); ?>
				</h2>
				<div class="container">

					<a class="navbar-brand" href="#">
						<img src="wp-content/themes/asu-web-standards-2020-wordpress-theme/img/logo/asu_university_vert_maroongold.png" alt="ASU Logo Vertical" />
					</a>

					<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>


					<div class="d-flex flex-column align-items-start w-100">
						<div class="title">
							<span>College of Global Futures</span>
							<h1>School of Complex Adaptive Systems</h1>
						</div>
						<div class="collapse navbar-collapse w-100 justify-content-between" id="navbarResponsive">
							<ul class="navbar-nav">
								<li class="nav-item active">
									<a class="nav-link" href="#">
										<span title="Home" class="fas fa-home"></span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">About</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Dropdown
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Services</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Contact</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Contact</a>
								</li>
							</ul>
							<form class="form-inline">
								<a href="#" class="btn btn-sm btn-gold">CTA Action 1</a>
								<a href="#" class="btn btn-sm btn-maroon">CTA Action 2</a>
							</form>
						</div>
					</div>

					<!-- The WordPress Menu goes here -->
					<?php /*
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					*/ ?>
			</nav><!-- .site-navigation -->
		</div><!-- #wrapper-navbar end -->
