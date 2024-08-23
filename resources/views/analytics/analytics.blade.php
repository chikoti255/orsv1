
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

              <div class="row2">
                        <div class="donut-chart">
                            <div id="donutchart" style="width: 500px; height: 400px;"></div>
                        </div>
                        <div class="row-chart">
                                <div id="barchart_values" style="width: 900px; height: 300px;"></div>
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

    /*var attendeeCounts = google.visualization.arrayToDataTable([
        ["Status", "Number", { role: "style" } ],
        ["Registered Attendee", {{ $registeredAttendees }}, "#b87333"],
        ["Checked In Attendee", {{ $checkedInAttendees }}, "silver"],
      ]); */



    var pie = {
      title: 'Memberships Counts',
      is3D: true,
    };

    var donut = {
          title: 'EACA Payments Fee Statistics',
          pieHole: 0.4,
        };

        /*var columnView = new google.visualization.DataView(attendeeCounts);
            view.setColumns([0, 1,
                             { calc: "stringify",
                               sourceColumn: 1,
                               type: "string",
                               role: "annotation" },
                             2]);

                             var columnOptions = {
                               title: "Registered vs CheckeId",
                               width: 600,
                               height: 400,
                               bar: {groupWidth: "85%"},
                               legend: { position: "none" },
                             };
                             var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
                             chart.draw(columnView, columnOptions); */

    var pieChart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    pieChart.draw(memberships, pie);

    var donutChart = new google.visualization.PieChart(document.getElementById('donutchart'));
        donutChart.draw(payments, donut);


}

</script>

@endsection
