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
	 */
	//  echo '< pre >';
	//  print_r($toolbars);
	//  echo '< /pre >';
	//  die;

	/**
	 * Add a 'simple' toolbar, initially designed for use in UDS Alert boxes.
	 */
	$toolbars['UDS-WP Simple'] = array();
	$toolbars['UDS-WP Simple'][1] = array( 'bold', 'italic', 'underline', 'link');

	/**
	 * Add a modified version of the 'simple' toolbar, without support for creating
	 * links. This was meant for basic content in Cards to prevent adding markup that
	 * did not align with the standard, but is useful in any case where you want to
	 * limit users to simple text decorations.
	 */
	$toolbars['UDS-WP Minimal'] = array();
	$toolbars['UDS-WP Minimal'][1] = array( 'bold', 'italic', 'underline' );

	/**
	 * Toolbar to allow easy access to special characters and formatting within Card
	 * titles and content. We ended up needing to be a little less restrictive when
	 * it came to cards, and allow for special characters, etc. However, we still
	 * don't want underlines in card titles or content, since there should not be
	 * links in either of those, IIRC.
	 */
	$toolbars['UDS-WP Cards'] = array();
	$toolbars['UDS-WP Cards'][1] = array( 'bold', 'italic', 'superscript', 'subscript', 'charmap');

	// return $toolbars - IMPORTANT!
	return $toolbars;
}
