/**
 * File ranking-card.js
 *
 * JS for UDS Ranking Card block.
 * Handles both editor and front-end view.
 */

/*jshint esversion: 6 */
(function($) {
	'use strict';

	/**
	 * Initialize ranking card
	 * Currently a minimal implementation. Can be extended to add:
	 * - Animations on scroll
	 * - Dynamic content loading
	 * - Interaction tracking
	 */
	function initRankingCard() {
		$('.uds-ranking-card').each(function() {
			// Add initialized class to prevent double initialization
			if (!$(this).hasClass('initialized')) {
				$(this).addClass('initialized');
			}
		});
	}

	// Initialize on document ready
	$(document).ready(function() {
		initRankingCard();
	});

	// For Gutenberg editor, also initialize when blocks are loaded
	if (window.wp && window.wp.domReady) {
		window.wp.domReady(function() {
			initRankingCard();
		});
	}

})(jQuery);
