( function( $ ) {
$( document ).ready(function() {
	$('.uds-section').each(function(){
		if($(this).find('div.wp-block-group').length == 0){
			$(this).find('.container').wrapInner( "<div class='wp-block-group'><div class='wp-block-group__inner-container'></div></div>");
		}


	});
});
} )( jQuery );
