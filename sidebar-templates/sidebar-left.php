<?php
/**
 * The sidebar containing the main widget area
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'sidebar-left' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 widget-area" id="left-sidebar" role="complementary">
<?php else : ?>
	<div class="col-md-4 widget-area" id="left-sidebar" role="complementary">
<?php endif; ?>
<?php dynamic_sidebar( 'sidebar-left' ); ?>

</div><!-- #left-sidebar -->
