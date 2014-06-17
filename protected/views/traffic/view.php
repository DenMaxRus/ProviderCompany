<?php
$this->breadcrumbs=array(
	'Traffics'=>array('index'),
	$model->date,
);

$this->menu=array(
	array('label'=>'List Traffic','url'=>array('index')),
	array('label'=>'Create Traffic','url'=>array('create')),
	array('label'=>'Update Traffic','url'=>array('update','id'=>$model->date)),
	array('label'=>'Delete Traffic','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->date),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Traffic','url'=>array('admin')),
);
?>

<h1>View Traffic #<?php echo $model->date; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'date',
		'userid',
		'serviceid',
		'amount',
	),
)); ?>
