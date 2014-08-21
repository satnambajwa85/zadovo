<?php
$this->breadcrumbs=array(
	'Advertisements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Advertisements', 'url'=>array('index')),
	array('label'=>'Manage Advertisements', 'url'=>array('admin')),
);
?>

<h1>Create Advertisements</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>