<?php
$this->breadcrumbs=array(
	'Memberships'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Memberships', 'url'=>array('index')),
	array('label'=>'Manage Memberships', 'url'=>array('admin')),
);
?>

<h1>Create Memberships</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>