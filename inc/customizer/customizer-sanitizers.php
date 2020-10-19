<?php
/**
 * UDS WordPress Theme Customizer
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Sanitizer that does nothing
 *
 * @param mixed $data   Data that doesn't need to be sanitized.
 */
function uds_wp_sanitize_nothing( $data ) {
	return $data;
}

/**
 * Sanitizer that checks if the data is an url
 *
 * @param string $data   Data to be sanitized.
 */
function uds_wp_sanitize_url( $data ) {
	// TODO check that $data is an email or url.
	return $data;
}

/**
 * Sanitizer that checks if the data is an email or url
 *
 * @param string $data   Data to be sanitized.
 */
function uds_wp_sanitize_email_or_url( $data ) {
	// TODO check that $data is an email or url.
	return $data;
}

/**
 * Sanitizer that checks if the data is a phone number
 *
 * @param string $data   Data to be sanitized.
 */
function uds_wp_sanitize_phone( $data ) {
	// TODO check that $data is a phone number.
	return $data;
}

/**
 * Sanitizer that checks Select fields
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string                       Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function uds_wp_sanitize_select( $input, $setting ) {
	// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
	$input = sanitize_key( $input );

	// Get the list of possible select options.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
