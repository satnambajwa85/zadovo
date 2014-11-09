<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 	 ]>    <html class="ie" lang="en"> <![endif]-->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Zadovo</title>
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style-inner.css" type="text/css" media="screen,projection,print" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/prettyPhoto.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/theme-yellow.css" id="template-color" />
	<!--<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl;?>/images/favicon.ico" />-->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/styler.css" type="text/css" media="screen,projection,print" />
</head>
<body>
<!-- TEMPLATE STYLES -->

	<!--header-->
  <header>
		<div class="wrap clearfix">
			<!--logo-->
			<h1 class="logo"><?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/txt/logo.png" alt="Zadovo" />',array('/site'));?></h1>
		</div>
		<div class="collapse navbar-collapse">
						<div class="navbar-right">
                        	<?php if(Yii::app()->user->id)
									echo CHtml::link('Logout',array('/site/logout'),array('class'=>'btn btn-primary','id'=>'GoToDownload'));
								else
									echo CHtml::link('Sign In',array('/site/login'),array('class'=>'btn btn-primary','id'=>'GoToDownload'));
							?>
						</div>	
					</div>
		
	</header>
	<!--//header-->
	
	<!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<?php echo $content;?>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
	
	<!--footer-->
	<footer>
		<div class="wrap clearfix">
			
			
			<section class="bottom">
            	<div class="col-md-12" style="text-align:center;">
						<p class="copyright">2014 &copy; Copyright <a href="#">Zadovo.</a> All rights Reserved.</p>
						<ul>
							<li class="first"><a href="#">Home</a></li>
							<li><a href="#">About us</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Knowledgebase</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Help</a></li>
						</ul>
					</div>
				
			</section>
		</div>
	</footer>
	<!--//footer-->
	
	<script  src="<?php echo Yii::app()->theme->baseUrl;?>/js/inner/jquery-1.11.0.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/inner/jquery-migrate-1.2.1.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/inner/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/inner/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/inner/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/inner/jquery.raty.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/inner/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/inner/selectnav.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/inner/scripts.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/inner/jquery.modal.js"></script>

	<script type="text/javascript">
	$(document).ready(function() {
		$('dt').each(function() {
			var tis = $(this), state = false, answer = tis.next('dd').hide().css('height','auto').slideUp();
			tis.click(function() {
				state = !state;
				answer.slideToggle(state);
				tis.toggleClass('active',state);
			});
		});
		
		$('.view-type li:first-child').addClass('active');
		
		$('#star').raty({
			score    : 3,
			starOff : 'images/ico/star-rating-off.png',
			starOn  : 'images/ico/star-rating-on.png',
			click: function(score, evt) {
			alert('ID: ' + $(this).attr('id') + '\nscore: ' + score + '\nevent: ' + evt);
		  }
		});
	});
	
	$(window).load(function () {
		var maxHeight = 0;
			
		$(".three-fourth .one-fourth").each(function(){
			if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
		});
		$(".three-fourth .one-fourth").height(maxHeight);	
	});	
	</script>
	<script type="text/javascript">selectnav('nav'); </script>
	
	<script type="text/javascript">			
		/* Template Styles-----------------------------------------------------------------------------------*/

		window.console = window.console || (function(){
			var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
			return c;
		})();


		jQuery(document).ready(function($) {
	
		// Color Changer
		$(".yellow" ).click(function(){
			$("#template-color" ).attr("href", "<?php echo Yii::app()->theme->baseUrl;?>/css/theme-yellow.css" );
			return false;
		});
		
		$(".orange" ).click(function(){
			$("#template-color" ).attr("href", "<?php echo Yii::app()->theme->baseUrl;?>/css/theme-orange.css" );
			return false;
		});
		
		$(".strawberry" ).click(function(){
			$("#template-color" ).attr("href", "<?php echo Yii::app()->theme->baseUrl;?>/css/theme-strawberry.css" );
			return false;
		});
		
		$(".pink" ).click(function(){
			$("#template-color" ).attr("href", "<?php echo Yii::app()->theme->baseUrl;?>/css/theme-pink.css" );
			return false;
		});		
		
		$(".purple" ).click(function(){
			$("#template-color" ).attr("href", "<?php echo Yii::app()->theme->baseUrl;?>/css/theme-purple.css" );
			return false;
		});

		$(".blue" ).click(function(){
			$("#template-color" ).attr("href", "<?php echo Yii::app()->theme->baseUrl;?>/css/theme-blue.css" );
			return false;
		});		
		
		$(".black" ).click(function(){
			$("#template-color" ).attr("href", "<?php echo Yii::app()->theme->baseUrl;?>/css/theme-black.css" );
			return false;
		});		
		
		


		$("#template-styles h2 a").click(function(e){
			e.preventDefault();
			var div = $("#template-styles");
			console.log(div.css("left"));
			if (div.css("left") === "-135px") {
				$("#template-styles").animate({
					left: "0px"
				}); 
			} else {
				$("#template-styles").animate({
					left: "-135px"
				});
			}
		})
		

		$(".colors li a").click(function(e){
			e.preventDefault();
			$(this).parent().parent().find("a").removeClass("active");
			$(this).addClass("active");
		})
		
		$(".bg li a").click(function(e){
			e.preventDefault();
			$(this).parent().parent().find("a").removeClass("active");
			$(this).addClass("active");
			var bg = $(this).css("backgroundImage");
			$("body,.main").css("backgroundImage",bg)
		})

			

	});

	</script>
</body>

</html>
