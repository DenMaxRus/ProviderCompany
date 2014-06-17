<?php
$this->breadcrumbs=array(
	'Operations'=>array('index'),
	$model->date,
);

$this->menu=array(
	array('label'=>'List Operation','url'=>array('index')),
	array('label'=>'Create Operation','url'=>array('create')),
	array('label'=>'Update Operation','url'=>array('update','id'=>$model->date)),
	array('label'=>'Delete Operation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->date),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Operation','url'=>array('admin')),
);
?>

<h1>View Operation #<?php echo $model->date; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'date',
		'userid',
		'serviceid',
		'amount',
	),
)); ?>
