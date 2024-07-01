<?php include('session.php'); ?>
<?php 
	if(isset($_SESSION['accounttype']) && $_SESSION['accounttype']=="Farmer"){
            header('location: index.php');
	}
?>
<?php
	require('server.php');
		if (isset($_POST['sub'])) {
				$samplingno = mysqli_real_escape_string($con, $_POST['samplingno']);
				$weight = mysqli_real_escape_string($con, $_POST['weight']);
				$width = mysqli_real_escape_string($con, $_POST['width']);
				$crabsex = mysqli_real_escape_string($con, $_POST['crabsex']);
				$crabtype = mysqli_real_escape_string($con, $_POST['crabtype']);
				$capdate = mysqli_real_escape_string($con, $_POST['capdate']);
				$weather = mysqli_real_escape_string($con, $_POST['weather']);
				$date = date("Y-m-d H:m:s");
				$farmname = mysqli_real_escape_string($con, $_POST['farmname']);
				$berried = mysqli_real_escape_string($con, $_POST['berried']);
				$price = mysqli_real_escape_string($con, $_POST['price']);
				$status = 1;


				$query = "INSERT INTO `farminfo` (samplingno, weight, width, crabsex, crabtype, capdate, weather, farmname, berried, price ) 
				VALUES ('$samplingno', '$weight', '$width', '$crabsex','$crabtype', '$capdate', '$weather', '$farmname', '$berried', '$price')";
				
				if ($results = mysqli_query($con, $query)) {
				    echo "<script>alert('New crab record created successfully');</script>";
				    header("Location: sampling.php");
				    exit;
				} else {
				    echo "<script>alert('nop');</script>";
				}		
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<title>Submit Sampling</title>
	<link rel="shortcut icon" href="img/team1.png" />
	<link href="css/s3.css" rel="stylesheet" />
	
	<script type="text/javascript" src="jsscript/jquery-3.3.1.min.js"> </script>

	<script>
			
			function getPrice(){
				var weigh = document.getElementById('weigh').value;
							
				var pric = Math.floor((weigh) / (1000)*750);
				document.getElementById('pric').value=pric;
			}
			$(document).ready(function() {
					
				$("#rimg").click(function() {
					location.href= 'sampling.php';
				
				});
			});
			
		</script>
</head>

<body >
	<div class="topnav" id="myTopnav">
		<div class="r">
			<img src="img/team.png" id="rimg"> MCrabIS
		</div>

		<a href="log-out.php"  id="out" style="color:white;">Sign out</a>
	  	<div class="dropdown">
			<button class="dropbtn" style="color: white;"><?php echo  $_SESSION['fname']; ?> <?php echo  $_SESSION['mname']; ?> <?php echo  $_SESSION['lname']; ?>

			</button>
			<div class="dropdown-content">
				<a href="farm.php">Dashboard</a>	
				<a href="samplinginfo.php">Sampling Record</a>	
				<a href="home.php">Generated Report</a>
			</div>
	  	</div> 
	</div>

	<div class="navbar2">		
	</div>
	 
	<div class="container">
		<div class="s1" style="background-color: #023312;">Mangrove Crabs Sampling Records</div>
			<form id="form1" method="POST" autocomplete="off" action="sampling.php">				
				<div class="input-group3">
					Address <span>:</span><input  id="brgy" type="text" name="farmname" value="<?php echo  $_SESSION['pondname']; ?>">
					Sampling Number <span>:</span><input type="text" name="samplingno" required>

					<br><br>

					Weight <span>:</span><input id="weigh" type="text" name="weight" onchange="getPrice();"  required>
					Price <span>:</span><input id="pric" type="text" name="price"  required readonly>

					<br><br>

					Width <span>:</span><input type="text" name="width"  required>	

					<br><br>			

					Crab type <span>:</span>
					<select name="crabtype" required>
						<option value="" readonly></option>
						<option value="Serrata">S. Serrata</option>
						<option value="Olivacea">S. Olivacea</option>
						<option value="Tranquevarica">S. Tranquevarica</option>
					</select>

					<br><br>
					Capture date <span>:</span> 
					<input id="capdate" type="date" name="capdate" required>

					<br><br>
					
					Weather <span>:</span> 
					<select name="weather" required>
						<option value="" readonly></option>
						<option value="Rainy">Rainy</option>
						<option value="Moderately_Rain">Moderately Rain</option>
						<option value="Dry">Dry</option>
					</select>

					<br><br>

					Sex <span>:</span>
						<input type="radio" name="crabsex" value="Male" required />Male
						<input type="radio" name="crabsex" value="Female" required />Female

					<br><br>

					Berried Crab? <span></span>
					<input type="radio" name="berried" value="TRUE" required />TRUE
					<input type="radio" name="berried" value="FALSE" required />FALSE	
				</div>
					
				<div class="btn">
					<center><input type="submit" value="Register" name="sub"></center>
				</div>
			</form>


			<div class="export">
				<center>
				 	<form method="post" action="samplinginfo.php">
						 <input type="submit" name="excel" id="excel" value="Export to Microsoft Excel" />
						 <input type="submit" name="word"  id="word" value="Export to Microsoft Word" />
					</form>
				</center>
			</div>


			<div class="footer">
				<p>IS FOR GROW OUT POPULATION MANAGEMENT OF MANGROVE CRABS</p>
			</div>
		</div>

	<br>
	<br>
</body>


</html>