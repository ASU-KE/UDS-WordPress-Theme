window.addEventListener("DOMContentLoaded", event => {
	if(document.getElementById('cookieConsentContainer')){
		AsuCookieConsent.initCookieConsent({
			targetSelector: "#cookieConsentContainer",
			props: {
				enableCookieConsent: true,
				expirationTime: 90, // Number of days to expire the consent
			},
		})
	}
})
