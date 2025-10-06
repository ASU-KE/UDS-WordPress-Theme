// udsFooterVars are set in inc/footer-localizer-script.php
window.addEventListener("DOMContentLoaded", (event) => {
	// Check if footer container exists and footer variables are available
	const footerContainer = document.querySelector("#footer-container");
	if (footerContainer && typeof udsFooterVars !== 'undefined') {
		
		// Initialize the ASU Footer using the React component library
		AsuHeaderFooter.initASUFooter({
			targetSelector: "#footer-container",
			props: {
				social: udsFooterVars.social,
				contact: udsFooterVars.contact
			}
		});
	}
});