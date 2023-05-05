/**
 * File overlay-card.js.
 *
 * JS for overlay cards hover action.
 *
 */

	( function( $ ) {

		//Updated the image src when hover over, to make the gif re-play.
			$( '.home-overlay-card' ).hover(function() {
				var thisSrc = $( this ).find( '.hover-image' ).attr( 'src' );
				$( this ).find( '.hover-image' ).attr( 'src', thisSrc );
			});
	 } )( jQuery );
