<?php

add_filter( 'acf/fields/wysiwyg/toolbars', 'uds_wp_toolbars' );
function uds_wp_toolbars( $toolbars ) {
	 /**
	 * This function uses the toolbar preparation hook to register new toolbars
	 * for use with ACF field groups. A toolbar is just a named collection of
	 * existing buttons. Once created here, that new toolbar will be
	 * available to select whenever you use a WYSIWYG editor field in your
	 * field group.
	 */

	// Uncomment these lines to see how the default toolbars are built.
	// echo '< pre >';
	// print_r($toolbars);
	// echo '< /pre >';
	// die;

	/**
	 * Add a new toolbar called "UDS-WP Simple". It contains only some basic formatting
	 * options, and the button to create a link. This was created for use with our
	 * alert block, but could be used elsewhere. Additional toolbars can be defined here
	 * as needed.
	 */

	$toolbars['UDS-WP Simple'] = array();
	$toolbars['UDS-WP Simple'][1] = array( 'bold', 'italic', 'underline', 'link' );

	// return $toolbars - IMPORTANT!
	return $toolbars;
}
