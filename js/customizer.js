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

	/**
	 * Show/hide the main navigation menu in the Customizer
	 *
	 * When the main navigation menu is disabled, there is no '.navbar-nav' element
	 * for us to toggle. In that case, we use the menu's parent, '#menubar' to hold
	 * a message for the user to let them know that the menu will appear when they
	 * are done with their customizing.
	 */
	wp.customize( 'header_navigation_menu', function( value ) {

		// Use the Customizer javascript API to get the current setting.
		var currentState = wp.customize( 'header_navigation_menu' ).get();

		// The variable 'to' holds the newly selected value from the control.
		value.bind( function( to ) {

			// If the menu is enabled already, we can just toggle visibility.
			if ( 'enabled' === currentState ) {
				if ( 'disabled' === to ) {
					$( '.navbar-nav' ).css( 'display', 'none' );
				} else {
					$( '.navbar-nav' ).css( 'display', 'flex' );
				}

			/**
			 * If the menu is not there to toggle, we toggle a message about
			 * how it WILL be there once the settings have changed. We format
			 * the message as if it were a menu item so the page layout will
			 * look as close as possible to the updated version
			 */
			} else {
				if ( 'disabled' === to ) {
					$( '#menubar' ).empty();
				} else {
					$( '#menubar' ).html( '<span class="nav-link" href="#" title="Example Link">Menu will appear here after you publish and exit the Customizer</span>' );
					$( '#menubar' ).css( 'display', 'flex' );
				}
			}
		} );
	} );

} )( jQuery );
