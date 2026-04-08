/**
 * UDS Process Stages – SVG Connector Lines
 *
 * Draws lines between consecutive circle elements inside each
 * .uds-process-flow block. Lines are recalculated on resize so
 * they stay aligned at every screen width.
 */
(function () {
    'use strict';
    function drawConnectors(section) {
        var svg       = section.querySelector('.process-svg');
        var container = section.querySelector('.process-container');
        if (!svg || !container) return;

        var steps = container.querySelectorAll('.process-step');
        if (steps.length < 2) return;

        // The getBoundingClientRect() method returns a DOMRect object containing the size and position of an element relative to the viewport 
        var sectionRect = section.getBoundingClientRect();
        svg.setAttribute('width',   sectionRect.width);
        svg.setAttribute('height',  sectionRect.height);
        svg.setAttribute('viewBox', '0 0 ' + sectionRect.width + ' ' + sectionRect.height);

        svg.innerHTML = '';

        for (var i = 0; i < steps.length - 1; i++) {
            var circleA = steps[i].querySelector('.placeholder-circle, .round-img');
            var circleB = steps[i + 1].querySelector('.placeholder-circle, .round-img');
            if (!circleA || !circleB) continue;

            var rectA = circleA.getBoundingClientRect();
            var rectB = circleB.getBoundingClientRect();

            // Centre of each circle relative to the section
            var x1 = rectA.left + rectA.width  / 2 - sectionRect.left;
            var y1 = rectA.top  + rectA.height / 2 - sectionRect.top;
            var x2 = rectB.left + rectB.width  / 2 - sectionRect.left;
            var y2 = rectB.top  + rectB.height / 2 - sectionRect.top;

            // Shorten line so it starts/ends at circle edge
            var dx     = x2 - x1;
            var dy     = y2 - y1;
            var dist   = Math.sqrt(dx * dx + dy * dy);
            var radius = rectA.width / 2;

            // Skip if circles overlap
            if (dist < radius * 2) continue;

            var offsetX = (dx / dist) * radius;
            var offsetY = (dy / dist) * radius;

            var line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            line.setAttribute('x1', x1 + offsetX);
            line.setAttribute('y1', y1 + offsetY);
            line.setAttribute('x2', x2 - offsetX);
            line.setAttribute('y2', y2 - offsetY);
            svg.appendChild(line);
        }
    }

    /**
     * Redraw all process-flow sections on the page.
     */
    function drawAll() {
        var sections = document.querySelectorAll('.uds-process-flow');
        for (var i = 0; i < sections.length; i++) {
            drawConnectors(sections[i]);
        }
    }

    // --- Initialise ---

    // Debounce helper for resize
    var resizeTimer;
    function onResize() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(drawAll, 100);
    }

    // Run after page is fully laid out (images loaded, etc.)
    window.addEventListener('load', drawAll);
    window.addEventListener('resize', onResize);

    // Also run on DOMContentLoaded as a fast first pass
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', drawAll);
    } else {
        drawAll();
    }
})();