<?php
/* @var $this SchoolsProfileController */
/* @var $model SchoolsProfile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schools-profile-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<h4>Edit your profile</h4>

	<?php echo $form->errorSummary($model); ?>
    
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
		<img width="100" height="100" src="<?php echo Yii::app()->request->baseUrl.'/uploads/SchoolsProfile/logo/'.$model->logo;?>" alt="image"/>
		<?php }?>
	</div>
    <div class="clear"></div>
    <div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'image'); ?>
		<?php if(isset($model->logo)){ ?> 
		<?php echo $form->hiddenField($model,'oldImage1',array('value'=>$model->image)); ?>
		<img width="100" height="100" src="<?php echo Yii::app()->request->baseUrl.'/uploads/SchoolsProfile/sthumb/'.$model->image;?>" alt="image"/>
		<?php }?>
	</div>
    <div class="clear"></div>

	<div class="row">
		<?php echo $form->labelEx($model,'about_school'); ?>
		<?php echo $form->textArea($model,'about_school',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about_school'); ?>
	</div>
    <div class="clear"></div>
    <div class="row">
		<?php echo $form->labelEx($model,'board'); ?>
		<?php echo $form->textField($model,'board',array('size'=>12, 'maxlength'=>12)); ?>
		<?php echo $form->error($model,'board'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'principal'); ?>
		<?php echo $form->textField($model,'principal',array('size'=>12, 'maxlength'=>12)); ?>
		<?php echo $form->error($model,'principal'); ?>
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
        <?php echo $form->dropDownlist($model,'cities_id',CHtml::listData(Cities::model()->findAll(),'id','name'));?>
		<?php echo $form->error($model,'cities_id'); ?>
	</div>
    
<div class="clear"></div>
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

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'gradient-button fr')); ?>
		<?php echo CHtml::link('Cancel',array('/school'),array('class'=>'gradient-button fr mr10')); ?>
	
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->