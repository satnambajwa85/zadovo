<div class="container">
		<div class="span10">&nbsp;</div>
		
		<div class="span9 offset1" id="login-view">
				<div class="spacer15">
								<?php if(Yii::app()->user->hasFlash('login')): ?>
								<div class="flash-error">
									<?php echo Yii::app()->user->getFlash('login'); ?>
								</div>
								<?php endif; ?>	
				</div>
			<div class="spacer15"></div>

			<section class="main">
			
						 <?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'login-form',
									'htmlOptions'=>array(''),
									'enableClientValidation'=>true,
									'clientOptions'=>array(
										'validateOnSubmit'=>true,
							
									),)); ?>
							  
							<div class="col-md-4 f-t-login-link">
							<?php echo CHtml::link('LOGIN WITH FACEBOOK <span class="icon-facebook-sign"></span>','#',array('class'=>'btn btn-lg btn-primary marb'))?><br/>
							<?php echo CHtml::link('LOGIN WITH TWITTER <span class="icon-twitter-sign"></span>&nbsp;&nbsp;&nbsp;&nbsp;','#',array('class'=>'btn btn-lg btn-info marb'))?>
							</div>
							<div class="clear"></div>
							<div class="form-group col-md-4">
								<label for="login"><i class="icon-user"></i>Username <i class="star">*</i></label>
								<?php echo $form->textField($model,'username',array('placeholder'=>'Username','class'=>'form-control')); ?>
							
							</div>
							<div class="form-group col-md-4">
								<label for="password"><i class="icon-lock"></i>Password <i class="star">*</i></label>
								<?php echo $form->passwordField($model,'password',array('placeholder'=>'Password','class'=>'form-control')); ?>
							</div>
							
							<div class="clear col-md-4"> 
								 <?php echo CHtml::submitButton('SIGN IN',array('class'=>'btn btn-danger')); ?>
							 
							</div>
						<?php $this->endWidget(); ?>
			</section>
			
		  
		   </div>
</div>
    
<div class="spacer27"></div>
<div class="spacer27"></div>



		
        