( function( $ ) {
$( document ).ready(function() {
	$('.accordion').each(function(){
		var parent_id= $(this).attr('id');
		$(this).find('.card.card-foldable .card-body').attr('data-parent', '#'+parent_id);
	});
});
} )( jQuery );
