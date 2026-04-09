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
			const track = marquee.querySelector('.uds-marquee-track');
			const spans = marquee.querySelectorAll('.marquee-text');
			const playBtn = marquee.querySelector('.uds-marquee-play-btn');
			const pauseBtn = marquee.querySelector('.uds-marquee-pause-btn');

			// Equalize span widths so all items move at the same speed.
			// The CSS animation distance depends on the element's own width (100%),
			// so spans with different widths travel different distances in the same
			// duration, appearing to move at different speeds.
			if (spans.length > 1) {
				let maxWidth = 0;
				spans.forEach(function(span) {
					const width = span.offsetWidth;
					if (width > maxWidth) {
						maxWidth = width;
					}
				});
				spans.forEach(function(span) {
					span.style.width = maxWidth + 'px';
				});
			}
			
			// Initially hide play button
			if (playBtn) {
				playBtn.style.display = 'none';
			}
			
			// Pause button functionality
			if (pauseBtn) {
				pauseBtn.addEventListener('click', function() {
					pauseMarquee(track, playBtn, pauseBtn);
				});
				
				// Keyboard support - Space and Enter
				pauseBtn.addEventListener('keydown', function(e) {
					if (e.key === ' ' || e.key === 'Enter') {
						e.preventDefault();
						pauseMarquee(track, playBtn, pauseBtn);
					}
				});
			}
			
			// Play button functionality
			if (playBtn) {
				playBtn.addEventListener('click', function() {
					playMarquee(track, playBtn, pauseBtn);
				});
				
				// Keyboard support - Space and Enter
				playBtn.addEventListener('keydown', function(e) {
					if (e.key === ' ' || e.key === 'Enter') {
						e.preventDefault();
						playMarquee(track, playBtn, pauseBtn);
					}
				});
			}
		});
	}
	
	/**
	 * Pause marquee animation
	 */
	function pauseMarquee(track, playBtn, pauseBtn) {
		if (track) {
			track.classList.add('paused');
		}
		pauseBtn.style.display = 'none';
		playBtn.style.display = 'inline-block';
	}
	
	/**
	 * Play marquee animation
	 */
	function playMarquee(track, playBtn, pauseBtn) {
		if (track) {
			track.classList.remove('paused');
		}
		playBtn.style.display = 'none';
		pauseBtn.style.display = 'inline-block';
	}
	
	/**
	 * Check for reduced motion preference
	 */
	function checkReducedMotion() {
		const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
		
		if (prefersReducedMotion) {
			const marquees = document.querySelectorAll('.uds-text-marquee-wrapper');
			marquees.forEach(function(marquee) {
				const track = marquee.querySelector('.uds-marquee-track');
				const playBtn = marquee.querySelector('.uds-marquee-play-btn');
				const pauseBtn = marquee.querySelector('.uds-marquee-pause-btn');
				
				// Pause the animation
				if (track) {
					track.classList.add('paused');
				}
				
				// Hide both buttons when motion is disabled and remove from accessibility tree
				if (playBtn) {
					playBtn.hidden = true;
					playBtn.setAttribute('aria-hidden', 'true');
					playBtn.tabIndex = -1;
					if ('disabled' in playBtn) {
						playBtn.disabled = true;
					}
				}
				if (pauseBtn) {
					pauseBtn.hidden = true;
					pauseBtn.setAttribute('aria-hidden', 'true');
					pauseBtn.tabIndex = -1;
					if ('disabled' in pauseBtn) {
						pauseBtn.disabled = true;
					}
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

})();
