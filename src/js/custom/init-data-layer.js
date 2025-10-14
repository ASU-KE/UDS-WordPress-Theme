/**
 * Data Layer Initialization
 *
 * This script initializes the data layer analytics tracking functionality.
 *
 * @package UDS WordPress Theme
 */

// Initialize data layer analytics on DOM content loaded
window.addEventListener("DOMContentLoaded", (event) => {
	// Initialize the data layer analytics
	if (typeof initDataLayer === 'function') {
		initDataLayer();
	}
});
