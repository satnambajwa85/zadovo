<div class="container">
	 	 <div class="span9 offset1" id="login-view">
				<div class="spacer15">
								<?php if(Yii::app()->user->hasFlash('login')): ?>
								<div class="flash-error">
									<?php echo Yii::app()->user->getFlash('login'); ?>
								</div>
								<?php endif; ?>	
				</div>
			<div class="spacer27"></div>
			<section class="main">
					<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'sign-form2',
									'htmlOptions'=>array(),
									'enableClientValidation'=>false,
									)); ?>
							
							  <div class="form-group col-md-4">
								<?php echo $form->labelEx($model,'first_name'); ?>
								<?php echo $form->textField($model,'first_name',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'first_name'); ?>
								
							  </div>
							  <div class="form-group col-md-4">
								<?php echo $form->labelEx($model,'last_name'); ?>
								<?php echo $form->textField($model,'last_name',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'last_name'); ?>
							  </div>
							  <div class="form-group col-md-4">
								<?php echo $form->labelEx($model,'user_name'); ?>
								<?php echo $form->textField($model,'user_name',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'user_name'); ?>
							 </div>
							  <div class="form-group col-md-4">
								<?php echo $form->labelEx($model,'password'); ?>
								<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'password'); ?>
							 </div>
							  <div class="form-group col-md-4">
								<?php echo $form->labelEx($model,'email'); ?>
								<?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'email'); ?>
							  </div>
							  
							  <div class="form-group col-md-4">
								 <?php echo $form->labelEx($model,'gender',array('class'=>'fl')); ?>
									<?php echo $form->radioButtonlist($model,'gender',array('Male'=>'Male','Female'=>'Female'),array('separator'=>'')); ?>
									<?php echo $form->error($model,'gender'); ?>
							  </div>
							  <div class="clear"></div>
							  <div class="form-group col-md-4">
								<div class="fl"><?php echo $form->checkBox($model,'term_conditions'); ?></div>
								<div class="fl"><?php echo $form->labelEx($model,'term_conditions'); ?></div>
								<br/>
								<?php echo $form->error($model,'term_conditions'); ?>
							  </div>
							<div class="clear col-md-4"> 
								<?php echo CHtml::submitButton('SIGN UP',array('class'=>'btn btn-danger')); ?>
							</div>
						<?php $this->endWidget(); ?>
			</section>
			
		  
		   </div>
</div>
    
<div class="spacer27"></div>
		
        
			<div class="spacer15"></div>