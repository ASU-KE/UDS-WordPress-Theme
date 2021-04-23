<?php
/**
 * Displays the global banner widget content if there's information to be displayed.
 * Normally gets called immediately after hero.php.
 *
 * Modified to remove markup that was here, and move that markup into the widget
 * class, leaving just the `dynamic_sidebar` call here.
 *
 * @package uds-wordpress-theme
 */

if ( is_active_sidebar( 'global-banner' ) ) {
	dynamic_sidebar( 'global-banner' );
}
