/**
* Javascript file to run on admin side only
*
* This file is for functions that would only run in admin side.
*
*/

//jshint esversion: 6
( function( $ ) {
$( document ).ready(function() {

$('ul.menu.ui-sortable li.menu-item-depth-0').each(function(){
	if ( $(this).next().hasClass('menu-item-depth-1') ){
		$(this).find('.menu-item-settings .acf-menu-item-fields .acf-field-true-false').each(function(){
			if ($(this).attr('data-name') == 'menu_cta_button'){
				$(this).hide();
			}
		});

	}
});

  $('[data-toggle="tooltip"]').tooltip();

});
} )( jQuery );
