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

			// Make all items scroll at the same speed and space them so
			// consecutive items never overlap — even when a long item is
			// followed by a short one.
			if (spans.length > 1) {
				// 1. Measure natural widths (incl. padding) before changing
				//    anything.  Keep track of the widest item.
				var widths = [];
				var maxWidth = 0;
				spans.forEach(function(span) {
					var w = span.offsetWidth;
					widths.push(w);
					if (w > maxWidth) {
						maxWidth = w;
					}
				});

				// 2. Set a CSS custom property so the keyframe animation uses
				//    the same travel distance for every span (uniform speed)
				//    WITHOUT altering their visible text widths.
				spans.forEach(function(span) {
					span.style.setProperty('--marquee-travel-width', maxWidth + 'px');
				});

				// 3. Per-item adaptive delays.
				//    Total animation distance (px) with the custom property:
				//      start = max(vw, maxWidth), end = -(maxWidth + vw)
				var vw = document.documentElement.clientWidth;
				var totalDistance = Math.max(vw, maxWidth) + maxWidth + vw;
				var halfVw = vw / 2;

				//    Build cumulative positions along the animation path.
				//    The spacing after each item is the larger of 50 vw and
				//    that item's own width, so visible text never overlaps.
				var positions = [0];
				for (var i = 0; i < spans.length - 1; i++) {
					var spacing = Math.max(halfVw, widths[i]);
					positions.push(positions[positions.length - 1] + spacing);
				}

				// 4. Determine the animation name (normal vs. reverse) so we
				//    can set the full inline animation and bypass any CSS
				//    cascade / specificity differences between browsers.
				var direction = marquee.getAttribute('data-direction');
				var animName = (direction === 'reverse')
					? 'marquee-scroll-span-reverse'
					: 'marquee-scroll-span';

				// 5. Apply computed animation and force a restart so the new
				//    timing takes effect immediately.
				//    Set individual properties (not the shorthand) so the CSS
				//    .paused rule can still toggle animation-play-state.
				var allSpans = track.querySelectorAll('.marquee-text');
				allSpans.forEach(function(span) {
					span.style.animationName = 'none';
				});
				void track.offsetWidth;

				allSpans.forEach(function(span, index) {
					span.style.setProperty('--marquee-travel-width', maxWidth + 'px');
					var delay = -(positions[index] / totalDistance) * duration;
					span.style.animationName = animName;
					span.style.animationDuration = duration + 's';
					span.style.animationTimingFunction = 'linear';
					span.style.animationIterationCount = 'infinite';
					span.style.animationDelay = delay + 's';
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
