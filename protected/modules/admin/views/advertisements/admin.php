<?php
$this->breadcrumbs=array(
	'Advertisements'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Advertisements', 'url'=>array('index')),
	array('label'=>'Create Advertisements', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('advertisements-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Advertisements</h1>



<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/advertisements/create'),array('class'=>'create-button')); ?> 

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'advertisements-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'image',
		'description',
		'link',
		'add_date',
		'published',
		/*
		'status',
		'advertise_categories_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
