<?php
$this->breadcrumbs=array(
	'Memberships'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Memberships', 'url'=>array('index')),
	array('label'=>'Create Memberships', 'url'=>array('create')),
	array('label'=>'View Memberships', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Memberships', 'url'=>array('admin')),
);
?>

<h1>Update Memberships <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>