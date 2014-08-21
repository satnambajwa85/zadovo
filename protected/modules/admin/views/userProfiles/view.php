<?php
$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserProfiles', 'url'=>array('index')),
	array('label'=>'Create UserProfiles', 'url'=>array('create')),
	array('label'=>'Update UserProfiles', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserProfiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserProfiles', 'url'=>array('admin')),
);
?>

<h1>View UserProfiles #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'email',
		'age',
		'gender',
		'address',
		'image',
		'postcode',
		'telephone',
		'mobile',
		'fax',
		'profile_info',
		'add_date',
		'register_date',
		'send_mail',
		'status',
		'recent_activity',
		'favourites',
		'work',
		'website',
		'dislike',
		'login_id',
	),
)); ?>
