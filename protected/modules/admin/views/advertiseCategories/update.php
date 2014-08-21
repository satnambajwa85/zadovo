<?php
$this->breadcrumbs=array(
	'Advertise Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AdvertiseCategories', 'url'=>array('index')),
	array('label'=>'Create AdvertiseCategories', 'url'=>array('create')),
	array('label'=>'View AdvertiseCategories', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AdvertiseCategories', 'url'=>array('admin')),
);
?>

<h1>Update AdvertiseCategories <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>