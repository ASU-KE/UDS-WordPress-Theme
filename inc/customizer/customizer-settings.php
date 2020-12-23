<?php
/**
 * UDS WordPress Theme Customizer
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'uds_wp_register_theme_customizer_settings' ) ) {

	/**
	 * Register custom ASU Web Standards settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function uds_wp_register_theme_customizer_settings( $wp_customize ) {

		if ( ! class_exists( 'Prefix_Separator_Control' ) ) {
			/**
			 * Class Prefix_Separator_Control
			 *
			 * Custom control to display separator
			 */
			class Prefix_Separator_Control extends WP_Customize_Control {

				/**
				 * Render separator
				 */
				public function render_content() {                  ?>
					<label>
						<br>
						<hr>
						<br>
					</label>
					<?php
				}
			}
		}

		/**
		 * Remove default sections and controls we do not need/want
		 */
		$wp_customize->remove_section( 'background_image' );
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'header_image' );

		$wp_customize->remove_control( 'blogdescription' );
		$wp_customize->remove_control( 'site_icon' );
		$wp_customize->remove_control( 'custom_logo' );

		// --------------------- Site Information Section ---------------------

		// Rename the 'Site Identity' section to 'Site Information'.
		$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Information', 'uds-wordpress-theme' );

		/**
		 * Selective refresh for site title
		 *
		 * Allows for the visual edit button next to the site title.
		 */
		$wp_customize->selective_refresh->add_partial('blogname', array(
			'selector' => '.subdomain-name',
			'render_callback' => function () {
				bloginfo( 'name' );
			}
		) );

		/**
		 * Parent unit name customization
		 */
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[parent_unit_name]',
			'parent_unit_name',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'parent_unit_name',
			array(
				'label'      => __( 'Parent Unit', 'uds-wordpress-theme' ),
				'section'    => 'title_tagline',
				'settings'   => 'parent_unit_name',
				'priority'   => 20,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'parent_unit_name', array(
			'selector' => 'a.unit-name',
			'container_inclusive' => true,
			'render_callback' => 'uds_wp_render_parent_unit_name',
		) );

		/**
		 * Parent unit URL customization.
		 */
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[parent_unit_link]',
			'parent_unit_link',
			array(
				'default'           => '#',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'parent_unit_link',
			array(
				'label'      => __( 'Parent Unit URL', 'uds-wordpress-theme' ),
				'section'    => 'title_tagline',
				'settings'   => 'parent_unit_link',
				'priority'   => 30,
			)
		);

		// ---------------------- ASU Global Header Section -----------------------

		/**
		 * Section: ASU Global Header
		 */
		$wp_customize->add_section(
			'uds_wp_theme_section_header',
			array(
				'title'      => __( 'ASU Global Header', 'uds-wordpress-theme' ),
				'priority'   => 30,
			)
		);

		/**
		 * Main navigtion menu on/off
		 */
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[header_navigation_menu]',
			'header_navigation_menu',
			array(
				'default'           => 'enabled',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'header_navigation_menu',
			array(
				'label'      => __( 'Main Navigation Menu', 'uds-wordpress-theme' ),
				'description'       => __(
					'<p>Show or hide the main navigation menu.</p><p>Hiding this is approved for Landing Page sites.</p>',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_header',
				'settings'   => 'header_navigation_menu',
				'type'       => 'radio',
				'choices'    => array(
					'enabled'  => 'Show',
					'disabled' => 'Hide',
				),
				'priority'   => 50,
			)
		);

		// ------------------------ ASU Global Footer section ---------------------
		$wp_customize->add_section(
			'uds_wp_theme_section_footer',
			array(
				'title'      => __( 'ASU Global Footer', 'uds-wordpress-theme' ),
				'priority'   => 30,
			)
		);

		// ===============================================================
		// = ASU Footer - Toggle Branding Row - Unit Logo and Social Media
		// ===============================================================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[footer_row_branding]',
			'footer_row_branding',
			array(
				'default'           => 'enabled',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'footer_row_branding',
			array(
				'label'      => __( 'Logo and Social Media Row', 'uds-wordpress-theme' ),
				'description'       => __(
					'Show or hide the entire row containing the logo and social media icons',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'footer_row_branding',
				'type'       => 'radio',
				'choices'    => array(
					'enabled'  => 'Show',
					'disabled' => 'Hide',
				),
				'priority'   => 10,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'footer_row_branding', array(
			'selector' => '#wrapper-endorsed-footer',
			'container_inclusive' => false,
			'render_callback' => 'uds_wp_render_footer_branding_row',
		) );

		// =============================
		// = Unit Logo Select   =
		// =============================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[logo_select]',
			'logo_select',
			array(
				'default'           => 'none',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
				'transport'         => 'postMessage',
			)
		);

		// Load array of endorsed units and cache in transients.
		$endorsed_logos = uds_wp_theme_get_endorsed_unit_logos();

		// Load options list.
		$logo_options = array(
			'none'
		);

		foreach ( $endorsed_logos as $logo ) {
			$logo_options[ $logo['slug'] ] = $logo['name'];
		}

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'logo_select',
				array(
					'label'             => __( 'Endorsed Logos Presets', 'uds-wordpress-theme' ),
					'description'       => __(
						'Select the appropriate unit logo, if available.',
						'uds-wordpress-theme'
					),
					'section'           => 'uds_wp_theme_section_footer', // move to global footer?
					'settings'          => 'logo_select',
					'type'              => 'select',
					'sanitize_callback' => 'uds_wp_sanitize_select',
					'choices'           => $logo_options,
					'priority'          => 20,
				)
			)
		);

		$wp_customize->selective_refresh->add_partial( 'logo_select', array(
			'selector' => '#endorsed-logo',
			'container_inclusive' => false,
			'render_callback' => 'uds_wp_render_footer_logo',
		) );

		// =============================
		// = Unit Logo URL             =
		// =============================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[logo_url]',
			'logo_url',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage'
			)
		);

		$wp_customize->selective_refresh->add_partial( 'logo_url', array(
			'selector' => '#endorsed-logo',
			'container_inclusive' => false,
			'render_callback' => 'uds_wp_render_footer_logo',
		) );

		$wp_customize->add_control(
			'logo_url',
			array(
				'label'      => __( 'Unit Endorsed Logo URL', 'uds-wordpress-theme' ),
				'description'       => __(
					'Enter full url to an alternate endorsed logo. This field has no effect when Preset is selected above.',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_footer', // move to footer?
				'settings'   => 'logo_url',
				'priority'   => 30,
			)
		);


		// ================================
		// = Section Separator            =
		// ================================
		$wp_customize->add_setting(
			'separator-control',
			array(
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			new Prefix_Separator_Control(
				$wp_customize,
				'separator-control',
				array(
					'section' => 'uds_wp_theme_section_footer',
					'priority'=> 40,
				)
			)
		);

		// ================================
		// = Footer Action Row            =
		// ================================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[footer_row_actions]',
			'footer_row_actions',
			array(
				'default'           => 'enabled',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'footer_row_actions',
			array(
				'label'      => __( 'Information and Menu Row', 'uds-wordpress-theme' ),
				'description'       => __(
					'Show or hide the entire row containing unit information and menus',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'footer_row_actions',
				'type'       => 'radio',
				'choices'    => array(
					'enabled'  => 'Show',
					'disabled' => 'Hide',
				),
				'priority'   => 50,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'footer_row_actions', array(
			'selector' => '#wrapper-footer-columns',
			'container_inclusive' => false,
			'render_callback' => 'uds_wp_render_footer_action_row',
		) );

		// =============================
		// = Contribute URL            =
		// =============================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[contribute_url]',
			'contribute_url',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_url',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'contribute_url',
			array(
				'label'      => __( 'Contribute button URL', 'uds-wordpress-theme' ),
				'description' => __( 'Enter a URL here to show the \'Contribute\' button in the footer', 'uds-wordpress-theme'),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'contribute_url',
				'priority'   => 100,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'contribute_url', array(
			'selector' => '.contribute-wrapper',
			'container_inclusive' => false,
			'render_callback' => 'uds_wp_render_contribute_button',
		) );


		// =============================
		// = Contact Us Email or URL   =
		// =============================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[contact_email]',
			'contact_email',
			array(
				'default'        => '',
				'capability'     => 'edit_theme_options',
				'type'           => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_email_or_url',
			)
		);

		$wp_customize->add_control(
			'contact_email',
			array(
				'label'      => __( 'Contact URL', 'uds-wordpress-theme' ),
				'description' => __( 'Enter a URL to a contact page to show a \'Contact Us\' link in the footer'),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'contact_email',
				'priority'   => 90,
			)
		);

		$wp_customize->selective_refresh->add_partial( 'contact_email', array(
			'selector' => '.contact-wrapper',
			'container_inclusive' => false,
			'render_callback' => 'uds_wp_render_contact_link',
		) );


		// ================================
		// = Section Separator            =
		// ================================
		// $wp_customize->add_setting(
		// 	'prefix_separator[1]',
		// 	array(
		// 		'sanitize_callback' => 'uds_wp_sanitize_nothing',
		// 	)
		// );
		// $wp_customize->add_control(
		// 	new Prefix_Separator_Control(
		// 		$wp_customize,
		// 		'prefix_separator[1]',
		// 		array(
		// 			'section' => 'uds_wp_theme_section_footer',
		// 			'priority'          => 110,
		// 		)
		// 	)
		// );

		// =============================
		// = Contact Us Email Subject  =
		// =============================
		// $wp_customize->add_setting(
		// 	// 'uds_wp_theme_options[contact_subject]',
		// 	'contact_subject',
		// 	array(
		// 		'default'           => '',
		// 		'capability'        => 'edit_theme_options',
		// 		'type'              => 'theme_mod',
		// 		'sanitize_callback' => 'uds_wp_sanitize_nothing',
		// 	)
		// );

		// $wp_customize->add_control(
		// 	'contact_subject',
		// 	array(
		// 		'label'      => __( 'Contact Us Email Subject (Optional)', 'uds-wordpress-theme' ),
		// 		'section'    => 'uds_wp_theme_section_footer',
		// 		'settings'   => 'contact_subject',
		// 		'priority'   => 90,
		// 	)
		// );

		// =============================
		// = Contact Us Email Body     =
		// =============================
		// $wp_customize->add_setting(
		// 	// 'uds_wp_theme_options[contact_body]',
		// 	'contact_body',
		// 	array(
		// 		'default'           => '',
		// 		'capability'        => 'edit_theme_options',
		// 		'type'              => 'theme_mod',
		// 		'sanitize_callback' => 'uds_wp_sanitize_nothing',
		// 	)
		// );

		// $wp_customize->add_control(
		// 	'contact_body',
		// 	array(
		// 		'label'    => __( 'Contact Us Email Body (Optional)', 'uds-wordpress-theme' ),
		// 		'section'  => 'uds_wp_theme_section_footer',
		// 		'settings' => 'contact_body',
		// 		'type'     => 'textarea',
		// 		'priority' => 100,
		// 	)
		// );

		// ================================
		// = Section Separator            =
		// ================================
		// $wp_customize->add_setting(
		// 	'prefix_separator[1]',
		// 	array(
		// 		'sanitize_callback' => 'uds_wp_sanitize_nothing',
		// 	)
		// );
		// $wp_customize->add_control(
		// 	new Prefix_Separator_Control(
		// 		$wp_customize,
		// 		'prefix_separator[1]',
		// 		array(
		// 			'section' => 'uds_wp_theme_section_footer',
		// 			'priority'          => 105,
		// 		)
		// 	)
		// );

		// =============================
		// =============================
		// = 404 Image Section         =
		// =============================
		// =============================

		$wp_customize->add_section(
			'uds_wp_theme_section_404',
			array(
				'title'      => __( '404 Image', 'uds-wordpress-theme' ),
				'priority'   => 30,
			)
		);

		$wp_customize->add_setting(
			// 'uds_wp_theme_options[image_404]',
			'image_404',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control( 'not_found_link', array(
			'section'  => 'uds_wp_theme_section_404',
			'label'             => __( 'Show 404 Page', 'uds-wordpress-theme' ),
			'description'       => __( 'To see your results as you customize, click the button below to load the 404 page now.', 'uds-wordpress-theme' ),
			'settings' => array(),
			'type' => 'button',
			'priority' => 1,
			'input_attrs'  => array(
				'value' => __( 'Load 404 Page', 'uds-wordpress-theme' ),
				'class' => 'button button-secondary',
				'onclick' => 'wp.customize.previewer.previewUrl.set( "/oranges" );',
			),
			'active_callback' => function() {
				return ! is_404();
			},
		) );

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'image_404',
				array(
					'label'      => __( '404 Image', 'uds-wordpress-theme' ),
					'description'       => __(
						'Resize and crop your desired image to approximately 1200px x 500px',
						'uds-wordpress-theme'
					),
					'section'    => 'uds_wp_theme_section_404',
					'settings'   => 'image_404',
				)
			)
		);

		// =============================
		// =============================
		// = ASU Search Section        =
		// =============================
		// =============================

		// $wp_customize->add_section(
		// 	'uds_wp_theme_section_asu_search',
		// 	array(
		// 		'title'      => __( 'ASU Search', 'uds-wordpress-theme' ),
		// 		'priority'   => 30,
		// 	)
		// );

		// $wp_customize->add_setting(
		// 	// 'uds_wp_theme_options[asu_search]',
		// 	'asu_search',
		// 	array(
		// 		'default'           => 'enabled',
		// 		'capability'        => 'edit_theme_options',
		// 		'type'              => 'theme_mod',
		// 		'sanitize_callback' => 'uds_wp_sanitize_nothing',
		// 	)
		// );

		// $wp_customize->add_control(
		// 	'asu_search',
		// 	array(
		// 		'label'      => __( 'ASU Search', 'uds-wordpress-theme' ),
		// 		'description'       => __(
		// 			'Replace WP internal search service with ASU\'s search service',
		// 			'uds-wordpress-theme'
		// 		),
		// 		'section'    => 'uds_wp_theme_section_asu_search',
		// 		'settings'   => 'asu_search',
		// 		'type'       => 'radio',
		// 		'choices'    => array(
		// 			'enabled'  => 'enabled',
		// 			'disabled' => 'disabled',
		// 		),
		// 		'priority'   => 190
		// 	)
		// );

		// ==================================
		// ==================================
		// = ASU Analytics Manager Section =
		// ==================================
		// ==================================

		$wp_customize->add_section(
			'uds_wp_theme_section_asu_analytics',
			array(
				'title'      => __( 'ASU Analytics', 'uds-wordpress-theme' ),
				'priority'   => 30,
			)
		);

		// =======================================
		// = ASU Marketing Hub Analytics Manager =
		// =======================================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[asu_hub_analytics]',
			'asu_hub_analytics',
			array(
				'default'           => 'disabled',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'asu_hub_analytics',
			array(
				'label'      => __( 'ASU Marketing Hub Analytics', 'uds-wordpress-theme' ),
				'description'       => __(
					'Enable the ASU Marketing Hub\'s analytics package. This must be active on all production ASU web sites.',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_asu_analytics',
				'settings'   => 'asu_hub_analytics',
				'type'       => 'radio',
				'choices'    => array(
					'enabled'  => 'enabled',
					'disabled' => 'disabled',
				),
			)
		);

		// ==============================
		// = Site Google Tag Manager    =
		// ==============================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[site_gtm_container_id]',
			'site_gtm_container_id',
			array(
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'site_gtm_container_id',
			array(
				'label'             => __( 'Google Tag Manager container ID', 'uds-wordpress-theme' ),
				'description'       => __(
					'Enter your unit\'s GTM container ID to enable analytics for this website. Note: Enabling GTM and GA at the same time can negatively impact page performance.',
					'uds-wordpress-theme'
				),
				'section'           => 'uds_wp_theme_section_asu_analytics',
				'settings'          => 'site_gtm_container_id',
				'type'              => 'input',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
			)
		);

		// ==============================
		// = Site Google Analytics ID   =
		// ==============================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[site_ga_tracking_id]',
			'site_ga_tracking_id',
			array(
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'site_ga_tracking_id',
			array(
				'label'             => __( 'Google Analytics Tracking ID', 'uds-wordpress-theme' ),
				'description'       => __(
					'Enter your unit\'s GA Tracking ID to enable analytics for this website. Note: Enabling GTM and GA at the same time can negatively impact page performance.',
					'uds-wordpress-theme'
				),
				'section'           => 'uds_wp_theme_section_asu_analytics',
				'settings'          => 'site_ga_tracking_id',
				'type'              => 'input',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
			)
		);

		// ==============================
		// = Hotjar Analytics           =
		// ==============================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[hotjar_site_id]',
			'hotjar_site_id',
			array(
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'hotjar_site_id',
			array(
				'label'             => __( 'Hotjar Site ID', 'uds-wordpress-theme' ),
				'description'       => __(
					'Enter your Hotjar Site ID to enable Hotjar analytics for this website.',
					'uds-wordpress-theme'
				),
				'section'           => 'uds_wp_theme_section_asu_analytics',
				'settings'          => 'hotjar_site_id',
				'type'              => 'option',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
			)
		);
	}
} // End of if function_exists( 'uds_wp_register_theme_customizer_settings' ).
add_action( 'customize_register', 'uds_wp_register_theme_customizer_settings' );
