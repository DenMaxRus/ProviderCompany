<?php
$this->breadcrumbs=array(
	'Traffics',
);

$this->menu=array(
	array('label'=>'Create Traffic','url'=>array('create')),
	array('label'=>'Manage Traffic','url'=>array('admin')),
);
?>

<h1>Traffics</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
