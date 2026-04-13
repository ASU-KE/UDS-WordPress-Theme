document.addEventListener("DOMContentLoaded", () => {
	const counters = document.querySelectorAll("[data-uds-counter]");

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

	function animateCounter(el) {
		const start = parseInt(el.dataset.start, 10) || 0;
		const end = parseInt(el.dataset.end, 10) || 100;
		const duration = parseInt(el.dataset.duration, 10) || 2000;
		const steps = parseInt(el.dataset.step, 10) || 10;

		const increment = (end - start) / steps;
		const stepTime = duration / steps;
		let current = start;
		let step = 0;

		const timer = setInterval(() => {
			step++;
			current = step >= steps ? end : Math.round(start + increment * step);
			el.textContent = current.toLocaleString();

			if (step >= steps) clearInterval(timer);
		}, stepTime);
	}
});
