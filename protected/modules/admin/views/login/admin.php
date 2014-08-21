<?php
$this->breadcrumbs=array(
	'Logins'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Login', 'url'=>array('index')),
	array('label'=>'Create Login', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('login-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Logins</h1>



<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><?php echo CHtml::link('Create',array('/admin/login/create'),array('class'=>'create-button')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'login-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'user_name',
		'password',
		'add_date',
		'last_login',
		'login_status',
		/*
		'block',
		'activation',
		'status',
		'roles_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
