/**
 * UDS Text Marquee Block JavaScript
 * 
 * Handles pause/play functionality and accessibility features
 */

(function() {
	'use strict';

	/**
	 * Initialize marquee functionality
	 */
	function initMarquee() {
		const marquees = document.querySelectorAll('.uds-text-marquee-wrapper');
		
		marquees.forEach(function(marquee) {
			const content = marquee.querySelector('.uds-marquee-content');
			const playBtn = marquee.querySelector('.uds-marquee-play-btn');
			const pauseBtn = marquee.querySelector('.uds-marquee-pause-btn');
			const duration = marquee.getAttribute('data-animation-duration') || 10;
			const direction = marquee.getAttribute('data-direction') || 'normal';
			
			// Set CSS custom properties for animation
			content.style.setProperty('--marquee-duration', duration + 's');
			content.style.setProperty('--marquee-direction', direction);
			
			// Initially hide play button
			if (playBtn) {
				playBtn.style.display = 'none';
			}
			
			// Pause button functionality
			if (pauseBtn) {
				pauseBtn.addEventListener('click', function() {
					pauseMarquee(content, playBtn, pauseBtn);
				});
				
				// Keyboard support - Space and Enter
				pauseBtn.addEventListener('keydown', function(e) {
					if (e.key === ' ' || e.key === 'Enter') {
						e.preventDefault();
						pauseMarquee(content, playBtn, pauseBtn);
					}
				});
			}
			
			// Play button functionality
			if (playBtn) {
				playBtn.addEventListener('click', function() {
					playMarquee(content, playBtn, pauseBtn);
				});
				
				// Keyboard support - Space and Enter
				playBtn.addEventListener('keydown', function(e) {
					if (e.key === ' ' || e.key === 'Enter') {
						e.preventDefault();
						playMarquee(content, playBtn, pauseBtn);
					}
				});
			}
		});
	}
	
	/**
	 * Pause marquee animation
	 */
	function pauseMarquee(content, playBtn, pauseBtn) {
		content.classList.add('paused');
		pauseBtn.style.display = 'none';
		playBtn.style.display = 'flex';
	}
	
	/**
	 * Play marquee animation
	 */
	function playMarquee(content, playBtn, pauseBtn) {
		content.classList.remove('paused');
		playBtn.style.display = 'none';
		pauseBtn.style.display = 'flex';
	}
	
	/**
	 * Check for reduced motion preference
	 */
	function checkReducedMotion() {
		const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
		
		if (prefersReducedMotion) {
			const marquees = document.querySelectorAll('.uds-text-marquee-wrapper');
			marquees.forEach(function(marquee) {
				const content = marquee.querySelector('.uds-marquee-content');
				const playBtn = marquee.querySelector('.uds-marquee-play-btn');
				const pauseBtn = marquee.querySelector('.uds-marquee-pause-btn');
				
				// Pause the animation
				if (content) {
					content.classList.add('paused');
				}
				
				// Hide both buttons when motion is disabled
				if (playBtn) {
					playBtn.classList.add('visually-hidden');
				}
				if (pauseBtn) {
					pauseBtn.classList.add('visually-hidden');
				}
			});
		}
	}
	
	// Initialize on DOM ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', function() {
			initMarquee();
			checkReducedMotion();
		});
	} else {
		initMarquee();
		checkReducedMotion();
	}
	
	// Re-initialize on Gutenberg block updates (for preview mode)
	if (window.acf) {
		window.acf.addAction('render_block_preview/type=acf-uds-text-marquee', function() {
			setTimeout(function() {
				initMarquee();
				checkReducedMotion();
			}, 100);
		});
	}
})();
