<div class="container">
		

		<div class="span9" id="login-view">
				<div class="spacer15">
						
				 <?php if(Yii::app()->user->hasFlash('addschool')): ?>
				<div class="alert alert-warning alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					 <?php echo Yii::app()->user->getFlash('addschool'); ?>
				</div>
				<?php endif; ?>	
				</div>

			<section class="main">
						 <?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'add-school-form',
									'htmlOptions'=>array('class'=>'col-md-12  ml26','enctype'=>'multipart/form-data'),
									'enableClientValidation'=>false,
									
									)); ?>
									<?php echo $form->errorSummary($model); ?>
								<div class="panel panel-default">
								<div class="panel-heading">
								  <h3 class="panel-title">SCHOOL DETAILS</h3>
								</div>
								<div class="panel-body">
							<div class="form-group col-md-6">
								<?php echo $form->labelEx($model,'school_name'); ?>
								<?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'name'); ?>
								
							</div>
							 

							<div class="form-group col-md-6">
								<?php echo $form->labelEx($model,'telephone'); ?>
								<?php echo $form->textField($model,'telephone',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'telephone'); ?>
							</div>
							<div class="form-group col-md-6">
								<?php echo $form->labelEx($model,'email'); ?>
								<?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'email'); ?>
							</div>
							<div class="form-group col-md-6">
								<?php echo $form->labelEx($model,'website'); ?>
								<?php echo $form->textField($model,'website',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'website'); ?>
							</div>
							 <div class="form-group col-md-6">
								<?php echo $form->labelEx($model,'logo'); ?>
								<?php echo $form->fileField($model,'logo',array('style'=>'width:152px;margin:0 15px 0 0;font-size:10px;')); ?>
								<?php echo $form->error($model,'logo'); ?>
							</div>
							 <div class="form-group col-md-6">
								 <?php echo $form->labelEx($model,'Select_city'); ?>
								<?php echo $form->dropDownlist($model,'cities_id',CHtml::listData(Cities::model()->findAll(),'id','name'),array('class'=>'form-control')); ?>
									<?php echo $form->error($model,'gender'); ?>
								 
							</div>
							
							 <div class="form-group col-md-6">
								 <?php echo $form->labelEx($model,'about_school'); ?>
								 <?php echo $form->textArea($model,'about_school',array('class'=>'form-control')); ?>
								 <?php echo $form->error($model,'about_school'); ?>
								 
							</div>
							<div class="form-group col-md-6">
								 <?php echo $form->labelEx($model,'school_address'); ?>
								 <?php echo $form->textArea($model,'address1',array('class'=>'form-control')); ?>
								 <?php echo $form->error($model,'address1'); ?>
								 
							</div>
							
							
							</div>
							</div>
							<div class="clear"></div>
							<div class="panel panel-default">
								<div class="panel-heading">
								  <h3 class="panel-title">Who are you?</h3>
								</div>
								<div class="panel-body">
									 <div class="form-group col-md-6">
										<?php echo $form->labelEx($model,'name'); ?>
										<?php echo $form->textField($model,'uname',array('class'=>'form-control')); ?>
										<?php echo $form->error($model,'uname'); ?>
									 
									</div>
									 <div class="form-group col-md-6">
										<?php echo $form->labelEx($model,'email'); ?>
										<?php echo $form->textField($model,'uemail',array('class'=>'form-control')); ?>
										<?php echo $form->error($model,'uemail'); ?>
									 
									</div>
									 <div class="form-group col-md-6">
										<?php echo $form->labelEx($model,'phone'); ?>
										<?php echo $form->textField($model,'phone',array('class'=>'form-control')); ?>
										<?php echo $form->error($model,'phone'); ?>
									 
									</div>
									  <div class="form-group col-md-6">
										<?php echo $form->labelEx($model,'website'); ?>
										<?php echo $form->textField($model,'uwebsite',array('class'=>'form-control')); ?>
										<?php echo $form->error($model,'uwebsite'); ?>
									 
									</div>
									<div class="form-group col-md-6 mr6 " style="margin:0 0px 0 -6px;">
							
										<div class="fl"><?php echo $form->checkBox($model,'term_conditions'); ?></div>
										<div class="fl mt2"><?php echo $form->labelEx($model,'term_conditions'); ?></div>
										 <?php echo $form->error($model,'term_conditions'); ?>
									</div>	
								</div>
							</div>
							<p class="mar clearfix"> 
								<?php echo CHtml::submitButton('SUBMIT',array('class'=>'btn btn-danger')); ?>
							</p>
						<?php $this->endWidget(); ?>
			</section>
			
		  
		   </div>
</div>
    
<div class="spacer27"></div>
		
        
