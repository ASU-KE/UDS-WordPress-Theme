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

		// ==============================================================
		// ==============================================================
		// = Remove Default WordPress Customizer Controls and Sections  =
		// ==============================================================
		// ==============================================================
		$wp_customize->remove_section( 'background_image' );
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'header_image' );

		$wp_customize->remove_control( 'site_icon' );
		$wp_customize->remove_control( 'custom_logo' );


		// ================================
		// ================================
		// = Rename Site Identity Section =
		// ================================
		// ================================

		$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Information', 'uds-wordpress-theme' );


		// =============================
		// = Parent Unit Name  =
		// =============================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[parent_unit_name]',
			'parent_unit_name',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
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

		// =============================
		// = Parent Unit URL           =
		// =============================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[parent_unit_link]',
			'parent_unit_link',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
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

		// ================================
		// = Section Separator            =
		// ================================
		$wp_customize->add_setting(
			'prefix_separator[0]',
			array(
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
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
			)
		);

		// Load array of endorsed units and cache in transients.
		$endorsed_logos = uds_wp_theme_get_endorsed_unit_logos();

		// Load options list.
		$logo_options = array();
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
					'section'           => 'title_tagline', // move to global footer?
					'settings'          => 'logo_select',
					'type'              => 'select',
					'sanitize_callback' => 'uds_wp_sanitize_select',
					'choices'           => $logo_options,
					'priority'          => 50,
				)
			)
		);

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
			)
		);

		$wp_customize->add_control(
			'logo_url',
			array(
				'label'      => __( 'Unit Endorsed Logo URL', 'uds-wordpress-theme' ),
				'description'       => __(
					'Enter full url to an alternate endorsed logo. This field has no effect when Preset is selected above.',
					'uds-wordpress-theme'
				),
				'section'    => 'title_tagline', // move to footer?
				'settings'   => 'logo_url',
				'priority'   => 60,
			)
		);


		// ================================
		// = Section Separator            =
		// ================================
		$wp_customize->add_setting(
			'prefix_separator[1]',
			array(
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
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
				'label'      => __( 'Contact Us Email or URL', 'uds-wordpress-theme' ),
				'section'    => 'title_tagline',
				'settings'   => 'contact_email',
				'priority'   => 80,
			)
		);

		// =============================
		// = Contact Us Email Subject  =
		// =============================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[contact_subject]',
			'contact_subject',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'contact_subject',
			array(
				'label'      => __( 'Contact Us Email Subject (Optional)', 'uds-wordpress-theme' ),
				'section'    => 'title_tagline',
				'settings'   => 'contact_subject',
				'priority'   => 90,
			)
		);

		// =============================
		// = Contact Us Email Body     =
		// =============================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[contact_body]',
			'contact_body',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'contact_body',
			array(
				'label'    => __( 'Contact Us Email Body (Optional)', 'uds-wordpress-theme' ),
				'section'  => 'title_tagline',
				'settings' => 'contact_body',
				'type'     => 'textarea',
				'priority' => 100,
			)
		);

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
			)
		);

		$wp_customize->add_control(
			'contribute_url',
			array(
				'label'      => __( 'Contribute URL (Optional)', 'uds-wordpress-theme' ),
				'section'    => 'title_tagline',
				'settings'   => 'contribute_url',
				'priority'   => 110,
			)
		);

		// =============================
		// =============================
		// = ASU Header Section         =
		// =============================
		// =============================

		$wp_customize->add_section(
			'uds_wp_theme_section_header',
			array(
				'title'      => __( 'ASU Global Header', 'uds-wordpress-theme' ),
				'priority'   => 20,
			)
		);

		// ===============================================================
		// = ASU Header - Toggle Navigation Menu for Landing Pages
		// ===============================================================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[header_navigation_menu]',
			'header_navigation_menu',
			array(
				'default'           => 'enabled',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			'header_navigation_menu',
			array(
				'label'      => __( 'Header - Navigation Menu', 'uds-wordpress-theme' ),
				'description'       => __(
					'Enable/disable the navigation menu in the ASU header. This is approved for Landing Page sites.',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_header',
				'settings'   => 'header_navigation_menu',
				'type'       => 'radio',
				'choices'    => array(
					'enabled'  => 'enabled',
					'disabled' => 'disabled',
				),
			)
		);


		// =============================
		// =============================
		// = ASU Footer Section        =
		// =============================
		// =============================

		$wp_customize->add_section(
			'uds_wp_theme_section_footer',
			array(
				'title'      => __( 'ASU Global Footer', 'uds-wordpress-theme' ),
				'priority'   => 20,
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
			)
		);
		$wp_customize->add_control(
			'footer_row_branding',
			array(
				'label'      => __( 'Footer - Logo & Social Media Row', 'uds-wordpress-theme' ),
				'description'       => __(
					'Enable/disable the Logo and Social Media row in the ASU footer.',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'footer_row_branding',
				'type'       => 'radio',
				'choices'    => array(
					'enabled'  => 'enabled',
					'disabled' => 'disabled',
				),
			)
		);

		// =======================================================
		// = ASU Footer - Toggle Actions Row - Unit Info and Menus
		// =======================================================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[footer_row_actions]',
			'footer_row_actions',
			array(
				'default'           => 'enabled',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
			)
		);
		$wp_customize->add_control(
			'footer_row_actions',
			array(
				'label'      => __( 'Footer - Actions Row', 'uds-wordpress-theme' ),
				'description'       => __(
					'Enable/disable the Unit contact and menus row in the ASU footer.',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'footer_row_actions',
				'type'       => 'radio',
				'choices'    => array(
					'enabled'  => 'enabled',
					'disabled' => 'disabled',
				),
			)
		);

		// =============================
		// =============================
		// = ASU Search Section        =
		// =============================
		// =============================

		$wp_customize->add_section(
			'uds_wp_theme_section_asu_search',
			array(
				'title'      => __( 'ASU Search', 'uds-wordpress-theme' ),
				'priority'   => 30,
			)
		);

		$wp_customize->add_setting(
			// 'uds_wp_theme_options[asu_search]',
			'asu_search',
			array(
				'default'           => 'enabled',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
			)
		);

		$wp_customize->add_control(
			'asu_search',
			array(
				'label'      => __( 'ASU Search', 'uds-wordpress-theme' ),
				'description'       => __(
					'Replace WP internal search service with ASU\'s search service',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_asu_search',
				'settings'   => 'asu_search',
				'type'       => 'radio',
				'choices'    => array(
					'enabled'  => 'enabled',
					'disabled' => 'disabled',
				),
			)
		);

		// ==================================
		// ==================================
		// = ASU Analytics Manager Section =
		// ==================================
		// ==================================

		$wp_customize->add_section(
			'uds_wp_theme_section_asu_analytics',
			array(
				'title'      => __( 'ASU Analytics', 'uds-wordpress-theme' ),
				'priority'   => 40,
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
				'type'              => 'option',
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
				'type'              => 'option',
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


		// =============================
		// =============================
		// = 404 Image Section         =
		// =============================
		// =============================

		$wp_customize->add_section(
			'uds_wp_theme_section_404',
			array(
				'title'      => __( '404 Image', 'uds-wordpress-theme' ),
				'priority'   => 50,
			)
		);

		// =============================
		// = 404 Image                 =
		// =============================
		$wp_customize->add_setting(
			// 'uds_wp_theme_options[image_404]',
			'image_404',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
			)
		);

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

		// ================================
		// ================================
		// = Theme Layout Manager Section =
		// ================================
		// ================================

		// Theme layout settings.
		$wp_customize->add_section(
			'uds_wp_theme_layout_options',
			array(
				'title'       => __( 'Theme Layout Settings', 'uds-wordpress-theme' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Theme sidebar defaults', 'uds-wordpress-theme' ),
				'priority'    => 60,
			)
		);

		$wp_customize->add_setting(
			// 'uds_wp_theme_options[sidebars]',
			'sidebar_position',
			array(
				'default'           => 'left',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_position',
				array(
					'label'             => __( 'Sidebar Positioning', 'uds-wordpress-theme' ),
					'description'       => __(
						'Set sidebar\'s default position. Can either be: right, left, both or none.',
						'uds-wordpress-theme'
					),
					'section'           => 'uds_wp_theme_layout_options',
					'settings'          => 'sidebar_position',
					'type'              => 'select',
					'sanitize_callback' => 'uds_wp_sanitize_select',
					'choices'           => array(
						'right' => __( 'Right sidebar', 'uds-wordpress-theme' ),
						'left'  => __( 'Left sidebar', 'uds-wordpress-theme' ),
						'both'  => __( 'Left & Right sidebars', 'uds-wordpress-theme' ),
						'none'  => __( 'No sidebar', 'uds-wordpress-theme' ),
					),
					'priority'          => apply_filters( 'sidebar_position', 20 ),
				)
			)
		);
	}
} // End of if function_exists( 'uds_wp_register_theme_customizer_settings' ).
add_action( 'customize_register', 'uds_wp_register_theme_customizer_settings' );
