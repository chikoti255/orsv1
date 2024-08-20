
@extends('admin.admin')

@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="{{ asset('js/analytics.js') }}"></script>


<div id="piechart_3d" style="width: 900px; height: 500px;"></div>

<script>

google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Memberships', 'Counts'],
    ['Eaca Members',     {{ $eacaCount }}],
    ['Non Eaca Members',      {{ $nonEacaCount }}],
    ['Students',  {{ $studentCount }}],
  ]);

  var options = {
    title: 'My Daily Activities',
    is3D: true,
  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
  chart.draw(data, options);
}

</script>

@endsection
