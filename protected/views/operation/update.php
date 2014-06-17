<?php
$this->breadcrumbs=array(
	'Operations'=>array('index'),
	$model->date=>array('view','id'=>$model->date),
	'Update',
);

$this->menu=array(
	array('label'=>'List Operation','url'=>array('index')),
	array('label'=>'Create Operation','url'=>array('create')),
	array('label'=>'View Operation','url'=>array('view','id'=>$model->date)),
	array('label'=>'Manage Operation','url'=>array('admin')),
);
?>

<h1>Update Operation <?php echo $model->date; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>