<?php
include("fchart.php");
?>
<html>
   <head>
      <!-- FusionCharts Library -->
      <script type="text/javascript" src="path/to/fusioncharts.js"></script>
   </head>
<body>
<?php
   $data = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/data/line-chart-with-time-axis-data.json');
   $schema = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/schema/line-chart-with-time-axis-schema.json');

   $fusionTable = new FusionTable($schema, $data);
   $timeSeries = new TimeSeries($fusionTable);

   $timeSeries->AddAttribute('chart', '{}');
   $timeSeries->AddAttribute('caption', '{"text":"Sales Analysis"}');
   $timeSeries->AddAttribute('subcaption', '{"text":"Grocery"}');
   $timeSeries->AddAttribute('yaxis', '[{"plot":{"value":"Grocery Sales Value"},"format":{"prefix":"$"},"title":"Sale Value"}]');


   // chart object
   $Chart = new FusionCharts(
      "timeseries",
      "MyFirstChart" ,
      "700",
      "450",
      "chart-container",
      "json",
      $timeSeries
   );

   // Render the chart
   $Chart->render();
?>

   <div id="chart-container">Chart will render here!</div>
</body>
</html>