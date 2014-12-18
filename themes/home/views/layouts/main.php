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



            <li><span><i class="mini_icon ic_bookmark"></i>Menu Tabs</span><!-- Begin Item -->
            
            
                <div class="dropdown_fullwidth mgmenu_tabs"><!-- Begin Item Container -->
                

                    <ul class="mgmenu_tabs_nav">

                        <li><a href="#section1" class="current">Columns Grid</a></li>
                        <li><a href="#section2">Gallery</a></li>
                        <li><a href="#section3">About Us</a></li>
                        <li><a href="#section4">Informations</a></li>

                    </ul>
                    
                    <div class="mgmenu_tabs_panels"><!-- Begin Panels Container -->
                    
                        <div id="section1"><!-- Begin Section 1 -->
                        
                            <div class="col_12">
                                <h4>This is a full width container</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis bibendum nunc dapibus posuere. Sed quis laoreet justo. Mauris eu massa turpis, at blandit elit. Mauris rutrum placerat libero, ut rhoncus leo euismod non. Aliquam urna felis, rutrum eu rhoncus at, elementum id est.</p>
                            </div>

                            <div class="col_10">
                                <h4>This is a five sixths container</h4>
                                <p>Phasellus bibendum malesuada augue et adipiscing. Ut pretium vulputate elit quis iaculis. Nulla nisi justo, rhoncus in consectetur et, posuere sed urna. Aliquam urna felis, rutrum eu rhoncus at, elementum id est.</p>
                            </div>

                            <div class="col_2">
                                <h4>1/6</h4>
                                <p>Fusce adipiscing consequat porta.</p>
                            </div>

                            <div class="col_8">
                                <h4>This is a two thirds container</h4>
                                <p>Nunc scelerisque nisl id purus pretium cursus. Integer sed auctor elit. Pellentesque malesuada suscipit vehicula. Pellentesque malesuada suscipit vehicula.</p>
                            </div>

                            <div class="col_4">
                                <h4>1/3 container</h4>
                                <p>Integer sed auctor elit. Pellentesque malesuada suscipit vehicula urna felis.</p>
                            </div>

                            <div class="col_6">
                                <h4>This is a half width container</h4>
                                <p>Donec vel egestas lorem. Cras at purus turpis. Fusce a imperdiet mauris. Nunc lobortis neque magna, nec iaculis nisl.</p>
                            </div>

                            <div class="col_6">
                                <h4>This is a half width container</h4>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras pharetra tincidunt.</p>
                            </div>

                            <div class="col_4">
                                <h4>1/3 container</h4>
                                <p>Nunc in lectus nec erat adipiscing ultrices. Donec ac scelerisque neque.</p>
                            </div>

                            <div class="col_4">
                                <h4>1/3 container</h4>
                                <p>Fusce sapien ante, convallis eu sodales malesuada, porttitor in nisi.</p>
                            </div>

                            <div class="col_4">
                                <h4>1/3 container</h4>
                                <p>Mauris faucibus lectus accumsan, placerat tortor nec, volutpat mi.</p>
                            </div>

                            <div class="col_3">
                                <h4>1/4 container</h4>
                                <p>Phasellus eleifend, eros at pharetra consequat.</p>
                            </div>

                            <div class="col_3">
                                <h4>1/4 container</h4>
                                <p>Vestibulum sit amet est turpis convallis eu sodales.</p>
                            </div>

                            <div class="col_3">
                                <h4>1/4 container</h4>
                                <p>Ut id fermentum nunc, non adipiscing diam.</p>
                            </div>

                            <div class="col_3">
                                <h4>1/4 container</h4>
                                <p>Suspendisse eros faucibus, in luctus ante porta.</p>
                            </div>
                        
                        </div><!-- End Section 1 -->
                        
                        <div id="section2" class="mgmenu_tabs_hide"><!-- Begin Section 2 -->

                            <div class="col_3">
                                <a href="#"><img src="img/products/product01%402x.jpg" width="220" height="140" alt="" class="inline_img" /></a>
                                <p class="img_description">Image Description</p>
                            </div>
                            
                            <div class="col_3">
                                <a href="#"><img src="img/products/product02%402x.jpg" width="220" height="140" alt="" class="inline_img" /></a>
                                <p class="img_description">Image Description</p>
                            </div>
                            
                            <div class="col_3">
                                <a href="#"><img src="img/products/product03%402x.jpg" width="220" height="140" alt="" class="inline_img" /></a>
                                <p class="img_description">Image Description</p>
                            </div>

                            <div class="col_3">
                                <a href="#"><img src="img/products/product04%402x.jpg" width="220" height="140" alt="" class="inline_img" /></a>
                                <p class="img_description">Image Description</p>
                            </div>
                            
                            <div class="col_3">
                                <a href="#"><img src="img/products/product05%402x.jpg" width="220" height="140" alt="" class="inline_img" /></a>
                                <p class="img_description">Image Description</p>
                            </div>
                            
                            <div class="col_3">
                                <a href="#"><img src="img/products/product06%402x.jpg" width="220" height="140" alt="" class="inline_img" /></a>
                                <p class="img_description">Image Description</p>
                            </div>

                            <div class="col_3">
                                <a href="#"><img src="img/products/product07%402x.jpg" width="220" height="140" alt="" class="inline_img" /></a>
                                <p class="img_description">Image Description</p>
                            </div>
                            
                            <div class="col_3">
                                <a href="#"><img src="img/products/product08%402x.jpg" width="220" height="140" alt="" class="inline_img" /></a>
                                <p class="img_description">Image Description</p>
                            </div>                    
                        
                        </div><!-- End Section 2 -->
                        
                        <div id="section3" class="mgmenu_tabs_hide"><!-- Begin Section 3 -->
                        
                            <div class="col_12">
                                
                                <h3>About Us</h3>

                                <p>Fusce adipiscing consequat porta. Proin porta molestie mauris in imperdiet. Aliquam erat volutpat. Phasellus elementum accumsan bibendum. Nulla metus massa, sagittis non aliquam quis, mollis ac arcu. Praesent adipiscing mauris ultricies nisl egestas congue molestie nunc aliquet. In faucibus euismod sapien vitae consectetur. Integer nec ligula nisi, et pretium mi. In non porttitor tortor. Donec vel egestas lorem.</p>

                                <blockquote>"This is a testimonial from a customer. Donec vel egestas lorem. Cras at purus turpis. Fusce a imperdiet mauris faucibus euismod sapien vitae consectetur."</blockquote>

                                <p>Nunc scelerisque nisl id purus pretium cursus. Integer sed auctor elit. Pellentesque malesuada suscipit vehicula. Nunc dapibus, eros nec posuere rhoncus, elit lorem elementum libero, nec tempor purus neque nec ipsum. Mauris bibendum lectus nec orci pharetra dignissim egestas interdum nibh. Nunc adipiscing felis quis nunc malesuada ac ultrices mi luctus. Maecenas a porta libero. In ut rhoncus quam. Sed nec vestibulum mauris.</p>
                                
                                <blockquote>"Phasellus elementum accumsan bibendum. Nulla metus massa, sagittis non aliquam quis, mollis ac arcu."</blockquote>

                                <p>Cras at purus turpis. Fusce a imperdiet mauris. Nunc lobortis neque magna, nec iaculis nisl. Quisque at leo erat, a pretium ante. Nunc vel pretium diam. Aliquam erat volutpat.</p>

                            </div>
                        
                        </div><!-- End Section 3 -->
                        
                        <div id="section4" class="mgmenu_tabs_hide"><!-- Begin Section 4 -->
                        
                            <div class="col_12">
                                
                                <h3>Additional Informations</h3>

                            </div>

                            <div class="col_6">

                                <p>Phasellus bibendum malesuada augue et adipiscing. Ut pretium vulputate elit quis iaculis. Nulla nisi justo, rhoncus in consectetur et, posuere sed urna. Aliquam urna felis, rutrum eu rhoncus at, elementum id est. Ut cursus elementum nisi eu elementum. Sed lacus purus.</p>

                                <p>Integer nisl nunc, venenatis sagittis condimentum vel, tincidunt in est. Aenean felis sem, suscipit in posuere ultrices, placerat vel ipsum. Donec quis dolor turpis, non accumsan nisl. Ut lorem turpis, consequat eget condimentum quis, consectetur vitae enim. Proin ultricies ornare nibh eget tincidunt. Nulla id lectus est. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras pharetra tincidunt erat sit amet sodales.</p>

                            </div>

                            <div class="col_6 col_border">

                                <p>Fusce adipiscing consequat porta. Proin porta molestie mauris in imperdiet. Aliquam erat volutpat. Phasellus elementum accumsan bibendum. Nulla metus massa, sagittis non aliquam quis, mollis ac arcu. Praesent adipiscing mauris ultricies nisl egestas congue molestie nunc aliquet. In faucibus euismod sapien vitae consectetur. Integer nec ligula nisi, et pretium mi. In non porttitor tortor. Donec vel egestas lorem. Cras at purus turpis. Fusce a imperdiet mauris.</p>

                                <p>Nunc lobortis neque magna, nec iaculis nisl. Quisque at leo erat, a pretium ante. Ullamcorper ut aliquet ut, dictum nec odio. Donec sed odio ac lectus fermentum accumsan quis ut magna. Sed consectetur ipsum dolor, non laoreet lectus. Phasellus malesuada varius molestie.</p>

                            </div>                    
                        
                        </div><!-- End Section 4 -->
                    
                    </div><!-- End Panels Container -->

                                
                </div><!-- End Item Container -->

            
            </li><!-- End Item -->
               


            <li><span><i class="mini_icon ic_tag"></i>Headings</span><!-- Begin Item -->
            
            
                <div class="dropdown_container dropdown_8columns"><!-- Begin Item Container -->


                    <div class="col_12">

                        <h3>Eye-Catching Heading</h3>
                        <p>Donec elementum vitae elit ac imperdiet. Nullam blandit sapien et ligula mollis, nec eleifend eros consequat. Donec vestibulum, elit in pharetra tempus, dui urna imperdiet nisl, vitae imperdiet quam erat vitae ipsum. Mauris consequat augue. Pellentesque eros risus, sollicitudin tincidunt eleifend ac, malesuada vel massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse blandit lectus et eros faucibus.</p>
                        <hr>
                    
                    </div>

                    <div class="col_8">

                        <h4>Second Heading Title</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu urna lobortis, posuere orci id, consectetur lacus. Donec pulvinar pharetra adipiscing. Sit amet nisi vestibulum malesuada. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                        <h4>Third Headline Example</h4>
                        <p>Praesent sed lectus vel tortor aliquet bibendum at non orci. Aliquam nunc sapien, pretium eu dapibus vel, adipiscing sed nisl. Nulla facilisi. Duis iaculis leo. Sed quis scelerisque massa. Donec pharetra feugiat ante, at fermentum sem. Cum sociis natoque penatibus et magnis dis.</p>
                    
                    </div>

                    <div class="col_4">

                        <p class="text_box">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu urna lobortis, posuere orci id, consectetur lacus. Donec pulvinar pharetra adipiscing. Praesent sed lectus vel tortor aliquet bibendum at non orci. Aliquam nunc sapien, pretium eu dapibus vel, adipiscing sed nisl.</p>
                    
                    </div>


                </div><!-- End Item Container -->

            
            </li><!-- End Item -->
                
                
                
            <li><span><i class="mini_icon ic_grid"></i>Fly-Out</span><!-- Begin Item -->
            
            
                <div class="dropdown_container dropdown_7columns"><!-- Begin Item Container -->


                    <div class="col_12">

                        <h4>List Elements</h4>
                        <p>Fusce rutrum purus erat, vel imperdiet arcu gravida ac. In ac mi massa. Suspendisse vitae turpis augue. Mauris at nibh fringilla, placerat erat quis, consectetur tellus. Ut ligula nibh, tincidunt et dolor vitae, bibendum consectetur neque.</p>

                    </div>

                    <div class="col_3">

                        <ul>
                        
                            <li><a href="#">Codecanyon</a></li>
                            <li><a href="#">Themeforest</a></li>
                            <li><a href="#">Videohive</a></li>
                            <li><a href="#">Audiojungle</a></li>
                            <li><a href="#">Photodune</a></li>
                            
                        </ul>

                    </div>

                    <div class="col_3">

                        <ul>
                        
                            <li><a href="#">Nettuts</a></li>
                            <li><a href="#">Webdesigntuts</a></li>
                            <li><a href="#">PSDtuts</a></li>
                            <li><a href="#">Vectortuts</a></li>
                            <li><a href="#">Audiotuts</a></li>
                            
                        </ul>

                    </div>

                    <div class="col_6">

                        <p class="text_box">Praesent sed lectus vel tortor aliquet bibendum at non orci. Aliquam nunc sapien, pretium eu dapibus vel, adipiscing sed nisl. Nulla facilisi.</p>

                    </div>

                    <div class="col_12">

                        <hr>

                    </div>

                    <div class="col_3">

                        <ul>
                        
                            <li><a href="#">Calendars</a></li>
                            <li><a href="#">Countdowns</a></li>
                            <li><a href="#">Forms</a></li>
                            <li><a href="#">Images</a></li>
                            <li><a href="#">Medias</a></li>
                            
                        </ul>

                    </div>

                    <div class="col_3">

                        <ul>
                        
                            <li><a href="#">Loaders</a></li>
                            <li><a href="#">Uploaders</a></li>
                            <li><a href="#">Navigation</a></li>
                            <li><a href="#">News Tickets</a></li>
                            <li><a href="#">Charts</a></li>
                            
                        </ul>

                    </div>

                    <div class="col_6">

                        <ol>
                        
                            <li><a href="#">This is a longer list element</a></li>
                            <li><a href="#">You can add more descriptions here</a></li>
                            <li><a href="#">Vestibulum ac tellus a nisl posuere</a></li>
                            <li><a href="#">Praesent at consectetur libero</a></li>
                            <li><a href="#">Cras nec convallis diam</a></li>
                            
                        </ol>

                    </div>


                </div><!-- End Item Container -->
                
            
            </li><!-- End Item -->

            

            <li><span><i class="mini_icon ic_lists"></i>Lists</span><!-- Begin Item -->


                <div class="dropdown_container dropdown_7columns"><!-- Begin Item Container -->


                
                    <div class="col_3">

                        <ul>
                        
                            <li><a href="#">Codecanyon</a></li>
                            <li><a href="#">Themeforest</a></li>
                            <li><a href="#">Videohive</a></li>
                            <li><a href="#">Audiojungle</a></li>
                            <li><a href="#">Photodune</a></li>
                            
                        </ul>

                    </div>

                    <div class="col_3">

                        <ul>
                        
                            <li><a href="#">Nettuts</a></li>
                            <li><a href="#">Webdesigntuts</a></li>
                            <li><a href="#">PSDtuts</a></li>
                            <li><a href="#">Vectortuts</a></li>
                            <li><a href="#">Audiotuts</a></li>
                            
                        </ul>

                    </div>
                                     

                    <div class="col_3">

                        <ul>
                        
                            <li><a href="#">Calendars</a></li>
                            <li><a href="#">Countdowns</a></li>
                            <li><a href="#">Forms</a></li>
                            <li><a href="#">Images</a></li>
                            <li><a href="#">Medias</a></li>
                            
                        </ul>

                    </div>

                    <div class="col_3">

                        <ul>
                        
                            <li><a href="#">Loaders</a></li>
                            <li><a href="#">Uploaders</a></li>
                            <li><a href="#">Navigation</a></li>
                            <li><a href="#">News Tickets</a></li>
                            <li><a href="#">Charts</a></li>
                            
                        </ul>

                    </div>

                    


                </div><!-- End Item Container -->


            </li><!-- End Item -->
               


            <li><span><i class="mini_icon ic_cloud"></i>MyCloud</span><!-- Begin Item -->
            
            
                <div class="dropdown_container dropdown_5columns"><!-- Begin Item Container -->


                    <div class="col_12">

                        <h4>Awesome Video !</h4>
                        <p>Ut ligula nibh, tincidunt et dolor vitae, bibendum lectus, et tempus lorem lobortis consectetur neque.</p>
                        <div class="video_container">
                            <iframe src="http://player.vimeo.com/video/32001208?portrait=0&amp;badge=0"></iframe>
                        </div>

                    </div>


                </div><!-- End Item Container -->

            
            </li><!-- End Item -->

            

            <li><a href="http://codecanyon.net/user/Pixelworkshop/portfolio"><i class="mini_icon ic_graph"></i>Link</a></li>


            
            <li class="right_item"><span><i class="mini_icon ic_chat"></i>Contact</span><!-- Begin Item -->
            
            
                <div class="dropdown_container dropdown_4columns dropdown_right"><!-- Begin Item Container -->


                    <div class="col_12">

                        <h4>Contact us !</h4>
                        <p>Phasellus molestie facilisis orci ut bibendum. Aliquam accumsan eros sit amet metus egestas porta.</p>

                        <div class="contact_form" id="contact_form"><!-- Begin Contact Form -->

                            <form method="POST" id="mgmenu_form" action="http://demos.pixelworkshop.fr/universal_mega_menu/email.php">

                                <label for="name">Name<span class="required"> *</span></label><br />
                                <input class="form_element" type="text" name="name" id="name" />

                                <label for="email">Email<span class="required"> *</span></label><br />
                                <input class="form_element" type="text" name="email" id="email" />
                                    
                                <label for="message">Message<span class="required"> *</span></label><br />
                                <textarea name="message" class="form_element" id="message"></textarea>

                                <div class="form_buttons">
                                    <input type="submit" class="button" id="submit" value="Submit" />
                                    <input type="reset" class="button" id="reset" value="Reset" />
                                </div>

                            </form>

                        </div><!-- End Contact Form -->

                    </div>


                </div><!-- End Item Container -->

            
            </li><!-- End Item -->



        </ul><!-- End Mega Menu -->



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
