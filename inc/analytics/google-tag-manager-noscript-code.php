<?php
/**
 * No-Script Alt Analytics Tracking Code for Google Tag Manager
 *
 * @package uds-wordpress-theme
 */

$site_gtm_container_id = get_theme_mod( 'site_gtm_container_id' );

if ( $site_gtm_container_id && '' !== $site_gtm_container_id ) : ?>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_html( trim( $site_gtm_container_id ) ); ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php
	endif; ?>
