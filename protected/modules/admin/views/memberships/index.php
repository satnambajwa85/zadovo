<?php
$this->breadcrumbs=array(
	'Memberships',
);

$this->menu=array(
	array('label'=>'Create Memberships', 'url'=>array('create')),
	array('label'=>'Manage Memberships', 'url'=>array('admin')),
);
?>

<h1>Memberships</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
