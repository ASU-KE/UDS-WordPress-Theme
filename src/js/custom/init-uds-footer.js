// udsFooterVars are set in inc/footer-localizer-script.php
window.addEventListener("DOMContentLoaded", (event) => {
	// Check if footer container exists and footer variables are available
	const footerContainer = document.querySelector("#footer-container");
	if (footerContainer && typeof udsFooterVars !== 'undefined' && typeof AsuHeaderFooter !== 'undefined') {
		
		try {
			// Initialize the ASU Footer using the React component library
			AsuHeaderFooter.initASUFooter({
				targetSelector: "#footer-container",
				props: {
					social: udsFooterVars.social,
					contact: udsFooterVars.contact
				}
			});
		} catch (error) {
			console.error('Failed to initialize ASU Footer:', error);
			// Fallback: show a message or hide the container
			footerContainer.innerHTML = '<!-- Footer initialization failed -->';
		}
	} else {
		// Log missing dependencies for debugging
		if (!footerContainer) {
			console.warn('Footer container #footer-container not found');
		}
		if (typeof udsFooterVars === 'undefined') {
			console.warn('udsFooterVars not available - footer localizer script may not be loaded');
		}
		if (typeof AsuHeaderFooter === 'undefined') {
			console.warn('AsuHeaderFooter library not available - check if scripts are properly loaded');
		}
	}
});