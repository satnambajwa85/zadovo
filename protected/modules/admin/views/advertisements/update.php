<?php
$this->breadcrumbs=array(
	'Advertisements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Advertisements', 'url'=>array('index')),
	array('label'=>'Create Advertisements', 'url'=>array('create')),
	array('label'=>'View Advertisements', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Advertisements', 'url'=>array('admin')),
);
?>

<h1>Update Advertisements <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>