/**
* Javascript file to update the core block core/image
*
* This file is for Gutenburg native block [core/image] functions that would only run in admin side.
*
*/

//jshint esversion: 6
( function( $ ) {
$( document ).ready(function() {

//Register block style for core/separator block
wp.domReady( function() {

    wp.blocks.registerBlockStyle( 'core/image', {
        name: 'text-overlay',
        label: 'Text overlay'
    });

		wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );


});

});
} )( jQuery );
