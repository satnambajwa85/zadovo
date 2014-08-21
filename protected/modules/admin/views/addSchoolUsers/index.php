<?php
$this->breadcrumbs=array(
	'Add School Users',
);

$this->menu=array(
	array('label'=>'Create AddSchoolUsers', 'url'=>array('create')),
	array('label'=>'Manage AddSchoolUsers', 'url'=>array('admin')),
);
?>

<h1>Add School Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
