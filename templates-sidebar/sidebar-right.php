<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'sidebar-right' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'asu_wp2020_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 widget-area" id="right-sidebar" role="complementary">
<?php else : ?>
	<div class="col-md-4 widget-area" id="right-sidebar" role="complementary">
<?php endif; ?>
<?php dynamic_sidebar( 'sidebar-right' ); ?>

</div><!-- #right-sidebar -->
