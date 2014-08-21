<?php
$this->breadcrumbs=array(
	'Menuses'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Menus', 'url'=>array('index')),
	array('label'=>'Create Menus', 'url'=>array('create')),
	array('label'=>'View Menus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Menus', 'url'=>array('admin')),
);
?>

<h1>Update Menus <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>