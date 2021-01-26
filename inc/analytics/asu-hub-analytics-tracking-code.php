<?php
/**
 * Analytics Tracking Code that go in the top of the <body> element
 *
 * Coding standards complains about inlineing a script tag, which we're choosing to ignore here to
 * keep these tracking codes together.
 *
 * @package uds-wordpress-theme
 */

// @codingStandardsIgnoreStart
?>
<!-- Google Tag Manager ASU Universal-->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KDWN8Z" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
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

<!-- Lavidge AdWords Tracking -->
<script>
	var ssoval;
	if (document.cookie.indexOf("SSONAME") === -1) {
		ssoval = "false";
	} else {
		ssoval = "true";
	}
	var versaTag = {};
	versaTag.id = "5381";
	versaTag.sync = 0;
	versaTag.dispType = "js";
	versaTag.ptcl = "HTTPS";
	versaTag.bsUrl = "bs.serving-sys.com/BurstingPipe";
	//VersaTag activity parameters include all conversion parameters including custom parameters and Predefined parameters. Syntax: "ParamName1":"ParamValue1", "ParamName2":"ParamValue2". ParamValue can be empty.
	versaTag.activityParams = {
		//Predefined parameters:
		"OrderID": "",
		"Session": "",
		"Value": "",
		"productid": "",
		"productinfo": "",
		"Quantity": ""
		//Custom parameters:
	};
	//Static retargeting tags parameters. Syntax: "TagID1":"ParamValue1", "TagID2":"ParamValue2". ParamValue can be empty.
	versaTag.retargetParams = {};
	//Dynamic retargeting tags parameters. Syntax: "TagID1":"ParamValue1", "TagID2":"ParamValue2". ParamValue can be empty.
	versaTag.dynamicRetargetParams = {};
	// Third party tags conditional parameters and mapping rule parameters. Syntax: "CondParam1":"ParamValue1", "CondParam2":"ParamValue2". ParamValue can be empty.
	versaTag.conditionalParams = {
		"ssoval": ssoval
	};
	//versaTag.conditionalParams = {};
	//versaTag.conditionalParams["ssoval"] = ssoval;
</script>
<script id="ebOneTagUrlId" src="https://secure-ds.serving-sys.com/SemiCachedScripts/ebOneTag.js"></script>
<noscript>
	<iframe src="
    ?
    cn=ot&amp;
    onetagid=5381&amp;
    ns=1&amp;
    activityValues=$$Value=[Value]&amp;OrderID=[OrderID]&amp;Session=[Session]&amp;ProductID=[ProductID]&amp;ProductInfo=[ProductInfo]&amp;Quantity=[Quantity]$$&amp;
    retargetingValues=$$$$&amp;
    dynamicRetargetingValues=$$$$&amp;
    acp=$$ssoval-false&amp;" style="display:none;width:0px;height:0px"></iframe>
</noscript>
<!-- End Lavidge AdWords Tracking -->

<?php
// @codingStandardsIgnoreEnd
