<?php
$this->breadcrumbs=array(
	'Schools Profiles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SchoolsProfile', 'url'=>array('index')),
	array('label'=>'Create SchoolsProfile', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('schools-profile-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Schools Profiles</h1>

 

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/schoolsProfile/create'),array('class'=>'create-button')); ?> 

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'schools-profile-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'logo',
		'address1',
		'address2',
		'likes',
		/*
		'follower',
		'reviews',
		'activation',
		'status',
		'login_id',
		'memberships_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
