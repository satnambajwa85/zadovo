<?php
/* @var $this SchoolsProfileController */
/* @var $data SchoolsProfile */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('about_school')); ?>:</b>
	<?php echo CHtml::encode($data->about_school); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone')); ?>:</b>
	<?php echo CHtml::encode($data->telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cities_id')); ?>:</b>
	<?php echo CHtml::encode($data->cities_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address1')); ?>:</b>
	<?php echo CHtml::encode($data->address1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address2')); ?>:</b>
	<?php echo CHtml::encode($data->address2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('likes')); ?>:</b>
	<?php echo CHtml::encode($data->likes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('follower')); ?>:</b>
	<?php echo CHtml::encode($data->follower); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('want_to_join')); ?>:</b>
	<?php echo CHtml::encode($data->want_to_join); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reviews')); ?>:</b>
	<?php echo CHtml::encode($data->reviews); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activation')); ?>:</b>
	<?php echo CHtml::encode($data->activation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login_id')); ?>:</b>
	<?php echo CHtml::encode($data->login_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('memberships_id')); ?>:</b>
	<?php echo CHtml::encode($data->memberships_id); ?>
	<br />

	*/ ?>

</div>