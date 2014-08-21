<html class=" js no-flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" style=""><!--<![endif]--><!-- Mirrored from bizstrap.themeleaf.com/admin/ by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 03 Oct 2013 16:36:02 GMT --><head>
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <title>Admin Panel</title>
        <meta content="Bizstrap: Bootstrap Responsive Admin Theme" name="description">
        <meta content="width=device-width" name="viewport">
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/cPanel/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/cPanel/assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	    <link href="<?php echo Yii::app()->theme->baseUrl;?>/cPanel/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/cPanel/assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/cPanel/assets/css/calendar.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/cPanel/assets/css/DT_bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/cPanel/assets/css/responsive-tables.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/cPanel/assets/css/proggress.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/cPanel/assets/css/theme.css" rel="stylesheet">
		<?php $cs = Yii::app()->clientScript;$cs->scriptMap = array('jquery.js' => ''.Yii::app()->theme->baseUrl.'/js/jquery.js',
				'jquery.yii.js' => ''.Yii::app()->baseUrl.'/js/jquery.js',
			);
	?>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if IE 7]>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/cPanel/assets/css/font-awesome-ie7.min.css"/>
        <![endif]-->
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/cPanel/assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.js"></script>

    <body class="admin" style="visibility: visible;">
		<div id="over">
		<div id="out_container">
		<!-- #wrap -->
        <div id="wrap">
            <!-- BEGIN TOP BAR -->
            <div id="top">
                <!-- .navbar -->
                <div class="navbar navbar-inverse navbar-static-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
							<?php echo CHtml::link('ZADOVO',array('/admin/admin'),array('class'=>'brand'));?>
                             <!-- .topnav -->
                            <div class="btn-toolbar topnav">
                                <div class="btn-group">
                                    <a href="#" class="btn" title="User Online Status">
                                        <i class="icon-user-md"><?php echo  $userInfo	=	Login::model()->countByAttributes(array('login_status'=>1));;?></i>
                                    </a>
                                </div>
                                <div id="top_btn_group" class="btn-group">
                                    <a href="#" class="btn btn-inverse">
                                        <i class="icon-envelope"></i>
                                        <span class="label label-warning">5</span>
                                    </a>
                                    <a  href="#" class="btn btn-inverse">
                                        <i class="icon-comments"></i>
                                        <span class="label label-important">4</span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a  href="#" class="btn btn-inverse">
                                        <i class="icon-file"></i>
                                    </a>
                                    <a  href="#" class="btn btn-inverse" href="#helpModal">
                                        <i class="icon-question-sign"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <?php echo CHtml::link('<i class="icon-off"></i>',array('/site/logout'),array('class'=>'btn btn-inverse'))?></div>
                            </div>
                            <!-- /.topnav -->
						
                        </div>
                    </div>
                </div>
                <!-- /.navbar -->
            </div>
            <!-- END TOP BAR -->


            <!-- BEGIN HEADER.head -->
            <header class="head">
                <div class="search-bar">
                    <div class="row-fluid">
                        <div class="span12">

                        </div>
                    </div>

                </div>
                <!-- ."main-bar -->
                <div class="main-bar">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="span12">
                                <h3><?php if(isset($this->breadcrumbs)):?>
										<?php $this->widget('zii.widgets.CBreadcrumbs', array(
											'links'=>$this->breadcrumbs,
											'homeLink'=>CHtml::link('Admin',array('/admin/admin')),
										)); ?><!-- breadcrumbs -->
										<?php endif?>
								</h3>
                            </div>
                        </div>
                        <!-- /.row-fluid -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.main-bar -->
            </header>
            <!-- END HEADER.head -->

            <!-- BEGIN LEFT  -->
            <div id="left">
                <!-- .user-media -->
                <div class="media user-media hidden-phone">
                    <a class="user-link" href="#">
						<?php if(isset(Yii::app()->user->userImg)){ ?> 
						<img width="100" height="100" src="<?php echo Yii::app()->request->baseUrl.'/uploads/users/thumb/'.Yii::app()->user->userImg;?>" alt="image"/>
						<?php } else {?>
						<img width="100" height="100" src="<?php echo Yii::app()->theme->baseUrl;?>/images/noimage.jpg" alt="image"/>
					
						<?php }?>
                        <span class="label user-label">1</span>
                    </a>

                    <div class="media-body hidden-tablet">
                        <h5 class="media-heading"><?php echo Yii::app()->user->userName;?></h5>
                        <ul class="unstyled user-info">
                            <li><?php echo CHtml::link(''.Yii::app()->user->userType.'','#');?></li>
                            <li>Last Access : <br>
                                <small><i class="icon-calendar"></i><?php echo Yii::app()->user->lastLogin;?></small>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.user-media -->

                <!-- BEGIN MAIN NAVIGATION -->
				<?php
	$this->widget('zii.widgets.jui.CJuiAccordion',array(
			'panels'=>array(
				'<i class="icon-dashboard icon-large"></i>Site Setting'=>'<ul id="menu">
									<li>'.CHtml::Link('setting', array('/admin/setting/admin')).'</li>
									<li>'.CHtml::Link('sliders', array('/admin/sliders/admin')).'</li>
								</ul>',
				'Countries'=>'<ul id="menu">
									<li>'.CHtml::Link('Countries', array('/admin/countries/admin')).'</li>
									<li>'.CHtml::Link('States', array('/admin/states/admin')).'</li>
									<li>'.CHtml::Link('Cities', array('/admin/cities/admin')).'</li>
								
								</ul>',
				'Users'=>'<ul id="menu">
								<li>'.CHtml::Link('cms', array('/admin/cms/admin')).'</li>
								<li>'.CHtml::Link('Login', array('/admin/login/admin')).'</li>
								<li>'.CHtml::Link('User Roles', array('/admin/roles/admin')).'</li>
								<li>'.CHtml::Link('User Profiles', array('/admin/userProfiles/admin')).'</li>
								<li>'.CHtml::Link('schools_profile', array('/admin/schoolsProfile/admin')).'</li>
								<li>'.CHtml::Link('memberships', array('/admin/memberships/admin')).'</li>
										
										
								
							</ul>',
				'Advertisements'=>'<ul id="menu">
										<li>'.CHtml::Link('advertise_categories', array('/admin/advertiseCategories/admin')).'</li>
										<li>'.CHtml::Link('advertisements', array('/admin/advertisements/admin')).'</li>
								
										
						</ul>',
				'Others'=>'<ul id="menu">
										<li>'.CHtml::Link('sub_categories', array('/admin/subCategories/admin')).'</li>

										<li>'.CHtml::Link('categories', array('/admin/categories/admin')).'</li>
							
						</ul>',
				// panel 3 contains the content rendered by a partial view
				//'panel 3'=>$this->renderPartial('_partial',null,true),
			),
			// additional javascript options for the accordion plugin
			'options'=>array(
				'animated'=>'bounceslide',
				'height'=>30,
			),
	));
?>
             

            </div>
            <!-- END LEFT -->

            <!-- BEGIN MAIN CONTENT -->
            <div id="content">
                <!-- .outer -->
                <div class="container-fluid outer">
                    <div class="row-fluid">
						<?php echo $content;?>
                    </div>
                    <!-- /.row-fluid -->
                </div>
                <!-- /.outer -->
            </div>
            <!-- END CONTENT -->


            <!-- #push do not remove -->
            <div id="push"></div>
            <!-- /#push -->
        </div>
        <!-- END WRAP -->

        <div class="clearfix"></div>

        <!-- BEGIN FOOTER -->
        <div id="footer">
            <p>ZADOVO Admin Panel  Copyright <?php echo date('Y');?>.</p>
        </div>
        	<!-- END FOOTER -->

		</div>
	</div>
		
    


</body>
</html>