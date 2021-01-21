/**
 * Javascript that affects Gutenburg's blocks in admin side
 *
 * This file is for Gutenburg block functions that would only run in admin side.
 * To register block, unregister block, render block, enueue assets and etc
 *
 */
(function( $ ) {

	// Unregister unwanted blocks.
		wp.domReady( () => {
			wp.blocks.unregisterBlockType( 'core/preformatted' );
			wp.blocks.unregisterBlockType( 'core/verse' );
			wp.blocks.unregisterBlockType( 'core/pullquote' );
		} );

})( jQuery );
