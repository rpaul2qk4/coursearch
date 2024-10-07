

            <div id="user_piechart3d"></div>
        
<script>
$(document).ready(function(){

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

var data = google.visualization.arrayToDataTable([
	['Task', 'Users'],
	<?php foreach($roles as $role){ ?>
	['{!! $role->role !!}', {{$role->users->count()}}],
	<?php } ?>
]);

var options = {
title: 'Total Registered Users - {{$users->count()}}',
pieSliceText: 'value',
is3D:true
};

var user_chart = new google.visualization.PieChart(document.getElementById('user_piechart3d'));

user_chart.draw(data, options);
}

});
</script>