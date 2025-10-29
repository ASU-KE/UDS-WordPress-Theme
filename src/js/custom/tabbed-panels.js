/**
 * File tabbed-panels.js.
 *
 * JS for tabbed panels block.
 *
 */

/*jshint esversion: 6 */
( function( $ ) {
'use strict';
const setButtonsCompatibility = ( e ) => {
		const targets = ['a', 'button'];
		if ( targets.includes( e.target.localName ) ) {
			e.target.focus();
		}
	};

	const setControlVisibility = ( clicked, scrollOffset ) => {
		const parentContainer = $( clicked ).closest( '.uds-tabbed-panels' );
		const parentNav = $( clicked ).siblings( '.nav-tabs' );
		const scrollPosition = parentNav.data( 'scroll-position' ) * 1;
		const tabPosition = parentNav[0].scrollWidth - scrollOffset;

		if ( scrollPosition == 0 ) {
			parentContainer.find( '.scroll-control-prev' ).hide();
		} else {
			parentContainer.find( '.scroll-control-prev' ).show();
		}
		if ( tabPosition <= parentContainer.width() ) {
			parentContainer.find( '.scroll-control-next' ).hide();
		} else {
			parentContainer.find( '.scroll-control-next' ).show();
		}
	};

	const slideNav = ( clicked, e, direction ) => {
		e.preventDefault();
		const parentNav = $( clicked ).siblings( '.nav-tabs' );
		let scrollPosition = parentNav.data( 'scroll-position' ) * 1;
		const navItems = parentNav.find( '.nav-item' ).toArray();
		let scrollOffset = parentNav.css( 'left' ).replace( 'px', '' ) * 1;
		var adjustNavItem = 0;

		if ( direction == 1 && scrollPosition > 0 ) {
			scrollPosition -= 1;
		}
		if ( scrollPosition < navItems.length - 1 && direction == -1 ) {
			scrollPosition += 1;
		}
		parentNav.data( 'scroll-position', scrollPosition );

		scrollOffset = 0;
		for ( var i = 0; i < scrollPosition; i++ ) {
			scrollOffset += $( navItems[i] ).outerWidth();
		}

		parentNav.scrollLeft( scrollOffset );

		setControlVisibility( clicked, scrollOffset );
	};



$( '.uds-tabbed-panels' ).closest( '.wp-block-group' ).addClass( 'uds-tabs-wrapper' );

$( '.wp-block-group.uds-tabs-wrapper' ).each(function() {
	var tab_nav_items = [];
		 $( this ).find( '.uds-tabbed-panels' ).each(function() {
			 var tab_nav_item = $( this ).find( '.nav.nav-tabs' ).html();
			 $( this ).find( '.nav.nav-tabs' ).empty();
			 tab_nav_items.push( tab_nav_item );
		 });
		 $( this ).find( 'nav.uds-tabbed-panels:not(:first-of-type)' ).remove();
		 $( this ).find( 'nav.uds-tabbed-panels .nav.nav-tabs' ).append( tab_nav_items );
		 $( this ).find( 'nav.uds-tabbed-panels .nav.nav-tabs .nav-item:not(:first-of-type)' ).removeClass( 'active' );
		 $( this ).find( 'nav.uds-tabbed-panels .nav.nav-tabs .nav-item:not(:first-of-type)' ).attr( 'aria-selected', 'false' );
	tab_nav_items = [];

	var tab_content_items = [];
			$( this ).find( '.tab-content' ).each(function() {
				var tab_content_item = $( this ).html();
				$( this ).empty();
				tab_content_items.push( tab_content_item );
			});
			$( this ).find( '.tab-content:not(:first-of-type)' ).remove();
			$( this ).find( '.tab-content' ).append( tab_content_items );
			$( this ).find( '.tab-content .tab-pane:not(:first-of-type)' ).removeClass( 'show active' );
	tab_content_items = [];
});


$( '.uds-tabbed-panels' ).on( 'click', function( e ) {
      setButtonsCompatibility( e );
    });

    $( '.scroll-control-next' ).on( 'click', function( e ) {
      if ( window.innerWidth > 992 ) {
        slideNav( this, e, -1 );
      }
    });

    $( '.scroll-control-prev' ).on( 'click', function( e ) {
      if ( window.innerWidth > 992 ) {
        slideNav( this, e, 1 );
      }
    });

    $( '.uds-tabbed-panels .scroll-control-prev' ).hide();

	if ( $('.nav.nav-tabs').length > 0 ) {
		if ( $( '.nav.nav-tabs' )[0].scrollWidth <= $( '.uds-tabbed-panels' ).width() ) {
		$( '.uds-tabbed-panels .scroll-control-next' ).hide();
		}
	}

} )( jQuery );
