/**
 * Image Parallax Slider - Frontend JavaScript
 * 
 * Initializes parallax effect with WCAG 2.1 compliance using UDS Bootstrap
 * - Uses unityBootstrap.initImageParallax for parallax effect
 * - Checks for reduced motion preference
 * - Provides pause/play controls
 * 
 * @package UDS WordPress Theme
 */

(function() {
    'use strict';

    /**
     * Check if user prefers reduced motion
     * @returns {boolean} True if reduced motion is preferred
     */
    function prefersReducedMotion() {
        return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    }

    /**
     * Initialize accessibility features for parallax blocks
     */
    function initAccessibilityFeatures() {
        const blocks = document.querySelectorAll('[data-parallax-block="true"]');
        
        blocks.forEach(function(block) {
            const pauseBtn = block.querySelector('.parallax-pause-btn');
            
            if (!pauseBtn) {
                return;
            }
            
            const pauseIcon = pauseBtn.querySelector('.pause-icon');
            const playIcon = pauseBtn.querySelector('.play-icon');
            const containers = block.querySelectorAll('.parallax-container');
            
            let isPaused = false;

            // If user prefers reduced motion, disable parallax and hide pause button
            if (prefersReducedMotion()) {
                block.classList.add('reduced-motion');
                pauseBtn.style.display = 'none';
                return;
            }

            /**
             * Toggle pause/play state
             */
            function togglePause() {
                isPaused = !isPaused;
                
                if (isPaused) {
                    block.classList.add('parallax-paused');
                    pauseIcon.style.display = 'none';
                    playIcon.style.display = 'inline';
                    pauseBtn.setAttribute('aria-label', 'Play parallax animation');
                    
                    // Disable transitions when paused
                    containers.forEach(function(container) {
                        const img = container.querySelector('img');
                        if (img) {
                            img.style.transition = 'none';
                        }
                    });
                } else {
                    block.classList.remove('parallax-paused');
                    pauseIcon.style.display = 'inline';
                    playIcon.style.display = 'none';
                    pauseBtn.setAttribute('aria-label', 'Pause parallax animation');
                    
                    // Re-enable transitions
                    containers.forEach(function(container) {
                        const img = container.querySelector('img');
                        if (img) {
                            img.style.transition = '';
                        }
                    });
                }
            }

            // Initialize pause button
            pauseBtn.addEventListener('click', togglePause);
        });
    }

    // Initialize on window load (after all images are loaded)
    // This matches when UDS Bootstrap's initImageParallax runs
    window.addEventListener('load', function() {
        // The UDS Bootstrap initImageParallax is automatically called on window load
        // We delay our accessibility features initialization by 100ms to ensure
        // the parallax has been fully set up and image dimensions calculated first.
        // This prevents conflicts with UDS Bootstrap's image sizing operations.
        setTimeout(function() {
            initAccessibilityFeatures();
        }, 100);
    });

})();
