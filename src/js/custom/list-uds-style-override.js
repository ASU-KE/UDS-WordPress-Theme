//uds style overrides default wordpress list, need to pass the right counter and reverse options
const lists = document.querySelectorAll('ol.uds-list')
//for each list, check if start or reversed exist
//if exist, for each li apply content
console.log(lists)
lists.forEach(list => {
	console.log(list)
	if(list.reversed){

		for (let i = list.children.length -1, ii = 1; i >= 0, ii <= list.children.length; i--, ii++) {
			let element = list.children[i]
			element.setAttribute('data-content',ii)
			document.head.insertAdjacentHTML(
				"beforeend",
				`<style>ol.uds-list.is-style-steplist li:before { content: attr(data-content) !important; }</style>`
			)
			//let style = getComputedStyle(element, ":before")
			//style.content = i.toString
			//console.log(style)

			// let newCSS = `ol.uds-list.is-style-steplist li:before {content:${i};}`
			// let dataContent = i
			// let dataContentCSS = ``
			//element.content = i.toString
			//console.log(element)
			//var content = Window.getComputedStyle(document.getElementsByTagName('ol.uds-list li'), ':before').getPropertyValue('content')
			//console.log(content)
			//const h3 = document.querySelector("h3");
			//const result = getComputedStyle(h3, ":after").content;


			// const listItems = document.querySelectorAll("ol.uds-list li");
			// Array.from(listItems).forEach(item => {
			// 	const compStyles = window.getComputedStyle(item, "::marker");
			// 	console.log(compStyles)
			// });
			console.log(element)
			//const compStyles = window.getComputedStyle(para);

		}
		// let numListItems = list.children.length
		// console.log(numListItems)
		// console.log(list.children)
		// Array.from(list.children).forEach(item => {

		// })

	} else if(list.start) {

	} else if(list.reversed && list.start) {

	}
	// const listItems = list.children
	// console.log(listItems)
	// Array.from(listItems).forEach(item => {
	// 	console.log(item)
	// 	var content = window.getComputedStyle(
	// 		document.querySelector('ol.uds-list li'), ':before'
	// 	)
	// 	console.log(content)
	// });
});

// jQuery( "ol" ).each(function() {
// 	jQuery.each("li").each(function(){
// 		let element = jQuery(this)
// 		let item = window.getComputedStyle(element,'::marker')
// 		let content = item['content'];
// 		console.log(content)
// 		//var str = "bar";
// 		//document.styleSheets[0].insertRule('p:before', 'content: attr(data-before) !important;');

// // $('p').on('click', function() {
// //   $(this).attr('data-before', str);
// // });
// 	});
// 	// if (jQuery(this).attr('reversed', true)){
// 	// 	//for each li, get marker content, apply to before
// 	// 	const val='reversed(listcounter)';
// 	// 	jQuery(this ).css('counter-reset',val );
// 	// 	console.log('reversed')
// 	// } else if (jQuery(this).attr("start")){
// 	// 	let val= 1;
// 	// 	val=jQuery(this).attr("start");
// 	// 	val=val-1;
// 	// 	val='listcounter '+ val;
// 	// 	jQuery(this ).css('counter-reset',val );
// 	// 	console.log('start counter')
// 	// } else if (jQuery(this).attr("start") && jQuery(this).attr("reversed")){
// 	// 	let val= 1;
// 	// 	val=jQuery(this).attr("start");
// 	// 	val=val-1;
// 	// 	val='reversed(listcounter) '+ val;
// 	// 	jQuery(this ).css('counter-reset',val );
// 	// 	console.log('both ran lol')
// 	// }
// 	// console.log('ol is here, but nothing attributes')
// });
