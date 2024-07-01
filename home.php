<!-- CREATE CONNECTION -->
<?php 

  $username = "root";
  $password = "";
  $database = "agris";

  try {
    $pdo = new PDO("mysql:host=localhost;database=$database", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
  }

?>




<!-- HTML -->
<!DOCTYPE html>
<html>
<head> 
  <title>Mangrove Crab Analytics</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="shortcut icon" href="img/team1.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif};
  </style>
  <style type="text/css">
    .chartbox {
    display: inline-block;
    width: 98%;
    padding: 20px;
    margin: 10px;
    border: 2px ;
    border-style: solid;
  }
  </style>
  <style>
  body {
    background-image: url('img/img1.jpg');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }

  </style>
</head>

<body >
<!-- SQL QUERY -->
<?php 
  try{
    // QUERY DATA FOR MERLAN FARM YIELD FROM SAMPLING ANALYTICS
    $sql = "SELECT *, count(`samplingno`) AS `samplingno` FROM agris.farminfo WHERE `farmname` = 'Merlan Farm' GROUP BY `samplingno`";
    $result_merlan_yield = $pdo->query($sql);
    if($result_merlan_yield->rowCount() > 0) {

      $merlan_farm_yield = array();
      
      while($row = $result_merlan_yield->fetch()) {
        $merlan_farm_yield[] = $row["samplingno"];
      }    
    unset($result_merlan_yield);
    } 
    else {
      echo "No records matching your query were found.";
    }

    // QUERY DATA FOR DUALAN FARM YIELD FROM SAMPLING ANALYTICS
    $sql = "SELECT *, count(`samplingno`) AS `samplingno` FROM agris.farminfo WHERE `farmname` = 'Dualan Farm' GROUP BY `samplingno`";
    $result_dualan_yield = $pdo->query($sql);
    if($result_dualan_yield->rowCount() > 0) {

      $dualan_farm_yield = array();
      
      while($row = $result_dualan_yield->fetch()) {
        $dualan_farm_yield[] = $row["samplingno"];
      }    
    unset($result_dualan_yield);
    } 
    else {
      echo "No records matching your query were found.";
    }

    // QUERY DATA FOR DUALAN FARM YIELD FROM SAMPLING ANALYTICS
    $sql = "SELECT *, count(`samplingno`) AS `samplingno` FROM agris.farminfo WHERE `farmname` = 'Lansangan Farm' GROUP BY `samplingno`";
    $result_lansangan_yield = $pdo->query($sql);
    if($result_lansangan_yield->rowCount() > 0) {

      $lansangan_farm_yield = array();
      
      while($row = $result_lansangan_yield->fetch()) {
        $lansangan_farm_yield[] = $row["samplingno"];
      }    
    unset($result_lansangan_yield);
    } 
    else {
      echo "No records matching your query were found.";
    }

    // QUERY DATA FOR AVERAGE PRICE OF ALL CRABTYPE IN MERLAN FARM
    $sql = "SELECT ROUND(AVG(price)) FROM agris.farminfo WHERE `farmname` = 'Merlan Farm' GROUP BY `crabtype`";
    $result_aveprice_merlan = $pdo->query($sql);
    if($result_aveprice_merlan->rowCount() > 0) {
        
        $ave_price_merlan = array();

        while($row = $result_aveprice_merlan->fetch()) {
          $ave_price_merlan[] = $row["ROUND(AVG(price))"];
      }
    
    unset($result_aveprice_merlan);
    } else {
      echo "No records matching your query were found.";
    }

    // QUERY DATA FOR AVERAGE PRICE OF ALL CRABTYPE IN MERLAN FARM
    $sql = "SELECT ROUND(AVG(price)) FROM agris.farminfo WHERE `farmname` = 'Dualan Farm' GROUP BY `crabtype`";
    $result_aveprice_dualan = $pdo->query($sql);
    if($result_aveprice_dualan->rowCount() > 0) {
        
        $ave_price_dualan = array();

        while($row = $result_aveprice_dualan->fetch()) {
          $ave_price_dualan[] = $row["ROUND(AVG(price))"];
      }
    
    unset($result_aveprice_dualan);
    } else {
      echo "No records matching your query were found.";
    }

     // QUERY DATA FOR AVERAGE PRICE OF ALL CRABTYPE IN MERLAN FARM
    $sql = "SELECT ROUND(AVG(price)) FROM agris.farminfo WHERE `farmname` = 'Lansangan Farm' GROUP BY `crabtype`";
    $result_aveprice_lansangan = $pdo->query($sql);
    if($result_aveprice_lansangan->rowCount() > 0) {
  
        $ave_price_lansangan = array();

        while($row = $result_aveprice_lansangan->fetch()) {
          $ave_price_lansangan[] = $row["ROUND(AVG(price))"];
      }
    
    unset($result_aveprice_lansangan);
    } else {
      echo "No records matching your query were found.";
    }

  // QUERY DATA FOR MAX WEIGHT OF ALL CRABTYPE IN MERLAN FARM
  $sql = "SELECT *, MAX(`weight`) AS `weight` FROM agris.farminfo WHERE `farmname` = 'Merlan Farm'GROUP BY `crabtype`";
  $result_maxweight_merlan = $pdo->query($sql);
  if($result_maxweight_merlan->rowCount() > 0) {
      
      $max_weight_merlan = array();

      while($row = $result_maxweight_merlan->fetch()) {
        $max_weight_merlan[] = $row["weight"];
    }
  
  unset($result_maxweight_merlan);
  } else {
    echo "No records matching your query were found.";
  }

  // QUERY DATA FOR MAX WEIGHT OF ALL CRABTYPE IN DUALAN FARM
    $sql = "SELECT *, MAX(`weight`) AS `weight` FROM agris.farminfo WHERE `farmname` = 'Dualan Farm'GROUP BY `crabtype`";
    $result_maxweight_dualan = $pdo->query($sql);
    if($result_maxweight_dualan->rowCount() > 0) {
        
        $max_weight_dualan = array();

        while($row = $result_maxweight_dualan->fetch()) {
          $max_weight_dualan[] = $row["weight"];
      }
    
    unset($result_maxweight_dualan);
    } else {
      echo "No records matching your query were found.";
    }

  // QUERY DATA FOR MAX WEIGHT OF ALL CRABTYPE IN LANSANGAN FARM
    $sql = "SELECT *, MAX(`weight`) AS `weight` FROM agris.farminfo WHERE `farmname` = 'Lansangan Farm'GROUP BY `crabtype`";
    $result_maxweight_lansangan = $pdo->query($sql);
    if($result_maxweight_lansangan->rowCount() > 0) {
        
        $max_weight_lansangan = array();

        while($row = $result_maxweight_lansangan->fetch()) {
          $max_weight_lansangan[] = $row["weight"];
      }
    
    unset($result_maxweight_lansangan);
    } else {
      echo "No records matching your query were found.";
    }


  // QUERY DATA FOR NO. OF CRABS SERRATA CRABS CAPTURED DURING DRY, MODERATE RAIN, OR RAINY WEATHER
    $sql = "SELECT *, COUNT(*) AS `count` FROM agris.farminfo WHERE `crabtype` = 'serrata' GROUP BY `weather` ";
    $result_serrata_weather = $pdo->query($sql);
    if($result_serrata_weather->rowCount() > 0) {
        
        $serrata_crabs_weather = array();

        while($row = $result_serrata_weather->fetch()) {
          $serrata_crabs_weather[] = $row["count"];
      }
    
    unset($result_maxweight_lansangan);
    } else {
      echo "No records matching your query were found.";
    }

    // QUERY DATA FOR NO. OF CRABS OLIVACEA CRABS CAPTURED DURING DRY, MODERATE RAIN, OR RAINY WEATHER
    $sql = "SELECT *, COUNT(*) AS `count` FROM agris.farminfo WHERE `crabtype` = 'olivacea' GROUP BY `weather` ";
    $result_olivacea_weather = $pdo->query($sql);
    if($result_olivacea_weather->rowCount() > 0) {
        
        $olivacea_crabs_weather = array();

        while($row = $result_olivacea_weather->fetch()) {
          $olivacea_crabs_weather[] = $row["count"];
      }
    
    unset($result_maxweight_lansangan);
    } else {
      echo "No records matching your query were found.";
    }

     // QUERY DATA FOR NO. OF CRABS LANSANGAN CRABS CAPTURED DURING DRY, MODERATE RAIN, OR RAINY WEATHER
    $sql = "SELECT *, COUNT(*) AS `count` FROM agris.farminfo WHERE `crabtype` = 'tranquebarica' GROUP BY `weather` ";
    $result_tranquebarica_weather = $pdo->query($sql);
    if($result_tranquebarica_weather->rowCount() > 0) {
        
        $tranquebarica_crabs_weather = array();

        while($row = $result_tranquebarica_weather->fetch()) {
          $tranquebarica_crabs_weather[] = $row["count"];
      }
    
    unset($result_maxweight_lansangan);
    } else {
      echo "No records matching your query were found.";
    }

     //QUERY DATA FOR NO. OF MALE AND FEMALE SERRATA CRABS
    $sql = "SELECT *, COUNT(*) AS `sex` FROM agris.farminfo WHERE `crabtype` = 'serrata' GROUP BY `crabsex` ";
    $result_crabsex_serrata = $pdo->query($sql);
    if($result_crabsex_serrata->rowCount() > 0) {
        
        $serrata_crabs_sex = array();

        while($row = $result_crabsex_serrata->fetch()) {
          $serrata_crabs_sex [] = $row["sex"];
      }
    
    unset($result_crabsex_serrata);
    } else {
      echo "No records matching your query were found.";
    }

    //QUERY DATA FOR NO. OF MALE AND FEMALE OLIVACEA CRABS
    $sql = "SELECT *, COUNT(*) AS `sex` FROM agris.farminfo WHERE `crabtype` = 'olivacea' GROUP BY `crabsex` ";
    $result_crabsex_olivacea = $pdo->query($sql);
    if($result_crabsex_olivacea->rowCount() > 0) {
        
        $olivacea_crabs_sex = array();

        while($row = $result_crabsex_olivacea->fetch()) {
          $olivacea_crabs_sex [] = $row["sex"];
      }
    
    unset($result_crabsex_olivacea);
    } else {
      echo "No records matching your query were found.";
    }

    //QUERY DATA FOR NO. OF MALE AND FEMALE OLIVACEA CRABS
    $sql = "SELECT *, COUNT(*) AS `sex` FROM agris.farminfo WHERE `crabtype` = 'tranquebarica' GROUP BY `crabsex` ";
    $result_crabsex_tranquebarica = $pdo->query($sql);
    if($result_crabsex_tranquebarica->rowCount() > 0) {
        
        $tranquebarica_crabs_sex = array();

        while($row = $result_crabsex_tranquebarica->fetch()) {
          $tranquebarica_crabs_sex [] = $row["sex"];
      }
    
    unset($result_crabsex_tranquebarica);
    } else {
      echo "No records matching your query were found.";
    }
  }


  catch(PDOException $e){
    die("Erro: Could not able to execute $sql." . $e->getMessage());
  }
?>


  <!-- Sidebar/menu -->
  <div class="w3-bar w3-top w3-large"style="display:none;z-index:4;" id="mySidebar">

    <div class="w3-sidebar w3-collapse w3-white w3-animate-left" style="display:none;z-index:3;width:300px;"><br>

      <div class="w3-container w3-row">
        <div class="w3-col s4">
        </div>

        <div class="w3-col s8 w3-bar">
          <span>Welcome <strong style="color:#023312;">User</strong></span><br>
        </div>
      </div>

      <hr>

      <div class="w3-container">
        <h5>Dashboard</h5>
      </div>

      <div class="w3-bar-block">
        <a href="lp.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw" ></i></i>&nbsp;&nbsp;&nbsp;Home</a>      
        <a href="farm.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>&nbsp;&nbsp;&nbsp;Dashboard</a>
        <a href="samplinginfo.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>&nbsp;&nbsp;&nbsp;Sampling</a>
        <a href=https://roshvperea.ap.qlikcloud.com/single/?appid=fb3482ec-09d8-4647-9042-39ce56133ccb&sheet=4e98c0e4-da25-420c-9650-6a8e6aa35658&opt=ctxmenu,currsel&identity=preview" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>&nbsp;&nbsp;&nbsp;Overall Analytics</a>   
      </div>
    </div>
  </div>


  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"  id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" >

    <!-- Top container -->
    <div class="w3-bar w3-large" style="z-index:4; background-color: rgb(2, 51, 19);">
      <button class="w3-bar-item w3-button w3-hover-none w3-hover-text-light-grey" style="color: white;" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
      <span class="w3-bar-item w3-right" style="color: white;"><img src="img/team.png" style="margin: -1px 7px; height:23px; float:left; margin-top: 2px;"> MCrabIS</span>
    </div>

    <div class="container" >
      <h2 style="color: white;">Mudcrab Analytics</h2>

      <div class="panel-group" id="accordion" >

        <div class="panel panel-default"  >
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"> Mud Crab Analytic Charts </a>
            </h4>
          </div>

          <div id="collapse1" class="panel-collapse collapse in" >
            <!-- DIV FOR MERLAN FARM YIELD ANALYTICS -->
            <div class="chartbox">
              FARM YIELDS
              <canvas id="farmyieldschart"></canvas>
            </div>

            <!-- DIV FOR MAX WEIGHT OF ALL FARM ANALYTICS -->
            <div class="chartbox">
              MAX WEIGHT OF CRABS
              <canvas id="maxweightchart"></canvas>
            </div>

            <!-- DIV FOR AVERAGE PRICE OF ALL FARM ANALYTICS -->
            <div class="chartbox">
              AVERAGE PRICE OF CRABS PER FARM
              <canvas id="avepricechart"></canvas>
            </div>

            <!-- DIV FOR AVERAGE PRICE OF ALL FARM ANALYTICS -->
            <div class="chartbox">
              NO. OF CRABS CAPTURED DURING DIFFERENT WEATHER CONDITIONS
              <canvas id="crabsweatherchart"></canvas>
            </div>

            <!-- DIV FOR NO. OF MALE AND FEMALE CRABS ANALYTICS -->
            <div class="chartbox">
              NO. OF MALE AND FEMALE CRABS
              <canvas id="crabssexchart"></canvas>
            </div>
          </div>

        </div>
        
        <br>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">About McrabIS</a>
            </h4>
          
          </div>
        
          <div id="collapse2" class="panel-collapse collapse in"  >
            <div id="chart_div" class="panel-body" style="width: 100%; height: 100%;">         

              <h1 class="w3-center">Mangrove Crab Information System</h1><br>
              <h5 class="w3-center">Monitoring Agency</h5>
              <p class="w3-large w3-center">McrabIS is a developed information system intended to provide reliable and efficient communication and interaction stages between different stakeholders of a market like the mangrove crab monitoring agencies, farmers, traders, and local government officials. The system can provide overall analytical reports from the data sets collected such as mangrove crab statistical data, sampling monitoring, a frequency distribution of male and female crabs with mud crab type, and histogram </p>
              <p class="w3-large w3-text-grey w3-hide-medium">Current mangrove crab farming industry/business may encourage to join here for future data observation that could help to increase profitable business as well as to enhance marketing strategies using this information system for the potential buyers/consumers .</p>

            </div>
          </div>
        </div>

        <br>
      
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Contact Us</a>
              </h4>
          </div>
          

          <div id="collapse3" class="panel-collapse collapse in">
            <div id="chart_div" class="panel-body" style="width: 1000px; height: 100%;">
              <p class="w3-large">ROSSIAN V. PEREA, PHILIPPINES </p>
              <p class="w3-large w3-text-grey w3-hide-medium">Email: perearossian@mcrabis.com.ph .</p>
              <p class="w3-large w3-text-grey w3-hide-medium">Phone: (046) 507.01.09 .</p>
              <p class="w3-large w3-text-grey w3-hide-medium">Mobile: +63.978.456.7890 .</p>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  // Toggle between showing and hiding the sidebar, and add overlay effect
  function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
  }

  // Close the sidebar with the close button
  function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
  }
  </script>
  <!-- DATA VISUALIZATION FOR GROWTH ANALYTIS PER BATCH OF EACH FARM -->

<script>
  const $merlan_farm_yield = <?php echo json_encode($merlan_farm_yield); ?>;
  const $dualan_farm_yield = <?php echo json_encode($dualan_farm_yield); ?>;
  const $lansangan_farm_yield = <?php echo json_encode($lansangan_farm_yield); ?>;
    const data_farmsyield = {
      labels: ['1', '2', '3', '4', '5'],
      datasets: [{
        label: 'Merlan Farm Yield per Batch(Sampling)',
        data: $merlan_farm_yield,
        backgroundColor: 'red',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }, {
        label: 'Dualan Farm Yield per Batch(Sampling)',
        data: $dualan_farm_yield,
        backgroundColor: 'green',
        borderColor: 'rgba(255, 206, 86, 1)',
        borderWidth: 1
      }, {
        label: 'Lansangan Farm Yield per Batch(Sampling)',
        data: $lansangan_farm_yield,
        backgroundColor: 'blue',
        borderColor: 'rgba(153, 102, 255, 1)',
        borderWidth: 1
      }]
    };
  
  // Config Block
  const config = {
      type: 'line',
      data: data_farmsyield,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };
  
  // Render Block
  const farmyieldschart = new Chart(
      document.getElementById('farmyieldschart'),
      config
    ); 


  //AVERAGE PRICE FOR ALL FARM ANALYTIC
  // Setup Block
  const $ave_price_merlan = <?php echo json_encode($ave_price_merlan); ?>;
  const $ave_price_dualan = <?php echo json_encode($ave_price_dualan); ?>;
  const $ave_price_lansangan = <?php echo json_encode($ave_price_lansangan); ?>;
    const data_aveprice = {
      labels: ['Olivacea', 'Serrata', 'Tranquebarica'],
      datasets: [{
        label: 'Merlan Farm',
        data: $ave_price_merlan,
        backgroundColor: 'red',
        borderColor: 'rgb(255, 99, 132)',
        borderWidth: 1
      }, {
        label: 'Dualan Farm',
        data: $ave_price_dualan,
        backgroundColor: 'green',
        borderColor: 'rgb(75, 192, 192))',
        borderWidth: 1
      }, {
        label: 'Lansangan Farm',
        data: $ave_price_lansangan,
        backgroundColor: 'blue',
        borderColor: 'rgb(54, 162, 235))',
        borderWidth: 1
      }]
    };
  
  // Config Block
  const config_aveprice = {
      type: 'line',
      data: data_aveprice,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };
  
  // Render Block
  const avepricechart = new Chart(
      document.getElementById('avepricechart'),
      config_aveprice
    ); 

  //MAX WEIGHT FOR ALL FARM ANALYTIC
  // Setup Block
  const $max_weight_merlan = <?php echo json_encode($max_weight_merlan); ?>;
  const $max_weight_dualan = <?php echo json_encode($max_weight_dualan); ?>;
  const $max_weight_lansangan = <?php echo json_encode($max_weight_lansangan); ?>;
    const data_maxweight = {
      labels: ['Olivacea', 'Serrata', 'Tranquebarica'],
      datasets: [{
        label: 'Merlan Farm',
        data: $max_weight_merlan,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgb(255, 99, 132)',
        borderWidth: 1
      }, {
        label: 'Dualan Farm',
        data: $max_weight_dualan,
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgb(75, 192, 192))',
        borderWidth: 1
      }, {
        label: 'Lansangan Farm',
        data: $max_weight_lansangan,
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgb(54, 162, 235))',
        borderWidth: 1
      }]
    };
  
  // Config Block
  const config_maxweight = {
      type: 'bar',
      data: data_maxweight,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };
  
  // Render Block
  const maxweightchart = new Chart(
      document.getElementById('maxweightchart'),
      config_maxweight
    ); 

  
  //NO. OF CRABS CAPTURED DURING DIFFERENT WEATHERS ANALYTIC
  // Setup Block
  const $serrata_crabs_weather = <?php echo json_encode($serrata_crabs_weather); ?>;
  const $olivacea_crabs_weather  = <?php echo json_encode($olivacea_crabs_weather ); ?>;
  const $tranquebarica_crabs_weather = <?php echo json_encode($tranquebarica_crabs_weather); ?>;
    const data_crab_weather = {
      labels: ['Dry', 'Moderate Rain', 'Rainy'],
      datasets: [{
        label: 'Serrata Crabs',
        data: $serrata_crabs_weather,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgb(255, 99, 132)',
        borderWidth: 1
      }, {
        label: 'Olivacea Crabs',
        data: $olivacea_crabs_weather ,
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgb(75, 192, 192))',
        borderWidth: 1
      }, {
        label: 'Tranquebarica Farm',
        data: $tranquebarica_crabs_weather,
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgb(54, 162, 235))',
        borderWidth: 1
      }]
    };
  
  // Config Block
  const config_weather = {
      type: 'bar',
      data: data_crab_weather,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };
  
  // Render Block
  const crabsweatherchart = new Chart(
      document.getElementById('crabsweatherchart'),
      config_weather
    ); 

  //NO. OF MALE AND FEMALE CRABS ANALYTIC
  // Setup Block
  const $serrata_crabs_sex = <?php echo json_encode($serrata_crabs_sex); ?>;
  const $olivacea_crabs_sex  = <?php echo json_encode($olivacea_crabs_sex ); ?>;
  const $tranquebarica_crabs_sex= <?php echo json_encode($tranquebarica_crabs_sex); ?>;
    const data_crab_sex = {
      labels: ['Female', 'Male'],
      datasets: [{
        label: 'Serrata Crabs',
        data: $serrata_crabs_sex,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgb(255, 99, 132)',
        borderWidth: 1
      }, {
        label: 'Olivacea Crabs',
        data: $olivacea_crabs_sex ,
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgb(75, 192, 192))',
        borderWidth: 1
      }, {
        label: 'Tranquebarica Farm',
        data: $tranquebarica_crabs_sex,
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgb(54, 162, 235))',
        borderWidth: 1
      }]
    };
  
  // Config Block
  const config_sex = {
      type: 'bar',
      data: data_crab_sex,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    };
  
  // Render Block
  const crabssexchart = new Chart(
      document.getElementById('crabssexchart'),
      config_sex
    ); 
</script>


</body>
</html>

