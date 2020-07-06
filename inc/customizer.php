<?php
/**
 * UnderStrap Theme Customizer
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'understrap_customize_register' );

if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'understrap_theme_layout_options',
			array(
				'title'       => __( 'Theme Layout Settings', 'understrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width and sidebar defaults', 'understrap' ),
				'priority'    => apply_filters( 'understrap_theme_layout_options_priority', 160 ),
			)
		);

		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function understrap_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );


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


		//  =============================
		//  =============================
		//  = School Info Section       =
		//  =============================
		//  =============================

		$wp_customize->add_section(
			'understrap_theme_section',
			array(
				'title'      => __('School Information', 'asu_wordpress'),
				'priority'   => 30,
			)
		);

		//  =============================
		//  = School Logo               =
		//  =============================
		$wp_customize->add_setting(
			'understrap_theme_options[logo]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'understrap_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'understrap_logo_text',
			array(
				'label'      => __('School Logo Full URL', 'asu_wordpress'),
				'section'    => 'understrap_theme_section',
				'settings'   => 'understrap_theme_options[logo]',
				'priority'   => 0,
			)
		);

		//  =============================
		//  = Parent Organization Text  =
		//  =============================
		$wp_customize->add_setting(
			'understrap_theme_options[org]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'understrap_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'understrap_org_text',
			array(
				'label'      => __('Parent Organization', 'asu_wordpress'),
				'section'    => 'understrap_theme_section',
				'settings'   => 'understrap_theme_options[org]',
				'priority'   => 1,
			)
		);

		//  =============================
		//  = Parent Organization Link  =
		//  =============================
		$wp_customize->add_setting(
			'understrap_theme_options[org_link]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'understrap_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'understrap_org_link',
			array(
				'label'      => __('Parent Organization URL', 'asu_wordpress'),
				'section'    => 'understrap_theme_section',
				'settings'   => 'understrap_theme_options[org_link]',
				'priority'   => 10,
			)
		);

		//  =============================
		//  = Contact Us Email or URL   =
		//  =============================
		$wp_customize->add_setting(
			'understrap_theme_options[contact]',
			array(
				'default'        => '',
				'capability'     => 'edit_theme_options',
				'type'           => 'option',
				'sanitize_callback' => 'understrap_sanitize_email_or_url',
			)
		);

		$wp_customize->add_control(
			'understrap_contact',
			array(
				'label'      => __('Contact Us Email or URL', 'asu_wordpress'),
				'section'    => 'understrap_theme_section',
				'settings'   => 'understrap_theme_options[contact]',
				'priority'   => 50,
			)
		);

		//  =============================
		//  = Contact Us Email Subject  =
		//  =============================
		$wp_customize->add_setting(
			'understrap_theme_options[contact_subject]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'understrap_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'understrap_contact_subject',
			array(
				'label'      => __('Contact Us Email Subject (Optional)', 'asu_wordpress'),
				'section'    => 'understrap_theme_section',
				'settings'   => 'understrap_theme_options[contact_subject]',
				'priority'   => 60,
			)
		);

		//  =============================
		//  = Contact Us Email Body     =
		//  =============================
		$wp_customize->add_setting(
			'understrap_theme_options[contact_body]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'understrap_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'understrap_contact_body',
			array(
				'label'    => __('Contact Us Email Body (Optional)', 'asu_wordpress'),
				'section'  => 'understrap_theme_section',
				'settings' => 'understrap_theme_options[contact_body]',
				'type'     => 'textarea',
				'priority' => 70,
			)
		);

		//  =============================
		//  = Contribute URL            =
		//  =============================
		$wp_customize->add_setting(
			'understrap_theme_options[contribute]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'understrap_sanitize_url',
			)
		);

		$wp_customize->add_control(
			'understrap_contribute',
			array(
				'label'      => __('Contribute URL (Optional)', 'asu_wordpress'),
				'section'    => 'understrap_theme_section',
				'settings'   => 'understrap_theme_options[contribute]',
				'priority'   => 80,
			)
		);

		//  =============================
		//  =============================
		//  = 404 Image Section         =
		//  =============================
		//  =============================

		$wp_customize->add_section(
			'understrap_theme_section_404',
			array(
				'title'      => __('404 Image', 'asu_wordpress'),
				'priority'   => 71,
			)
		);

		//  =============================
		//  = 404 Image                 =
		//  =============================
		$wp_customize->add_setting(
			'understrap_theme_options[image_404]',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'understrap_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'understrap_404',
				array(
					'label'      => __('404 Image', 'asu_wordpress'),
					'section'    => 'understrap_theme_section_404',
					'settings'   => 'understrap_theme_options[image_404]',
				)
			)
		);

		//  =============================
		//  =============================
		//  = ASU Search Section        =
		//  =============================
		//  =============================

		$wp_customize->add_section(
			'understrap_theme_section_asu_search',
			array(
				'title'      => __('ASU Search', 'asu_wordpress'),
				'priority'   => 70,
			)
		);

		$wp_customize->add_setting(
			'understrap_theme_options[asu_search]',
			array(
				'default'           => 'enable',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'understrap_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'understrap_asu_search',
			array(
				'label'      => __('ASU Search', 'asu_wordpress'),
				'section'    => 'understrap_theme_section_asu_search',
				'settings'   => 'understrap_theme_options[asu_search]',
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
			'understrap_theme_section_asu_analytics',
			array(
				'title'      => __('ASU Analytics', 'asu_wordpress'),
				'priority'   => 70,
			)
		);

		//  =============================
		//  = Tag Manager               =
		//  =============================
		$wp_customize->add_setting(
			'understrap_theme_options[asu_analytics]',
			array(
				'default'           => 'enable',
				'capability'        => 'edit_theme_options',
				'type'              => 'option',
				'sanitize_callback' => 'understrap_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'understrap_asu_analytics',
			array(
				'label'      => __('ASU Tag Manager', 'asu_wordpress'),
				'section'    => 'understrap_theme_section_asu_analytics',
				'settings'   => 'understrap_theme_options[asu_analytics]',
				'type'       => 'radio',
				'choices'    => array(
					'enable'  => 'enabled',
					'disable' => 'disabled',
				),
			)
		);
		$wp_customize->add_setting(
			'understrap_container_type',
			array(
				'default'           => 'container',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_container_type',
				array(
					'label'       => __( 'Container Width', 'understrap' ),
					'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'understrap' ),
						'container-fluid' => __( 'Full width container', 'understrap' ),
					),
					'priority'    => apply_filters( 'understrap_container_type_priority', 10 ),
				)
			)
		);

		$wp_customize->add_setting(
			'understrap_sidebar_position',
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
				'understrap_sidebar_position',
				array(
					'label'             => __( 'Sidebar Positioning', 'understrap' ),
					'description'       => __(
						'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
						'understrap'
					),
					'section'           => 'understrap_theme_layout_options',
					'settings'          => 'understrap_sidebar_position',
					'type'              => 'select',
					'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
					'choices'           => array(
						'right' => __( 'Right sidebar', 'understrap' ),
						'left'  => __( 'Left sidebar', 'understrap' ),
						'both'  => __( 'Left & Right sidebars', 'understrap' ),
						'none'  => __( 'No sidebar', 'understrap' ),
					),
					'priority'          => apply_filters( 'understrap_sidebar_position_priority', 20 ),
				)
			)
		);
	}
} // End of if function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script(
			'understrap_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );
