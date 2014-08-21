<?php
$this->breadcrumbs=array(
	'Memberships'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Memberships', 'url'=>array('index')),
	array('label'=>'Create Memberships', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('memberships-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Memberships</h1>

 


<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/memberships/create'),array('class'=>'create-button')); ?> 

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'memberships-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description',
		'status',
		'add_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
