/**
 * File back_to_top.js.
 *
 * JS for back to top button button.
 *
 */

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
