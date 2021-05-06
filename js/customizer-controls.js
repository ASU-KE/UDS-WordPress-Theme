/**
 * Javascript that affects Customizer controls.
 *
 * There are two areas to the Customizer: the live preview of the site, and the actual
 * customizer controls. If you want to run Javascript that operates on the controls
 * themselves, it needs to be enqueued with a different hook that the one used
 * for Javascript that is affecting the live preview area, so it needs to be in a
 * separate file.
 *
 */

( function( api ) {
	'use strict';

	/**
	 *
	 */
	api( 'footer_logo_type', function( setting ) {
		var linkSettingValueToControl;

		/**
		 * Update other controls' states according to footer_logo_type's value
		 *
		 * @param {api.Control} control the footer_logo_type control.
		 */
		linkSettingValueToControl = function( control ) {
			var visibility = function() {
				if ( 'asu' === setting.get() ) {
					control.container.slideUp( 180 );
				} else {
					control.container.slideDown( 180 );
				}
			};

			// Set initial active state.
			visibility();

			//Update activate state whenever the setting is changed.
			setting.bind( visibility );
		};

		// Call linkSettingValueToControl on our drop-down and URL fields.
		api.control( 'logo_select', linkSettingValueToControl );
		api.control( 'logo_url', linkSettingValueToControl );
	} );

	/**
	 *
	 */
	 api( 'footer_unit_name_type', function( setting ) {
		var linkSettingValueToControl;

		/**
		 * Show/hide footer text input based on value of radio controls.
		 * When 'footer_unit_name_type' control is changed, we check to
		 * see if it is set to 'default'. If so, we hide the text input.
		 * If not, it must be 'custom', and we show the input.
		 *
		 * @param {api.Control} control the footer_unit_name_type control.
		 */
		linkSettingValueToControl = function( control ) {
			var visibility = function() {
				if ( 'default' === setting.get() ) {
					control.container.slideUp( 180 );
				} else {
					control.container.slideDown( 180 );
				}
			};

			// Set initial active state.
			visibility();

			//Update activate state whenever the setting is changed.
			setting.bind( visibility );
		};

		// Call linkSettingValueToControl on our drop-down and URL fields.
		api.control( 'footer_unit_name_text', linkSettingValueToControl );
	} );

}( wp.customize ) );
