<?php

/**
 * ASU Web Standards 2020 Theme Customizer
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

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

if (!function_exists('asu_wp2020_theme_get_endorsed_unit_logos')) {
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
			$strJsonFileContents = file_get_contents(get_template_directory() . "/img/endorsed-logo/unit-logos.json");
			// Convert to nested array
			$endorsedLogos = json_decode($strJsonFileContents, true);

			// Save the file system response so we don't have to call again until tomorrow.
			set_transient('asu_wp2020_endorsed_unit_logos', $endorsedLogos, DAY_IN_SECONDS);

			// Return the array of endorsed logos.  The function will return here the first time it is run, and then once again, each time the transient expires.
			return $endorsedLogos;
		}
	}
}

if (!function_exists('asu_wp2020_register_theme_customizer_settings')) {
	/**
	 * Register custom ASU Web Standards settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function asu_wp2020_register_theme_customizer_settings($wp_customize)
	{
		if (!class_exists('Prefix_Separator_Control')) {
			/**
			 * Class Prefix_Separator_Control
			 *
			 * Custom control to display separator
			 */
			class Prefix_Separator_Control extends WP_Customize_Control
			{
				public function render_content()
				{
?>
					<label>
						<br>
						<hr>
						<br>
					</label>
<?php
				}
			}
		}

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


		//  ================================
		//  ================================
		//  = Rename Site Identity Section =
		//  ================================
		//  ================================

		$wp_customize->get_section('title_tagline')->title = __('Site Information');


		//  =============================
		//  = Parent Unit Name  =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[parent_unit_name]',
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
				'label'      => __('Parent Unit', 'asu-web-standards'),
				'section'    => 'title_tagline',
				'settings'   => 'asu_wp2020_theme_options[parent_unit_name]',
				'priority'   => 20,
			)
		);

		//  =============================
		//  = Parent Unit URL           =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[parent_unit_link]',
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
				'label'      => __('Parent Unit URL', 'asu-web-standards'),
				'section'    => 'title_tagline',
				'settings'   => 'asu_wp2020_theme_options[parent_unit_link]',
				'priority'   => 30,
			)
		);

		//  ================================
		//  = Section Separator            =
		//  ================================
		$wp_customize->add_setting(
			'prefix_separator[0]',
			array(
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			new Prefix_Separator_Control(
				$wp_customize,
				'prefix_separator[0]',
				array(
					'section' => 'title_tagline',
					'priority'          => 40,
				)
			)
		);

		//  =============================
		//  = Unit Logo Select   =
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
					'section'           => 'title_tagline',
					'settings'          => 'asu_wp2020_theme_options[logo_select]',
					'type'              => 'select',
					'sanitize_callback' => 'asu_wp2020_sanitize_select',
					'choices'           => $logoOptions,
					'priority'          => 50,
				)
			)
		);

		//  =============================
		//  = Unit Logo URL      =
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
				'section'    => 'title_tagline',
				'settings'   => 'asu_wp2020_theme_options[logo_url]',
				'priority'   => 60,
			)
		);


		//  ================================
		//  = Section Separator            =
		//  ================================
		$wp_customize->add_setting(
			'prefix_separator[1]',
			array(
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			new Prefix_Separator_Control(
				$wp_customize,
				'prefix_separator[1]',
				array(
					'section' => 'title_tagline',
					'priority'          => 70,
				)
			)
		);

		//  =============================
		//  = Contact Us Email or URL   =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[contact_email]',
			array(
				'default'        => '',
				'capability'     => 'edit_theme_options',
				'type'           => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_email_or_url',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_contact_email',
			array(
				'label'      => __('Contact Us Email or URL', 'asu-web-standards'),
				'section'    => 'title_tagline',
				'settings'   => 'asu_wp2020_theme_options[contact_email]',
				'priority'   => 80,
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
				'section'    => 'title_tagline',
				'settings'   => 'asu_wp2020_theme_options[contact_subject]',
				'priority'   => 90,
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
				'section'  => 'title_tagline',
				'settings' => 'asu_wp2020_theme_options[contact_body]',
				'type'     => 'textarea',
				'priority' => 100,
			)
		);

		//  =============================
		//  = Contribute URL            =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[contribute_url]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_url',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_contribute_url',
			array(
				'label'      => __('Contribute URL (Optional)', 'asu-web-standards'),
				'section'    => 'title_tagline',
				'settings'   => 'asu_wp2020_theme_options[contribute_url]',
				'priority'   => 110,
			)
		);

		//  =============================
		//  =============================
		//  = ASU Header Section         =
		//  =============================
		//  =============================

		$wp_customize->add_section(
			'asu_wp2020_theme_section_header',
			array(
				'title'      => __('ASU Global Header', 'asu-web-standards'),
				'priority'   => 20,
			)
		);

		//  ===================================================
		//  = ASU Header - Call to Action Button 1 - URL
		//  ===================================================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[header_cta1_url]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			'asu_wp2020_header_cta1_url',
			array(
				'label'      => __('Call to Action button 1 - URL', 'asu-web-standards'),
				'section'    => 'asu_wp2020_theme_section_header',
				'settings'   => 'asu_wp2020_theme_options[header_cta1_url]',
				'priority'   => 120,
			)
		);


		//  ===================================================
		//  = ASU Header - Call to Action Button 1 - Label
		//  ===================================================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[header_cta1_label]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			'asu_wp2020_header_cta1_label',
			array(
				'label'      => __('Call to Action button 1 - Label', 'asu-web-standards'),
				'section'    => 'asu_wp2020_theme_section_header',
				'settings'   => 'asu_wp2020_theme_options[header_cta1_label]',
				'priority'   => 130,
			)
		);

		//  ===================================================
		//  = ASU Header - Call to Action Button 1 - Color
		//  ===================================================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[header_cta1_color]',
			array(
				'default'           => 'gold',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			'asu_wp2020_header_cta1_color',
			array(
				'label'      => __('Call to Action button 1 - color', 'asu-web-standards'),
				'description'       => __(
					'Select the button color',
					'asu-web-standards'
				),
				'section'    => 'asu_wp2020_theme_section_header',
				'settings'   => 'asu_wp2020_theme_options[header_cta1_color]',
				'type'       => 'radio',
				'choices'    => array(
					'gold'   => 'gold',
					'maroon' => 'maroon',
					'black'  => 'black',
					'gray'   => 'gray',
				),
				'priority' => 140,
			)
		);

		//  ================================
		//  = Section Separator            =
		//  ================================
		$wp_customize->add_setting(
			'prefix_separator[2]',
			array(
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			new Prefix_Separator_Control(
				$wp_customize,
				'prefix_separator[2]',
				array(
					'section' => 'asu_wp2020_theme_section_header',
					'priority'          => 150,
				)
			)
		);


		//  ===================================================
		//  = ASU Header - Call to Action Button 2 - URL
		//  ===================================================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[header_cta2_url]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			'asu_wp2020_header_cta2_url',
			array(
				'label'      => __('Call to Action button 2 - URL', 'asu-web-standards'),
				'section'    => 'asu_wp2020_theme_section_header',
				'settings'   => 'asu_wp2020_theme_options[header_cta2_url]',
				'priority'   => 160,
			)
		);


		//  ===================================================
		//  = ASU Header - Call to Action Button 2 - Label
		//  ===================================================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[header_cta2_label]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			'asu_wp2020_header_cta2_label',
			array(
				'label'      => __('Call to Action button 2 - Label', 'asu-web-standards'),
				'section'    => 'asu_wp2020_theme_section_header',
				'settings'   => 'asu_wp2020_theme_options[header_cta2_label]',
				'priority'   => 170,
			)
		);

		//  ===================================================
		//  = ASU Header - Call to Action Button 2 - Color
		//  ===================================================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[header_cta2_color]',
			array(
				'default'           => 'gold',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			'asu_wp2020_header_cta2_color',
			array(
				'label'      => __('Call to Action button 2 - color', 'asu-web-standards'),
				'description'       => __(
					'Select the button color',
					'asu-web-standards'
				),
				'section'    => 'asu_wp2020_theme_section_header',
				'settings'   => 'asu_wp2020_theme_options[header_cta2_color]',
				'type'       => 'radio',
				'choices'    => array(
					'gold'   => 'gold',
					'maroon' => 'maroon',
					'black'  => 'black',
					'gray'   => 'gray',
				),
				'priority'   => 180,
			)
		);


		//  =============================
		//  =============================
		//  = ASU Footer Section        =
		//  =============================
		//  =============================

		$wp_customize->add_section(
			'asu_wp2020_theme_section_footer',
			array(
				'title'      => __('ASU Global Footer', 'asu-web-standards'),
				'priority'   => 20,
			)
		);

		//  ===============================================================
		//  = ASU Footer - Toggle Branding Row - Unit Logo and Social Media
		//  ===============================================================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[footer_row_branding]',
			array(
				'default'           => 'enable',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			'asu_wp2020_footer_row_branding',
			array(
				'label'      => __('Footer - Logo & Social Media Row', 'asu-web-standards'),
				'description'       => __(
					'Enable/disable the Logo and Social Media row in the ASU footer.',
					'asu-web-standards'
				),
				'section'    => 'asu_wp2020_theme_section_footer',
				'settings'   => 'asu_wp2020_theme_options[footer_row_branding]',
				'type'       => 'radio',
				'choices'    => array(
					'enable'  => 'enabled',
					'disable' => 'disabled',
				),
			)
		);

		//  =======================================================
		//  = ASU Footer - Toggle Actions Row - Unit Info and Menus
		//  =======================================================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[footer_row_actions]',
			array(
				'default'           => 'enable',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			'asu_wp2020_footer_row_actions',
			array(
				'label'      => __('Footer - Actions Row', 'asu-web-standards'),
				'description'       => __(
					'Enable/disable the Unit contact and menus row in the ASU footer.',
					'asu-web-standards'
				),
				'section'    => 'asu_wp2020_theme_section_footer',
				'settings'   => 'asu_wp2020_theme_options[footer_row_actions]',
				'type'       => 'radio',
				'choices'    => array(
					'enable'  => 'enabled',
					'disable' => 'disabled',
				),
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
				'priority'   => 30,
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
				'description'       => __(
					'Replace WP internal search service with ASU\'s search service',
					'asu-web-standards'
				),
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
				'priority'   => 40,
			)
		);

		//  =======================================
		//  = ASU Marketing Hub Analytics Manager =
		//  =======================================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[asu_hub_analytics]',
			array(
				'default'           => 'disable',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_asu_hub_analytics',
			array(
				'label'      => __('ASU Marketing Hub Analytics', 'asu-web-standards'),
				'description'       => __(
					'Enable the ASU Marketing Hub\'s analytics package. This must be active on all production ASU web sites.',
					'asu-web-standards'
				),
				'section'    => 'asu_wp2020_theme_section_asu_analytics',
				'settings'   => 'asu_wp2020_theme_options[asu_hub_analytics]',
				'type'       => 'radio',
				'choices'    => array(
					'enable'  => 'enabled',
					'disable' => 'disabled',
				),
			)
		);

		//  ==============================
		//  = Site Google Tag Manager    =
		//  ==============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[site_gtm_container_id]',
			array(
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_site_gtm_container_id',
			array(
				'label'             => __('Google Tag Manager container ID', 'asu-web-standards'),
				'description'       => __(
					'Enter your unit\'s GTM container ID to enable analytics for this website. Note: Enabling GTM and GA at the same time can negatively impact page performance.',
					'asu-web-standards'
				),
				'section'           => 'asu_wp2020_theme_section_asu_analytics',
				'settings'          => 'asu_wp2020_theme_options[site_gtm_container_id]',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		//  ==============================
		//  = Site Google Analytics ID   =
		//  ==============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[site_ga_tracking_id]',
			array(
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_site_ga_tracking_id',
			array(
				'label'             => __('Google Analytics Tracking ID', 'asu-web-standards'),
				'description'       => __(
					'Enter your unit\'s GA Tracking ID to enable analytics for this website. Note: Enabling GTM and GA at the same time can negatively impact page performance.',
					'asu-web-standards'
				),
				'section'           => 'asu_wp2020_theme_section_asu_analytics',
				'settings'          => 'asu_wp2020_theme_options[site_ga_tracking_id]',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		//  ==============================
		//  = Hotjar Analytics           =
		//  ==============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[hotjar_site_id]',
			array(
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_hotjar_site_id',
			array(
				'label'             => __('Hotjar Site ID', 'asu-web-standards'),
				'description'       => __(
					'Enter your Hotjar Site ID to enable Hotjar analytics for this website.',
					'asu-web-standards'
				),
				'section'           => 'asu_wp2020_theme_section_asu_analytics',
				'settings'          => 'asu_wp2020_theme_options[hotjar_site_id]',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
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
				'priority'   => 50,
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
					'description'       => __(
						'Resize and crop your desired image to approximately 1200px x 500px',
						'asu-web-standards'
					),
					'section'    => 'asu_wp2020_theme_section_404',
					'settings'   => 'asu_wp2020_theme_options[image_404]',
				)
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
				'priority'    => 60,
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
} // End of if function_exists( 'asu_wp2020_register_theme_customizer_settings' ).
add_action('customize_register', 'asu_wp2020_register_theme_customizer_settings');
