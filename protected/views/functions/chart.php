<?php
$this->breadcrumbs=array(
	'Фукции'=>'#',
	'Задолженность',
);

$this->menu=array(
	array('label'=>'Задолженность','url'=>array('profit')),
); ?>
<script src="../scripts/Chart.js"></script>
<canvas id="canvas" height="450" width="500"></canvas>
<script>
	// TODO so much to do...
	var barChartData = {
		labels : ["January","February","March","April","May","June","July","August","September","October"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,1)",
				data : [<?php foreach($dataProvider as $data) if($data['name'] == 'Email') echo $data['profit']; ?>, 0]
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,1)",
				data : [<?php foreach($dataProvider as $data) if($data['name'] == 'Enthernet') echo $data['profit']; ?>, 0]
			}
		]
	}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);
</script>
<?php /*print_r($dataProvider);
foreach($dataProvider as $a) echo $a['name'].',';
echo date("Y-m-d");*/?>