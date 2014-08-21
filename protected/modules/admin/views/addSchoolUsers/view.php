<?php
$this->breadcrumbs=array(
	'Add School Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AddSchoolUsers', 'url'=>array('index')),
	array('label'=>'Create AddSchoolUsers', 'url'=>array('create')),
	array('label'=>'Update AddSchoolUsers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AddSchoolUsers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AddSchoolUsers', 'url'=>array('admin')),
);
?>

<h1>View AddSchoolUsers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'mobile',
		'website',
		'published',
		'status',
		'schools_profile_id',
	),
)); ?>
