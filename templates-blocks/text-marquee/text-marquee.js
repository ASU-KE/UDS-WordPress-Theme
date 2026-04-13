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

			// Make all items scroll at the same speed and space them so the
			// next item does not appear until the previous one has crossed at
			// least 50 % of the viewport.
			if (spans.length > 1) {
				// 1. Measure the widest item (natural width incl. padding).
				let maxWidth = 0;
				spans.forEach(function(span) {
					var w = span.offsetWidth;
					if (w > maxWidth) {
						maxWidth = w;
					}
				});

				// 2. Set a CSS custom property so the keyframe animation uses
				//    the same travel distance for every span, giving uniform
				//    speed without altering visible text widths.
				spans.forEach(function(span) {
					span.style.setProperty('--marquee-travel-width', maxWidth + 'px');
				});

				// 3. Spacing between consecutive leading edges: at least 50 vw,
				//    but never less than the widest item so boxes never overlap.
				var vw = document.documentElement.clientWidth;
				var spacing = Math.max(vw / 2, maxWidth + 32);
				var totalDistance = Math.max(vw, maxWidth) + maxWidth + vw;
				var delayFraction = Math.max(spacing / totalDistance, 0.05);

				// 4. Clone extra spans to fill the animation cycle without gaps.
				var itemsNeeded = Math.min(Math.ceil(1 / delayFraction), 20);
				var originalSpans = Array.from(spans);
				for (var i = originalSpans.length; i < itemsNeeded; i++) {
					var source = originalSpans[i % originalSpans.length];
					var clone = source.cloneNode(true);
					clone.setAttribute('aria-hidden', 'true');
					clone.style.setProperty('--marquee-travel-width', maxWidth + 'px');
					track.appendChild(clone);
				}

				// 5. Apply computed delays and restart the animation so they
				//    take effect immediately (CSS delays set before JS runs
				//    are already baked into the running animation).
				var allSpans = track.querySelectorAll('.marquee-text');
				allSpans.forEach(function(span, index) {
					span.style.animationDelay = -(index * delayFraction * duration) + 's';
				});

				// Force a restart: briefly remove the animation name, trigger
				// a synchronous reflow, then let the CSS rule reassert itself.
				allSpans.forEach(function(span) {
					span.style.animationName = 'none';
				});
				void track.offsetWidth;
				allSpans.forEach(function(span) {
					span.style.removeProperty('animation-name');
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
