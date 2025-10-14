/**
 * Data Layer Analytics Script
 *
 * This script handles analytics tracking for various elements and pushes event data
 * to the Google Analytics data layer.
 *
 * Combined Bootstrap 5 specific analytics (from pitchfork-blocks) with ASU Unity Stack
 * general analytics to provide comprehensive event tracking.
 *
 * @package UDS WordPress Theme
 */

function initDataLayer() {
	/**
	 * Push events to data layer (Google Analytics)
	 * Used by Header and General events.
	 */
	const pushGAEvent = event => {
		window.dataLayer = window.dataLayer || [];
		const { dataLayer } = window;
		if (dataLayer) dataLayer.push(event);
	};

	// Accordions. Events emitted by the body which uses BS5 collapse.
	document.querySelectorAll('.accordion-body').forEach((element) => {

		element.addEventListener('hide.bs.collapse', function () {
			const name = element.getAttribute('id') || 'unknown-accordion';
			const event = 'collapse';
			const action = 'hide';
			const type = 'click';
			const section = 'default';
			const region = 'main-content';
			const text = document.querySelector(`a[data-bs-target="#${element.id}"]`).textContent.slice(0, 40);

			pushGAEvent({
				name: name.toLowerCase(),
				event: event.toLowerCase(),
				action: action.toLowerCase(),
				type: type.toLowerCase(),
				section: section.toLowerCase(),
				region: region.toLowerCase(),
				text: text.toLowerCase(),
			});
		});

		element.addEventListener('show.bs.collapse', function () {
			const name = element.getAttribute('id') || 'unknown-accordion';
			const event = 'collapse';
			const action = 'show';
			const type = 'click';
			const section = 'default';
			const region = 'main-content';
			const text = document.querySelector(`a[data-bs-target="#${element.id}"]`).textContent.slice(0, 40);

			pushGAEvent({
				name: name.toLowerCase(),
				event: event.toLowerCase(),
				action: action.toLowerCase(),
				type: type.toLowerCase(),
				section: section.toLowerCase(),
				region: region.toLowerCase(),
				text: text.toLowerCase(),
			});
		});
	});

	// Sidebar menu items. Track open close events.
	document.querySelectorAll('.sidebar .card-body').forEach((element) => {

		// Because the sidebar menu items are nested in another expandable element,
		// We need to ignore the event emitted for showing the sidebar on mobile if it wasn't clicked directly.
		// Best way to do that is to test the element that was actually clicked.

		if (document.querySelector(`a[data-bs-target="#${element.id}"]`)) {
			element.addEventListener('hide.bs.collapse', function () {
				const name = element.getAttribute('id') || 'unknown-sidebar';
				const event = 'collapse';
				const action = 'hide';
				const type = 'click';
				const section = 'sidebar-menu';
				const region = 'sidebar';
				const text = document.querySelector(`a[data-bs-target="#${element.id}"]`).textContent.slice(0, 40);

				pushGAEvent({
					name: name.toLowerCase(),
					event: event.toLowerCase(),
					action: action.toLowerCase(),
					type: type.toLowerCase(),
					section: section.toLowerCase(),
					region: region.toLowerCase(),
					text: text.toLowerCase(),
				});
			});

			element.addEventListener('show.bs.collapse', function () {
				const name = element.getAttribute('id') || 'unknown-sidebar';
				const event = 'collapse';
				const action = 'show';
				const type = 'click';
				const section = 'sidebar-menu';
				const region = 'sidebar';
				const text = document.querySelector(`a[data-bs-target="#${element.id}"]`).textContent.slice(0, 40);

				pushGAEvent({
					name: name.toLowerCase(),
					event: event.toLowerCase(),
					action: action.toLowerCase(),
					type: type.toLowerCase(),
					section: section.toLowerCase(),
					region: region.toLowerCase(),
					text: text.toLowerCase(),
				});
			});
		} else {

			// This was an event specifically for the mobile menu expand of the sidebar.
			// Ignore it for now.

		}

	});

	// Sidebar mobile menu. Track open close events.
	document.querySelectorAll('nav.sidebar').forEach((element) => {

		element.addEventListener('hide.bs.collapse', function () {
			const name = element.getAttribute('id') || 'unknown-sidebar';
			const event = 'collapse';
			const action = 'hide';
			const type = 'click';
			const section = 'sidebar-mobile';
			const region = 'main-content';
			const text = document.querySelector(`.sidebar-toggler[data-bs-target="#${element.id}"]`).textContent;

			pushGAEvent({
				name: name.toLowerCase(),
				event: event.toLowerCase(),
				action: action.toLowerCase(),
				type: type.toLowerCase(),
				section: section.toLowerCase(),
				region: region.toLowerCase(),
				text: text.toLowerCase(),
			});
		});

		element.addEventListener('show.bs.collapse', function () {
			const name = element.getAttribute('id') || 'unknown-sidebar';
			const event = 'collapse';
			const action = 'show';
			const type = 'click';
			const section = 'sidebar-mobile';
			const region = 'main-content';
			const text = document.querySelector(`.sidebar-toggler[data-bs-target="#${element.id}"]`).textContent;

			pushGAEvent({
				name: name.toLowerCase(),
				event: event.toLowerCase(),
				action: action.toLowerCase(),
				type: type.toLowerCase(),
				section: section.toLowerCase(),
				region: region.toLowerCase(),
				text: text.toLowerCase(),
			});
		});

	});

	// Alerts and banners. Events emitted by the .alert element which uses BS5 collapse.
	document.querySelectorAll('.alert').forEach((element) => {

		// While we are here, let's move the focus appropriately. We'll need the index later.
		// Recommendation from BS 5: https://getbootstrap.com/docs/5.2/components/alerts/#dismissing
		var allFocusableElements = document.querySelectorAll(
			'a[href], button, input, select, textarea, [tabindex]:not([tabindex="-1"])'
		);
		var alertButton = element.querySelector('button');
		var dismissedIndex = Array.from(allFocusableElements).indexOf(alertButton);

		element.addEventListener('close.bs.alert', function () {
			const name = element.getAttribute('id') || 'unknown-dismiss';
			const event = 'dismiss';
			const action = 'close';
			const type = 'click';
			const section = 'default';
			const region = 'main-content';

			// Fancy selector will find .alert-content and .banner-content
			const text = element.querySelector('[class*=content]').textContent.slice(0, 40);

			pushGAEvent({
				name: name.toLowerCase(),
				event: event.toLowerCase(),
				action: action.toLowerCase(),
				type: type.toLowerCase(),
				section: section.toLowerCase(),
				region: region.toLowerCase(),
				text: text.toLowerCase(),
			});

			if (dismissedIndex !== -1 && dismissedIndex < allFocusableElements.length - 1) {
				// Focus on the next element
				var nextElement = allFocusableElements[dismissedIndex + 1];
				nextElement.focus();
			}

		});

	});

	// General click events for elements with data-ga attributes
	// This ensures template block analytics continue to work
	document.querySelectorAll('[data-ga]').forEach((element) => {
		element.addEventListener('click', function () {
			const name = element.getAttribute('data-ga-name') || '';
			const event = element.getAttribute('data-ga-event') || 'click';
			let action = element.getAttribute('data-ga-action') || 'click';
			const expanded = element.getAttribute('aria-expanded');
			if (expanded) {
				action = expanded === 'false' ? 'open' : 'close';
			}
			const type = element.getAttribute('data-ga-type') || 'click';
			const section = element.getAttribute('data-ga-section') || 'default';
			const region = element.getAttribute('data-ga-region') || 'main-content';
			const text = element.getAttribute('data-ga') || element.textContent.trim().slice(0, 40);
			const component = element.getAttribute('data-ga-component') || '';

			pushGAEvent({
				name: name.toLowerCase(),
				event: event.toLowerCase(),
				action: action.toLowerCase(),
				type: type.toLowerCase(),
				section: section.toLowerCase(),
				region: region.toLowerCase(),
				text: text.toLowerCase(),
				...(component && {
					component: component.toLowerCase(),
				}),
			});
		});
	});

}
