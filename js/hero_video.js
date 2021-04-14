/**
 * File HeroVideo.js.
 *
 * JS for hero video play/pause button.
 *
 */

 ( function( $ ) {

	 //Get the hero video ID.
	var HeroVid = document.getElementById( 'media-video' );

if ( HeroVid ) {

//When play button is clicked
	document.getElementById( 'playHeroVid' ).addEventListener( 'click', function() {
	    HeroVid.play();
			$( this ).hide();
			$( '#pauseHeroVid' ).show();

	});

	//When pause button is clicked
	document.getElementById( 'pauseHeroVid' ).addEventListener( 'click', function() {
			HeroVid.pause();
			$( this ).hide();
			$( '#playHeroVid' ).show();
	});
}

/*
//When space key is clicked
	$( window ).keypress(function( e ) {
	  if ( 32 === e.which ) {
	    if ( HeroVid.paused ) {
				HeroVid.play();
				$( '#pauseHeroVid' ).show();
				$( '#playHeroVid' ).hide();
			} else {
				HeroVid.pause();
				$( '#pauseHeroVid' ).hide();
				$( '#playHeroVid' ).show();
			}

	  }
	});
	*/

	} )( jQuery );
