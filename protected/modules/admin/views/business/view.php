<?php
$this->breadcrumbs=array(
	'Businesses'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Business', 'url'=>array('index')),
	array('label'=>'Create Business', 'url'=>array('create')),
	array('label'=>'Update Business', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Business', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Business', 'url'=>array('admin')),
);
?>

<h1>View Business #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'start_age_group',
		'end_age_group',
		'email',
		'website',
		'phone_number',
		'mobile_number',
		'about_the_business',
		'additional_info',
		'address_line_1',
		'address_line_2',
		'land_mark',
		'pin_code',
		'prefix',
		'first_name',
		'last_name',
		'designation',
		'email1',
		'mobile_no',
		'prefix2',
		'first_name2',
		'last_name2',
		'designation2',
		'email2',
		'mobile_no2',
		'title',
		'image',
		'description',
		'link',
		'add_date',
		'published',
		'status',
		'advertise_categories_id',
	),
)); ?>
