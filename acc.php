<?php include('session.php')?>
<?php 
	if(isset($_SESSION['accounttype']) && $_SESSION['accounttype']=="Farmers"){
            header('location: index.php');
	}
?>
<?php
	require('server.php');
	$id= "";
	$accttype="";
	$location="";
	$username="";
	$password="";
	$lname="";
	$fname="";
	$mname="";	
	$age="";
	$sex="";
	$educattain="";
	$pondarea="";
	$unit="";
	$pondname="";
	$totstock="";
	$output = '';
	
		$query = mysqli_query($con,"SELECT * FROM `tblaccounts`");
		$count = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<title>Mangrove Crab Farmers Association</title>
	<link rel="shortcut icon" href="img/team.ico" />
	<link href="css/s10.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/bootstrap.css" />
	
</head>

<body style="background-color:#5FF5F5;">
	<div class="topnav">
		<div class="r">
			<img src="img/bgweb.png" id="rimg"> Admin
		</div>
		<a href="index.php"  id="out" >Sign out</a>
		 
	</div>
	
	<div class="topnav2" >
			<div class="name">
					<span id="n"><strong><?php echo  $_SESSION['fname']; ?> <?php echo  $_SESSION['mname']; ?> <?php echo  $_SESSION['lname']; ?></strong></span>
					<br>
					Monitoring Agency: <?php echo  $_SESSION['username']; ?>
					<br>
					Admin
			</div>
	</div>
		

				<div class="menu" >
				
				<div class="menu2">
					<a  href="admin.php"  >File</a>
					<a class="active" href="acc.php" >Manage Account</a>
				</div>
					
				</div>
				
				<div class="add">
					
					<div class="add2">
						<a  href="addaccount.php"  >Create New Account</a> <br>
					</div>
					
				</div>
				
						<div class="scl">
							<table class="table">
							<thead>
									<tr class="trhead">
										<td nowrap="nowrap" id="tr2"><strong>Account Type</strong></td>
										<td nowrap="nowrap" id="tr2"><strong>Location</strong></td>
										<td nowrap="nowrap" id="tr2"><strong>Username</strong></td>
										<td nowrap="nowrap" id="tr2"><strong>Password</strong></td>
										<td nowrap="nowrap" id="tr2"><strong>Last Name</strong></td>
										<td nowrap="nowrap" id="tr2"><strong>First Name</strong></td>
										<td nowrap="nowrap" id="tr2"><strong>Middle Name</strong></td>										
										<td nowrap="nowrap" id="tr2"><strong>Age</strong></td>
										<td nowrap="nowrap" id="tr2"><strong>Sex</td>
										<td nowrap="nowrap" id="tr2"><strong>Educational Attainment</td>
										<td nowrap="nowrap" id="tr2"><strong>Pond Area</td>
										<td nowrap="nowrap" id="tr2"><strong>Unit</td>
										<td nowrap="nowrap" id="tr2"><strong>Pond Name</td>
										<td nowrap="nowrap" id="tr2"><strong>Total Stocks</td>
									</tr>
							</thead>
							<tbody>
							<?php while($row = mysqli_fetch_array($query)):?>
							<tr>								
								<td nowrap="nowrap"><?php echo $row['accounttype'];?></td>
								<td nowrap="nowrap"><?php echo $row['location'];?></td>
								<td nowrap="nowrap"><?php echo $row['username'];?></td>
								<td nowrap="nowrap"><?php echo MD5($row['password']);?></td>
								<td nowrap="nowrap"><?php echo $row['lname'];?></td>
								<td nowrap="nowrap"><?php echo $row['fname'];?></td>
								<td nowrap="nowrap"><?php echo $row['mname'];?></td>								
								<td nowrap="nowrap"><?php echo $row['age'];?></td>
								<td nowrap="nowrap"><?php echo $row['sex'];?></td>
								<td nowrap="nowrap"><?php echo $row['educattain'];?></td>
								<td nowrap="nowrap"><?php echo $row['pondarea'];?></td>
								<td nowrap="nowrap"><?php echo $row['unit'];?></td>
								<td nowrap="nowrap"><?php echo $row['pondname'];?></td>
								<td nowrap="nowrap"><?php echo $row['totstock'];?></td>
					
								<td nowrap="nowrap" ><a href="updateaccount.php?accountid=<?php echo $row['accountid'];?>" class="abt" ><img src="img/edit.png" ></a>  <a href="delete3.php?accountid=<?php echo $row['accountid'];?>" class="abt" onClick="return confirm('Are you sure you want to Delete this data?')"><img src="img/trash.png"></a></td>
							</tr>
							<?php endwhile;?>
							</tbody>
							</table>	
						</div>
	
		<div id="footer">
			IS FOR GROW OUT POPULATION MANAGEMENT OF MANGROVE CRABS 
		</div>

</body>


</html>