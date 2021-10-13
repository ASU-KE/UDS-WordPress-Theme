/**
 * File show-more-btn.js.
 *
 * JS for show more button function.
 *
 */

	( function( $ ) {

$( document ).ready(function() {
			$( '.uds-show-more-btn a' ).click(function() {
				$(this).parent().addClass('uds-show-less-btn');
       $(this).parent().removeClass('uds-show-more-btn');
			 $(this).html('<i class="fas fa-chevron-up"></i>');
			 var this_btn=$(this).parent().clone();
			 $('html, body').animate({ scrollTop:  $(this).parent().offset().top - 150 }, 'slow');
			 $(this).parent().parent().append(this_btn);
			 $(this).parent().remove();
			});

			$( '.uds-show-less-btn a' ).click(function() {
				$(this).parent().addClass('uds-show-more-btn');
       $(this).parent().removeClass('uds-show-less-btn');
			 var this_title=$(this).parent().attr('title');
			 $(this).html(this_title+'<i class="fas fa-chevron-down"></i>');
			 var this_btn=$(this).parent().clone();
			 $('html, body').animate({ scrollTop:  $(this).parent().offset().top + 150 }, 'slow');
			 $(this).parent().parent().append(this_btn);
			 $(this).parent().remove();
			});

});
	 } )( jQuery );
