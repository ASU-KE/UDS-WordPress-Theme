/**
 * File accordion.js.
 *
 * Adds keyboard accessibility support for accordion/foldable card components.
 * Enables Space bar to toggle accordion state in addition to Enter/Return key.
 */

/*jshint esversion: 6 */
( function( $ ) {
	'use strict';

	$( document ).ready(function() {
		
		// Add keydown event listener to accordion headers
		$( document ).on( 'keydown', '.accordion-header a[role="button"]', function( e ) {
			
			// Check if Space bar (keyCode 32) was pressed
			if ( e.which === 32 || e.keyCode === 32 ) {
				
				// Prevent default scrolling behavior of Space bar
				e.preventDefault();
				
				// Trigger click event to toggle accordion
				$( this ).trigger( 'click' );
			}
		});
	});

})( jQuery );