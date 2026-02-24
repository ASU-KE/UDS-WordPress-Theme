( function( $ ) {
$( document ).ready(function() {
	$('.accordion').each(function(){
		var parent_id = $(this).attr('id');
		$(this).find('.accordion-item').each(function(){
			var behavior = $(this).attr('data-accordion-behavior');
			// Only set data-parent for default behavior (siblings collapse)
			if (behavior !== 'always_open') {
				$(this).find('.collapse').attr('data-bs-parent', '#'+parent_id);
			}
		});
	});
});
} )( jQuery );
