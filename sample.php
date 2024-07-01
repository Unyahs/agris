<?php
$opened='';
$closed1='';
$connection = mysqli_connect('localhost', 'root', '', 'agris');
$result = mysqli_query($connection, "SELECT * FROM farminfo");     

   
//if($result){
//    echo "CONNECTED";
//}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                [ 'crabtype', 'weight'],

                <?php
               

                    if(mysqli_num_rows($result)> 0){

                        while($row = mysqli_fetch_array($result)){

                            echo "[ '".$row['crabtype']."', ['".$row['weight']."']],";

                        }


                    }



                ?>

            ]);
            var options = {
                chart: {
                    title: 'Mud crab sex and type',
                    
                    width: 5000,
                    height: 500
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

</head>
<body>

<div id="columnchart_material"></div>


</body>
</html>
