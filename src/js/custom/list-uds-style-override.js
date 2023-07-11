//uds style overrides default wordpress list, need to pass the right counter and reverse options
const lists = document.querySelectorAll('ol.uds-list.is-style-steplist')
lists.forEach(list => {
	if(list.reversed && list.start != 1){

		for (let i = list.children.length -1, ii = 1; i >= 0, ii <= list.children.length; i--, ii++) {
			let element = list.children[i]
			element.setAttribute('data-content',(ii+list.start))
		}

	} else if(list.reversed && list.start == 1) {

		for (let i = list.children.length -1, ii = 1; i >= 0, ii <= list.children.length; i--, ii++) {
			let element = list.children[i]
			element.setAttribute('data-content',ii)
		}

	} else {

		for (let i = 0, ii = list.start; i < list.children.length; i++, ii++) {
			let element = list.children[i]
			element.setAttribute('data-content',ii)
		}

	}

	document.head.insertAdjacentHTML(
		"beforeend",
		`<style>ol.uds-list.is-style-steplist li:before { content: attr(data-content) !important; }</style>`
	)
});
