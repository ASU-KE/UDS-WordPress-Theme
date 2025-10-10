/**
 * Data Layer Initialization
 * 
 * This script initializes the data layer analytics tracking functionality.
 * 
 * @package UDS WordPress Theme
 */

// Import the initDataLayer function from the UDS directory
import { initDataLayer } from '../uds/data-layer.js';

// Initialize data layer analytics on DOM content loaded
window.addEventListener("DOMContentLoaded", (event) => {
	// Initialize the data layer analytics
	if (typeof initDataLayer === 'function') {
		initDataLayer();
	}
});