<?php
$this->breadcrumbs=array(
	'Add School Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AddSchoolUsers', 'url'=>array('index')),
	array('label'=>'Manage AddSchoolUsers', 'url'=>array('admin')),
);
?>

<h1>Create AddSchoolUsers</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>