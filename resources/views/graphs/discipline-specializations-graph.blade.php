

            <div id="dis_piechart3d"></div>
        
<script>
$(document).ready(function(){

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

var data = google.visualization.arrayToDataTable([
	['Task', 'Specializations'],
	<?php  foreach($disciplines as $discipline){
			if($discipline->branch_specializations->count()){
				?>
	['{!! $discipline->discipline!!}', {{$discipline->branch_specializations->count()}}],
	<?php }} ?>
]);

var options = {
title: 'Total Specializations - {{$branch_specializations->count()}}',
pieSliceText: 'value',
is3D:true
};


var chart = new google.visualization.PieChart(document.getElementById('dis_piechart3d'));

chart.draw(data, options);
}


});
</script>