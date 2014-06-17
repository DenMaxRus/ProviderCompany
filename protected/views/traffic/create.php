<?php
$this->breadcrumbs=array(
	'Traffics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Traffic','url'=>array('index')),
	array('label'=>'Manage Traffic','url'=>array('admin')),
);
?>

<h1>Create Traffic</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>