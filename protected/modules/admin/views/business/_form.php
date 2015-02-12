<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'business-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'start_age_group'); ?>
		<?php echo $form->textField($model,'start_age_group',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'start_age_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_age_group'); ?>
		<?php echo $form->textField($model,'end_age_group',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'end_age_group'); ?>
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
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_number'); ?>
		<?php echo $form->textField($model,'mobile_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'mobile_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'about_the_business'); ?>
		<?php echo $form->textArea($model,'about_the_business',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about_the_business'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'additional_info'); ?>
		<?php echo $form->textArea($model,'additional_info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'additional_info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_line_1'); ?>
		<?php echo $form->textField($model,'address_line_1',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'address_line_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_line_2'); ?>
		<?php echo $form->textField($model,'address_line_2',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'address_line_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'land_mark'); ?>
		<?php echo $form->textField($model,'land_mark',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'land_mark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pin_code'); ?>
		<?php echo $form->textField($model,'pin_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pin_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prefix'); ?>
		<?php echo $form->textField($model,'prefix',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'prefix'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'designation'); ?>
		<?php echo $form->textField($model,'designation',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'designation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email1'); ?>
		<?php echo $form->textField($model,'email1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_no'); ?>
		<?php echo $form->textField($model,'mobile_no',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'mobile_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prefix2'); ?>
		<?php echo $form->textField($model,'prefix2',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'prefix2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name2'); ?>
		<?php echo $form->textField($model,'first_name2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'first_name2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name2'); ?>
		<?php echo $form->textField($model,'last_name2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'last_name2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'designation2'); ?>
		<?php echo $form->textField($model,'designation2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'designation2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email2'); ?>
		<?php echo $form->textField($model,'email2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile_no2'); ?>
		<?php echo $form->textField($model,'mobile_no2',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'mobile_no2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advertise_categories_id'); ?>
		<?php echo $form->textField($model,'advertise_categories_id'); ?>
		<?php echo $form->error($model,'advertise_categories_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->