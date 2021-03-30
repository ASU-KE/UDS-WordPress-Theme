<?php

// Scroll to div
function scrollToDiv(){
?>
<script>
     jQuery(document).scroll(function() {
        var menu   = jQuery('a[href^="#"]');
     	menu.on('click', function(event) {
    		var target = jQuery(this.getAttribute('href'));
    		if( target.length ) {
        		event.preventDefault();
        			jQuery('html, body').stop().animate({
            			scrollTop: target.offset().top - 150
        			}, 1000);
    			}
			});
		});

</script>
<?php
}
add_action('wp_head', 'scrollToDiv');
