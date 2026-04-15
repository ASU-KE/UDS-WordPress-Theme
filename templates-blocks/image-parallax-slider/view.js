window.addEventListener('DOMContentLoaded', function() {
    if (typeof window.unityBootstrap !== 'undefined' && typeof window.unityBootstrap.initImageParallax === 'function') {
        window.unityBootstrap.initImageParallax();
    } else {
        console.warn('UDS Bootstrap initImageParallax function not available');
    }
});