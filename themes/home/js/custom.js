(function($) {
	'use strict';

	/*
	Navigation
	=========================== */	
	$(window).scroll(function(){
		var scrollTop = $(window).scrollTop();
		if(scrollTop != 0)
			$(".navbar-default").css({'background':'#35404b','border-bottom':'5px solid #29323c', '-webkit-transition':'all 0.3s ease-in-out', '-moz-transition':'all 0.3s ease-in-out', '-o-transition':'all 0.3s ease-in-out', '-ms-transition':'all 0.3s ease-in-out', 'transition':'all 0.3s ease-in-out'});
		else	
			$(".navbar-default").css({'background':'rgba(33, 41, 50, 0.4)','border-bottom':'5px solid rgba(33, 41, 50, 0', '-webkit-transition':'all 0.3s ease-in-out', '-moz-transition':'all 0.3s ease-in-out', '-o-transition':'all 0.3s ease-in-out', '-ms-transition':'all 0.3s ease-in-out', 'transition':'all 0.3s ease-in-out'});
	});
	
	/*
	Gallery hover
	=========================== */	
	$('.image-wrapper').hover(function(){
		$(".gallery-img", this).stop().animate({top:'80px'},{queue:false,duration:800});
	}, function() {
		$(".gallery-img", this).stop().animate({top:'0'},{queue:false,duration:800});
	});	
	
})(jQuery);