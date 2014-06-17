<?php
$this->breadcrumbs=array(
	'Traffics'=>array('index'),
	$model->date=>array('view','id'=>$model->date),
	'Update',
);

$this->menu=array(
	array('label'=>'List Traffic','url'=>array('index')),
	array('label'=>'Create Traffic','url'=>array('create')),
	array('label'=>'View Traffic','url'=>array('view','id'=>$model->date)),
	array('label'=>'Manage Traffic','url'=>array('admin')),
);
?>

<h1>Update Traffic <?php echo $model->date; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>