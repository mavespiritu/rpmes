<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="./API/javascript/jsapi.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawPie);
      google.setOnLoadCallback(drawPie2);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawPie2() {

        // Create the data table.
      var data = google.visualization.arrayToDataTable([
         ['Quarter', 'Value'],
         ['Quarter 1',  201],
         ['Quarter 2',  78],
         ['Quarter 3',  133],
         ['Quarter 4',  225]
      ]);


        // Set chart options
        var options = {'title':'Summary per Quarter',
                       'width':500,
                       'height':400};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
      function drawPie() {

        // Create the data table.
      var data = google.visualization.arrayToDataTable([
         ['Quarter', 'Value'],
         ['Quarter 1',  201],
         ['Quarter 2',  78],
         ['Quarter 3',  133],
         ['Quarter 4',  225]
      ]);


        // Set chart options
        var options = {'title':'Summary per Quarter',
                       'width':500,
                       'height':400};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
    <div id="chart_div2"></div>
    
    
    
    
   
<table class="tg accReport table">
    <thead>
  <tr>
    <th class="tg-amwm" rowspan="3">(a) Name of Project and its Components<br>(b) Funding Source<br>(c) Project Schedule</th>
    <th class="tg-031e" rowspan="3">Output Indicator</th>
    <th class="tg-031e" colspan="6">Financial Status (in PhP M)</th>
    <th class="tg-031e" colspan="4">Physical Accomplishment (%)</th>
    <th class="tg-yw4l" rowspan="3">Employment Generated</th>
  </tr>
  <tr>
    <td class="tg-amwm">Allocation</td>
    <td class="tg-amwm">Obligations</td>
    <td class="tg-amwm">Releases</td>
    <td class="tg-amwm">Expenditures</td>
    <td class="tg-amwm" rowspan="2">Funding Support (%)</td>
    <td class="tg-amwm" rowspan="2">Fund Utilization (%)</td>
    <td class="tg-amwm" rowspan="2">Target to Date</td>
    <td class="tg-amwm" rowspan="2">Actual Accomplishment to date</td>
    <td class="tg-amwm" rowspan="2">Slippage</td>
    <td class="tg-amwm" rowspan="2">Accomplishment</td>
  </tr>
  
  
  <tr>
    <td class="tg-amwm">As of Reporting Period</td>
    <td class="tg-amwm">As of Reporting Period</td>
    <td class="tg-amwm">As of Reporting Period</td>
    <td class="tg-amwm">As of Reporting Period</td>
  </tr>
  
  
  </thead>
  <tbody>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
  </tr>
  </tbody>
</table>
  </body>
</html>