(function($) {
    $(document).ready(function (){

    		/* Image opts selection */
            $('body').on('click', 'img.img-select', function(e){
                e.preventDefault();
                $(this).closest('ul').find('img.img-select').removeClass('selected');
                $(this).addClass('selected');
              //  $(this).closest('ul').find('input').removeAttr('checked');
                $(this).closest('li').find('input').prop( "checked", true );

                if($(this).closest('ul').hasClass('next-hide')){

                    var v = $(this).closest('li').find('input').val();
                    if(v == 'none' || v == 0 || v == 'fixed'){
                         $(this).closest('ul').parent().find('select').fadeOut(400);
                    } else {
                        $(this).closest('ul').parent().find('select').fadeIn(400);
                    }
                }
            });





    });



})(jQuery);
