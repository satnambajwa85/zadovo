<?php
$this->breadcrumbs=array(
	'Advertise Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AdvertiseCategories', 'url'=>array('index')),
	array('label'=>'Create AdvertiseCategories', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('advertise-categories-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Advertise Categories</h1>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/advertiseCategories/create'),array('class'=>'create-button')); ?> 

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'advertise-categories-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'alias',
		'description',
		'add_date',
		'published',
		/*
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
