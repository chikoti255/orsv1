function fetchCountryCounts() {
  fetch('/attendee/analytics/get-countries')
    .then(response => response.json())
    .then(data => {
      if (data.length === 0) {
        console.warn('No data received');
        return; // Handle empty data case
      }

      const groupedData = data.reduce((acc, curr) => {
        acc[curr.country] = acc[curr.country] || 0;
        acc[curr.country] += parseInt(curr.count); // Ensure count is a number
        return acc;
      }, {});

      // Create the bar chart
      createBarChart(groupedData);
    })
    .catch(error => {
      console.error('Error fetching data:', error);
    });
}

function createBarChart(groupedData) {
  google.charts.load('current', { packages: ['corechart'] }).then(() => {
    var barChart = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));

    var chartData = Object.entries(groupedData).map(([country, count]) => [
      country,
      count,
      // Assign a color to each country
      country === 'China' ? '#b87333' :
      country === 'Ethiopia' ? '#C0C0C' :
      country === 'Kenya' ? '#FFD700' :
      // ... add more conditions for other countries
      '#000000' // Default color
    ]);

    var countrys = google.visualization.arrayToDataTable([
      ["Country", "Counts", { role: "style" }],
      ...chartData
    ]);

    var bar = {
      title: "Countries Statistics of EACA Attendees",
      width: 800,
      height: 400,
      bar: { groupWidth: "80%"},
      legend: { position: "none" },
      margin: {
          top: 20,
          right: 20,
          bottom: 20,
          left: 20
      }
    };

    var barGraphView = new google.visualization.DataView(countrys);
    barGraphView.setColumns([0, 1, { calc: "stringify", sourceColumn: 1, type: "string", role: "annotation" }]);

    barChart.draw(barGraphView, bar);
  });
}

fetchCountryCounts();
