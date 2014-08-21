<?php
$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserProfiles', 'url'=>array('index')),
	array('label'=>'Create UserProfiles', 'url'=>array('create')),
	array('label'=>'View UserProfiles', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserProfiles', 'url'=>array('admin')),
);
?>

<h1>Update UserProfiles <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>