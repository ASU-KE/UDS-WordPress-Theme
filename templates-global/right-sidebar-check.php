<?php
/**
 * Right sidebar check
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

</div><!-- #closing the primary container from /templates-global/left-sidebar-check.php -->

<?php
$sidebar_pos = get_theme_mod( 'asu_wp2020_sidebar_position' );

if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) {
	get_template_part( 'templates-sidebar/sidebar', 'right' );
}
