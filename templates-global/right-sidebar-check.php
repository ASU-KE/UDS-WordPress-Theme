<?php
/**
 * Right sidebar check
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

</div><!-- #closing the primary container from /templates-global/left-sidebar-check.php -->

<?php
$sidebar_pos = get_theme_mod( 'uds_wp_sidebar_position' );

if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) {
	get_template_part( 'templates-sidebar/sidebar', 'right' );
}
