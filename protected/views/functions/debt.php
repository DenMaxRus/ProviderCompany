<?php
$this->breadcrumbs=array(
	'Фукции'=>'#',
	'Задолженность',
);

$this->menu=array(
	array('label'=>'List User','url'=>array('index')),
	array('label'=>'Create User','url'=>array('create')),
); ?>

<h1><?php echo $title; ?></h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'debtors-grid',
	'dataProvider'=>$gridDataProvider,
	'type'=>'bordered condensed',
	'columns'=>array(
		array('name'=>'id','header'=>'#'),
		array('name'=>'lastname','header'=>'Фамилия'),
		array('name'=>'account','header'=>'Долг'),
	),
)); ?>