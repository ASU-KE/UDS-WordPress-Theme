<?php
/**
 * No-Script Alt Analytics Tracking Code for Google Tag Manager
 *
 * @package uds-wordpress-theme
 */
$site_gtm_container_id = get_theme_mod( 'site_gtm_container_id' );

// $site_gtm_container_id = '';

// if ( is_array( get_option( 'uds_wp_theme_options' ) ) ) {
// 	$c_options = get_option( 'uds_wp_theme_options' );
// }
// if ( ! empty( $c_options['site_gtm_container_id'] ) ) {
// 	$site_gtm_container_id = $c_options['site_gtm_container_id'];
// }
?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_html( trim( $site_gtm_container_id ) ); ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
