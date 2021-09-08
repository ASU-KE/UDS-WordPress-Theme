/**
* Javascript file to update the core block core/image
*
* This file is for Gutenburg native block [core/image] functions that would only run in admin side.
*
*/

//jshint esversion: 6
( function( $ ) {
$( document ).ready(function() {

//Register block style for core/separator block
wp.domReady( function() {

    wp.blocks.registerBlockStyle( 'core/image', {
        name: 'text-overlay',
        label: 'Text overlay'
    });

		wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );

		const { __, setLocaleData } = wp.i18n;
		const { registerBlockType } = wp.blocks;
		//import ServerSideRender from '@wordpress/server-side-render';

		registerBlockType( 'core/image', {
		    title: __( 'SimpleTOC', 'simpletoc' ),
		    icon: 'list-view',
		    category: 'layout',
		    edit: function( props ) {
		        return (

												<div className="nice-img">
        <figure className="wp-block-image">
          <a data-lightbox="gallery" href={attributes.imageHref}>
            {cardImage(attributes.imageUrl, attributes.imageAlt)}
          </a>
          <figcaption>{attributes.title}</figcaption>
        </figure>
      </div>


		        );
		    },
		    save: props => {
		        return null;
		    },
		} );


});

});
} )( jQuery );
