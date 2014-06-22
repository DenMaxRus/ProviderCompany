<script>
	$(function() {
		$( "#anim" ).change(function() {
			$( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
		});
	});
</script>
<?php
$this->breadcrumbs=array(
	'Фукции'=>'#',
	'График выручки',
);

$this->menu=array(
	array('label'=>'Выручка по услугам','url'=>array('serviceProfit')),
);
?>
<!-- Chart -->
<script src="../scripts/Chart.js"></script>
<canvas id="canvas" height="450" width="500"></canvas>
<script>
	// TODO so much to do...
	var barChartData = {
		labels : <?php print json_encode($labels);?>,/*["January","February","March","April","May","June","July","August","September","October"],*/
		datasets : [
			<?php foreach($data as $item) print
			"{
				fillColor : \"rgba(220,220,220,0.5)\",
				strokeColor : \"rgba(220,220,220,1)\",
				data : ".json_encode($item)."
			},
			"; ?>
		]
	}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);
</script>
<!-- Interval DatePickers -->
<!-- StartDate picker -->
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
	'name'=>'dateStart',
	// additional javascript options for the date picker plugin
	'options'=>array(
		'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
	),
	'language' => 'ru',
	'htmlOptions'=>array(
		'style'=>'height:20px;background-color:green;color:white;',
	),
)); ?>
<!-- EndDate picker -->
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
	'name'=>'dateEnd',
	// additional javascript options for the date picker plugin
	'options'=>array(
		'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
	),
	'language' => 'ru',
	'htmlOptions'=>array(
		'style'=>'height:20px;background-color:green;color:white;',
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'submit',
	'type'=>'primary',
	'label'=>'Расчитать!'
)); ?>
<?php $this->endWidget(); ?>

<pre><?php //print_r($labels); print '</br>'; print_r($data); ?></pre>
<?php/*foreach($dataProvider as $a) echo $a['name'].',';*/
echo date("Y-m-d");?>
<?php reset($data); json_encode(current($data))//echo phpinfo(32); ?>