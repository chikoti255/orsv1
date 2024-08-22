
@extends('admin.admin')

@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('./css/analytics.css') }}" />
<script type="text/javascript" src="{{ asset('js/analytics.js') }}"></script>


    <div class="charts">
          <div class="row1">
                  <div class="pie-chart">
                        <div id="piechart_3d" style="width: 500px; height: 400px;"></div>
                  </div>

                  <div class="bar-chart">
                        <div id="columnchart_values" style="width: 800px; height: 400px;"></div>
                  </div>
          </div>

          <div class="row1">
                <div class="donut-chart">
                    <div id="donutchart" style="width: 500px; height: 400px;"></div>
                </div>
                <div class="bar-chart">
                </div>
          </div>

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



    var pie = {
      title: 'Memberships Counts',
      is3D: true,
    };

    var donut = {
          title: 'EACA Payments Fee Statistics',
          pieHole: 0.4,
        };



    var pieChart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    pieChart.draw(memberships, pie);

    var donutChart = new google.visualization.PieChart(document.getElementById('donutchart'));
        donutChart.draw(payments, donut);


}

</script>

@endsection
