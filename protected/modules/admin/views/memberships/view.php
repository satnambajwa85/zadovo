<?php
$this->breadcrumbs=array(
	'Memberships'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Memberships', 'url'=>array('index')),
	array('label'=>'Create Memberships', 'url'=>array('create')),
	array('label'=>'Update Memberships', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Memberships', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Memberships', 'url'=>array('admin')),
);
?>

<h1>View Memberships #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'status',
		'add_date',
	),
)); ?>
