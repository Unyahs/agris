<?php include('session.php')?>

<?php 
	if(isset($_SESSION['accounttype']) && $_SESSION['accounttype']=="Farmer"){
			header('location: index.php');
	}
?>

<?php 
require('server.php');

$output1 = '';
$output2 = '';
$output3 = '';
$output4 = '';
$output5 = '';
$output6 = '';
$output7 = '';
$output8 = '';
$output9 = '';
$output10 = '';
$query = '';
$hh='';
if (isset($_SESSION['username'])) {
	$bg = $_SESSION['pondname'];
	if (isset($_POST['search'])){
	
	
		$searchq = $_POST['search'];
	
		$query = mysqli_query($con, "SELECT * FROM farminfo WHERE farmname LIKE '%$searchq%' OR samplingno LIKE '%$searchq%' OR crabsex LIKE '%$searchq%' OR crabtype LIKE '%$searchq%' OR capdate LIKE '%$searchq%' OR weather LIKE '%$searchq%' OR berried LIKE '%$searchq%'");
		$count = mysqli_num_rows($query);


		if($count==1){
			$output = "No such data found...";
		}else {
			while($row=mysqli_fetch_array($query)){
				$hh = $row['samplingno'];
				$we = $row['weight'];
				$wi = $row['width'];
				$csex = $row['crabsex'];
				$ctype = $row['crabtype'];
				$capdat = $row['capdate'];
				$weather = $row['weather'];
				$farmn = $row['farmname'];
				$berried = $row['berried'];
				$price = $row['price'];
				
				$output1.= '<div id="hho">' . $hh . '</div>';
				$output2.= '<div id="hho">' . $we . '</div>';
				$output3.= '<div id="hho">' . $wi . '</div>';
				$output4.= '<div id="hho">' . $csex . '</div>';
				$output5.= '<div id="hho">' . $ctype . '</div>';
				$output6.= '<div id="hho">' . $capdat . '</div>';
				$output7.= '<div id="hho">' . $weather . '</div>';
				$output8.= '<div id="hho">' . $farmn . '</div>';
				$output9.= '<div id="hho">' . $berried . '</div>';
				$output10.= '<div id="hho">' . $price . '</div>';
			}
		}		
	}
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<title>Sampling Records</title>
	<link rel="shortcut icon" href="img/team1.png" />
	<link href="css/s6.css" rel="stylesheet" />
	
	<script type="text/javascript" src="jsscript/jquery-3.3.1.min.js"> </script>

	<script>
			
		$(document).ready(function() {
			$("#rimg").click(function() {
				location.href= 'samplinginfo.php';
			
			});
		});

	</script>
	
</head>

<body >
	<div class="topnav" id="myTopnav">
		<div class="r">
			<img src="img/team.png" id="rimg"> MCrabIS
		</div>
		<a href="home.php"  id="out" >Sign out</a>
		<div class="dropdown">
			<button class="dropbtn" style="color: white;"><?php echo  $_SESSION['fname']; ?> <?php echo  $_SESSION['mname']; ?> <?php echo  $_SESSION['lname']; ?>
			</button>
			<div class="dropdown-content">
				<a href="farm.php">Dashboard</a>	
				<a href="sampling.php">Add Sampling</a>	
				<a href="home.php">Generated Report</a>
			</div>
		  </div> 
	</div>
	<form method="POST" action="samplinginfo.php">
	
		<div class="container">
			<h1><center><div id="samplinginfo"> Sampling Information </div></center></h1>
			<hr id="hr1">
			<br>
				
			<div id="se" >
				<input type="text" name="search" placeholder="Search for sampling no." required>
				<input type="submit" value="Search">				
			</div>
			
			<div id="nod">
							
			</div>
			
			<div id="scl">
				<table class="table">
					<thead>
						<tr id="tr1">
							<th nowrap="nowrap" style="padding:15px"><strong>Sampling No</strong></th>
							<th nowrap="nowrap" style="padding:15px"><strong>Weight</strong></th>
							<th nowrap="nowrap" style="padding:15px"><strong>Width</strong></th>
							<th nowrap="nowrap" style="padding:15px"><strong>Crab sex</strong></th>
							<th nowrap="nowrap" style="padding:15px"><strong>Crab type</strong></th>
							<th nowrap="nowrap" style="padding:15px"><strong>Capture date</strong></th>
							<th nowrap="nowrap" style="padding:15px"><strong>Weather</strong></th>
							<th nowrap="nowrap" style="padding:15px"><strong>Farm name</strong></th>
							<th nowrap="nowrap" style="padding:15px"><strong>Berried Crabs</strong></th>
							<th nowrap="nowrap" style="padding:15px"><strong>Price</strong></th>
						</tr>
					</thead>
					<tr>
						<td nowrap="nowrap"><?php echo ("$output1");?></td>
						<td nowrap="nowrap"><?php echo ("$output2");?></td>
						<td nowrap="nowrap"><?php echo ("$output3");?></td>
						<td nowrap="nowrap"><?php echo ("$output4");?></td>
						<td nowrap="nowrap"><?php echo ("$output5");?></td>
						<td nowrap="nowrap"><?php echo ("$output6");?></td>
						<td nowrap="nowrap"><?php echo ("$output7");?></td>
						<td nowrap="nowrap"><?php echo ("$output8");?></td>
						<td nowrap="nowrap"><?php echo ("$output9");?></td>
						<td nowrap="nowrap"><?php echo ("$output10");?></td>
					</tr>      
				</table>

				<div class="err2" style="text-align:center;color:#808080;font-size:14px;padding-bottom:20px;">
					<?php 
					
					?>
				</div>
			</div>
			<br>		
		</div>		
	</form>
	
	
</body>

</html>