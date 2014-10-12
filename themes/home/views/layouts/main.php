<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
	<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  <!--  <link rel="shortcut icon" href="ico/favicon.png">-->

    <title>Zadovo</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap.min.css" rel="stylesheet">

	<!-- Overwrite bootstrap style -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/overwrite.css" rel="stylesheet">

	<!-- General font -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	
	<!-- Font icons -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/font-awesome.css" rel="stylesheet">
	
	<!-- Flexslider -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/flexslider.css" rel="stylesheet">
	
    <!-- prettyPhoto -->	
	<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/prettyPhoto.css" rel="stylesheet">	
	
	<!-- Animate css -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/animate.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/css/style.css" rel="stylesheet">

	<!-- Theme skin -->
	<link id="skin" href="<?php echo Yii::app()->theme->baseUrl;?>/skins/default.css" rel="stylesheet" />
	
	<!--[if lte IE 7]><script src="font/icons-lte-ie7.js"></script><![endif]-->
	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo Yii::app()->theme->baseUrl;?>/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/html5shiv.min.js"></script>
      <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<!-- Start preloading -->	
	<div id="loading" class="loading-invisible">
		<i class="fa fa-spinner fa-4x fa-spin"></i><br />
		<p>Please wait...</p>
	</div>
	<script type="text/javascript">
		  document.getElementById("loading").className = "loading-visible";
		  var hideDiv = function(){document.getElementById("loading").className = "loading-invisible";};
		  var oldLoad = window.onload;
		  var newLoad = oldLoad ? function(){hideDiv.call(this);oldLoad.call(this);} : hideDiv;
		  window.onload = newLoad;
	</script>
	<!-- End preloading -->
	
<!-- End demo options -->  
	
	<!-- Start header -->
	<div id="wrapper" class="body-bg1">
	
		<!-- Start header -->
		<header>
			<div class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                        <?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/img/logo.png" alt="Zadovo" />',array('/site'),array('class'=>'navbar-brand'));?>
             		</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li><a id="GoToHome" href="#home" class="selected">Home</a></li>
							<li><a id="GoToAbout" href="#about">Features</a></li>
							<li><a id="GoToItWork" href="#how-it-work">How</a></li>
							<li><a id="GoToGallery" href="#gallery">Career</a></li>
							<li><a id="GoToTestimoni" href="#testimoni">Testimonials</a></li>
							<li><a id="GoToContact" href="#contact">Contact us</a></li>		
						</ul>
						<div class="navbar-right">
							<a id="GoToDownload" href="#" class="btn btn-primary">Sign In</a>
						</div>	
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</header>	
		<!-- End header -->
		
		<!-- Start home -->
		<section id="home">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-12">
						<div class="intro-heading">
							<div class="scrolltop wow fadeInUp" data-wow-delay="0.4s">
								<ul>
									<li><h3><span>Welcome to</span> ZADOVO</h3>
                                    	<h4><span>Your community resource to find and share information about schools</span></h4>
                                    </li>
									
								</ul>
							</div>
							<span class="divider"></span>
							<div class="clearfix"></div>
                            <form>
							<fieldset class="subscribe-form">
								<input type="text" placeholder="Search by..." class="subscribe">
								<button type="button" class="subscribe-button">Search</button>
							</fieldset>	
						</form>
						
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Start home -->

		<!-- Start about -->
		<section id="about">
			<div class="half-box-left">
				<h3 class="heading">Our features</h3>
				<ul class="feature-list">
					<li>
						<i class="fa fa-comments-o"></i>
						<h5>Review a School </h5>
						<p>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean  .
						</p>
					</li>
					<li>
						<i class="fa fa-gears"></i>
						<h5>Stream Option </h5>
						<p>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean  .
						</p>
					</li>
					<li>
						<i class="fa fa-graduation-cap"></i>
						<h5>After XII Course Guide </h5>
						<p>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean  .
						</p>
					</li>
					<li>
						<i class="fa fa-sun-o"></i>
						<h5>Cafe Zadovo [Blog]</h5>
						<p>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean  .
						</p>
					</li>
					<li>
						<i class="fa fa-university"></i>
						<h5>College Guide</h5>
						<p>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean  .
						</p>
					</li>
				</ul>
			</div>
			<div class="half-box-right">
				<h3 class="heading">Description</h3>
				<p>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. 
				</p>
				<p>
					<a href="#" class="btn btn-primary btn-lg">Read More</a>
				</p>
                <h4 class="heading text-center" style="padding-top:50px;">Featured Colleges </h4>
				<div class="tablet-wrapper">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/gallery/img1.png" class="img-responsive" alt="" />
							</li>
							<li>
								<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/gallery/img2.png" class="img-responsive" alt="" />
							</li>
							<li>
								<img src="<?php echo Yii::app()->theme->baseUrl;?>/img/gallery/img3.png" class="img-responsive" alt="" />
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- Start about -->
		
		<!-- Start how it work -->
		<section id="how-it-work">
			<div class="container">
				<div class="row wow fadeInUp" data-wow-delay="0.4s">
					<div class="col-md-12">
						<h3 class="heading text-center">How it work</h3>
					</div>
					<div class="col-md-3 service-box">
						<i class="fa fa-coffee fa-3x"></i>
						<h4>Sign up free</h4>
						<p>
						Delectus voluptaria definiebas cu duo, an qui mucius aliquando sententiae. Est no omnis imperdiet sit cibo facilisi.
						</p>
						<a href="#">Learn more</a>
					</div>
					<div class="col-md-3 service-box">
						<i class="fa fa-comments-o fa-3x"></i>
						<h4>Review a School</h4>
						<p>
						Delectus voluptaria definiebas cu duo, an qui mucius aliquando sententiae. Est no omnis imperdiet sit cibo facilisi.
						</p>
						<a href="#">Learn more</a>
					</div>
					<div class="col-md-3 service-box">
						<i class="fa fa-graduation-cap fa-3x"></i>
						<h4>Free Career Guide</h4>
						<p>
						Delectus voluptaria definiebas cu duo, an qui mucius aliquando sententiae. Est no omnis imperdiet sit cibo facilisi.
						</p>
						<a href="#">Learn more</a>
					</div>
					<div class="col-md-3 service-box">
						<i class="fa fa-university fa-3x"></i>
						<h4>Find College</h4>
						<p>
						Delectus voluptaria definiebas cu duo, an qui mucius aliquando sententiae. Est no omnis imperdiet sit cibo facilisi.
						</p>
						<a href="#">Learn more</a>
					</div>
				</div>
			</div>
		</section>
		<!-- Start how it work -->
		
		<!-- Start gallery -->
		<section id="gallery">
			<h3 class="heading text-center">What do you want to do in your Career?</h3>
			<div class="list_carousel responsive"  style="height:450px;">
            	<div class="homethreecontainers">
<table cellspacing="0" cellpadding="0" border="0" align="center">
<tbody>
<tr>
<th style="width:295px;padding:0">
<div class="headingtext fadeInUpLarge animation-delay2">
"I want to be a..."
</div>
<div class="headingbottomdots">
<img alt="" style="position: relative; left:-122px; top:0px;" src="<?php echo Yii::app()->theme->baseUrl;?>/images-mcg/mcg-home-page-sprite.png"/>
</div>
</th>
<td style="width: 20px">&nbsp;</td>
<th style="width:295px;padding:0">
<div class="headingtext fadeInUpLarge animation-delay2">
"I'll know it when I see it.."
</div>
<div class="headingbottomdots">
<img alt="" style="position: relative; left:-120px; top:0px;" src="<?php echo Yii::app()->theme->baseUrl;?>/images-mcg/mcg-home-page-sprite.png"/>
</div>
</th>
<td style="width: 20px">&nbsp;</td>
<th style="width:295px;padding:0">
<div class="headingtext fadeInUpLarge animation-delay2">
"I'm not really sure.."
</div>
<div class="headingbottomdots">
<img alt="" style="position: relative; left:-120px; top:0px;" src="<?php echo Yii::app()->theme->baseUrl;?>/images-mcg/mcg-home-page-sprite.png"/>
</div>
</th>
</tr>
<tr>
<td class="block bounceIn  animation-delay3">
<div class="blockcontainer">
<div style="position: relative; height: 17px">
<div class="headingbottomimage">
<img alt="" style="left: 0px; top: 0; position: relative;" src="<?php echo Yii::app()->theme->baseUrl;?>/images-mcg/mcg-home-page-sprite.png"/>
</div>
</div>
<div class="blockheading">
Search careers with key words
</div>
<div style="margin: 0 20px; height: 105px">
<p class="blocktopfont">
Describe your dream career in a few words:
</p>
<div class="separator" style="padding-top:25px;"><input type="text" lang="en" autocomplete="off" size="10" class="gsc-input" name="search" title="search" style="width: 100%; padding: 5px; border: medium none; margin: 0px; height: auto; outline: medium none; color:#666;" ></div>

</div>
<div style="clear:both;"></div>
<div style="text-align:center;">
<a class="btn btn-md btn-danger"  style="text-shadow:none !important; margin-top:34px;"><i class="fa fa-search"></i>&nbsp;Search</a>
</div>
</div>
</td>
<td style="width: 20px">&nbsp;</td>
<td class="block bounceIn  animation-delay4">
<div class="blockcontainer">
<div style="position: relative; height: 17px">
<div class="headingbottomimage">
<img alt="" style="position: relative; left:-40px;top:0" src="<?php echo Yii::app()->theme->baseUrl;?>/images-mcg/mcg-home-page-sprite.png"/>
</div>
</div>
<div class="blockheading">
Browse careers by sector
</div>
<div style="margin: 0 17px; height: 105px">
<p class="blocktopfont">
There are over 445 career options in 33 sectors for you to look at. Find yours in one of these:
</p>
<div class="form-group has-success" >
<select name="a" id="aa" class="form-control chzn-select" style="background:#fff; color:#666666; padding:5px; border:none;">
<option value="banking-insurance-and-finance">Banking, Insurance &amp; Finance</option>
<option value="engineering-technology">Engineering &amp; Technology</option>
<option value="unorganised-sector">Unorganised Sector</option>
<option value="management-marketing">Management &amp; Marketing</option>
<option value="designing-art">Designing &amp; Art</option>
<option value="healthcare">Healthcare</option>
<option value="agriculture">Agriculture</option>
<option value="science-research">Science &amp; Research</option>
<option value="media-entertainment-animation">Media, Entertainment &amp; Animation</option>
<option value="it-or-software">Information Technology / Software</option>
<option value="tourism-hospitality-and-travel">Tourism, Hospitality &amp; Travel</option>
<option value="humanistic-studies">Humanistic Studies</option>
<option value="education-skill-development">Education / Skill Development</option>
<option value="law-order">Law &amp; Order</option>
<option value="public-admin-government">Public Admin &amp; Government</option>
<option value="aerospace-aviation">Aerospace &amp; Aviation</option>
<option value="defense-military">Defense &amp; Military</option>
<option value="building-hardware-furnishings">Building, Hardware &amp; Home Furnishings</option>
<option value="ites-bpo">ITES / BPO</option>
<option value="chemicals-and-pharmaceuticals">Chemicals &amp; Pharmaceuticals</option>
<option value="sports">Sports</option>
<option value="organised-retail">Organised Retail</option>
<option value="food-processing">Food Processing</option>
<option value="electronics-hardware">Electronics &amp; Hardware</option>
<option value="textiles-and-garments">Textiles &amp; Garments</option>
<option value="transportation-logistics-warehousing">Transportation / Logistics / Warehousing &amp; Packaging</option>
<option value="telecom">Telecom</option>
<option value="automobile-autocomponents">Automobile / Autocomponents</option>
<option value="gems-and-jewellery">Gems &amp; Jewellery</option>
<option value="real-estate">Real Estate</option>
<option value="building-and-construction">Building &amp; Construction</option>
<option value="leather-and-goods">Leather &amp; Leather Goods</option>
<option value="handlooms-and-handicrafts">Handlooms &amp; Handicrafts</option>
</select>
</div>
</div>
<div style="clear:both;"></div>
<div style="text-align:center; margin-top:36px;">
<a id="aa" class="btn btn-md btn-danger"  style="text-shadow:none !important;" ><i class="fa fa-folder-open"></i>&nbsp;Browse</a>
</div>
</div>
</td>
<td style="width: 20px">&nbsp;</td>
<td class="block bounceIn  animation-delay5">
<div class="blockcontainer">
<div style="position: relative; height: 17px">
<div class="headingbottomimage">
<img alt="" style="position: relative; left:-80px; top:0" src="<?php echo Yii::app()->theme->baseUrl;?>/images-mcg/mcg-home-page-sprite.png"/>
</div>
</div>
<div class="blockheading">
Tell us what you like to do
</div>
<div style="margin: 0 15px; height: 105px">
<p class="blocktopfont">
Take psychometric assessment & tell us about the type of work you might enjoy. We'll suggest careers that match your interests and aptitude.
</p>
</div>
<div style="clear:both;padding-top:15px;"></div>
<div style="text-align:center;">
<a class="btn btn-md btn-danger" style="text-shadow:none !important; margin-top:21px;" >&nbsp;&nbsp;<i class="fa fa-cogs"></i>&nbsp;Start&nbsp;&nbsp;</a>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
				
				<div class="clearfix"></div>
				
			</div>
		</section>
		<!-- Start gallery -->

		<!-- Start testimoni -->
		<section id="testimoni">
			<div class="container">
				<div class="row wow fadeInUp" data-wow-delay="0.4s">
					<div class="col-md-10 col-md-offset-1">
						<h3 class="heading text-center">Testimoni</h3>
						<ul class="ticker">
							<li>
								<div class="testimoni">
									<a href="#" class="testimoni-avatar"><img src="<?php echo Yii::app()->theme->baseUrl;?>/img/testimoni/avatar1.png" alt="" /></a>
									<blockquote>
										Clita perpetua pri et, in vis suas invenire definitionem, te eam erant soleat. Eu vis assum movet, duo quis eirmod periculis ut, et has nominavi tincidunt ullamcorper. No erat dicat vis.
									</blockquote>
									
								</div>
							</li>
							<li>
								<div class="testimoni">
									<a href="#" class="testimoni-avatar"><img src="<?php echo Yii::app()->theme->baseUrl;?>/img/testimoni/avatar2.png" alt="" /></a>
									<blockquote>
										Argumentum in nec errem imperdiet abhorreant ei. Id lorem quando legere eos, ea nam diam disputando, ea est hinc salutatus similique. Vix posse ipsum munere ne, est mazim accusata scribentur.
									</blockquote>
									
								</div>
							</li>
							<li>
								<div class="testimoni">
									<a href="#" class="testimoni-avatar"><img src="<?php echo Yii::app()->theme->baseUrl;?>/img/testimoni/avatar3.png" alt="" /></a>
									<blockquote>
										Nec ad homero maluisset delicatissimi, error possit impetus vix id. Porro facilis id vis, omnis reque corpora at ius. Veri ubique oportere duo ea, vix sale ferri percipitur te vix ut..
									</blockquote>
									
								</div>
							</li>						
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- Start testimoni -->

		<!-- Start download -->
		<section id="download">
			<div class="container">
				<div class="row wow fadeInDown" data-wow-delay="0.4s">
					<div class="col-md-12 text-center">
						<h3><span>What are you</span> waiting for !</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p>
						<span class="divider"></span>
						<div class="clearfix"></div>
						
					</div>
				</div>
			</div>
		</section>
		<!-- Start download -->

		<!-- Start contact -->
		<section id="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-3 social-widget">
						<h3 class="heading" style="font-size: 2.7em;">Follow us</h5>
						<div class="socila-wrapper">
							<a href="#" class="social-link"><i class="fa fa-facebook"></i></a>
							<a href="#" class="social-link"><i class="fa fa-twitter"></i></a>
							<a href="#" class="social-link"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
					<div class="col-md-4 contact-list-widget">
						<h4>Contact us</h4>
						<ul class="contact-list">
							<li>
								<i class="fa fa-home"></i>
								<p>
								Address<br />
								Lorem Jakarta-Indonesia
								</p>
							</li>
							<li>
								<i class="fa fa-phone"></i>
								<p>
								Number<br />
								+6221 1221212121 12121121
								</p>
							</li>
							<li>
								<i class="fa fa-envelope"></i>
								<p>
								support@yourdomain.com<br />
								info@yourdomain.com
								</p>
							</li>
						</ul>
					</div>
					<div class="col-md-5 contact-form-widget">
						<h4>Quick contact</h4>
						<form id="contactform" action="http://99webpage.com/theme-review/landingpage/chilok/contact/contact.php" method="post" class="validateform" name="leaveContact">
							<div class="clearfix"></div>
							<div id="sendmessage">
								<div class="alert alert-info marginbot35">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Your message has been sent. Thank you!</strong><br />
								</div>							
							</div>								
							<ul class="listForm">
								<li class="first">
									<input class="form-control input-name" type="text" name="name" data-rule="maxlen:4" data-msg="Required field" placeholder="Enter your full name" />
									<div class="validation"></div>
								</li>
								<li>
									<input class="form-control input-email" type="text" name="email" data-rule="email" data-msg="Please enter a valid email" placeholder="Enter your email address" />	
									<div class="validation"></div>
								</li>
								<li class="full">
									<textarea class="form-control input-message" rows="4" name="message" data-rule="required" data-msg="Please write something for us" placeholder="Write something for us"></textarea>
									<div class="validation"></div>
								</li>
								<li>
									<input type="submit" value="Send message" class="btn btn-primary" name="Submit" />
								</li>
							</ul>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- Start contact -->
		
		<!-- Start footer -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
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
				</div>
			</div>
		</footer>
		<!-- End footer -->
	
	</div>
	<!-- End wrapper -->
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery-easing-1.3.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.min.js"></script>
	
	<!-- Navigation -->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/navigation/waypoints.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/navigation/jquery.smooth-scroll.js"></script>		
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/navigation/navbar.js"></script>	

	<!-- Flexslider -->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/flexslider/jquery.flexslider.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/flexslider/setting.js"></script>
	
	<!-- Caroufredsel -->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/caroufredsel/jquery.carouFredSel-5.5.0.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/caroufredsel/setting.js"></script>

	<!-- JavaScript jcarousellite -->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jcarousellite/jcarousellite_1.0.1c4.js"></script>	
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jcarousellite/setting.js"></script>
	
	<!-- Ticker -->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/ticker/ticker.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/ticker/setting.js"></script>
	
	<!-- prettyPhoto -->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/prettyPhoto/jquery.prettyPhoto.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/prettyPhoto/setting.js"></script>
	
	<!-- Wow -->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/wow/wow.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/wow/setting.js"></script>
	
	<!-- Validation -->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/validation.js"></script>
	
	<!-- Totop -->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/totop/jquery.ui.totop.js"></script>	
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/totop/setting.js"></script>
	
	<!-- Customn javascript -->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/custom.js"></script>	
	
	<!-- Theme option-->
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/theme-option/demosetting.js"></script>	

</html>
