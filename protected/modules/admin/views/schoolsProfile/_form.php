<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schools-profile-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'login_id'); ?>
		<?php echo $form->dropDownlist($model,'login_id',CHtml::listData(Login::model()->findAll(),'id','id')); ?>
		<?php echo $form->error($model,'login_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'memberships_id'); ?>
		<?php echo $form->dropDownlist($model,'memberships_id',CHtml::listData(Memberships::model()->findAll(),'id','title')); ?>
		<?php echo $form->error($model,'memberships_id'); ?>
	</div>
	 
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo'); ?>
		<?php echo $form->fileField($model,'logo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'logo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address1'); ?>
		<?php echo $form->textField($model,'address1',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'address1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address2'); ?>
		<?php echo $form->textField($model,'address2',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'address2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'likes'); ?>
		<?php echo $form->textField($model,'likes'); ?>
		<?php echo $form->error($model,'likes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'follower'); ?>
		<?php echo $form->textField($model,'follower'); ?>
		<?php echo $form->error($model,'follower'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reviews'); ?>
		<?php echo $form->textField($model,'reviews'); ?>
		<?php echo $form->error($model,'reviews'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activation'); ?>
		<?php echo $form->textField($model,'activation'); ?>
		<?php echo $form->error($model,'activation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>


	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->