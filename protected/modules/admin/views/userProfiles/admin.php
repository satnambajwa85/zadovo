<?php
$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserProfiles', 'url'=>array('index')),
	array('label'=>'Create UserProfiles', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-profiles-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Profiles</h1>

 

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/userProfiles/create'),array('class'=>'create-button')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-profiles-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'first_name',
		'last_name',
		'email',
		//'age',
		'gender',
		/*
		'address',
		'image',
		'postcode',
		'telephone',
		'mobile',
		'fax',
		'profile_info',
		'add_date',
		'register_date',
		'send_mail',
		'status',
		'recent_activity',
		'favourites',
		'work',
		'website',
		'dislike',
		'login_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
