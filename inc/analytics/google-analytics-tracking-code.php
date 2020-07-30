<?php
/* Analytics Tracking Codes that go in the top of the <body> element
 *
 * Coding standards complains about inlineing a script tag, which we're choosing to ignore here to
 * keep these tracking codes together.
 */
// @codingStandardsIgnoreStart

$site_ga_tracking_id = '';

if (is_array(get_option('asu_wp2020_theme_options'))) {
	$cOptions = get_option('asu_wp2020_theme_options');
}
if (!empty( $cOptions['site_ga_tracking_id'] ) ) {
	$site_ga_tracking_id = $cOptions['site_ga_tracking_id'];
}
?>
<script type="text/javascript">
	(function(i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function() {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga_site');

	ga_site('create', '<?php echo esc_html(trim($site_ga_tracking_id)) ?>', 'auto');
	ga_site('require', 'linkid', 'linkid.js');
	ga_site('send', 'pageview');
	ga_site('set', 'forceSSL', true);

	// GIOS Rollup
	// ga_site('create', 'UA-46798989-1', 'auto', {
	// 	'name': 'ga_rollup'
	// });
	// ga_site('ga_rollup.send', 'pageview');

	ga = ga_site; // for allowing integration with other google analytics plugins

	<?php if ($include_in_larger_asu_analytics) { ?>
		// ASU main rollup
		// ga_site('create', 'UA-2392647-1', 'asu.edu', {
		// 	'name': 'ga_asu_rollup'
		// });
		// ga_site('ga_asu_rollup.send', 'pageview');
	<?php } ?>

	<?php
	// Log analytics of Signed-in ASU CAS users
	?>
	var asuLoginName;
	asuLoginName = (function() {
		var cookies = document.cookie.split(";");
		for (var i = 0; i < cookies.length; i++) {
			if (cookies[i].indexOf('SSONAME') > 0) {
				// cookies[i] = ' SSONAME=Firstname'
				if (cookies[i].substring(9) == "") {
					break;
				}
				return cookies[i].substring(9);
				break;
			}
		}
	})();
	if (asuLoginName) {
		ga_site('send', 'event', 'HASASUCOOKIE', 'pageview', 'login', 1);
	}

	// Track search queries before they leave the page. Since the event is async we need
	// to have a callback. This is unfortantly very hacky, but there aren't any other better
	// alternatives.
	// TODO: Update logic for Web Standards 2.0 Global Header
	$(document).ready(function() {
		$('#asu_search_module form').submit(function() {
			if ($(this).attr('waitForAjax') == 'done') {
				// the ga callback has occurred
				return true;

			} else if ($(this).attr('waitForAjax') == 'wait') {
				// we are still waiting for the ga callback
				$(this).trigger("submit"); // resubmit the form
				return false;

			} else {
				// this is the first time its called, so set the attribute and make the ga call
				$(this).attr('waitForAjax', 'wait');

				// Use a timeout to ensure the execution of the callback
				setTimeout(waitForResponse, 2000);

				// Only run the callback code once.
				var alreadyCalled = false;

				function waitForResponse() {
					if (alreadyCalled) return;
					alreadyCalled = true;
					var asu_search_form = $('#asu_search_module form');
					asu_search_form.attr('waitForAjax', 'done');
					asu_search_form.trigger("submit");
				}

				var search_text = $('input[name="q"]', this).val();
				ga_site('send', 'event', {
					'eventCategory': 'ExternalASUSearch',
					'eventAction': 'search',
					'eventLabel': search_text,
					'hitCallback': waitForResponse
				});

				return false;
			}
		});
	});

	<?php // Track the users intent to print
	?>
	try {
		(function() {
			var afterPrint = function() {
				ga_site('send', 'event', 'PrintIntent', document.location.pathname);
			};
			if (window.matchMedia) {
				var mediaQueryList = window.matchMedia('print');
				mediaQueryList.addListener(function(mql) {
					if (!mql.matches)
						afterPrint();
				});
			}
			window.onafterprint = afterPrint;
		}());
	} catch (e) {}
</script>
<?php
// @codingStandardsIgnoreEnd
