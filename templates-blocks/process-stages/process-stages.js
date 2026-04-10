/**
 * UDS Process Stages – SVG Connector Lines
 *
 * Draws lines between consecutive circle elements inside each
 * .uds-process-flow block. Lines are recalculated on resize so
 * they stay aligned at every screen width.
 */

(function () {
	"use strict";

	function drawConnectors(section) {
		// SVG will contain all the lines being shown
		var svg = section.querySelector(".process-svg");
		var container = section.querySelector(".process-container");
		if (!svg || !container) return;

		var steps = container.querySelectorAll(".process-step");
		if (steps.length < 2) return;

		// The getBoundingClientRect() method returns a DOMRect object containing the size
		// and position of an element relative to the viewport
		var sectionRect = section.getBoundingClientRect();
		svg.setAttribute("width", sectionRect.width);
		svg.setAttribute("height", sectionRect.height);
		svg.setAttribute(
			"viewBox",
			"0 0 " + sectionRect.width + " " + sectionRect.height,
		);

		svg.innerHTML = "";

		// Loop through all the circles
		for (var i = 0; i < steps.length - 1; i++) {
			var circleA = steps[i].querySelector(".placeholder-circle, .round-img");
			var circleB = steps[i + 1].querySelector(
				".placeholder-circle, .round-img",
			);
			if (!circleA || !circleB) continue;

			var rectA = circleA.getBoundingClientRect();
			var rectB = circleB.getBoundingClientRect();

			// Centre of each circle relative to the section
			var x1 = rectA.left + rectA.width / 2 - sectionRect.left;
			var y1 = rectA.top + rectA.height / 2 - sectionRect.top;
			var x2 = rectB.left + rectB.width / 2 - sectionRect.left;
			var y2 = rectB.top + rectB.height / 2 - sectionRect.top;

			// Calculate the length of line required
			var dx = x2 - x1;
			var dy = y2 - y1;
			var dist = Math.sqrt(dx * dx + dy * dy);

			// Skip if circles overlap
			var radius = rectA.width / 2;
			if (dist < radius * 2) continue;

			// Shortening the line so that it stops at the edge of the circle.
			// dx/dist gives the horizontal component of a direction and
			// multiplying it with radius gives the pixels to move to reach the edge of the circle.
			var inset = radius * 0.8; // Adjust this factor to control how much the line overlaps with the circle
			var offsetX = (dx / dist) * inset;
			var offsetY = (dy / dist) * inset;

			// Create a line and append it to SVG
			var line = document.createElementNS("http://www.w3.org/2000/svg", "line");
			line.setAttribute("x1", x1 + offsetX);
			line.setAttribute("y1", y1 + offsetY);
			line.setAttribute("x2", x2 - offsetX);
			line.setAttribute("y2", y2 - offsetY);
			svg.appendChild(line);
		}
	}

	var MOBILE_BREAKPOINT = 768;

	function updateLayout(section) {
		var isMobile = window.innerWidth <= MOBILE_BREAKPOINT;
		var defaultVertical = section.dataset.layout === "vertical";

		if (isMobile || defaultVertical) {
			section.classList.add("layout-vertical");
		} else {
			section.classList.remove("layout-vertical");
		}
	}

	function initBlock(section) {
		updateLayout(section);
		drawConnectors(section);

		var timer;
		function redraw() {
			clearTimeout(timer);
			timer = setTimeout(function () {
				drawConnectors(section);
			}, 50);
		}

		window.addEventListener("resize", function () {
			redraw();
			updateLayout(section);
		});
		window.addEventListener("orientationchange", redraw);

		// Watch this section's class for layout toggle
		new MutationObserver(function (mutations) {
			for (var i = 0; i < mutations.length; i++) {
				if (mutations[i].attributeName === "class") {
					redraw();
					return;
				}
			}
		}).observe(section, { attributes: true });
	}

	function initAll() {
		var sections = document.querySelectorAll(".uds-process-flow");
		for (var i = 0; i < sections.length; i++) {
			initBlock(sections[i]);
		}
	}
	window.addEventListener("load", initAll);
})();
