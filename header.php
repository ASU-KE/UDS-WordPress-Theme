<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$c_options              = array();
$asu_hub_analytics     = 'enabled';
$site_gcs_ownership_verification_id = '';
$site_gtm_container_id = '';
$site_ga_tracking_id   = '';
$hotjar_site_id        = '';

//$hide_asu_header = get_field('hide_asu_header', 'options');

// Retrieve settings using helper function that checks both ACF and theme_mods for backward compatibility
$asu_hub_analytics = uds_wp_get_setting('asu_hub_analytics', 'enabled');
$site_gcs_ownership_verification_id = uds_wp_get_setting('site_gcs_ownership_verification_id', '');
$site_gtm_container_id = uds_wp_get_setting('site_gtm_container_id', '');
$site_ga_tracking_id = uds_wp_get_setting('site_ga_tracking_id', '');
$hotjar_site_id = uds_wp_get_setting('hotjar_site_id', '');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-KDWN8Z');</script>
	<!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<?php
	if (is_user_logged_in() && !is_customize_preview()) {
		// shift page content below the WP Admin toolbar.
	?>
		<style type="text/css" media="screen">
			#wpadminbar {
				z-index: 999999 !important;
			}
		</style>
	<?php
	}

	// Google Search Console Ownership Verification.
	// Only add the Ownership Verification meta tag on the site homepage
	if (!empty($site_gcs_ownership_verification_id) && is_front_page()) {
		echo '<meta name="google-site-verification" content="' . esc_html(trim($site_gcs_ownership_verification_id))  . '" />';
	}

	// Site Google Tag Manager.
	if (!empty($site_gtm_container_id)) {
		include get_template_directory() . '/inc/analytics/google-tag-manager-tracking-code.php';
	}

	// Site Google Analytics.
	if (!empty($site_ga_tracking_id)) {
		include get_template_directory() . '/inc/analytics/google-analytics-tracking-code.php';
	}

	// Hotjar Analytics.
	if (!empty($hotjar_site_id)) {
		include get_template_directory() . '/inc/analytics/hotjar-tracking-code.php';
	}
	?>
</head>

<body <?php body_class(); ?> <?php uds_wp_body_attributes(); ?> id="back_to_top">
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KDWN8Z"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php
	do_action('wp_body_open');

	// Site Google Tag Manager (noscript).
	if (!empty($site_gtm_container_id)) {
		include get_template_directory() . '/inc/analytics/google-tag-manager-noscript-code.php';
	}
	if (is_user_logged_in()) {
		$current_user = wp_get_current_user();
	}
	?>

	<div id="header-container"></div>


	<?php do_action('uds_wp_after_global_header'); ?>
