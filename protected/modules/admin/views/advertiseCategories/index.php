<?php
$this->breadcrumbs=array(
	'Advertise Categories',
);

$this->menu=array(
	array('label'=>'Create AdvertiseCategories', 'url'=>array('create')),
	array('label'=>'Manage AdvertiseCategories', 'url'=>array('admin')),
);
?>

<h1>Advertise Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
