<?php
/**
 * Right sidebar check
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<!-- ========= Right Sidebar ============ -->
		<?php global $asu_wp2020_sidebar_opts;
		  if ( $asu_wp2020_sidebar_opts['use_sidebar'] == 'right' ):
           get_template_part( 'templates-sidebar/sidebar', 'right' );
      endif;
	?>
<!-- ========= END::Right Sidebar ============ -->
