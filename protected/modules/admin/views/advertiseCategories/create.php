<?php
$this->breadcrumbs=array(
	'Advertise Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AdvertiseCategories', 'url'=>array('index')),
	array('label'=>'Manage AdvertiseCategories', 'url'=>array('admin')),
);
?>

<h1>Create AdvertiseCategories</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>