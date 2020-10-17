<?php
/**
 * Left sidebar check
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$sidebar_pos = get_theme_mod( 'uds_wp_sidebar_position' );

if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos ) {
	get_template_part( 'templates-sidebar/sidebar', 'left' );
}
?>

<div class="col-md content-area" id="primary">
