<?php
/* @var $this SchoolsProfileController */
/* @var $model SchoolsProfile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schools-profile-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		<?php echo $form->hiddenField($model,'user_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->hiddenField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		
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
		<?php if(isset($model->logo)){ ?> 
		<?php echo $form->hiddenField($model,'oldImage',array('value'=>$model->logo)); ?>
		<img width="100" height="100" src="<?php echo Yii::app()->request->baseUrl.'/uploads/SchoolsProfile/sthumb/'.$model->logo;?>" alt="image"/>
		<?php }?>
	</div>
    
    
    

	<div class="row">
		<?php echo $form->labelEx($model,'about_school'); ?>
		<?php echo $form->textArea($model,'about_school',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about_school'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone'); ?>
		<?php echo $form->textField($model,'telephone',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'telephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cities_id'); ?>
		<?php echo $form->textField($model,'cities_id'); ?>
		<?php echo $form->error($model,'cities_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address1'); ?>
		<?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>500)); ?>
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
		<?php echo $form->labelEx($model,'want_to_join'); ?>
		<?php echo $form->textField($model,'want_to_join'); ?>
		<?php echo $form->error($model,'want_to_join'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'login_id'); ?>
        <?php echo $form->dropDownlist($model,'login_id',CHtml::listData(Login::model()->findAllByAttributes(array('roles_id'=>3)),'id','user_name'));?>
		<?php echo $form->error($model,'login_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'memberships_id'); ?>
		<?php echo $form->textField($model,'memberships_id'); ?>
		<?php echo $form->error($model,'memberships_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->