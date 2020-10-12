<?php

/**
 * ASU Web Standards 2020 Theme Customizer
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if (!function_exists('asu_wp2020_customize_preview_js')) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function asu_wp2020_customize_preview_js()
	{
		wp_enqueue_script(
			'asu_wp2020_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array('customize-preview'),
			'20130508',
			true
		);
	}
}
add_action('customize_preview_init', 'asu_wp2020_customize_preview_js');
