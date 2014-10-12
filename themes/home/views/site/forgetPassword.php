<script type="text/javascript">
document.title = 'Get you forget password';
</script>
 
<div class="container">
		<div class="span10">&nbsp;</div>
		<div class="span10">
			<h1>Get your password!</h1>
		</div>
		<div class="span9 offset1" id="login-view">
				<div class="spacer15">
								<?php if(Yii::app()->user->hasFlash('forget')): ?>
								<div class="flash-error">
									<?php echo Yii::app()->user->getFlash('forget'); ?>
								</div>
								<?php endif; ?>	
				</div>

			<section class="main">
						 <?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'forget-form',
									'htmlOptions'=>array('class'=>'span6 form-2'),
									'enableClientValidation'=>true,
									'clientOptions'=>array(
										'validateOnSubmit'=>true,
							
									),)); ?>
							<p class="float">
								<label for="login"><i class="icon-envelope"></i>Email <i class="star">*</i></label>
								<?php echo $form->textField($model,'email',array('placeholder'=>'email')); ?>
							</p>
							 
							<p class="float">
								<label for="password"><i class="icon-eye-open"></i>Please enter the code <i class="star">*</i></label>
								 
							<?php if(CCaptcha::checkRequirements()): ?>
								 <?php echo $form->textField($model,'verifyCode'); ?>
								 <?php echo $form->error($model,'verifyCode'); ?>
									<?php endif; ?>
									 
									 <div align="right" class="capcha">
										<?php $this->widget('CCaptcha'); ?>
									</div> 
						 
							</p>
							<p class="clearfix"> 
							
								 <?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-danger')); ?>
							 
							</p>
						<?php $this->endWidget(); ?>
			</section>
			
		  
		   </div>
</div>
    
<div class="spacer27"></div>
		
        