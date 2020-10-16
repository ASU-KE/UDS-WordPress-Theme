<?php
/* Analytics Tracking Code for Hotjar
 *
 */
// @codingStandardsIgnoreStart

$hotjar_site_id = '';

if (is_array(get_option('uds_wp_theme_options'))) {
	$cOptions = get_option('uds_wp_theme_options');
}
if (!empty( $c_options['hotjar_site_id'] ) ) {
	$hotjar_site_id = $c_options['hotjar_site_id'];
}
?>
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
// @codingStandardsIgnoreEnd
