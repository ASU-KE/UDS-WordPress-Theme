<?php
/**
 * Left sidebar check
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$sidebar_pos = get_theme_mod( 'asu_wp2020_sidebar_position' );

if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos ) {
	get_template_part( 'templates-sidebar/sidebar', 'left' );
}
?>

<div class="col-md content-area" id="primary">
