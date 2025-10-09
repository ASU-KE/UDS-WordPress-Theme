document.addEventListener('DOMContentLoaded', function () {

	function initBootstrapDataLayer() {
		/**
		 * Push events to data layer (Google Analytics)
		 * Used by Header and General events.
		 */
		const pushGAEvent = (event) => {
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

				// console.log('Hide event. ' + name);

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

				// console.log('"Show yourself!" ~Elsa. ' + name);

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

					// console.log('Sidebar menu hide. ' + name);

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

					// console.log('Sidebar menu show.' + name);

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

				// console.log('Sidebar menu hide. ' + name);

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

				// console.log('Sidebar menu show.' + name);

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

				console.log('Close alert/banner. ' + name);

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

	}

	initBootstrapDataLayer();

});