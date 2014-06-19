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

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'dataProvider'=>$gridDataProvider,
	'template'=>"{items}",
	'columns'=>array(
		array('name'=>'id', 'header'=>'#'),
		array('name'=>'firstName', 'header'=>'First name'),
		array('name'=>'lastName', 'header'=>'Last name'),
		array('name'=>'language', 'header'=>'Language'),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>
