/**
 * Data Layer Analytics Script
 * 
 * This script handles click event tracking for elements with data-ga-* attributes
 * and pushes event data to the Google Analytics data layer.
 * 
 * Based on CLAS Drupal distribution requirements for feature parity.
 * 
 * @package UDS WordPress Theme
 */

(function($) {
    'use strict';

    /**
     * Initialize data layer click tracking
     */
    function initDataLayerTracking() {
        // Ensure dataLayer exists
        window.dataLayer = window.dataLayer || [];

        // Add click event listener to document for elements with data-ga attributes
        $(document).on('click', '[data-ga]', function(event) {
            var $element = $(this);
            var eventData = {};

            // Base event structure
            eventData.event = 'gaEvent';
            eventData.eventCategory = 'engagement';
            eventData.eventAction = 'click';

            // Extract data-ga-* attributes
            var dataGa = $element.data('ga') || $element.attr('data-ga');
            var dataGaName = $element.data('ga-name') || $element.attr('data-ga-name');
            var dataGaEvent = $element.data('ga-event') || $element.attr('data-ga-event');
            var dataGaAction = $element.data('ga-action') || $element.attr('data-ga-action');
            var dataGaType = $element.data('ga-type') || $element.attr('data-ga-type');
            var dataGaRegion = $element.data('ga-region') || $element.attr('data-ga-region');
            var dataGaSection = $element.data('ga-section') || $element.attr('data-ga-section');
            var dataGaText = $element.data('ga-text') || $element.attr('data-ga-text');

            // Set event properties based on available data-ga attributes
            if (dataGa) {
                eventData.eventLabel = dataGa;
            }

            if (dataGaName) {
                eventData.eventName = dataGaName;
            }

            if (dataGaEvent) {
                eventData.event = dataGaEvent;
            }

            if (dataGaAction) {
                eventData.eventAction = dataGaAction;
            }

            if (dataGaType) {
                eventData.eventCategory = dataGaType;
                eventData.linkType = dataGaType;
            }

            if (dataGaRegion) {
                eventData.region = dataGaRegion;
            }

            if (dataGaSection) {
                eventData.section = dataGaSection;
            }

            if (dataGaText) {
                eventData.text = dataGaText;
            }

            // Get link information if element is a link
            if ($element.is('a')) {
                var href = $element.attr('href');
                if (href) {
                    eventData.linkUrl = href;
                    
                    // Determine if internal or external link
                    if (href.indexOf('asu.edu') !== -1 || href.indexOf('/') === 0 || href.indexOf('#') === 0) {
                        eventData.linkType = eventData.linkType || 'internal link';
                    } else {
                        eventData.linkType = eventData.linkType || 'external link';
                    }
                }
            }

            // Get button text or link text if not already specified
            if (!eventData.text && !dataGaText) {
                var elementText = $element.text().trim();
                if (elementText) {
                    eventData.text = elementText;
                }
            }

            // Add element type information
            eventData.elementType = $element.prop('tagName').toLowerCase();
            
            // Add timestamp
            eventData.timestamp = new Date().toISOString();

            // Push to dataLayer
            console.log('Data Layer Event:', eventData); // Debug logging
            window.dataLayer.push(eventData);
        });
    }

    /**
     * Initialize when document is ready
     */
    $(document).ready(function() {
        initDataLayerTracking();
    });

})(jQuery);