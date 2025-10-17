/**
* Javascript file to update the core block core/separator
*
* This file is for Gutenburg native block [core/separator] functions that would only run in admin side.
*
*/

//jshint esversion: 6
( function( $ ) {
$( document ).ready(function() {

//Register block style for core/separator block
wp.domReady( function() {

    wp.blocks.registerBlockStyle( 'core/separator', {
        name: 'copy-divider',
        label: 'Gold divider'
    });

		wp.blocks.unregisterBlockStyle( 'core/separator', 'wide' );
		wp.blocks.unregisterBlockStyle( 'core/separator', 'dots' );

});

});
} )( jQuery );
