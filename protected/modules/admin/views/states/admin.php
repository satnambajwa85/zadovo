<?php
$this->breadcrumbs=array(
	'States'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List States', 'url'=>array('index')),
	array('label'=>'Create States', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('states-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage States</h1>
<!--  <?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>  -->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/states/create'),array('class'=>'create-button'));?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'states-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'alias',
		'code_1',
		'code_2',
		'image',
		/*
		'add_date',
		'description',
		'published',
		'status',
		'countries_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
