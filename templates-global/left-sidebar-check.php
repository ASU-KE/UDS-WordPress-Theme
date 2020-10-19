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
		<?php global $uds_wp_sidebar_opts;
		      global $content_classes;
		  if ( $uds_wp_sidebar_opts['use_sidebar'] == 'left' ):
			     $content_classes="col-md col-xs-12 pr-0";
           get_template_part( 'templates-sidebar/sidebar', 'left' );
			?>
<?php elseif ($uds_wp_sidebar_opts['use_sidebar'] == 'right'):
	         $content_classes="col-md col-xs-12 pl-0";
endif;
	?>
<!-- ========= END::Left Sidebar ============ -->
