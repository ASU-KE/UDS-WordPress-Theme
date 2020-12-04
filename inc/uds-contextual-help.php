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
		<li>menu items can be nested no more than <b>three</b> levels deep. Any menu you item to drag to the fourth level (or any level beyond that) <b>will not appear</b> in the menu.</li>
		<li>First level menu items will appear as entries in the main navigation menu</li>
		<li>Second level menu items will form dropdown menus beneath their parent item, <b>unless</b> there are also third-level items beneath them. In that case:
			<ul style="margin-top: .5em;">
				<li>the second level item will become a non-clickable column header, and all third-level items below it will form links in a single column</li>
			</ul>
		<li>any sub-menu with more than two columns will be rendered as a full-width 'mega-menu'</li>
	</ul>
EOS;

	echo $content;
}

add_action( 'admin_head', 'add_context_menu_help' );
