/**
 * File back_to_top.js.
 *
 * JS for back to top button button.
 *
 */

 ( function( $ ) {

	$( window ).scroll(function() {

		var vh=$( window ).height();

    if ( $( this ).scrollTop() > vh+vh/2 ) {

        $( '.uds-back-to-top:hidden' ).stop( true, true ).fadeIn();
    } else {
        $( '.uds-back-to-top' ).stop( true, true ).fadeOut();
    }
});

	} )( jQuery );
