<?php
/**
 * UDS WordPress Theme Customizer
 *
 * @package uds-wordpress-theme
 * @author KE Web Services
 *
 * Creates the customizer settings, controls, and selective refresh values
 * for the theme.
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
			 * Custom control to display a separator between controls within
			 * a single section. We create a phony setting, then insert this
			 * control, associating it with that setting.
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

		// Remove default sections and controls we do not need/want.
		$wp_customize->remove_section( 'background_image' );
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'header_image' );

		$wp_customize->remove_control( 'blogdescription' );
		$wp_customize->remove_control( 'site_icon' );
		$wp_customize->remove_control( 'custom_logo' );

		// Rename the 'Site Identity' section to 'Site Information'.
		$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Information', 'uds-wordpress-theme' );

		/***********************************************************************
		 * Site Information Section
		 *
		 * Contains: Blog name (aka subdomain name), parent unit name, parent
		 * unit link. Also
		 */

		/**
		 * Selective refresh for site title
		 *
		 * Allows for the visual edit button next to the site title. We are using
		 * the default 'blog name' value, so we're simply setting the selective
		 * refresh for this, not a new setting or control.
		 */
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.subdomain-name, .footer-site-name',
				'container_inclusive' => false,
				'render_callback' => function() {
					return (
						uds_wp_render_title_wrapper()
						&&
						uds_wp_render_subdomain_name()
					);
				},
			)
		);

		/**
		 * Site Name as a link checkbox
		 */
		$wp_customize->add_setting(
			'sitename_as_link',
			array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'sitename_as_link_control',
			array(
				'description' => __( '<p>Determines if the site name in the header is also a link to the root (home page) of your site.</p>', 'uds-wordpress-theme' ),
				'label'       => __( 'Make title a link', 'uds-wordpress-theme' ),
				'section'     => 'title_tagline',
				'type'        => 'checkbox',
				'settings'    => 'sitename_as_link',
				'priority'    => 15,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'sitename_as_link_control',
			array(
				'selector'        => '.navbar-container',
				'container_inclusive' => false,
				'render_callback' => function() {
					return (
						uds_wp_render_title_wrapper()
						&&
						uds_wp_render_subdomain_name()
					);
				},
			)
		);

		/**
		 * Alternate 'Display' Name for the Site
		 */
		$wp_customize->add_setting(
			'site_display_name',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'site_display_name_control',
			array(
				'description' => __( '<p>To display a site title other than the one listed above, enter an alternate title here.</p>', 'uds-wordpress-theme' ),
				'label'       => __( 'Site Display Name', 'uds-wordpress-theme' ),
				'section'     => 'title_tagline',
				'settings'    => 'site_display_name',
				'priority'    => 20,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'site_display_name',
			array(
				'selector'        => '.navbar-container',
				'container_inclusive' => false,
				'render_callback' => function() {
					return (
						uds_wp_render_title_wrapper()
						&&
						uds_wp_render_subdomain_name()
					);
				},
			)
		);

		/**
		 * Parent unit name
		 */
		$wp_customize->add_setting(
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
				'description' => __( '<p>The Parent Unit name displays as smaller text above the site title, but <b>will be hidden in mobile views.</b></p>', 'uds-wordpress-theme' ),
				'label'       => __( 'Parent Unit Name', 'uds-wordpress-theme' ),
				'section'     => 'title_tagline',
				'settings'    => 'parent_unit_name',
				'priority'    => 20,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'parent_unit_name',
			array(
				'selector' => '.navbar-container',
				'container_inclusive' => true,
				'render_callback' => function() {
					return (
						uds_wp_render_title_wrapper()
						&&
						uds_wp_render_parent_unit_name()
					);
				},
			)
		);

		/**
		 * Parent unit URL
		 */
		$wp_customize->add_setting(
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
				'description'       => __( '<p>To make the Parent Unit a link, provide the URL here.</p>', 'uds-wordpress-theme' ),
				'label'      => __( 'Parent Unit URL', 'uds-wordpress-theme' ),
				'section'    => 'title_tagline',
				'settings'   => 'parent_unit_link',
				'priority'   => 30,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'parent_unit_link',
			array(
				'selector' => '.navbar-container',
				'container_inclusive' => true,
				'render_callback' => function() {
					return (
						uds_wp_render_title_wrapper()
						&&
						uds_wp_render_parent_unit_name()
					);
				},
			)
		);

		/***********************************************************************
		 * ASU Global Header Section
		 *
		 * Contains: main navigation menu toggle
		 */

		/**
		 * Create the section
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
			'header_navigation_menu',
			array(
				'default'           => 'enabled',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'header_navigation_menu',
			array(
				'label'      => __( 'Main Navigation Menu', 'uds-wordpress-theme' ),
				'description'       => __(
					'<p>Show or hide the main navigation menu. Hiding this is <b>only</b> approved for Landing Page sites.</p>',
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

		/**
		 * Use Parent menu?
		 */
		if( is_multisite() && ! is_main_site() ) {
			$wp_customize->add_setting(
				'use_main_site_menu',
				array(
					'default'           => false,
					'capability'        => 'edit_theme_options',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'uds_wp_sanitize_nothing',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				'use_main_site_menu_control',
				array(
					'label'      => __( 'Use Main Site Menu', 'uds-wordpress-theme' ),
					'description'       => __(
						'<p>If selected, this sub-site will display the navigation menu from the main site of this multi-site network, and not its own main menu.</p>',
						'uds-wordpress-theme'
					),
					'section'    => 'uds_wp_theme_section_header',
					'settings'   => 'use_main_site_menu',
					'type'       => 'checkbox',
					'active_callback' => 'show_use_main_site_nav_input',
					'priority'   => 50,
				)
			);
		}

		/**
		 * Re-render the page area when the navigation visibility is toggled on or off.
		 * We had to use an inline 'render_callback' here in order to use the && operator
		 * to activate both partial functions. Calling both of those render functions also
		 * seems to make WordPress use 'refresh' (render the whole page again) no matter
		 * what setting we use for 'transport' up above - so I set it to refresh.
		 *
		 */
		$wp_customize->selective_refresh->add_partial(
			'header_navigation_menu',
			array(
				'selector'            => '#menubar',
				'container_inclusive' => false,
				'render_callback' => function() {
					return (
						uds_wp_render_navbar_container()
						&&
						uds_wp_render_main_nav_menu()
					);
				},
			)
		);


		/**
		 * Alternate Home Icon URL
		 *
		 * The default Home URL is taken from WordPress's home_url() function,
		 * and is not created as a normal WordPress menu item. This textbox
		 * allows users to override that home URL, if they need a different one.
		 * This is most useful with sub-sites that want to point back up to a
		 * main set in a network.
		 */
		$wp_customize->add_setting(
			'alternate_home_url',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'alternate_home_url_control',
			array(
				'type'				=> 'url',
				'description'   	=> __( '<p>Customize the Home icon\'s URL.</p>', 'uds-wordpress-theme' ),
				'label'      		=> __( 'Alternate Home URL', 'uds-wordpress-theme' ),
				'section'   	 	=> 'uds_wp_theme_section_header',
				'settings'  		=> 'alternate_home_url',
				'active_callback'	=> 'show_use_main_site_nav_input',
				'priority'   		=> 50,
			)
		);

		$wp_customize->add_setting(
			'alternate_home_title',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'alternate_home_title_control',
			array(
				'type'				=> 'url',
				'description'   	=> __( '<p>Customize the title for the home icon, which appears when hovering over the Home icon.</p>', 'uds-wordpress-theme' ),
				'label'      		=> __( 'Alternate Home Title (tooltip)', 'uds-wordpress-theme' ),
				'section'   	 	=> 'uds_wp_theme_section_header',
				'settings'  		=> 'alternate_home_title',
				'active_callback'	=> 'show_use_main_site_nav_input',
				'priority'   		=> 50,
			)
		);


		/***********************************************************************
		 * ASU Global Footer Section
		 *
		 * Contains: logo+social row toggle, footer logo, social media menu
		 */
		$wp_customize->add_section(
			'uds_wp_theme_section_footer',
			array(
				'title'      => __( 'ASU Global Footer', 'uds-wordpress-theme' ),
				'priority'   => 30,
			)
		);

		/**
		 * Unit logo+social toggle
		 */
		$wp_customize->add_setting(
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

		/**
		 * Use Main site social media menu?
		 */
		if( is_multisite() && ! is_main_site() ) {
			$wp_customize->add_setting(
				'use_main_site_social_menu',
				array(
					'default'           => false,
					'capability'        => 'edit_theme_options',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'uds_wp_sanitize_nothing',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				'use_main_site_social_menu_control',
				array(
					'label'       => __( 'Use Main Site Social Media Menu', 'uds-wordpress-theme' ),
					'description' => __(
						'<p>If selected, this sub-site will display the social media menu from the main site of this multi-site network, and not its own social media menu.</p>',
						'uds-wordpress-theme'
					),
					'section'    => 'uds_wp_theme_section_footer',
					'settings'   => 'use_main_site_social_menu',
					'type'       => 'checkbox',
					'priority'   => 10,
				)
			);
		}

		$wp_customize->selective_refresh->add_partial(
			'footer_row_branding',
			array(
				'selector' => '#wrapper-endorsed-footer',
				'container_inclusive' => false,
				'render_callback' => 'uds_wp_render_footer_branding_row',
			)
		);

		/**
		 * Logo type radio buttons
		 */
		$wp_customize->add_setting(
			'footer_logo_type',
			array(
				'default'           => 'enabled',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'footer_logo_type',
			array(
				'label'      => __( 'Footer Logo', 'uds-wordpress-theme' ),
				'description'       => __(
					'Logo to use in the global footer area. If you do not have a unit logo, you must use the ASU logo.',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'footer_logo_type',
				'type'       => 'radio',
				'choices'    => array(
					'asu'  => 'Use the ASU logo',
					'custom' => 'Use a unit logo',
				),
				'priority'   => 15,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'footer_logo_type',
			array(
				'selector' => '#endorsed-logo',
				'container_inclusive' => false,
				'render_callback' => 'uds_wp_render_footer_logo',
			)
		);

		/**
		 * Endorsed logo drop-down
		 */
		$wp_customize->add_setting(
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
			'none',
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
						'Select an endorsed logo to appear in the footer, or \'none\' to provide a link to a different endorsed logo.',
						'uds-wordpress-theme'
					),
					'section'           => 'uds_wp_theme_section_footer',
					'settings'          => 'logo_select',
					'type'              => 'select',
					'sanitize_callback' => 'uds_wp_sanitize_select',
					'choices'           => $logo_options,
					'active_callback' => 'show_custom_logo_fields',
					'priority'          => 20,
				)
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'logo_select',
			array(
				'selector' => '#endorsed-logo',
				'container_inclusive' => false,
				'render_callback' => 'uds_wp_render_footer_logo',
			)
		);

		/**
		 * Alternate logo URL.
		 */
		$wp_customize->add_setting(
			'logo_url',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'logo_url',
			array(
				'label'      => __( 'Unit Endorsed Logo URL', 'uds-wordpress-theme' ),
				'description'       => __(
					'If you have chosen \'none\' above, provide a URL to an approved logo. Choosing \'none\' and leaving this field empty will result in the ASU logo being displayed.',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'logo_url',
				'active_callback' => 'show_custom_logo_fields',
				'priority'   => 30,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'logo_url',
			array(
				'selector' => '#endorsed-logo',
				'container_inclusive' => false,
				'render_callback' => 'uds_wp_render_footer_logo',
			)
		);


		/**
		 * Alternate URL for footer logo.
		 */
		$wp_customize->add_setting(
			'footer_logo_link',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'footer_logo_link_control',
			array(
				'label'      => __( 'External URL', 'uds-wordpress-theme' ),
				'description'       => __(
					'By default the logo links to the home page of the current website. You can link it to a different website by adding a URL here:',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'footer_logo_link',
				'active_callback' => 'show_custom_logo_fields',
				'priority'   => 31,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'footer_logo_link',
			array(
				'selector' => '#endorsed-logo',
				'container_inclusive' => false,
				'render_callback' => 'uds_wp_render_footer_logo',
			)
		);


		/**
		 * Section Separator
		 */
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
					'priority' => 40,
				)
			)
		);

		/**
		 * Footer Action Row toggle setting
		 */
		$wp_customize->add_setting(
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

		$wp_customize->selective_refresh->add_partial(
			'footer_row_actions',
			array(
				'selector' => '#wrapper-footer-columns',
				'container_inclusive' => false,
				'render_callback' => 'uds_wp_render_footer_action_row',
			)
		);

		/**
		 * Use Main site footer menu?
		 */
		if( is_multisite() && ! is_main_site() ) {
			$wp_customize->add_setting(
				'use_main_site_footer_menu',
				array(
					'default'           => false,
					'capability'        => 'edit_theme_options',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'uds_wp_sanitize_nothing',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				'use_main_site_footer_menu_control',
				array(
					'label'      => __( 'Use Main Site Footer Menu', 'uds-wordpress-theme' ),
					'description'       => __(
						'<p>If selected, this sub-site will display the footer menu from the main site of this multi-site network, and not its own footer menu.</p>',
						'uds-wordpress-theme'
					),
					'section'    => 'uds_wp_theme_section_footer',
					'settings'   => 'use_main_site_footer_menu',
					'type'       => 'checkbox',
					'priority'   => 50,
				)
			);
		}


		/**
		* Footer Alternate Unit Name Text
		*/
		$wp_customize->add_setting(
			'footer_unit_name_type',
			array(
				'default'           => 'default',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'footer_unit_name_type',
			array(
				'label'      => __( 'Footer Unit Name Type', 'uds-wordpress-theme' ),
				'description'       => __(
					'<p>Choose between using the site name, or custom text, beneath the footer logo.</p>',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'footer_unit_name_type',
				'type'       => 'radio',
				'choices'    => array(
					'default'  => 'Site Name',
					'custom' => 'Custom Text',
				),
				'priority'   => 60,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'footer_unit_name_type',
			array(
				'selector'            => '#footer-unit-text',
				'container_inclusive' => false,
				'render_callback' => function() {
					return (
						uds_wp_render_footer_unit_name()
					);
				},
			)
		);

		/**
		 * Footer alternate unit name value
		 */
		$wp_customize->add_setting(
			'footer_unit_name_text',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'footer_unit_name_text',
			array(
				'label'      => __( 'Alternate Text', 'uds-wordpress-theme' ),
				'description'       => __(
					'Text to use, instead of the site name, beneath the footer logo',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'footer_unit_name_text',
				'active_callback' => 'show_alternate_footer_title_input',
				'priority'   => 70,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'footer_unit_name_text',
			array(
				'selector' => '#footer-unit-text',
				'container_inclusive' => false,
				'render_callback' => 'uds_wp_render_footer_unit_name',
			)
		);

		/**
		 * Contribute URL
		 */
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
				'description' => __( 'Enter a URL here to show the \'Contribute\' button in the footer', 'uds-wordpress-theme' ),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'contribute_url',
				'priority'   => 100,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'contribute_url',
			array(
				'selector' => '.contribute-wrapper',
				'container_inclusive' => false,
				'render_callback' => 'uds_wp_render_contribute_button',
			)
		);


		/**
		 * Contribute Button Text
		 */
		$wp_customize->add_setting(
			'contribute_text',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'contribute_text',
			array(
				'label'      => __( 'Contribute button Text', 'uds-wordpress-theme' ),
				'description' => __( 'Enter custom text here to replace the default text of \'Contribute\'', 'uds-wordpress-theme' ),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'contribute_text',
				'priority'   => 101,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'contribute_text',
			array(
				'selector' => '.contribute-wrapper',
				'container_inclusive' => false,
				'render_callback' => 'uds_wp_render_contribute_button',
			)
		);

		/**
		 * Contact Us URL
		 */
		$wp_customize->add_setting(
			'contact_url',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_email_or_url',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'contact_url',
			array(
				'label'      => __( 'Contact URL', 'uds-wordpress-theme' ),
				'description' => __( 'Enter a URL to a contact page to show a \'Contact Us\' link in the footer', 'uds-wordpress-theme' ),
				'section'    => 'uds_wp_theme_section_footer',
				'settings'   => 'contact_url',
				'priority'   => 90,
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'contact_url',
			array(
				'selector' => '.contact-wrapper',
				'container_inclusive' => false,
				'render_callback' => 'uds_wp_render_contact_link',
			)
		);

		/***********************************************************************
		 * 404 Image Section
		 *
		 * Contains: button to show 404 page, 404 image, 404 page type.
		 */

		$wp_customize->add_section(
			'uds_wp_theme_section_404',
			array(
				'title'      => __( '404 Page Settings', 'uds-wordpress-theme' ),
				'priority'   => 30,
			)
		);


		/**
		 * 404 page type selection: choose default or custom 404 page.
		 */
		$wp_customize->add_setting(
			'404_page_type',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'404_page_type_control',
			array(
				'label'      => __( '404 Page Type', 'uds-wordpress-theme' ),
				'description'       => __(
					'You can use the default 404 page content (and choose an image here), or create a custom page on the website for your 404 content.',
					'uds-wordpress-theme'
				),
				'section'    => 'uds_wp_theme_section_404',
				'settings'   => '404_page_type',
				'type'       => 'radio',
				'choices'    => array(
					'default'  => 'Default',
					'custom' => 'Custom',
				),
			)
		);

		/**
		 * 404 Page name: shows if 'custom' is set. Name of standard page to use for 404 content.
		 */
		$wp_customize->add_setting(
			'404_page_id',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'404_page_id_control',
			array(
				'label'      => __( '404 Page', 'uds-wordpress-theme' ),
				'description'       => __(
					'Choose an existing page containing the content you would like to use on your custom 404 page.',
					'uds-wordpress-theme'
				),
				'type'       => 'dropdown-pages',
				'section'    => 'uds_wp_theme_section_404',
				'settings'   => '404_page_id',
				'active_callback' => 'show_404_page_name',
			)
		);

		/**
		 * 404 Image: used only when page type is 'default'.
		 */
		$wp_customize->add_setting(
			'image_404',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'refresh',
			)
		);

		// Image picker control (created differently, via an instance of a class).
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'image_404',
				array(
					'label'      => __( 'Default 404 Image', 'uds-wordpress-theme' ),
					'description'       => __(
						'Background image only used on the default 404 page. For best results, use a 1200x500 pixel image',
						'uds-wordpress-theme'
					),
					'section'    => 'uds_wp_theme_section_404',
					'settings'   => 'image_404',
					'active_callback' => 'show_404_image_field',
				)
			)
		);

		/**
		 * This is a "setting-less" control, and only shows up if you are NOT
		 * looking at the 404 page in the customizer (see the 'active_callback').
		 * It loads an invalid URL in the customizer iFrame so you can see what
		 * you are editing.
		 */
		$wp_customize->add_control(
			'not_found_link',
			array(
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
				'active_callback' => 'show_404_callback',
			)
		);

		/***********************************************************************
		 * ASU Analytics Section
		 *
		 * Contains: ASU Hub analytics, Google Analytics, Google Tag Manager,
		 * and Hotjar settings.
		 */

		$wp_customize->add_section(
			'uds_wp_theme_section_asu_analytics',
			array(
				'title'      => __( 'ASU Analytics', 'uds-wordpress-theme' ),
				'priority'   => 30,
			)
		);

		/**
		 * ASU Marketing Hub Analytics Manager
		 */
		$wp_customize->add_setting(
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

		/**
		 * Site Google Search Console (GCS) ownership verification id
		 */
		$wp_customize->add_setting(
			'site_gcs_ownership_verification_id',
			array(
				'capability'        => 'edit_theme_options',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'site_gcs_ownership_verification_id',
			array(
				'label'             => __( 'Google Search Console Ownership Verification ID', 'uds-wordpress-theme' ),
				'description'       => __(
					'Ownership verification means proving to Search Console that you own a specific website. Choose the HTML tag method on the Ownership verification page for your property. In the HTML snippet provided, copy the "content" value: <meta name="google-site-verification" content="COPY_AND_PASTE_THIS_VALUE" />.',
					'uds-wordpress-theme'
				),
				'section'           => 'uds_wp_theme_section_asu_analytics',
				'settings'          => 'site_gcs_ownership_verification_id',
				'type'              => 'input',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
			)
		);

		/**
		 * Site Google Tag Manager
		 */
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
					'Enter your unit\'s GTM container ID to enable analytics for this website.',
					'uds-wordpress-theme'
				),
				'section'           => 'uds_wp_theme_section_asu_analytics',
				'settings'          => 'site_gtm_container_id',
				'type'              => 'input',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
			)
		);

		/**
		 * Site Google Analytics
		 */
		$wp_customize->add_setting(
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
					'Your unit\'s Google Analytics Tracking ID',
					'uds-wordpress-theme'
				),
				'section'           => 'uds_wp_theme_section_asu_analytics',
				'settings'          => 'site_ga_tracking_id',
				'type'              => 'input',
				'sanitize_callback' => 'uds_wp_sanitize_nothing',
			)
		);

		/**
		 * Hotjar Analytics
		 */
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
					'Your Hotjar Site ID',
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

/**
 * Callback for our 'show 404 page' button. For backwards compatability, and to
 * make PHPCS happy, we are not using inline anonymous functions. This function
 * returns TRUE if we are NOT viewing the 404 page. When that is the case, we
 * draw the button to show the 404 page.
 */
function show_404_callback() {
	return ! is_404();
}

/**
 * Show or hide the 404 image selector based on the 404 page type value.
 * If the current value is 'custom', we don't show the image chooser.
 */
function show_404_image_field() {

	$page_type = get_theme_mod( '404_page_type' );

	if ( 'custom' === $page_type ) {
		return false;
	} else {
		return true;
	}
}

/**
 * Show or hide the 404 page name input based on the 404 page type value.
 * If the current value is 'default', we don't show the image chooser.
 */
function show_404_page_name() {

	$page_type = get_theme_mod( '404_page_type' );

	if ( 'default' === $page_type ) {
		return false;
	} else {
		return true;
	}
}

/**
 * Show or hide the custom logo options (the drop-down and the URL field)
 * based on the logo_select value. If the current value is 'ASU', we don't
 * show the other options. If it's 'custom', we do show them.
 */
function show_custom_logo_fields() {

	$logo_type = get_theme_mod( 'footer_logo_type' );

	if ( 'asu' === $logo_type ) {
		return false;
	} else {
		return true;
	}
}

/**
 * Show or hide a text input for entering alternate text to replace the site
 * name beneath the unit logo in the footer. If the user has selected 'custom',
 * for the unit text type, we want to show this field.
 */
function show_alternate_footer_title_input() {

	return true;

	$footer_unit_name_type = get_theme_mod( 'footer_unit_name_type' );

	if ( 'default' === $footer_unit_name_type ) {
		return false;
	} else {
		return true;
	}
}

/**
 * Show or Hide the 'Use Main Site Main Menu' checkbox only when the main
 * menu itself is set to show. We get the value of 'header_navigation_menu'
 * and show our 'menu thief' checkbox only if the main menu is visible.
 */
function show_use_main_site_nav_input() {
	$main_nav_visible = get_theme_mod( 'header_navigation_menu' );

	if( "disabled" == $main_nav_visible ) {
		return false;
	}else{
		return true;
	}
}
