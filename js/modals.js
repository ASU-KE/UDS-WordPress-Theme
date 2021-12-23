/**
 * File modals.js.
 *
 * JS for windows modal block.
 *
 */

/*jshint esversion: 6 */
( function( $ ) {
$( document ).ready(function() {

$( '.openModalButton' ).click(function() {
	$( this ).next().addClass( 'open' );
});

$( '.closeModalButton' ).click(function() {
	$( this ).closest( '.uds-modal' ).removeClass( 'open' );
});




  $('[data-toggle="tooltip"]').tooltip();




});
} )( jQuery );
