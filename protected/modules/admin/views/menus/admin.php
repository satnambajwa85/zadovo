<?php
$this->breadcrumbs=array(
	'Menuses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Menus', 'url'=>array('index')),
	array('label'=>'Create Menus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('menus-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Menuses</h1>

 

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/menus/create'),array('class'=>'create-button')); ?> 

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'menus-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'content',
		'order',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
