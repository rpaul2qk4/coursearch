

            <div id="university_piechart3d"></div>
        
<script>
$(document).ready(function(){

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

var data = google.visualization.arrayToDataTable([
	['Task', 'Universities'],
	<?php foreach($countries as $country){
			if($country->universities->count()){ ?>
				['{{$country->country}}', {{$country->universities->count()}}],
	<?php }} ?>
]);

var options = {
title: 'Total Universities',
pieSliceText: 'value',
is3D:true
};


var chart = new google.visualization.PieChart(document.getElementById('university_piechart3d'));

chart.draw(data, options);
}


});
</script>