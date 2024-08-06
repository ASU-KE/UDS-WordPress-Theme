document.addEventListener('DOMContentLoaded', function() {
	let navbar = document.getElementsByClassName("sidebar")[0]
	if (navbar) {
		let active = navbar.getElementsByClassName("is-active")[0]
		let parentClass = active.parentElement
		if (parentClass.classList.contains("card-body")) {
			if(parentClass.classList.contains("collapse")){
				parentClass.classList.add("show")
			} else {
				parentClass.parentElement.classList.add("show")
			}
		}
	}
})
