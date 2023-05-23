/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( 'span.subdomain-name' ).text( to );
			$( 'span.footer-site-name' ).text( to );
		} );
	} );

	/**
	 * Parent Unit Link
	 * To avoid another visual control, which we would get if we used
	 * the selective refresh option, we'll just update the URL here with
	 * Javascript. This means that we will have duplicate functionality
	 * here and in our template.
	 */
	wp.customize( 'parent_unit_link', function( value ) {
		value.bind( function( to ) {
			$( 'a.unit-name' ).attr( 'href', to );
		} );
	} );

	/**
	 * Sitename as link
	 *
	 * As with the parent unit above, we don't want two visual buttons for one
	 * setting, so if someone checks the box to make this a link, we'll just
	 * mock it up with Javascript in the customizer. This means that we will
	 * have duplicate functionality here and in our template.
	 */
	wp.customize( 'sitename_as_link', function( value ) {
		value.bind( function( to ) {
			if ( false === to ) {
				/**
				 * The box is UNCHECKED, so remove the wrapping <a> tag from
				 * around the title using jQUery's unwrap().
				 */
				$( 'span.subdomain-name' ).unwrap();
			} else {
				/**
				 * The box is CHECKED, so wrap the site title in a temporary
				 * (only for viewing in the customizer) link tag. Since these kind
				 * of links don't work in the customizer, we're not bothering to
				 * make a real link out of this, just one to show the visual change.
				 */
				$( 'span.subdomain-name' ).wrap( '<a href="#"></a>' );
			}
		} );
	} );
} )( jQuery );
