<?php
$this->breadcrumbs=array(
	'Services'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Service','url'=>array('index')),
	array('label'=>'Create Service','url'=>array('create')),
	array('label'=>'Update Service','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Service','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Service','url'=>array('admin')),
);
?>

<h1>View Service #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'cost',
	),
)); ?>
