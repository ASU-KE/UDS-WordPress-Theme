(function( $ ) {
    $( document ).ready(function() {
            $( 'body' ).on( 'click', 'img.img-select', function( e ) {
							var v = $( this ).closest( 'li' ).find( 'input' ).val();
                e.preventDefault();
                $( this ).closest( 'ul' ).find( 'img.img-select' ).removeClass( 'selected' );
                $( this ).addClass( 'selected' );
                $( this ).closest( 'li' ).find( 'input' ).prop( 'checked', true );

                if ( $( this ).closest( 'ul' ).hasClass( 'next-hide' ) ) {
                    if ( 'none' == v || 0 == v || 'fixed' == v ) {
                         $( this ).closest( 'ul' ).parent().find( 'select' ).fadeOut( 400 );
                    } else {
                        $( this ).closest( 'ul' ).parent().find( 'select' ).fadeIn( 400 );
                    }
                }
            });

    });

})( jQuery );
