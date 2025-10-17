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
		$( document ).on( 'keydown', '.accordion-header h3 a[role="button"]', function( e ) {

			// Check if Space bar (keyCode 32) was pressed
			if ( e.which === 32 || e.keyCode === 32 ) {

				// Prevent default scrolling behavior of Space bar
				e.preventDefault();
				// Get the target accordion item
				var targetId = $( this ).attr('data-bs-target') || $( this ).attr('href');
				// Use Bootstrap's collapse API
				$( targetId ).collapse('toggle');
			}
		});
	});

})( jQuery );
