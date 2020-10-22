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
		<?php
		global $uds_wp_sidebar_opts;
		if ( 'right' == $uds_wp_sidebar_opts['use_sidebar'] ) :
			get_template_part( 'templates-sidebar/sidebar', 'right' );
	  endif;
		?>
<!-- ========= END::Right Sidebar ============ -->
