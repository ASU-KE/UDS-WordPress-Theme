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

if (!function_exists('asu_wp2020_theme_customize_register')) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function asu_wp2020_theme_customize_register($wp_customize)
	{
		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function asu_wp2020_theme_slug_sanitize_select($input, $setting)
		{

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key($input);

			// Get the list of possible select options.
			$choices = $setting->manager->get_control($setting->id)->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return (array_key_exists($input, $choices) ? $input : $setting->default);
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
			'asu_wp2020_sidebar_position',
			array(
				'default'           => 'right',
				'type'              => 'theme_mod',
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
					'settings'          => 'asu_wp2020_sidebar_position',
					'type'              => 'select',
					'sanitize_callback' => 'asu_wp2020_theme_slug_sanitize_select',
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

		//  =============================
		//  =============================
		//  = School Info Section       =
		//  =============================
		//  =============================

		$wp_customize->add_section(
			'asu_wp2020_theme_section',
			array(
				'title'      => __('School Information', 'asu-web-standards'),
				'priority'   => 30,
			)
		);

		//  =============================
		//  = School Logo               =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[logo]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'asu_wp2020_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'asu_wp2020_logo_text',
			array(
				'label'      => __('School Logo Full URL', 'asu-web-standards'),
				'section'    => 'asu_wp2020_theme_section',
				'settings'   => 'asu_wp2020_theme_options[logo]',
				'priority'   => 0,
			)
		);

		//  =============================
		//  = Parent Organization Text  =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[org]',
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
				'section'    => 'asu_wp2020_theme_section',
				'settings'   => 'asu_wp2020_theme_options[org]',
				'priority'   => 1,
			)
		);

		//  =============================
		//  = Parent Organization Link  =
		//  =============================
		$wp_customize->add_setting(
			'asu_wp2020_theme_options[org_link]',
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
				'section'    => 'asu_wp2020_theme_section',
				'settings'   => 'asu_wp2020_theme_options[org_link]',
				'priority'   => 10,
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
				'section'    => 'asu_wp2020_theme_section',
				'settings'   => 'asu_wp2020_theme_options[contact]',
				'priority'   => 50,
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
				'section'    => 'asu_wp2020_theme_section',
				'settings'   => 'asu_wp2020_theme_options[contact_subject]',
				'priority'   => 60,
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
				'section'  => 'asu_wp2020_theme_section',
				'settings' => 'asu_wp2020_theme_options[contact_body]',
				'type'     => 'textarea',
				'priority' => 70,
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
				'section'    => 'asu_wp2020_theme_section',
				'settings'   => 'asu_wp2020_theme_options[contribute]',
				'priority'   => 80,
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

		//  =============================
		//  =============================
		//  =Google Tag Manager Section =
		//  =============================
		//  =============================

		$wp_customize->add_section(
			'asu_wp2020_theme_section_asu_analytics',
			array(
				'title'      => __('ASU Analytics', 'asu-web-standards'),
				'priority'   => 70,
			)
		);

		//  =============================
		//  = Tag Manager               =
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
				'label'      => __('ASU Tag Manager', 'asu-web-standards'),
				'section'    => 'asu_wp2020_theme_section_asu_analytics',
				'settings'   => 'asu_wp2020_theme_options[asu_analytics]',
				'type'       => 'radio',
				'choices'    => array(
					'enable'  => 'enabled',
					'disable' => 'disabled',
				),
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
