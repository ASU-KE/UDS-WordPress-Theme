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
			const spans = track.querySelectorAll('.marquee-text');
			const playBtn = marquee.querySelector('.uds-marquee-play-btn');
			const pauseBtn = marquee.querySelector('.uds-marquee-pause-btn');
			const duration = parseFloat(marquee.getAttribute('data-animation-duration')) || 10;

			// Equalize span widths so all items scroll at the same speed,
			// and space items so the next one enters the viewport only after
			// the previous has traveled 50% across the page.
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

				// The CSS keyframe travels a total distance of
				// max(100vw, itemWidth) + itemWidth + 100vw.
				// A delay fraction of (50vw / totalDistance) spaces
				// consecutive items 50% of the viewport apart.
				const vw = document.documentElement.clientWidth;
				const totalDistance = Math.max(vw, maxWidth) + maxWidth + vw;
				const delayFraction = Math.max((vw / 2) / totalDistance, 0.05);

				// Ensure enough items exist to fill the entire animation
				// cycle so there are no empty gaps.
				const itemsNeeded = Math.min(Math.ceil(1 / delayFraction), 20);
				const originalSpans = Array.from(spans);
				for (let i = originalSpans.length; i < itemsNeeded; i++) {
					const source = originalSpans[i % originalSpans.length];
					const clone = source.cloneNode(true);
					clone.setAttribute('aria-hidden', 'true');
					clone.style.width = maxWidth + 'px';
					track.appendChild(clone);
				}

				// Apply calculated animation delays to every span.
				const allSpans = track.querySelectorAll('.marquee-text');
				allSpans.forEach(function(span, index) {
					span.style.animationDelay = -(index * delayFraction * duration) + 's';
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
