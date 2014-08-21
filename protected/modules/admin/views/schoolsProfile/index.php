<?php
$this->breadcrumbs=array(
	'Schools Profiles',
);

$this->menu=array(
	array('label'=>'Create SchoolsProfile', 'url'=>array('create')),
	array('label'=>'Manage SchoolsProfile', 'url'=>array('admin')),
);
?>

<h1>Schools Profiles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
