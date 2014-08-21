<?php
$this->breadcrumbs=array(
	'Schools Profiles'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SchoolsProfile', 'url'=>array('index')),
	array('label'=>'Create SchoolsProfile', 'url'=>array('create')),
	array('label'=>'Update SchoolsProfile', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SchoolsProfile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SchoolsProfile', 'url'=>array('admin')),
);
?>

<h1>View SchoolsProfile #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'logo',
		'address1',
		'address2',
		'likes',
		'follower',
		'reviews',
		'activation',
		'status',
		'login_id',
		'memberships_id',
	),
)); ?>
