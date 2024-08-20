
@extends('admin.admin')

@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('./css/analytics.css') }}" />


<div class="charts">
      <div class="pie-chart">
            <div id="piechart_3d" style="width: 500px; height: 400px;"></div>
      </div>

      <div class="donut-chart">
          <div id="donutchart" style="width: 500px; height: 400px;"></div>
      </div>

</div>

    <div class="bar-chart">
        <div id="columnchart_values" style="width: 900px; height: 500px;"></div>
    </div>

<script>

google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var memberships = google.visualization.arrayToDataTable([
      ['Memberships', 'Counts'],
      ['Eaca Members',     {{ $eacaCount }}],
      ['Non Eaca Members',      {{ $nonEacaCount }}],
      ['Students',  {{ $studentCount }}],
    ]);

    var payments = google.visualization.arrayToDataTable([
      ['Payment', 'Counts'],
      ['Yes, I completed my Payment',     {{ $payed }}],
      ['No, I will pay on Arrival',      {{ $notPayed }}]
    ]);

    var countrys = google.visualization.arrayToDataTable([
        ["Country", "counts", { role: "style" } ],
        ["China", {{ $china }}, "#b87333"],
        ["Ehiopia", {{ $ethiopia }}, "#C0C0C"],
        ["Kenya", {{ $kenya }}, " #FFD700"],
        ["Rwanda", {{ $rwanda }}, "color: #e5e4e2"],
        ["Nigeria", {{ $nigeria }}, '#008080'],
        ["Norway", {{ $norway }}, '#332CD32'],
        ["South Africa", {{ $southAfrica }}, '#3FF0000'],
        ["Sweden", {{ $sweden }}, '#FFA500'],
        ["Tanzania", {{ $tanzania }}, '#800080'],
        ["Uganda", {{ $uganda }}, '#00FFFF'],
        ["United Kingdoms", {{ $uk }}, '#000080'],
        ["Netherlands", {{ $netherlands }}, '#FF69B4'],
      ]);

    var pie = {
      title: 'Memberships Counts',
      is3D: true,
    };

    var donut = {
          title: 'EACA Payments Fee Statistics',
          pieHole: 0.4,
        };

    var bar = {
      title: "Countries Statistics of EACA Attendees",
      width: 600,
      height: 400,
      bar: {groupWidth: "95%"},
      legend: { position: "none" },
    }

    var pieChart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    pieChart.draw(memberships, pie);

    var donutChart = new google.visualization.PieChart(document.getElementById('donutchart'));
        donutChart.draw(payments, donut);


    //for bar graph
    var barGraphView = new google.visualization.DataView(countrys);
      barGraphView.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

            var barChart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
             barChart.draw(barGraphView, bar);

}

</script>

@endsection
