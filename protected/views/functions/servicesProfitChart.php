<script src="../scripts/Chart.js"></script>

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
<canvas id="chartContainer" height="450" width="500"></canvas>
<script>
	// TODO so much to do...
	var barChartData = {
		labels : <?php print json_encode($labels);?>,
		datasets : [
			<?php foreach($data as $item){
				print
			"{
				fillColor : ".current($colors).",
				strokeColor : ".current($colors).",
				data : ".json_encode($item)."
			},
			";
				next($colors);
			} ?>
		]
	};
	var myLine = new Chart(document.getElementById("chartContainer").getContext("2d")).Bar(barChartData);
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
		'style'=>'height:20px;background-color:white;color:gray;',
		'max'=>date('Y-m-d'),
	),
)); ?>
<!-- EndDate picker -->
<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
	'name'=>'dateEnd',
	'options'=>array(
		'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
	),
	'language' => 'ru',
	'htmlOptions'=>array(
		'style'=>'height:20px;background-color:white;color:gray;',
		'max'=>date('Y-m-d'),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'submit',
	'type'=>'primary',
	'label'=>'Раccчитать!',
)); ?>
<?php $this->endWidget(); ?>