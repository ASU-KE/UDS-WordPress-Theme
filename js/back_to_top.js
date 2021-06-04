/**
 * File back_to_top.js.
 *
 * JS for back to top button button.
 *
 */

 (function () {
   window.addEventListener('DOMContentLoaded', function () {
     let hasScrolledToNecessaryDepth = false;
     // Safari || Chrome, Firefox, IE, Opera
     let previousScrollPosition =
       document.body.scrollTop || document.documentElement.scrollTop;

     window.onscroll = function () {
       let currentScrollPosition =
         document.body.scrollTop || document.documentElement.scrollTop;

       // If back at top, hide the button
       if (currentScrollPosition === 0) {
         hasScrolledToNecessaryDepth = false;
         document.getElementById('uds-back-to-top').className =
           'uds-back-to-top-button';
       }
       // If scrolling past 150% vh, allow button to be displayed once scrolling back up
       else if (
         !hasScrolledToNecessaryDepth &&
         previousScrollPosition > window.innerHeight * 1.5
       ) {
         hasScrolledToNecessaryDepth = true;
       }
       // If they have scrolled to necessary depth, and are now scrolling back up, show the button
       else if (
         hasScrolledToNecessaryDepth &&
         currentScrollPosition < previousScrollPosition
       ) {
         document.getElementById('uds-back-to-top').className =
           'uds-back-to-top-button uds-back-to-top-button-show';
       }

       previousScrollPosition = currentScrollPosition;
     };

     document
       .getElementById('uds-back-to-top')
       .addEventListener('click', scrollToTop);
   });

   const scrollToTop = () => {
     const c = document.documentElement.scrollTop || document.body.scrollTop;
     // If that number is greater than 0, we'll scroll back to 0, or the top of the document.
     // We'll also animate that scroll with requestAnimationFrame:
     // https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
     if (c > 0) {
       window.requestAnimationFrame(scrollToTop);
       // ScrollTo takes an x and a y coordinate.
       // Increase the '10' value to get a smoother/slower scroll
       window.scrollTo(0, c - c / 10);
     }
   };
 })();

 /*
 ( function( $ ) {
	 var vh = $( window ).height();
	 $( window ).on( 'resize', function() {
		vh = $( window ).height();
	 });
	 //console.log('the   vh '+vh);
var position = $(window).scrollTop();
	$( window ).on( 'scroll', function() {

		var scroll = $(window).scrollTop();
		console.log('scroll '+scroll);
		console.log('position '+position);
    if(scroll > position) {
        console.log('scrollDown');
        //$('div').text('Scrolling Down Scripts');
    } else {
         console.log('scrollUp');
         //$('div').text('Scrolling Up Scripts');
    }
    position = scroll;


		//console.log($(document).scrollTop());
	//var scrollValue= window.pageYOffset;
		//console.log('the  scroll value '+scrollValue);
	//	var test=$( this ).scrollTop();
		//var scrollAmount=window.scrollTop();
		//console.log(test);
//var vh2= $(window).scrollTop();
//var showButton= currentPosition-window.scrollY;
//var currentPosition=window.scrollY;
//console.log('the windows scroll '+window.scrollY);
//console.log('the show button '+showButton);
    if ( $( this ).scrollTop() > vh + vh / 2 ) {
			//if ( showButton > vh + vh / 2 ) {

        $( '.uds-back-to-top:hidden' ).stop( true, true ).fadeIn();
    } else {
        $( '.uds-back-to-top' ).stop( true, true ).fadeOut();
    }

			//var currentPosition= scrollValue;
			//console.log('the  current position '+currentPosition);
});

	} )( jQuery );
*/
