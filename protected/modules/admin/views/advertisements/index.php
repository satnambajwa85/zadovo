<?php
$this->breadcrumbs=array(
	'Advertisements',
);

$this->menu=array(
	array('label'=>'Create Advertisements', 'url'=>array('create')),
	array('label'=>'Manage Advertisements', 'url'=>array('admin')),
);
?>

<h1>Advertisements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
