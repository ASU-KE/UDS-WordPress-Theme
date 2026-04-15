/**
 * UDS Image Compare Block JavaScript
 *
 * @package UDS WordPress Theme
 */

(function () {
	"use strict";
	function initImageCompare(container) {
		var wrapper = container.querySelector(".uds-image-compare-wrapper");
		var handle = container.querySelector(".uds-image-compare-handle");
		var after = container.querySelector(".uds-image-compare-after");

		var isVertical = wrapper.classList.contains("uds-image-compare--vertical");
		var slideMode = container.dataset.slideMode || "drag";
		var initialPos = parseFloat(container.dataset.initialPosition);

		if (isNaN(initialPos)) {
			initialPos = 50;
		}

		var isDragging = false;

		function getPosition(e) {
			var rect = wrapper.getBoundingClientRect();
			var pointer = e.touches ? e.touches[0] : e;
			var pos;

			if (isVertical) {
				pos = ((pointer.clientY - rect.top) / rect.height) * 100;
			} else {
				pos = ((pointer.clientX - rect.left) / rect.width) * 100;
			}

			return Math.max(0, Math.min(100, pos));
		}

		function setPosition(pos) {
			pos = Math.round(pos * 10) / 10;

			if (isVertical) {
				handle.style.top = pos + "%";
				after.style.clipPath = "inset(0 0 " + (100 - pos) + "% 0)";
			} else {
				handle.style.left = pos + "%";
				after.style.clipPath = "inset(0 " + (100 - pos) + "% 0 0)";
			}

			handle.setAttribute("aria-valuenow", Math.round(pos));
		}

		setPosition(initialPos);

		//Mouse specific event
		// Drag mode: update position on mouse/touch move while dragging
		if (slideMode === "drag") {
			handle.addEventListener("mousedown", function () {
				isDragging = true;
			});

			document.addEventListener("mouseup", function () {
				isDragging = false;
			});

			wrapper.addEventListener("mousemove", function (e) {
				if (isDragging) {
					setPosition(getPosition(e));
				}
			});

			// Hover mode: update position on mouse move without dragging
		} else if (slideMode === "hover") {
			wrapper.addEventListener("mousemove", function (e) {
				setPosition(getPosition(e));
			});
		}

		// Touch specific event
		handle.addEventListener(
			"touchstart",
			function () {
				isDragging = true;
			},
			{ passive: true },
		);

		document.addEventListener("touchend", function () {
			isDragging = false;
		});

		wrapper.addEventListener(
			"touchmove",
			function (e) {
				if (isDragging) {
					e.preventDefault();
					setPosition(getPosition(e));
				}
			},
			{ passive: false },
		);
	}

	function init() {
		document.querySelectorAll(".uds-image-compare").forEach(initImageCompare);
	}

	if (document.readyState === "loading") {
		document.addEventListener("DOMContentLoaded", init);
	} else {
		init();
	}
})();
