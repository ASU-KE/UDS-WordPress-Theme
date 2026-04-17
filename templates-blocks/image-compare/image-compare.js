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

		if (!wrapper || !handle || !after) {
			return;
		}

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

		function onMouseUp() {
			isDragging = false;
			document.removeEventListener("mouseup", onMouseUp);
		}

		function onTouchEnd() {
			isDragging = false;
			document.removeEventListener("touchend", onTouchEnd);
		}

		// Drag mode: update position on mouse/touch move while dragging
		if (slideMode === "drag") {
			handle.addEventListener("mousedown", function () {
				isDragging = true;
				document.addEventListener("mouseup", onMouseUp);
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

		// Touch events
		handle.addEventListener(
			"touchstart",
			function () {
				isDragging = true;
				document.addEventListener("touchend", onTouchEnd);
			},
			{ passive: true },
		);

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

		// Keyboard support
		handle.addEventListener("keydown", function (e) {
			var cur = parseFloat(handle.getAttribute("aria-valuenow"));
			var next;

			switch (e.key) {
				case "ArrowRight":
				case "ArrowUp":
					next = cur + 2;
					break;
				case "ArrowLeft":
				case "ArrowDown":
					next = cur - 2;
					break;
				case "Home":
					next = 0;
					break;
				case "End":
					next = 100;
					break;
				default:
					return;
			}

			e.preventDefault();
			setPosition(Math.max(0, Math.min(100, next)));
		});
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
