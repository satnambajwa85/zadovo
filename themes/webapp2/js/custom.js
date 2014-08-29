
$(function() {
    var button = $('.city-box');
    var box = $('.user-city-list');
    var form = $('.user-city-list');
    button.removeAttr('href');
    button.mouseup(function(city) {
        box.toggle();
        button.toggleClass('active2');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(city) {
        if(!($(city.target).parent('.city-box').length > 0)) {
            button.removeClass('active2');
            box.hide();
        }
    });
});

$(document).ready( function(){
//user-img-tab for profile info
	$('.user-profile-tab').hide();
	$('.user-image-tab-link').click(function(e){ 
		e.stopPropagation();
		$('.user-profile-tab').show();
	});
	$('.user-profile-tab').click(function(e){
		e.stopPropagation();
	});

	$(document).click(function(){
		 $('.user-profile-tab').hide();
	});
//user-img-tab for profile info end


	
//user-img-tab for profile info end

	var host = self.location.host;
	 $(".flash-error").animate({opacity: 1.0}, 3000).fadeOut("slow");
	 $(".flash-error").animate({opacity: 1.0}, 3000).fadeOut("slow");
	$('.send-comment').click(function(){
		$(".comment-box").toggle('slow'); 
		});
	//tabs
	
	$(".tab_content").hide();
	$(".tab_content:first").show(); 

	$("ul.tabs li").click(function() {
		$(this).addClass("active");
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
	$(".tab_content2").hide();
	$(".tab_content2:first").show(); 

	$("ul.tab1s li").click(function() {
		$("ul.tab1s li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content2").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
	//tabs end
	//add-fav
		$(".heart-add-fav").click(function(){
			$('#loading').html('<img src="http://'+host+'/themes/webapp/images/loader.gif">');
			$(".heart-add-fav").hide();
				$url	=	this.id;
				$.ajax({		 
					type:'GET',
					url: $url,
					data: "response",
					dataType:'json',
					success:function(data){
						$('#loading').html("");
						$(".heart-add-fav").show();
							 
					}
				});
			});	
	//add-end
	//start join-school icon event
		$(".join-school").click(function(){
			$('#join-school-loading').html('<img src="http://'+host+'/themes/webapp/images/loader.gif">');
			$(".join-school").hide();
				$url	=	this.id;
				$.ajax({		 
					type:'GET',
					url: $url,
					data: "response",
					dataType:'json',
					success:function(data){
						$('#join-school-loading').html("");
						$(".join-school").show();
							 
					}
				});
			});	
	//end join-school icon event
	//start join-school icon event
		$(".want-to-join-bt").click(function(){
		
			$('#want-to-join-loading').html('<img src="http://'+host+'/themes/webapp/images/loader.gif">');
			$(".want-to-join-bt").hide();
				$url	=	this.id;
				$.ajax({		 
					type:'GET',
					url: $url,
					data: "response",
					dataType:'json',
					success:function(data){
						$('#want-to-join-loading').html("");
						$(".want-to-join-bt").show();
							 
					}
				});
			});	
	//end join-school icon event
		$(".friend").click(function(){
				$url	=	this.id;
				$.ajax({		 
					type:'GET',
					url: $url,
					data: "response",
					dataType:'json',
					success:function(data){
							$('.user-search-info2 > a').html(data);
							 
					}
				});
			});	
		$("#edit-school").click(function(){
			$("#school-form").show();
			$(".save-school").show();
			$(".school-form2").hide();
			$("#edit-school").hide();
		});		
	
		$("#write-review").click(function(){
			$(".review-box").toggle();
			 
		});	
		$(".add_blog").click(function(){
			$(".add-blog-box").toggle();
			 
		});	
 
	
	
					 
			$(".del-notifi").click(function(){
				$url	=	this.id;
				$.ajax({
					type:'GET',
					url: $url,
					data: "html",
					success:function(data){
						$('#recent-response > ul').html(data);
						}
					});
			});
			$("#internal_sign-up").click(function(){
				$(".internal_login_slide").fadeIn();
				});
		
					$("#internal_sign-up_close").click(function(){
					$(".internal_login_slide").fadeOut();
					});
				$("#popupBoxClose2").click(function(){
					$(".add-blog-box").fadeOut();
					});
			$("#internal_sign-in,#internal_sign-in2,#internal_sign-in3,#internal_sign-in4,#internal_sign-in5").click(function(){
				$(".internal_signin_slide").fadeIn();
				});
	
				
					$(".icon-remove").click(function(){
					$(".internal_signin_slide").fadeOut();
					});
			
		$("#userReviewa").click(function(){
			loadPopupBox();
		});
        $('#popupBoxClose').click( function() {           
            unloadPopupBox();
        });
       
        $('#container').click( function() {
            unloadPopupBox();
        });

        function unloadPopupBox() {    // TO Unload the Popupbox
            $('#popup_box').fadeOut("slow");
            $("#container").css({ // this is just for style       
                "opacity": "1" 
            });
        }   
       
        function loadPopupBox() {    // To Load the Popupbox
            $('#popup_box').fadeIn("slow");
            $("#container").css({ // this is just for style
                "opacity": "0.3" 
            });        
        } 

		$('.add-fav').tooltip();
       $('.want-to-join').tooltip();
       $('.join-school').tooltip();
       $('.write-review-to-school').tooltip();
       $('.friends').tooltip();
       $('.userReviewsLink').tooltip();
       $('.like').tooltip();
       $('.setting').tooltip();
       $('.recentUpdate').tooltip();
       $('.dislike').tooltip();
       $('.unlike').tooltip();
	
		$(".tab_content").hide();
		$(".tab_content:first").show(); 

		$("ul.filterstabs li").click(function() {
			$("ul.filterstabs li").removeClass("active3");
			$(this).addClass("active3");
			$(".tab_content").hide();
			var activeTab = $(this).attr("rel"); 
			$("#"+activeTab).fadeIn(); 
		});
		$(".tab_content2").hide();
		$(".tab_content2:first").show(); 

		$("ul.filterstabs li").click(function() {
			$("ul.filterstabs li").removeClass("active3");
			$(this).addClass("active3");
			$(".tab_content2").hide();
			var activeTab = $(this).attr("rel"); 
			$("#"+activeTab).fadeIn(); 
		});
		
		
			 
}); 
