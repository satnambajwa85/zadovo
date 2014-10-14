<?php
/* @var $this SchoolsProfileController */
/* @var $model SchoolsProfile */

$this->breadcrumbs=array(
	'Schools Profiles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SchoolsProfile', 'url'=>array('index')),
	array('label'=>'Create SchoolsProfile', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#schools-profile-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Schools Profiles</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<?php echo CHtml::link('Create',array('create')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'schools-profile-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'logo',
		'about_school',
		'telephone',
		'email',
		/*
		'website',
		'cities_id',
		'address1',
		'address2',
		'likes',
		'follower',
		'want_to_join',
		'reviews',
		'activation',
		'status',
		'login_id',
		'memberships_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
