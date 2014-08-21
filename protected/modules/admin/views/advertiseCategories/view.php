<?php
$this->breadcrumbs=array(
	'Advertise Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AdvertiseCategories', 'url'=>array('index')),
	array('label'=>'Create AdvertiseCategories', 'url'=>array('create')),
	array('label'=>'Update AdvertiseCategories', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AdvertiseCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdvertiseCategories', 'url'=>array('admin')),
);
?>

<h1>View AdvertiseCategories #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'alias',
		'description',
		'add_date',
		'published',
		'status',
	),
)); ?>
