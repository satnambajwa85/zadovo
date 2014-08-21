<?php
$this->breadcrumbs=array(
	'Schools Profiles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SchoolsProfile', 'url'=>array('index')),
	array('label'=>'Manage SchoolsProfile', 'url'=>array('admin')),
);
?>

<h1>Create SchoolsProfile</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>