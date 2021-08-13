/**
* Javascript file to update the CTA buttons in the nav manue
*
*
*/

//jshint esversion: 6
( function( $ ) {
$( document ).ready(function() {
//$('.navbar-collapse .navbar-nav .btn.btn-sm').css('background','red');
$('.navbar-collapse .navbar-nav > .btn.btn-sm').wrapAll('<div class="navbar-site-buttons form-inline" />');

});
} )( jQuery );
