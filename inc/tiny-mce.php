<?php
/**
 * Tiny-mce.php
 *
 * @package UDS WordPress Theme
 * @author Walt
 *
 * Provides additional toolbars for the ACF Pro WYSIWIG editor field. Uses
 * existing buttons, just organizes them into additional toolbars, usually
 * simpler ones that leave out options that don't pertain to our blocks.
 *
 * Toolbars registered here appear in a drop-down menu for selection when
 * you use a WYSIWYG editor field.
 */

add_filter( 'acf/fields/wysiwyg/toolbars', 'uds_wp_toolbars' );

/**
 * Uds_wp_toolbars
 *
 * @param array $toolbars existing toolbars provided by ACF Pro.
 */
function uds_wp_toolbars( $toolbars ) {
	/**
	 * This function uses the toolbar preparation hook to register new toolbars
	 * for use with ACF field groups. A toolbar is just a named collection of
	 * existing buttons. Once created here, that new toolbar will be
	 * available to select whenever you use a WYSIWYG editor field in your
	 * field group.
	 *
	 * Note: each toolbar is an array, whose first element is another array,
	 * which actually holds the button strings.
	 */

	/**
	 * Uncomment these lines to see how the default toolbars are built.
	 * echo '< pre >';
	 * print_r($toolbars);
	 * echo '< /pre >';
	 * die;
	 */

	// Add a 'Simple' toolbar for use with our Alert box, which includes links.
	$toolbars['UDS-WP Simple'] = array();
	$toolbars['UDS-WP Simple'][1] = array( 'bold', 'italic', 'underline', 'link' );

	// Add a 'Minimal' toolbar for use with our Cards, without links.
	$toolbars['UDS-WP Minimal'] = array();
	$toolbars['UDS-WP Minimal'][1] = array( 'bold', 'italic', 'underline' );

	// return $toolbars - IMPORTANT!
	return $toolbars;
}
