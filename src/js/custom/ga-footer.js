() => {
	document.querySelectorAll("[data-ga-footer]").forEach((element) =>
		element.addEventListener("focus", () => {
			((args) => {
				const { dataLayer } = window,
					event = {
						event: "link",
						action: "click",
						name: "onclick",
						region: "footer",
						...args,
					};
				dataLayer && dataLayer.push(event);
			})({
				type: element.getAttribute("data-ga-footer-type").toLowerCase(),
				section: element.getAttribute("data-ga-footer-section").toLowerCase(),
				text: element.getAttribute("data-ga-footer").toLowerCase(),
			});
		})
	);
};
