/**
* Javascript file to update the core block core/paragraph
*
* This file is for Gutenburg native block [core/header] functions that would only run in admin side.
* It adds 3 new formats to heading block toolbar to add highlight options to specefic word/words
*
*/
( function( wp ) {

	// Some shortcuts for commonly used Gutenberg libraries/features.
	var withSelect  = wp.data.withSelect;
	var ifCondition = wp.compose.ifCondition;
	var compose     = wp.compose.compose;
	var el          = wp.element.createElement;

	var __ = wp.i18n.__;
	var insert = wp.richText.insert;


	// Active state toolbar icons require an SVG, so we create one here.
	var brushIcon = el( 'svg', { width: 20, height: 20, viewBox: '0 0 20 20' },
	el( 'path', { d: d="M17.657,2.982H2.342c-0.234,0-0.425,0.191-0.425,0.426v10.21c0,0.234,0.191,0.426,0.425,0.426h3.404v2.553c0,0.397,0.48,0.547,0.725,0.302l2.889-2.854h8.298c0.234,0,0.426-0.191,0.426-0.426V3.408C18.083,3.174,17.892,2.982,17.657,2.982M17.232,13.192H9.185c-0.113,0-0.219,0.045-0.3,0.124l-2.289,2.262v-1.96c0-0.233-0.191-0.426-0.425-0.426H2.767V3.833h14.465V13.192z M10,7.237c-0.821,0-1.489,0.668-1.489,1.489c0,0.821,0.668,1.489,1.489,1.489c0.821,0,1.488-0.668,1.488-1.489C11.488,7.905,10.821,7.237,10,7.237 M10,9.364c-0.352,0-0.638-0.288-0.638-0.638c0-0.351,0.287-0.638,0.638-0.638c0.351,0,0.638,0.287,0.638,0.638C10.638,9.077,10.351,9.364,10,9.364 M14.254,7.237c-0.821,0-1.489,0.668-1.489,1.489c0,0.821,0.668,1.489,1.489,1.489s1.489-0.668,1.489-1.489C15.743,7.905,15.075,7.237,14.254,7.237 M14.254,9.364c-0.351,0-0.638-0.288-0.638-0.638c0-0.351,0.287-0.638,0.638-0.638c0.352,0,0.639,0.287,0.639,0.638C14.893,9.077,14.605,9.364,14.254,9.364 M5.746,7.237c-0.821,0-1.489,0.668-1.489,1.489c0,0.821,0.668,1.489,1.489,1.489c0.821,0,1.489-0.668,1.489-1.489C7.234,7.905,6.566,7.237,5.746,7.237 M5.746,9.364c-0.351,0-0.638-0.288-0.638-0.638c0-0.351,0.287-0.638,0.638-0.638c0.351,0,0.638,0.287,0.638,0.638C6.384,9.077,6.096,9.364,5.746,9.364" } )
	);

	/**
	 * Create our RichTextToolbarButtons, applying our icon, and using
	 * toggleFormat() to add/remove our classes.
	 */

	var TooltipButton = function( props ) {
		return el(
			wp.blockEditor.RichTextToolbarButton,
			{
				icon: brushIcon,
				title: 'UDS Tooltip',
				onClick: function() {
					props.onChange(
						wp.richText.toggleFormat( props.value, {
							type: 'uds-wordpress-theme/tooltip',
							attributes: {
								dataToggle: 'tooltip',
								dataPlacement: 'top',
								title: prompt ('Enter the tooltip description'),
								},
						})
					);
				},
				isActive: props.isActive
			}
		);
	};




	/**
	 * Create conditional versions of the buttons from above so that our toolbar
	 * buttons only render when the currently selected block is a Heading block.
	 */
	var ConditionalTooltipButton = compose(
		withSelect( function( select ) {
			return {
				selectedBlock: select( 'core/block-editor' ).getSelectedBlock()
			};
		} ),
		ifCondition( function( props ) {
			return (
				props.selectedBlock &&
				'core/paragraph' === props.selectedBlock.name
			);
		} )
	)( TooltipButton );




	/**
	 * Register our styles, passing in our conditional buttons
	 */
	wp.richText.registerFormatType(
		'uds-wordpress-theme/tooltip', {
			title: 'UDS Tooltip',
			tagName: 'button',
			attributes: {
			 dataToggle: 'data-toggle',
			 dataPlacement: 'data-placement',
			 title: 'title',
		},
			className: 'btn-tooltip',
			edit: ConditionalTooltipButton
		}
	);








} )( window.wp );
