/**
* Javascript file to update the core block core/header
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

	// Active state toolbar icons require an SVG, so we create one here.
	var brushIcon = el( 'svg', { width: 20, height: 20, viewBox: '0 0 20 20' },
	el( 'path', { d: 'M18.33 3.57s.27-.8-.31-1.36c-.53-.52-1.22-.24-1.22-.24c-.61.3-5.76 3.47-7.67 5.57c-.86.96-2.06 3.79-1.09 4.82c.92.98 3.96-.17 4.79-1c2.06-2.06 5.21-7.17 5.5-7.79zM1.4 17.65c2.37-1.56 1.46-3.41 3.23-4.64c.93-.65 2.22-.62 3.08.29c.63.67.8 2.57-.16 3.46c-1.57 1.45-4 1.55-6.15.89z' } )
	);

	/**
	 * Create our RichTextToolbarButtons, applying our icon, and using
	 * toggleFormat() to add/remove our classes.
	 */

	var GoldHighlightButton = function( props ) {
		return el(
			wp.blockEditor.RichTextToolbarButton,
			{
				icon: brushIcon,
				title: 'UDS Gold Highlight',
				onClick: function() {
					props.onChange(
						wp.richText.toggleFormat( props.value, {
							type: 'uds-wordpress-theme/gold-highlight'
						})
					);
				},
				isActive: props.isActive
			}
		);
	};

	var WhiteHighlightButton = function( props ) {
		return el(
			wp.blockEditor.RichTextToolbarButton,
			{
				icon: brushIcon,
				title: 'UDS White Highlight',
				onClick: function() {
					props.onChange(
						wp.richText.toggleFormat( props.value, {
							type: 'uds-wordpress-theme/white-highlight'
						})
					);
				},
				isActive: props.isActive
			}
		);
	};

	var BlackHighlightButton = function( props ) {
		return el(
			wp.blockEditor.RichTextToolbarButton,
			{
				icon: brushIcon,
				title: 'UDS Black Highlight',
				onClick: function() {
					props.onChange(
						wp.richText.toggleFormat( props.value, {
							type: 'uds-wordpress-theme/black-highlight'
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
	var ConditionalGoldHighlightButton = compose(
		withSelect( function( select ) {
			return {
				selectedBlock: select( 'core/block-editor' ).getSelectedBlock()
			};
		} ),
		ifCondition( function( props ) {
			return (
				props.selectedBlock &&
				'core/heading' === props.selectedBlock.name
			);
		} )
	)( GoldHighlightButton );

	var ConditionalWhiteHighlightButton = compose(
		withSelect( function( select ) {
			return {
				selectedBlock: select( 'core/block-editor' ).getSelectedBlock()
			};
		} ),
		ifCondition( function( props ) {
			return (
				props.selectedBlock &&
				'core/heading' === props.selectedBlock.name
			);
		} )
	)( WhiteHighlightButton );

	var ConditionalBlackHighlightButton = compose(
		withSelect( function( select ) {
			return {
				selectedBlock: select( 'core/block-editor' ).getSelectedBlock()
			};
		} ),
		ifCondition( function( props ) {
			return (
				props.selectedBlock &&
				'core/heading' === props.selectedBlock.name
			);
		} )
	)( BlackHighlightButton );

	/**
	 * Register our styles, passing in our conditional buttons
	 */
	wp.richText.registerFormatType(
		'uds-wordpress-theme/gold-highlight', {
			title: 'UDS Gold Highlight',
			tagName: 'span',
			className: 'highlight-gold',
			edit: ConditionalGoldHighlightButton
		}
	);

	wp.richText.registerFormatType(
			'uds-wordpress-theme/white-highlight', {
					title: 'UDS White Highlight',
					tagName: 'span',
					className: 'highlight-white',
					edit: ConditionalWhiteHighlightButton
			}
	);

	wp.richText.registerFormatType(
			'uds-wordpress-theme/black-highlight', {
					title: 'UDS Black Highlight',
					tagName: 'span',
					className: 'highlight-black',
					edit: ConditionalBlackHighlightButton
			}
	);

} )( window.wp );
