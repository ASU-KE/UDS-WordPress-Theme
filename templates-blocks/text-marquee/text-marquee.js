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

				// 2. Generate unique pixel-based @keyframes so every span
				//    travels the same distance (uniform speed) regardless of
				//    its own width.  This avoids relying on CSS custom
				//    properties inside @keyframes, which Firefox may not
				//    resolve, falling back to 100% (each item's own width)
				//    and producing different speeds / overlaps.
				var vw = document.documentElement.clientWidth;
				var startPos = Math.max(vw, maxWidth);
				var endPos = -(maxWidth + vw);
				var totalDistance = startPos - endPos;

				var uid = 'mq-' + Math.random().toString(36).substr(2, 9);
				var fwdName = uid;
				var revName = uid + '-rev';

				var styleEl = document.createElement('style');
				styleEl.textContent =
					'@keyframes ' + fwdName + '{' +
						'0%{transform:translateX(' + startPos + 'px)}' +
						'100%{transform:translateX(' + endPos + 'px)}' +
					'}' +
					'@keyframes ' + revName + '{' +
						'0%{transform:translateX(' + endPos + 'px)}' +
						'100%{transform:translateX(' + startPos + 'px)}' +
					'}';
				document.head.appendChild(styleEl);

				// 3. Per-item adaptive delays.
				//    In the animation cycle, item i+1 is to the LEFT of
				//    item i and its bounding box extends rightward by
				//    widths[i+1].  The gap between positions[i] and
				//    positions[i+1] must therefore be ≥ widths[i+1] so
				//    the next item's right edge doesn't overlap the
				//    current item's left edge.  We also enforce a 50 vw
				//    minimum so items feel well-spaced on screen.
				var halfVw = vw / 2;
				var positions = [0];
				for (var i = 0; i < spans.length - 1; i++) {
					var spacing = Math.max(halfVw, widths[i + 1]);
					positions.push(positions[positions.length - 1] + spacing);
				}

				// 4. Determine the animation name (normal vs. reverse).
				var direction = marquee.getAttribute('data-direction');
				var animName = (direction === 'reverse') ? revName : fwdName;

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
