<?php
/**
 * Analytics Tracking Code for Hotjar
 *
 * @package uds-wordpress-theme
 */

$hotjar_site_id = get_theme_mod( 'hotjar_site_id' );

if ( $hotjar_site_id && '' !== $hotjar_site_id ) : ?>
	<!-- Hotjar Tracking Code -->
		<script>
		(function(h,o,t,j,a,r){
			h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
			h._hjSettings={hjid:<?php echo wp_kses( $hotjar_site_id, wp_kses_allowed_html( 'strip' ) ); ?>,hjsv:6};
			a=o.getElementsByTagName('head')[0];
			r=o.createElement('script');r.async=1;
			r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
			a.appendChild(r);
		})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
	<?php
	endif;
