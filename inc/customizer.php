<?php

/**
 * ASU Web Standards 2020 Theme Customizer
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if (!function_exists('asu_wp2020_customize_register')) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function asu_wp2020_customize_register($wp_customize)
	{
		$wp_customize->get_setting('blogname')->transport         = 'postMessage';
		$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
		$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
	}
}
add_action('customize_register', 'asu_wp2020_customize_register');

/**
 * Sanitizer that does nothing
 */
function asu_wp2020_sanitize_nothing($data)
{
	return $data;
}

/**
 * Sanitizer that checks if the data is an url
 */
function asu_wp2020_sanitize_url($data)
{
	// TODO check that $data is an email or url
	return $data;
}

/**
 * Sanitizer that checks if the data is an email or url
 */
function asu_wp2020_sanitize_email_or_url($data)
{
	// TODO check that $data is an email or url
	return $data;
}

/**
 * Sanitizer that checks if the data is a phone number
 */
function asu_wp2020_sanitize_phone($data)
{
	// TODO check that $data is a phone number
	return $data;
}

/**
 * Sanitizer that checks Select fields
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function asu_wp2020_sanitize_select($input, $setting)
{
	// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
	$input = sanitize_key($input);

	// Get the list of possible select options.
	$choices = $setting->manager->get_control($setting->id)->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return (array_key_exists($input, $choices) ? $input : $setting->default);
}

if (!function_exists('asu_wp2020_theme_customize_register')) {
	/**
	 * Load a list of endorsed-logos from JSON file and store in transient for quick retrieval.
	 *
	 * @return array The array of endorsed logo arrays.
	 */
	function asu_wp2020_theme_get_endorsed_unit_logos()
	{
		// Do we have this information in our transients already?
		$transient = get_transient('asu_wp2020_endorsed_unit_logos');

		// Yep!  Just return it and we're done.
		if (!empty($transient)) {
			// The function will return here every time after the first time it is run, until the transient expires.
			return $transient;

			// Nope!  We gotta make a call.
		} else {
			// Get the contents of the JSON file containing the array of endorsed unit logos
			$strJsonFileContents = file_get_contents( get_template_directory() . "/img/endorsed-logo/unit-logos.json" );
			// Convert to nested array
			$endorsedLogos = json_decode($strJsonFileContents, true);

			// Save the file system response so we don't have to call again until tomorrow.
			set_transient('asu_wp2020_endorsed_unit_logos', $endorsedLogos, DAY_IN_SECONDS);

			// Return the array of endorsed logos.  The function will return here the first time it is run, and then once again, each time the transient expires.
			return $endorsedLogos;
		}
	}
}

if (!function_exists('asu_wp2020_theme_customize_register')) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function asu_wp2020_theme_customize_register($wp_customize)
	{
		// ==============================================================
		// ==============================================================
		// = Remove Default Wordpress Customizer Controls and Sections  =
		// ==============================================================
		// ==============================================================
		$wp_customize->remove_section('background_image');
		$wp_customize->remove_section('colors');
		$wp_customize->remove_section('header_image');

		$wp_customize->remove_control('site_icon');
		$wp_customize->remove_control('custom_logo');

		//  ==============================
		//  ==============================
		//  = Unit Endorsed Logo Section =
		//  ==============================
		//  ==============================

		$wp_customize->add_section(
			'asu_wp2020_theme_section_unit_logo',
			array(
				'title'      => __('Unit Endorsed Logo', 'asu-web-standards'),
				'priority'   => 30,
			)
		);

		//  =============================
		//  = School/Unit Logo Select   =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[logo_select]',
			array(
				'default'           => 'none',
				'type'              => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		// load array of endorsed units and cache in transients
		$endorsedLogos = asu_wp2020_theme_get_endorsed_unit_logos();

		// Prepend options list with "Unselected" option
		$logoOptions = array(
			'none' => __('-Unselected-', 'asu-web-standards')
		);
		foreach ($endorsedLogos as $logo) {
			$logoOptions[$logo['slug']] = __($logo['name'], 'asu-web-standards');
		}

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'asu_wp2020_logo_select',
				array(
					'label'             => __('Endorsed Logos Presets', 'asu-web-standards'),
					'description'       => __(
						'Select the appropriate unit logo, if available.',
						'asu-web-standards'
					),
					'section'           => 'asu_wp2020_theme_section_unit_logo',
					'settings'          => 'asu_wp2020_theme_options[logo_select]',
					'type'              => 'select',
					'sanitize_callback' => 'asu_wp2020_sanitize_select',
					'choices'           => $logoOptions,
					'priority'          => apply_filters('asu_wp2020_sidebar_position_priority', 0),
				)
			)
		);

		//  =============================
		//  = School/Unit Logo URL      =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[logo_url]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_logo_url',
			array(
				'label'      => __('Unit Endorsed Logo URL', 'asu-web-standards'),
				'description'       => __(
					'Enter full url to an alternate endorsed logo. This field has no effect when Preset is selected above.',
					'asu-web-standards'
				),
				'section'    => 'asu_wp2020_theme_section_unit_logo',
				'settings'   => 'asu_wp2020_theme_options[logo_url]',
				'priority'   => 10,
			)
		);


		//  =============================
		//  =============================
		//  = School/Unit Info Section  =
		//  =============================
		//  =============================

		$wp_customize->add_section(
			'asu_wp2020_theme_section_unit_info',
			array(
				'title'      => __('Unit Information', 'asu-web-standards'),
				'priority'   => 30,
			)
		);

		//  =============================
		//  = Parent Organization Text  =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[parent_org_name]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_org_text',
			array(
				'label'      => __('Parent Organization', 'asu-web-standards'),
				'section'    => 'asu_wp2020_theme_section_unit_info',
				'settings'   => 'asu_wp2020_theme_options[parent_org_name]',
				'priority'   => 10,
			)
		);

		//  =============================
		//  = Parent Organization Link  =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[parent_org_link]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_org_link',
			array(
				'label'      => __('Parent Organization URL', 'asu-web-standards'),
				'section'    => 'asu_wp2020_theme_section_unit_info',
				'settings'   => 'asu_wp2020_theme_options[parent_org_link]',
				'priority'   => 20,
			)
		);

		//  =============================
		//  = Contact Us Email or URL   =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[contact]',
			array(
				'default'        => '',
				'capability'     => 'edit_theme_options',
				'type'           => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_email_or_url',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_contact',
			array(
				'label'      => __('Contact Us Email or URL', 'asu-web-standards'),
				'section'    => 'asu_wp2020_theme_section_unit_info',
				'settings'   => 'asu_wp2020_theme_options[contact]',
				'priority'   => 30,
			)
		);

		//  =============================
		//  = Contact Us Email Subject  =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[contact_subject]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_contact_subject',
			array(
				'label'      => __('Contact Us Email Subject (Optional)', 'asu-web-standards'),
				'section'    => 'asu_wp2020_theme_section_unit_info',
				'settings'   => 'asu_wp2020_theme_options[contact_subject]',
				'priority'   => 40,
			)
		);

		//  =============================
		//  = Contact Us Email Body     =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[contact_body]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_contact_body',
			array(
				'label'    => __('Contact Us Email Body (Optional)', 'asu-web-standards'),
				'section'  => 'asu_wp2020_theme_section_unit_info',
				'settings' => 'asu_wp2020_theme_options[contact_body]',
				'type'     => 'textarea',
				'priority' => 50,
			)
		);

		//  =============================
		//  = Contribute URL            =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[contribute]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_url',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_contribute',
			array(
				'label'      => __('Contribute URL (Optional)', 'asu-web-standards'),
				'section'    => 'asu_wp2020_theme_section_unit_info',
				'settings'   => 'asu_wp2020_theme_options[contribute]',
				'priority'   => 60,
			)
		);

		//  =============================
		//  =============================
		//  = 404 Image Section         =
		//  =============================
		//  =============================

		$wp_customize->add_section(
			'asu_wp2020_theme_section_404',
			array(
				'title'      => __('404 Image', 'asu-web-standards'),
				'priority'   => 71,
			)
		);

		//  =============================
		//  = 404 Image                 =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[image_404]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'asu_wp2020_404',
				array(
					'label'      => __('404 Image', 'asu-web-standards'),
					'section'    => 'asu_wp2020_theme_section_404',
					'settings'   => 'asu_wp2020_theme_options[image_404]',
				)
			)
		);

		//  =============================
		//  =============================
		//  = ASU Search Section        =
		//  =============================
		//  =============================

		$wp_customize->add_section(
			'asu_wp2020_theme_section_asu_search',
			array(
				'title'      => __('ASU Search', 'asu-web-standards'),
				'priority'   => 70,
			)
		);

		$wp_customize->add_setting(
			'asu_wp2020_theme_options[asu_search]',
			array(
				'default'           => 'enable',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_asu_search',
			array(
				'label'      => __('ASU Search', 'asu-web-standards'),
				'section'    => 'asu_wp2020_theme_section_asu_search',
				'settings'   => 'asu_wp2020_theme_options[asu_search]',
				'type'       => 'radio',
				'choices'    => array(
					'enable'  => 'enabled',
					'disable' => 'disabled',
				),
			)
		);

		//  ==================================
		//  ==================================
		//  = ASU Analytics Manager Section =
		//  ==================================
		//  ==================================

		$wp_customize->add_section(
			'asu_wp2020_theme_section_asu_analytics',
			array(
				'title'      => __('ASU Analytics', 'asu-web-standards'),
				'priority'   => 70,
			)
		);

		//  =============================
		//  = ASU Google Tag Manager    =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[asu_analytics]',
			array(
				'default'           => 'enable',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_asu_analytics',
			array(
				'label'      => __('ASU Marketing Hub Analytics', 'asu-web-standards'),
				'section'    => 'asu_wp2020_theme_section_asu_analytics',
				'settings'   => 'asu_wp2020_theme_options[asu_analytics]',
				'type'       => 'radio',
				'choices'    => array(
					'enable'  => 'enabled',
					'disable' => 'disabled',
				),
			)
		);

		//  ================================
		//  ================================
		//  = Theme Layout Manager Section =
		//  ================================
		//  ================================

		// Theme layout settings.
		$wp_customize->add_section(
			'asu_wp2020_theme_layout_options',
			array(
				'title'       => __('Theme Layout Settings', 'asu-web-standards'),
				'capability'  => 'edit_theme_options',
				'description' => __('Theme sidebar defaults', 'asu-web-standards'),
				'priority'    => apply_filters('asu_wp2020_theme_layout_options_priority', 160),
			)
		);

		$wp_customize->add_setting(
			'asu_wp2020_theme_options[sidebars]',
			array(
				'default'           => 'left',
				'type'              => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'asu_wp2020_sidebar_position',
				array(
					'label'             => __('Sidebar Positioning', 'asu-web-standards'),
					'description'       => __(
						'Set sidebar\'s default position. Can either be: right, left, both or none.',
						'asu-web-standards'
					),
					'section'           => 'asu_wp2020_theme_layout_options',
					'settings'          => 'asu_wp2020_theme_options[sidebars]',
					'type'              => 'select',
					'sanitize_callback' => 'asu_wp2020_sanitize_select',
					'choices'           => array(
						'right' => __('Right sidebar', 'asu-web-standards'),
						'left'  => __('Left sidebar', 'asu-web-standards'),
						'both'  => __('Left & Right sidebars', 'asu-web-standards'),
						'none'  => __('No sidebar', 'asu-web-standards'),
					),
					'priority'          => apply_filters('asu_wp2020_sidebar_position_priority', 20),
				)
			)
		);
	}
} // End of if function_exists( 'asu_wp2020_theme_customize_register' ).
add_action('customize_register', 'asu_wp2020_theme_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
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
