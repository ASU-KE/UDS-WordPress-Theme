<?php
/**
 * Registers an additional field location for advanced custom fields ACF.
 * Enables field groups to be displayed if the site is multisite or not.
 *
 * @package uds-wordpress-theme
 * @see https://www.advancedcustomfields.com/resources/custom-location-rules/
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class UDS_ACF_Location_Is_Multisite extends ACF_Location {

    function initialize() {
        $this->name = 'is_multisite';
        $this->label = __( 'Is Multisite' );
		$this->category = 'Site';
    }

	public function get_values( $rule ) {

		// Simple true / false answers for the values.
        $choices = array();
		$choices[ true ] = "True";
		$choices[ false ] = "False";

        return $choices;
    }

	public function match( $rule, $screen, $field_group ) {
        $multisite_check = is_multisite();
		return $multisite_check;
    }

}
