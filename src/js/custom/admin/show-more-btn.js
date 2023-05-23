/**
 * File show-more-btn.js.
 *
 * JS for show more button function.
 *
 */

	( function( $ ) {

$( document ).ready(function() {

	$( '.uds-show-btn' ).click(function() {
		if ($(this).hasClass("uds-show-less-btn")){
			$(this).css('opacity','0');
			$(this).addClass('uds-show-more-btn');
			$(this).removeClass('uds-show-less-btn');
			var this_title=$(this).attr('btn-title');
			$(this).find('a.btn').html(this_title+' <i class="fas fa-chevron-down"></i>');
			$('html, body').animate({ scrollTop:  $(this).parent().offset().top -150 }, 'slow');
			$(this).fadeTo( "slow", 1 );

		}else{
			$(this).addClass('uds-show-less-btn');
			$(this).parent().addClass('uds-show-less-container');
			$(this).removeClass('uds-show-more-btn');
			$(this).find('a.btn').html('<i class="fas fa-chevron-up"></i>');
			$('html, body').animate({ scrollTop:  $(this).prev().offset().top - 150 }, 'slow');
		}
	});



});
	 } )( jQuery );
