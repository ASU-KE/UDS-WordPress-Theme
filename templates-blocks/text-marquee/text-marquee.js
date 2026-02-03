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
			const pauseBtn = marquee.querySelector('.uds-marquee-pause-btn');
			const srText = pauseBtn.querySelector('.sr-only');
			const duration = marquee.getAttribute('data-animation-duration') || 10;
			const direction = marquee.getAttribute('data-direction') || 'normal';
			
			// Set CSS custom properties for animation
			content.style.setProperty('--marquee-duration', duration + 's');
			content.style.setProperty('--marquee-direction', direction);
			
			// Pause/play button functionality
			if (pauseBtn) {
				pauseBtn.addEventListener('click', function() {
					toggleMarquee(content, pauseBtn, srText);
				});
				
				// Keyboard support - Space and Enter
				pauseBtn.addEventListener('keydown', function(e) {
					if (e.key === ' ' || e.key === 'Enter') {
						e.preventDefault();
						toggleMarquee(content, pauseBtn, srText);
					}
				});
			}
			
			// Pause on hover for better UX
			marquee.addEventListener('mouseenter', function() {
				if (!content.classList.contains('paused')) {
					content.classList.add('paused');
				}
			});
			
			marquee.addEventListener('mouseleave', function() {
				// Only resume if not manually paused
				if (!pauseBtn.getAttribute('aria-pressed') || pauseBtn.getAttribute('aria-pressed') === 'false') {
					content.classList.remove('paused');
				}
			});
			
			// Pause when button is focused for accessibility
			pauseBtn.addEventListener('focus', function() {
				if (!content.classList.contains('paused')) {
					content.classList.add('paused');
				}
			});
			
			// Resume when button loses focus (if not manually paused)
			pauseBtn.addEventListener('blur', function() {
				if (!pauseBtn.getAttribute('aria-pressed') || pauseBtn.getAttribute('aria-pressed') === 'false') {
					content.classList.remove('paused');
				}
			});
		});
	}
	
	/**
	 * Toggle marquee animation state
	 */
	function toggleMarquee(content, button, srText) {
		const isPaused = button.getAttribute('aria-pressed') === 'true';
		
		if (isPaused) {
			// Resume animation
			content.classList.remove('paused');
			button.setAttribute('aria-pressed', 'false');
			button.setAttribute('aria-label', 'Pause scrolling text');
			srText.textContent = 'Pause';
		} else {
			// Pause animation
			content.classList.add('paused');
			button.setAttribute('aria-pressed', 'true');
			button.setAttribute('aria-label', 'Play scrolling text');
			srText.textContent = 'Play';
		}
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
				const pauseBtn = marquee.querySelector('.uds-marquee-pause-btn');
				
				// Pause the animation
				if (content) {
					content.classList.add('paused');
				}
				
				// Update button state and keep it accessible but visually hidden
				if (pauseBtn) {
					pauseBtn.setAttribute('aria-pressed', 'true');
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
