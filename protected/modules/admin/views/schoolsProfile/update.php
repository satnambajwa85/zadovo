<?php
/* @var $this SchoolsProfileController */
/* @var $model SchoolsProfile */

$this->breadcrumbs=array(
	'Schools Profiles'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SchoolsProfile', 'url'=>array('index')),
	array('label'=>'Create SchoolsProfile', 'url'=>array('create')),
	array('label'=>'View SchoolsProfile', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SchoolsProfile', 'url'=>array('admin')),
);
?>

<h1>Update SchoolsProfile <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>