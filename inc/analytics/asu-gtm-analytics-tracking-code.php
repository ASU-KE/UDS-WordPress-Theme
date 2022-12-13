<?php
/**
 * ASU global GTM analytics tracking code that belongs at the top of the <body> element
 *
 * Coding standards complains about inlineing a script tag, which we're choosing to ignore here to
 * keep these tracking codes together.
 *
 * @package uds-wordpress-theme
 */

// @codingStandardsIgnoreStart
?>
<!-- Google Tag Manager ASU Universal-->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KDWN8Z" title="Google Tag Manager" height="0" width="0" style="display:none;visibility:hidden" aria-hidden="true"></iframe></noscript>
<script>
	(function(w, d, s, l, i) {
		w[l] = w[l] || [];
		w[l].push({
			'gtm.start': new Date().getTime(),
			event: 'gtm.js'
		});
		var f = d.getElementsByTagName(s)[0],
			j = d.createElement(s),
			dl = l != 'dataLayer' ? '&l=' + l : '';
		j.async = true;
		j.src =
			'//www.googletagmanager.com/gtm.js?id=' + i + dl;
		f.parentNode.insertBefore(j, f);
	})(window, document, 'script', 'SI_dataLayer', 'GTM-KDWN8Z');
</script>
<!-- End Google Tag Manager ASU Universal -->

<?php
// @codingStandardsIgnoreEnd
