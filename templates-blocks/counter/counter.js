document.addEventListener("DOMContentLoaded", () => {
	const counters = document.querySelectorAll("[data-uds-counter]");
	const prefersReducedMotion = window.matchMedia(
		"(prefers-reduced-motion: reduce)",
	).matches;

	const observer = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting) {
					animateCounter(entry.target);
					observer.unobserve(entry.target);
				}
			});
		},
		{ threshold: 0.5 },
	);

	counters.forEach((counter) => observer.observe(counter));

	function announceValue(el, value) {
		const liveEl = el
			.closest("[data-uds-counter-wrapper]")
			.querySelector("[data-uds-counter-live]");
		if (liveEl) {
			liveEl.textContent = value.toLocaleString();
		}
	}

	function animateCounter(el) {
		const start = parseInt(el.dataset.start, 10) || 0;
		const end = parseInt(el.dataset.end, 10) || 100;
		// Clamp duration and steps to valid minimums to prevent divide-by-zero.
		const duration = Math.max(1, parseInt(el.dataset.duration, 10) || 2000);
		const steps = Math.max(1, parseInt(el.dataset.step, 10) || 10);

		// Respect prefers-reduced-motion: skip animation and show the final value.
		if (prefersReducedMotion) {
			el.textContent = end.toLocaleString();
			announceValue(el, end);
			return;
		}

		const increment = (end - start) / steps;
		const stepTime = duration / steps;
		let step = 0;

		// Set the start value before the interval fires to avoid a flash of the
		// server-rendered end value.
		el.textContent = start.toLocaleString();

		const timer = setInterval(() => {
			step++;
			const current =
				step >= steps ? end : Math.round(start + increment * step);
			el.textContent = current.toLocaleString();

			if (step >= steps) {
				clearInterval(timer);
				// Announce the final value to screen readers via the live region.
				announceValue(el, end);
			}
		}, stepTime);
	}
});
