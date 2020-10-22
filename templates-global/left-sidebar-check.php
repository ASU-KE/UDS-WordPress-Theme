<?php
/**
 * Left sidebar check
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- ========= Left Sidebar ============ -->
		<?php
		global $uds_wp_sidebar_opts;
			  global $content_classes;
		if ( 'left' == $uds_wp_sidebar_opts['use_sidebar'] ) :
			   $content_classes = 'col-md col-xs-12 pr-0';
			get_template_part( 'templates-sidebar/sidebar', 'left' );
			?>
			<?php
elseif ( 'right' == $uds_wp_sidebar_opts['use_sidebar'] ) :
			 $content_classes = 'col-md col-xs-12 pl-0';
endif;
?>
<!-- ========= END::Left Sidebar ============ -->
