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
     * Header click event tracking
     * Tracks clicks on header elements like navigation menus, logos, etc.
     */
    function initHeaderClickTracking() {
        // Track navigation menu clicks
        $(document).on('click', '#header-container a, .asu-header a, .navbar a, .nav-item a', function(event) {
            var $element = $(this);
            var href = $element.attr('href');
            var text = $element.text().trim();
            
            // Skip if already has data-ga attribute (to avoid double tracking)
            if ($element.attr('data-ga')) {
                return;
            }
            
            var eventData = {
                event: 'gaEvent',
                eventCategory: 'navigation',
                eventAction: 'click',
                eventLabel: text || href,
                linkUrl: href,
                region: 'header',
                section: 'navigation',
                elementType: 'link',
                timestamp: new Date().toISOString()
            };
            
            // Determine link type
            if (href) {
                if (href.indexOf('asu.edu') !== -1 || href.indexOf('/') === 0 || href.indexOf('#') === 0) {
                    eventData.linkType = 'internal link';
                } else {
                    eventData.linkType = 'external link';
                }
            }
            
            console.log('Header Click Event:', eventData);
            window.dataLayer.push(eventData);
        });
        
        // Track header logo clicks
        $(document).on('click', '.asu-header .navbar-brand, .header-logo', function(event) {
            var $element = $(this);
            
            // Skip if already has data-ga attribute
            if ($element.attr('data-ga')) {
                return;
            }
            
            var eventData = {
                event: 'gaEvent',
                eventCategory: 'navigation',
                eventAction: 'click',
                eventLabel: 'header logo',
                linkUrl: $element.attr('href') || $element.find('a').attr('href'),
                linkType: 'internal link',
                region: 'header',
                section: 'logo',
                elementType: 'logo',
                timestamp: new Date().toISOString()
            };
            
            console.log('Header Logo Click Event:', eventData);
            window.dataLayer.push(eventData);
        });
    }

    /**
     * Header search change event tracking
     * Tracks search input changes and submissions in header search forms
     */
    function initHeaderSearchTracking() {
        var searchTimer;
        
        // Track search input changes (with debouncing)
        $(document).on('input change', '#header-container input[type="search"], .asu-header input[type="search"], .search-form input, #searchform input', function(event) {
            var $element = $(this);
            var searchTerm = $element.val().trim();
            
            // Clear previous timer
            clearTimeout(searchTimer);
            
            // Set a timer to track after user stops typing (500ms delay)
            searchTimer = setTimeout(function() {
                if (searchTerm.length > 2) { // Only track meaningful searches
                    var eventData = {
                        event: 'gaEvent',
                        eventCategory: 'search',
                        eventAction: 'change',
                        eventLabel: searchTerm,
                        searchTerm: searchTerm,
                        region: 'header',
                        section: 'search',
                        elementType: 'input',
                        timestamp: new Date().toISOString()
                    };
                    
                    console.log('Header Search Change Event:', eventData);
                    window.dataLayer.push(eventData);
                }
            }, 500);
        });
        
        // Track search form submissions
        $(document).on('submit', '#header-container form, .asu-header form, .search-form, #searchform', function(event) {
            var $form = $(this);
            var $input = $form.find('input[type="search"], input[name="s"]');
            var searchTerm = $input.val().trim();
            
            var eventData = {
                event: 'gaEvent',
                eventCategory: 'search',
                eventAction: 'submit',
                eventLabel: searchTerm,
                searchTerm: searchTerm,
                region: 'header',
                section: 'search',
                elementType: 'form',
                timestamp: new Date().toISOString()
            };
            
            console.log('Header Search Submit Event:', eventData);
            window.dataLayer.push(eventData);
        });
        
        // Track search button clicks
        $(document).on('click', '#header-container button[type="submit"], .asu-header button[type="submit"], .search-form button, #searchsubmit', function(event) {
            var $button = $(this);
            var $form = $button.closest('form');
            var $input = $form.find('input[type="search"], input[name="s"]');
            var searchTerm = $input.val().trim();
            
            var eventData = {
                event: 'gaEvent',
                eventCategory: 'search',
                eventAction: 'click',
                eventLabel: searchTerm || 'search button',
                searchTerm: searchTerm,
                region: 'header',
                section: 'search',
                elementType: 'button',
                timestamp: new Date().toISOString()
            };
            
            console.log('Header Search Button Click Event:', eventData);
            window.dataLayer.push(eventData);
        });
    }

    /**
     * General input change event tracking
     * Tracks changes on form inputs across the site
     */
    function initInputChangeTracking() {
        var inputTimer = {};
        
        // Track input changes on forms (with debouncing)
        $(document).on('input change', 'input:not([type="submit"]):not([type="button"]):not([type="reset"]), textarea, select', function(event) {
            var $element = $(this);
            var elementId = $element.attr('id') || $element.attr('name') || 'unnamed';
            var inputType = $element.attr('type') || $element.prop('tagName').toLowerCase();
            var inputValue = $element.val();
            
            // Skip password fields for security
            if (inputType === 'password') {
                return;
            }
            
            // Skip if already tracked by search handlers
            if ($element.closest('#header-container, .asu-header, .search-form, #searchform').length > 0) {
                return;
            }
            
            // Clear previous timer for this element
            clearTimeout(inputTimer[elementId]);
            
            // Set a timer to track after user stops interacting (1000ms delay)
            inputTimer[elementId] = setTimeout(function() {
                var eventData = {
                    event: 'gaEvent',
                    eventCategory: 'form',
                    eventAction: 'change',
                    eventLabel: elementId,
                    inputType: inputType,
                    inputName: $element.attr('name'),
                    inputId: $element.attr('id'),
                    formId: $element.closest('form').attr('id'),
                    region: 'main content',
                    section: 'form',
                    elementType: 'input',
                    timestamp: new Date().toISOString()
                };
                
                // Add value for certain input types (avoid sensitive data)
                if (['checkbox', 'radio', 'select-one', 'select-multiple'].includes(inputType)) {
                    eventData.inputValue = inputValue;
                }
                
                console.log('Input Change Event:', eventData);
                window.dataLayer.push(eventData);
            }, 1000);
        });
        
        // Track form submissions
        $(document).on('submit', 'form:not(#searchform):not(.search-form)', function(event) {
            var $form = $(this);
            var formId = $form.attr('id') || 'unnamed-form';
            var formAction = $form.attr('action') || '';
            
            var eventData = {
                event: 'gaEvent',
                eventCategory: 'form',
                eventAction: 'submit',
                eventLabel: formId,
                formId: formId,
                formAction: formAction,
                region: 'main content',
                section: 'form',
                elementType: 'form',
                timestamp: new Date().toISOString()
            };
            
            console.log('Form Submit Event:', eventData);
            window.dataLayer.push(eventData);
        });
    }

    /**
     * Initialize when document is ready
     */
    $(document).ready(function() {
        initDataLayerTracking();
        initHeaderClickTracking();
        initHeaderSearchTracking();
        initInputChangeTracking();
    });

})(jQuery);