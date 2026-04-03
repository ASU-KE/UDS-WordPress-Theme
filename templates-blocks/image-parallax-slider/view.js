window.addEventListener('DOMContentLoaded', function() {
    if (typeof window.unityBootstrap !== 'undefined' && typeof window.unityBootstrap.initImageParallax === 'function') {
        window.unityBootstrap.initImageParallax();
    } else {
        console.warn('UDS Bootstrap initImageParallax function not available');
    }
});

// Fix for background image gap: the scroll handler in unity-bootstrap applies the parallax
// factor a second time when computing default_position, even though image_resizer already
// scaled the image to containerHeight * parallaxFactor. This override runs after
// unity-bootstrap's handler on each scroll (and on initial load) to apply the correct position.
window.addEventListener('load', function() {
    var correctParallaxPosition = function() {
        document.querySelectorAll('.uds-image-parallax-slider .parallax-container').forEach(function(container) {
            var img = container.querySelector('img');
            if (!img) return;
            var defaultPosition = container.offsetHeight - img.offsetHeight;
            var distanceToTravel = img.dataset.parallaxType === 'scroll-to'
                ? window.innerHeight
                : window.innerHeight + container.offsetHeight;
            var topOfContainer = container.getBoundingClientRect().top;
            var portion = (window.innerHeight - topOfContainer) / distanceToTravel;
            if (portion < 0) {
                img.style.top = defaultPosition + 'px';
            } else if (portion > 1) {
                img.style.top = '0';
            } else {
                img.style.top = (defaultPosition * (1 - portion)) + 'px';
            }
        });
    };

    correctParallaxPosition();

    var ticking = false;
    window.addEventListener('scroll', function() {
        if (!ticking) {
            requestAnimationFrame(function() {
                correctParallaxPosition();
                ticking = false;
            });
            ticking = true;
        }
    });
    window.addEventListener('resize', function() {
        requestAnimationFrame(correctParallaxPosition);
    });
});