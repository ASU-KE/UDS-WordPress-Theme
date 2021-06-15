/**
* Javascript file to update the core block core/header
*
* This file is for Gutenburg native block [core/header] functions that would only run in admin side.
* It adds 3 new formats to heading block toolbar to add highlight options to specefic word/words
*
*/
( function( wp ) {

    var withSelect  = wp.data.withSelect;
    var ifCondition = wp.compose.ifCondition;
    var compose     = wp.compose.compose;

    var GoldHighlightButton = function( props ) {
        return wp.element.createElement(
            wp.editor.RichTextToolbarButton,
            {
                icon: 'admin-customizer',
                title: 'UDS Gold Highlight',
                onClick: function() {
                    props.onChange(
                        wp.richText.toggleFormat( props.value, {
                            type: 'uds-wordpress-theme/gold-highlight'
                        })
                    );
                }
            }
        );
    };

		var WhiteHighlightButton = function( props ) {
        return wp.element.createElement(
            wp.editor.RichTextToolbarButton,
            {
                icon: 'admin-customizer',
                title: 'UDS White Highlight',
                onClick: function() {
                    props.onChange(
                        wp.richText.toggleFormat( props.value, {
                            type: 'uds-wordpress-theme/white-highlight'
                        })
                    );
                }
            }
        );
    };

		var BlackHighlightButton = function( props ) {
        return wp.element.createElement(
            wp.editor.RichTextToolbarButton,
            {
                icon: 'admin-customizer',
                title: 'UDS Black Highlight',
                onClick: function() {
                    props.onChange(
                        wp.richText.toggleFormat( props.value, {
                            type: 'uds-wordpress-theme/black-highlight'
                        })
                    );
                }
            }
        );
    };

    var ConditionalGoldHighlightButton = compose(
        withSelect( function( select ) {
            return {
                selectedBlock: select( 'core/editor' ).getSelectedBlock()
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
                selectedBlock: select( 'core/editor' ).getSelectedBlock()
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
                selectedBlock: select( 'core/editor' ).getSelectedBlock()
            };
        } ),
        ifCondition( function( props ) {
            return (
                props.selectedBlock &&
                'core/heading' === props.selectedBlock.name
            );
        } )
    )( BlackHighlightButton );

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
