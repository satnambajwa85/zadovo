<?php
$this->breadcrumbs=array(
	'Cms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Cms', 'url'=>array('index')),
	array('label'=>'Create Cms', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cms-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cms</h1>

 

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/cms/create'),array('class'=>'create-button')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cms-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'meta_title',
		//'meta_description',
		'meta_keywords',
		'page',
		//'content',
		/*
		'position',
		'status',
		'activation',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
