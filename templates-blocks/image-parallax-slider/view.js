/**
 * Image Parallax Slider - Frontend JavaScript
 * 
 * Initializes parallax effect with WCAG 2.1 compliance
 * - Checks for reduced motion preference
 * - Provides pause/play controls
 * - Uses requestAnimationFrame for smooth animation
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
     * Initialize parallax effect for a single block
     * @param {HTMLElement} block - The parallax block element
     */
    function initImageParallax(block) {
        const container = block.querySelector('.parallax-container');
        const layers = block.querySelectorAll('.parallax-layer');
        const pauseBtn = block.querySelector('.parallax-pause-btn');
        const pauseIcon = pauseBtn.querySelector('.pause-icon');
        const playIcon = pauseBtn.querySelector('.play-icon');
        
        let isPaused = false;
        let ticking = false;
        let lastScrollY = window.scrollY;

        // If user prefers reduced motion, disable parallax and hide pause button
        if (prefersReducedMotion()) {
            block.classList.add('reduced-motion');
            pauseBtn.style.display = 'none';
            return;
        }

        /**
         * Update parallax positions based on scroll
         */
        function updateParallax() {
            if (isPaused) {
                ticking = false;
                return;
            }

            const scrollY = window.scrollY;
            const blockTop = block.offsetTop;
            const blockHeight = block.offsetHeight;
            const viewportHeight = window.innerHeight;
            
            // Only apply parallax when block is in viewport
            if (scrollY + viewportHeight > blockTop && scrollY < blockTop + blockHeight) {
                const relativeScroll = scrollY - blockTop + viewportHeight;
                
                layers.forEach(function(layer) {
                    const speed = parseFloat(layer.getAttribute('data-parallax-speed')) || 1;
                    const translateY = (relativeScroll - viewportHeight) * (1 - speed) * 0.5;
                    layer.style.transform = 'translateY(' + translateY + 'px)';
                });
            }
            
            ticking = false;
        }

        /**
         * Request animation frame for smooth scrolling
         */
        function requestTick() {
            if (!ticking) {
                window.requestAnimationFrame(updateParallax);
                ticking = true;
            }
        }

        /**
         * Handle scroll events
         */
        function onScroll() {
            lastScrollY = window.scrollY;
            requestTick();
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
            } else {
                block.classList.remove('parallax-paused');
                pauseIcon.style.display = 'inline';
                playIcon.style.display = 'none';
                pauseBtn.setAttribute('aria-label', 'Pause parallax animation');
                requestTick();
            }
        }

        // Initialize scroll listener
        window.addEventListener('scroll', onScroll, { passive: true });
        
        // Initialize pause button
        pauseBtn.addEventListener('click', togglePause);
        
        // Initial parallax position
        updateParallax();

        // Update on resize
        window.addEventListener('resize', function() {
            if (!isPaused) {
                requestTick();
            }
        }, { passive: true });
    }

    /**
     * Initialize all parallax blocks on the page
     */
    function initAllParallaxBlocks() {
        const blocks = document.querySelectorAll('[data-parallax-block="true"]');
        blocks.forEach(function(block) {
            initImageParallax(block);
        });
    }

    // Initialize when DOM is ready
    window.addEventListener('DOMContentLoaded', function(event) {
        initAllParallaxBlocks();
    });

    // Also expose function globally if UDS Bootstrap expects it
    if (typeof window.unityBootstrap === 'undefined') {
        window.unityBootstrap = {};
    }
    window.unityBootstrap.initImageParallax = initAllParallaxBlocks;

})();
