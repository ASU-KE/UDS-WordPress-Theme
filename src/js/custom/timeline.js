/**
 * Timeline Block JavaScript
 * 
 * Handles animations and carousel functionality for the UDS Timeline block.
 */

document.addEventListener('DOMContentLoaded', function() {
    
    /**
     * Initialize timeline animations
     */
    function initTimelineAnimations() {
        const animatedTimelines = document.querySelectorAll('.uds-timeline--animated');
        
        if (animatedTimelines.length === 0) return;
        
        // Create intersection observer for animation triggering
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const timeline = entry.target;
                    const items = timeline.querySelectorAll('.uds-timeline__item');
                    
                    // Add animation class to items with staggered delay
                    items.forEach(function(item, index) {
                        setTimeout(function() {
                            item.classList.add('animate-in');
                        }, index * 100);
                    });
                    
                    // Unobserve after animation
                    observer.unobserve(timeline);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        // Observe all animated timelines
        animatedTimelines.forEach(function(timeline) {
            observer.observe(timeline);
        });
    }
    
    /**
     * Initialize timeline carousels
     */
    function initTimelineCarousels() {
        const carouselTimelines = document.querySelectorAll('.uds-timeline--carousel');
        
        if (carouselTimelines.length === 0 || typeof Glide === 'undefined') return;
        
        carouselTimelines.forEach(function(timeline) {
            const timelineId = timeline.getAttribute('id');
            if (!timelineId) return;
            
            // Get layout type for responsive settings
            const isHorizontal = timeline.classList.contains('uds-timeline--horizontal');
            const perView = isHorizontal ? 3 : 1;
            
            // Initialize Glide carousel
            const glide = new Glide('#' + timelineId, {
                type: 'carousel',
                perView: perView,
                gap: 30,
                autoplay: false,
                hoverpause: true,
                keyboard: true,
                breakpoints: {
                    1200: {
                        perView: Math.min(perView, 2)
                    },
                    768: {
                        perView: 1
                    }
                }
            });
            
            try {
                glide.mount();
                
                // Add custom event listeners
                glide.on('move.after', function() {
                    // Re-trigger animations for newly visible items if needed
                    if (timeline.classList.contains('uds-timeline--animated')) {
                        const visibleItems = timeline.querySelectorAll('.glide__slide--active .uds-timeline__item');
                        visibleItems.forEach(function(item) {
                            if (!item.classList.contains('animate-in')) {
                                item.classList.add('animate-in');
                            }
                        });
                    }
                });
                
            } catch (error) {
                console.warn('Timeline carousel initialization failed:', error);
            }
        });
    }
    
    /**
     * Handle responsive behavior
     */
    function handleResponsiveBehavior() {
        const horizontalTimelines = document.querySelectorAll('.uds-timeline--horizontal');
        
        function checkScreenSize() {
            const isMobile = window.innerWidth < 768;
            
            horizontalTimelines.forEach(function(timeline) {
                if (isMobile) {
                    timeline.classList.add('uds-timeline--mobile');
                } else {
                    timeline.classList.remove('uds-timeline--mobile');
                }
            });
        }
        
        // Check on load and resize
        checkScreenSize();
        window.addEventListener('resize', debounce(checkScreenSize, 250));
    }
    
    /**
     * Utility function for debouncing
     */
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = function() {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    /**
     * Initialize all timeline functionality
     */
    function initTimelines() {
        initTimelineAnimations();
        initTimelineCarousels();
        handleResponsiveBehavior();
    }
    
    // Initialize on DOM ready
    initTimelines();
    
    // Re-initialize on AJAX content load (for dynamic content)
    document.addEventListener('uds-timeline-refresh', initTimelines);
    
    // Initialize after Gutenberg block updates (for editor)
    if (typeof wp !== 'undefined' && wp.domReady) {
        wp.domReady(initTimelines);
    }
});

/**
 * Expose refresh function globally for external use
 */
window.UDSTimeline = {
    refresh: function() {
        document.dispatchEvent(new CustomEvent('uds-timeline-refresh'));
    }
};