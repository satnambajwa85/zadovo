
				
					<?php if(Yii::app()->user->hasFlash('login')): ?>
					<div class="flash-error">
						<?php echo Yii::app()->user->getFlash('login'); ?>
					</div>
					<?php endif; ?>	

		
				
				<div class="span10">
					<h1>Contact us</h1>
				</div>
				<div class="span4 social fl">
					<div class="pd29">
			   
 
					</div>
				</div>
    
			<div class="col-md-12">   
					
									
	<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'contact-form',
									'htmlOptions'=>array('role'=>'form','class'=>'form-group'),
									'enableClientValidation'=>true,
									'clientOptions'=>array(
										'validateOnSubmit'=>true,
									),)); ?>
 <div class="form-group">
   <?php echo $form->labelEx($model,'name'); ?>
	<?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
	<?php echo $form->error($model,'name'); ?>
</div>
  <div class="form-group">
   	<?php echo $form->labelEx($model,'email'); ?>
	<?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
	<?php echo $form->error($model,'email'); ?>

   
  </div>
  <div class="form-group">
			<?php echo $form->labelEx($model,'subject'); ?>
			<?php echo $form->textField($model,'subject',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'subject'); ?>
	
  </div>
  <div class="form-group">
	<?php echo $form->labelEx($model,'body'); ?>
	<?php echo $form->textArea($model,'body',array('class'=>'form-control','style'=>'min-height:150px;')); ?>
	<?php echo $form->error($model,'body'); ?>

  </div>
			<div class="span3 fl clear">
			<div class="reg_text"> <?php if(CCaptcha::checkRequirements()): ?><?php $this->widget('CCaptcha'); ?></div>
			<div class="www_bg">
			<div class="hint">
			</div>
			<?php echo $form->textField($model,'verifyCode',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'verifyCode'); ?>


			</div>
			<?php endif; ?>


			</div>
	<div class="spacer15 clear"></div>
	<?php echo CHtml::submitButton('SUBMIT',array('class'=>'btn btn-danger')); ?>
							 								

<?php $this->endWidget(); ?>

						
			</div>


<div class="spacer27"></div>