/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Parent Unit Link
	// To avoid another visual control, which we would get if we used
	// the selective refresh option, we'll just update the URL here with
	// Javascript
	wp.customize( 'parent_unit_link', function( value ) {
		value.bind( function( to ) {
			$( 'a.unit-name' ).attr( 'href', to );
		} );
	} );


} )( jQuery );
