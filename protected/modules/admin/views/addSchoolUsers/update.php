<?php
$this->breadcrumbs=array(
	'Add School Users'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AddSchoolUsers', 'url'=>array('index')),
	array('label'=>'Create AddSchoolUsers', 'url'=>array('create')),
	array('label'=>'View AddSchoolUsers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AddSchoolUsers', 'url'=>array('admin')),
);
?>

<h1>Update AddSchoolUsers <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>