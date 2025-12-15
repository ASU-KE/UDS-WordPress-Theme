/**
 * File accordion.js.
 *
 * Adds keyboard accessibility support for accordion/foldable card components.
 * Enables Space bar to toggle accordion state in addition to Enter/Return key.
 */
(function() {
    'use strict';

    function onSpaceKeyDown(e) {
        // Match original selectors: .accordion-header h3 a[role="button"], .accordion-header h4 a[role="button"]
        const trigger = e.target.closest('.accordion-header h3 a[role="button"], .accordion-header h4 a[role="button"]');
        if (!trigger) return;

        // Space key
        if (e.code === 'Space' || e.key === ' ' || e.keyCode === 32 || e.which === 32) {
            e.preventDefault();

            // Get target selector (data-bs-target preferred, fallback to href="#id")
            let targetSelector =
                trigger.getAttribute('data-bs-target') ||
                trigger.getAttribute('href');

            if (!targetSelector || targetSelector === 'collapse') return;
            // Ensure it's an ID selector (href might be full URL; only proceed if starts with #)
            if (!targetSelector.startsWith('#')) return;

            const targetEl = document.querySelector(targetSelector);
            if (!targetEl) return;

            if (window.bootstrap && bootstrap.Collapse) {
                const collapseInstance = bootstrap.Collapse.getOrCreateInstance(targetEl);
                collapseInstance.toggle();
            } else {
                // Fallback: toggle class (minimal)
                targetEl.classList.toggle('show');
            }
        }
    }

    document.addEventListener('keydown', onSpaceKeyDown);
})();
