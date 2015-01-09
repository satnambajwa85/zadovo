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
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/css/mgmenu.css" id="template-color" />
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
        
						<!--<div class="navbar-right">
                        	<?php if(Yii::app()->user->id){
									if(Yii::app()->user->userType=='user')
										echo CHtml::link('My Account',array('/user/userProfile'),array('class'=>'btn btn-primary'));
									else
										echo CHtml::link('My Account',array('/school'),array('class'=>'btn btn-primary'));
									
									
									echo CHtml::link('Logout',array('/site/logout'),array('class'=>'btn btn-primary','id'=>'GoToDownload'));
							}else
									echo CHtml::link('Sign In',array('/site/login'),array('class'=>'btn btn-primary','id'=>'GoToDownload'));
							?>
						</div>-->
                        
                        
                        <div id="mgmenu1" class="mgmenu_container"><!-- Begin Mega Menu Container -->
        <ul class="mgmenu"><!-- Begin Mega Menu -->
            <li class="mgmenu_button">Mega Menu</li><!-- Button (Mobile Devices) -->
			<li><span><?php echo CHtml::link('Home',array('/site'));?></span><!-- Begin Item --></li>
            <li><span>Careers</span><!-- Begin Item -->
                <div class="dropdown_container dropdown_7columns"><!-- Begin Item Container -->
                   <?php $listCategory	=	CareerCategories::model()->findAllByAttributes(array('status'=>1,'published'=>1));
					$counter	=	0;
					foreach($listCategory as $item){
						if(count($item->careers)>0){
							$counter=$counter+1;?>
                   <div class="col_3">                   
                    	<h5><?php echo $item->title;?></h5>
                        <ul>
                        	<?php foreach($item->careers as $career){?> 
                            <li><?php echo CHtml::link($career->title,array('/site/courses','Categories'=>$career->id));?></li>
                            <?php }?>
                        </ul>
                    </div>
                    
                    <?php if($counter==4)
								echo '<div class="clear"></div>';
						}
				   } ?>

                    


                </div><!-- End Item Container -->


            </li>
            <li><span>Collages</span><!-- Begin Item -->


                <div class="dropdown_container dropdown_7columns"><!-- Begin Item Container -->

					<?php $listState	=	States::model()->findAllByAttributes(array('status'=>1,'published'=>1));
					$counter	=	0;
					foreach($listState as $item){
						if(count($item->cities)>0){
							$counter=$counter+1;?>
                        <div class="col_3">
                        	<h6><?php echo $item->name;?></h6>
                        	<ul>
                            	<?php foreach($item->cities as $city){
									//if(count($city->collages)>0){
									?> 
                                <li><?php echo CHtml::link($city->name,array('/site/collages','city_id'=>$city->id));?></li>
                                <?php //}
								}?>
                            
                        	</ul>
                        </div>
                        <?php if($counter==4)
								echo '<div class="clear"></div>';
						}
					}?>

                    


                </div><!-- End Item Container -->


            </li>
			<li><span><?php echo CHtml::link('Blog',array('/site/blogList'));?></span></li>
            <li><span>Business</span>
                <div class="dropdown_container dropdown_7columns">
					<?php $listState	=	Category::model()->findAllByAttributes(array('status'=>1,'published'=>1));
					$counter	=	0;
					foreach($listState as $item){
						if(count($item->businessHasCategories)>0){
							$counter=$counter+1;?>
                        <div class="col_3">
                        	<h6><?php echo CHtml::link($item->name,array('/site/businessList','id'=>$item->id));?></h6>
                        	<ul>
                            	<?php foreach($item->businessHasCategories as $buss){?> 
                                <li><?php echo CHtml::link($buss->business->title,array('/site/business','id'=>$buss->business_id));?></li>
                                <?php }?>
                        	</ul>
                        </div>
                        <?php if($counter==4)
								echo '<div class="clear"></div>';
						}
					}?>
				</div>
		    </li>
			<li><span></span></li>
			<li><span><?php echo (Yii::app()->user->isGuest)?CHtml::link('Log In',array('/site/login')):CHtml::link('Log Out',array('/site/logout'));?></span></li>
            
        </ul>



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
		$('#star').raty({
			score    : 3,
			starOff : 'images/ico/star-rating-off.png',
			starOn  : 'images/ico/star-rating-on.png',
			click: function(score, evt) {
			alert('ID: ' + $(this).attr('id') + '\nscore: ' + score + '\nevent: ' + evt);
		  }
		});
		
		
		
		$('#mgmenu1').universalMegaMenu({
    	    menu_effect: 'hover_fade',
    	    menu_speed_show: 300,
    	    menu_speed_hide: 200,
    	    menu_speed_delay: 200,
    	    menu_click_outside: false,
   	    	menubar_trigger : false,
   	    	menubar_hide : false,
   	    	menu_responsive: true
    	});
    	megaMenuContactForm(); 
	});
	$(window).load(function () {
		var maxHeight = 0;
			
		$(".three-fourth .one-fourth").each(function(){
			if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
		});
		$(".three-fourth .one-fourth").height(maxHeight);	
	});
    selectnav('nav');
	</script>
</body>

</html>
