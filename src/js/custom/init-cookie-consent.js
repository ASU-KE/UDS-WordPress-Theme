window.addEventListener("DOMContentLoaded", event => {
	AsuCookieConsent.initCookieConsent({
		targetSelector: "#cookie-consent-container",
		props: {
			enableCookieConsent: true,
			expirationTime: 90, // Number of days to expire the consent
		},
	});
});
