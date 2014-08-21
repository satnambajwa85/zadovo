<?php
$this->breadcrumbs=array(
	'Advertisements'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Advertisements', 'url'=>array('index')),
	array('label'=>'Create Advertisements', 'url'=>array('create')),
	array('label'=>'Update Advertisements', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Advertisements', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Advertisements', 'url'=>array('admin')),
);
?>

<h1>View Advertisements #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'image',
		'description',
		'link',
		'add_date',
		'published',
		'status',
		'advertise_categories_id',
	),
)); ?>
