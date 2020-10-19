<?php
/**
 * The sidebar containing the main widget area
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $asu_wp2020_sidebar_opts;

?>
<div class="col-md-4 col-xs-12 pl-0 widget-area" id="left-sidebar">
<?php	dynamic_sidebar( $asu_wp2020_sidebar_opts['sidebar'] );?>
</div>
