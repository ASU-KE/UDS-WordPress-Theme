( function( $ ) {

	$('.side-tabs .tab-content .tab-pane button.btn.btn-circle').click(function(){
		var main_contant = $(this).parent();
		var iframe_video = main_contant.find('iframe');
		main_contant.addClass('no-gradient-bg');

		      main_contant.find("img").fadeOut("slow");
		      $(this).hide();
		      iframe_video.attr(
		        "src",
		        iframe_video.attr("src").replace("autoplay=0", "autoplay=1")
		      );
		      iframe_video.attr("allow", "autoplay");


	});

	} )( jQuery );
