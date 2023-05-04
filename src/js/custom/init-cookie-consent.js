window.addEventListener("DOMContentLoaded", event => {
	AsuCookieConsent.initCookieConsent({
		targetSelector: "#cookieConsentContainer",
		props: {
			enableCookieConsent: true,
			expirationTime: 90, // Number of days to expire the consent
		},
	});
});
