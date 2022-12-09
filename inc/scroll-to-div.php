<?php

/**
 * Scroll to div using snchore link
 * Add animation and offset -150 when going to the target of anchore link
 *
 * @package uds-wordpress-theme
 */

if (!function_exists('scroll_to_div')) {
	/**
	 * Function to add animation and offset -150 to the target of anchore link
	 */
	function scroll_to_div()
	{
?>
		<script>
			jQuery(document).scroll(function() {
				var menu = jQuery('a[href^="#"]:not([data-toggle="collapse"])');
				menu.on('click', function(event) {
					var target = jQuery(this.getAttribute('href'));

					if ((target.length) && (0 != target.offset().top)) {
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

	add_action('wp_head', 'scroll_to_div');
}
?>
