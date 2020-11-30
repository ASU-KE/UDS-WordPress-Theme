<?php
/**
 * Creates a context help tab on the WordPress admin's menu page.
 *
 * @package UDS-WordPress Theme
 * @author ASU KE Web Services
 */

/**
 * Function to add contextual help tab and add content via a callback.
 */
function add_context_menu_help() {

	// get the current screen object.
	$current_screen = get_current_screen();

	if ( 'nav-menus' === $current_screen->id ) {
		$current_screen->add_help_tab(
			array(
				'id' => 'uds_menu_help_tab',
				'title' => __( 'ASU Web Standards', 'uds-wordpress-theme' ),
				'callback' => 'nav_menu_help_content',
			)
		);
	}
}


/**
 * Function to echo the contextual help content that appears only on the menu building admin screen.
 */
function nav_menu_help_content() {

	$content = <<<EOS
	<p>The UDS-WordPress theme interprets nested menu items in a specific way: </p>
	<ul>
		<li>Standard menu items will appear in the top level menu of your site</li>
		<li>Sub-items at the second level will become part of a drop-down menu under their parent</li>
		<li>Sub-items at the third level will do two things:
			<ul style="margin-top: .5em;">
				<li><b>Convert</b> the second level item above them to a non-clickable <b>column header</b> and then...</li>
				<li>Add all third level sub-items to the newly created column below their parent</li>
			</ul>
		</li>
		<li>All sub-items at the fourth level, or lower, <b>will be ignored</b> and will not display at all</li>
	</ul>
EOS;

	echo $content;
}

add_action( 'admin_head', 'add_context_menu_help' );
