<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title><?php  if(Yii::app()->user->id){ ?>
			<?php echo ucfirst(Yii::app()->user->userName);?>
			<?php } ?>
			<?php echo CHtml::encode($this->pageTitle);?></title>
			 

    <link href="<?php echo Yii::app()->theme->baseUrl;?>/dist/css/style.css" rel="stylesheet">
	    <?php echo CHtml::encode($this->pageTitle);?></title>
		<?php $cs = Yii::app()->clientScript;$cs->scriptMap = array('jquery.js' => ''.Yii::app()->theme->baseUrl.'/js/jquery.js',
				'jquery.yii.js' => ''.Yii::app()->baseUrl.'/js/jquery.js',
			);
	?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/html5shiv.js"></script>
      <script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
	  		<?php if(Yii::app()->user->id){ ?>
			<div class="pull-right top-img fl">
				<?php $this->Widget('WidgetUserProfileTab'); ?>
			</div>
			<?php } ?>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <!-- <a class="navbar-brand" href="#"></a>-->
        </div>
        <div class="navbar-collapse collapse">
	
			<?php $this->Widget('WidgetTopMenu'); ?>
          
			<div class="span3 fr">
				<div class="city-selector" id="city_list">
                            
					<div style="background-image: url('<?php echo Yii::app()->theme->baseUrl;?>/flags/in.png'); background-repeat: no-repeat;" class="city-box left">

						<div class="dropdown-toggle">
							<?php $city	= Yii::app()->session['cities_id']; $result	=	(isset($city))?$city:'Jalandhar'; echo $result;?>&nbsp;
								<span class="icon-chevron-down"></span>
						</div>
									</div>
						<div class="user-city-list">
							<div class="first-country">
								<div class="clearfix country country-1">
									<div style="background-image: url(<?php echo Yii::app()->theme->baseUrl;?>/flags/in.png); background-repeat: no-repeat;" class="country_id_list">India</div>
									<div class="left country_city_list country-1">
									
									 <?php  $city = Cities::model()->findAllByAttributes(array('status'=>1,'published'=>1));?>
											<?php foreach($city as $list):?>
											<?php echo CHtml::link($list->name,array('/site/search','cities_id'=>$list->id));?>
											<?php endforeach;?>
									</div>
								</div>
							</div>
						 
											 
									
											 
						</div>
				</div>
			</div>
			<?php if(Yii::app()->user->id && Yii::app()->user->userType=='user'){ ?>
			
			<?php }	elseif(Yii::app()->user->id && Yii::app()->user->userType=='school/college'){ ?>
			<div class="navbar-form navbar-right">
			<?php echo CHtml::link('DASHBOARD',array('/user/schoolProfile'),array('id'=>'logout-bt','class'=>'btn btn-danger '));?>
			<?php echo CHtml::link('LOGOUT',array('/site/logout'),array('id'=>'logout-bt','class'=>'btn btn-danger '));?>
			</div>
			<?php } else { ?>
		 
			<div class="mt9 fr">
			  <?php echo CHtml::link('Sign in','#',array('id'=>'internal_sign-in','class'=>'btn btn-danger sign-up')); ?>
			  <?php echo CHtml::link('Sign up','#',array('id'=>'internal_sign-up','class'=>'btn btn-danger sign-up')); ?>
			</div>
			<?php }?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
	<div class="spacer15">
		 
	</div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
		 <div class="row">
			<div class="span12">
			   <div class="span7 logo">

				<?php //if(isset(Yii::app()->session['setting']['logo'])){ echo CHtml::link('<img src="'.Yii::app()->baseUrl.'uploads/setting/thumb/'.Yii::app()->session['setting']['logo'].'"/>',array('/site'));} else {?>
					<?php echo CHtml::link('<h1>ZADOVO</h1>',array('/site/')); ?>
				</div>
			
				<div class="span5 pd fr">

					<?php $form=$this->beginWidget('CActiveForm', array(	
										'id'=>'user-search-form',
										'htmlOptions'=>array('class'=>'navbar-form navbar-right'),
										'action'=>Yii::app()->createUrl('/site/search'),
										'method'=>'get',));?>
						<?php echo CHtml::textField('term',(isset($_REQUEST['term']))?$_REQUEST['term']:'',array('class'=>'form-control','placeholder'=>'SEARCH'));
						echo CHtml::link('<i class="icon-search"></i>',array('/site/search'),array('class'=>'btn btn-danger fr'));?>
						 
					<?php $this->endWidget(); ?>
				</div>
				
			</div>
		</div>
		    <div class="row-fluid">
				<div class="span4"><?php $this->Widget('WidgetMenu'); ?></div>
				
			</div>
		</div>
    </div>
	<?php echo $content;?>
    <div class="row-fluid">
       
      <footer><?php $this->Widget('WidgetFooter');?></footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php //echo Yii::app()->theme->baseUrl;?>/js/jquery.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap-lightbox.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/custom.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.imagesloaded.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/cbpBGSlideshow.min.js"></script>
		<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/modernizr.custom.js"></script>
		<script>
			$(function() {
				cbpBGSlideshow.init();
			});
		</script>
   
 	 <div style="*display:none;">
		 <section class="internal_login_slide">
				<div class="">
						 <?php $model = new Register; $form=$this->beginWidget('CActiveForm', array(
									'id'=>'sign-form',
									'action'=>Yii::app()->createUrl('/site/register'),
									'htmlOptions'=>array('class'=>'form-2'),
									'enableClientValidation'=>false,
									)); ?>
							<div align="right"><a href="#" id="internal_sign-up_close" class="icon-remove"></a></div>
							<p class="span3 fl">
								<?php echo $form->labelEx($model,'first_name'); ?>
								<?php echo $form->textField($model,'first_name'); ?>
								<?php echo $form->error($model,'first_name'); ?>
							</p>
							 <p class="span3 fl">
								<?php echo $form->labelEx($model,'last_name'); ?>
								<?php echo $form->textField($model,'last_name'); ?>
								<?php echo $form->error($model,'last_name'); ?>
							</p>
							 <p class="span3 fl">
								<?php echo $form->labelEx($model,'user_name'); ?>
								<?php echo $form->textField($model,'user_name'); ?>
								<?php echo $form->error($model,'user_name'); ?>
							</p>
							 <p class="span3 fl">
								<?php echo $form->labelEx($model,'password'); ?>
								<?php echo $form->passwordField($model,'password'); ?>
								<?php echo $form->error($model,'password'); ?>
							</p>
							 <p class="span3 fl">
								<?php echo $form->labelEx($model,'email'); ?>
								<?php echo $form->textField($model,'email'); ?>
								<?php echo $form->error($model,'email'); ?>
							</p>
							 <p class="span3 fl">
								<?php echo $form->labelEx($model,'date_of_birth'); ?>
								<?php	$this->widget('zii.widgets.jui.CJuiDatePicker',array(
													'model'=>$model,
													'attribute'=>'date_of_birth',
													'options'=>array('dateFormat'=>'yy-mm-dd',
													'changeMonth'=>'true',
													'changeYear'=>'true',
													),
												
													
													));?>
								<?php echo $form->error($model,'date_of_birth'); ?>
							</p>
							
							<div class="clear"></div>
							 <p class="span3 fl">
								 <?php echo $form->labelEx($model,'gender',array('class'=>'fl')); ?>
									<?php echo $form->radioButtonlist($model,'gender',array('Male'=>'Male','Female'=>'Female'),array('separator'=>'')); ?>
									<?php echo $form->error($model,'gender'); ?>
								 
							</p>
							<div class="span3 fl clear">
							
								<div class="fl"><?php echo $form->checkBox($model,'term_conditions'); ?></div>
								<div class="fl"><?php echo $form->labelEx($model,'term_conditions'); ?></div>
								 <?php echo $form->error($model,'term_conditions'); ?>
							</div>	
							
							<p class="clearfix"> 
								<?php echo CHtml::submitButton('SIGN UP',array('class'=>'btn btn-danger')); ?>
							</p>
						<?php $this->endWidget(); ?>
				</div>
			
		</section>
	 </div>
	 	 <div style="*display:none;">
		 <section class="internal_signin_slide">
			
						 <?php $model = new LoginForm; $form=$this->beginWidget('CActiveForm', array(
									'id'=>'user-login-form',
									'action'=>Yii::app()->createUrl('/site/login'),
									'htmlOptions'=>array('class'=>'form-2'),
									'enableClientValidation'=>true,
									'clientOptions'=>array(
										'validateOnSubmit'=>true,
							
									),)); ?>
									
							
							<div align="right"><a href="#" class="icon-remove"></a></div>
							<div align="center" class="f-t-login-link">
							<?php echo CHtml::link('LOGIN WITH FACEBOOK <span class="icon-facebook-sign"></span>','#',array('class'=>'btn btn-lg btn-primary marb'))?><br/>
							<?php echo CHtml::link('LOGIN WITH TWITTER <span class="icon-twitter-sign"></span>&nbsp;&nbsp;&nbsp;&nbsp;','#',array('class'=>'btn btn-lg btn-info marb'))?>
							</div>
							<p class="span3 fl">
								<label for="login"><i class="icon-user"></i>Username <i class="star">*</i></label>
								<?php echo $form->textField($model,'username',array('placeholder'=>'Username')); ?>
							</p>
							 
							<p class="span3 fl">
								<label for="password"><i class="icon-lock"></i>Password <i class="star">*</i></label>
								<?php echo $form->passwordField($model,'password',array('placeholder'=>'Password'),array('class'=>'showpassword')); ?>
							
							</p>
							<p class="clearfix"> 
								 <?php echo CHtml::submitButton('SIGN IN',array('class'=>'btn btn-danger')); ?>
							 
							</p>
						
						<?php $this->endWidget(); ?>
			
			 
		</section>
	 </div>



 
  </body>
</html>
