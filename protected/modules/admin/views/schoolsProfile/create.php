<?php
/* @var $this SchoolsProfileController */
/* @var $model SchoolsProfile */

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

<?php $this->renderPartial('_form1', array('model'=>$model)); ?>