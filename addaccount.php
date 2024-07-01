<?php 
session_start();
if(isset($_SESSION['accounttype']) && $_SESSION['accounttype']=="Farmers"){
        header('location: index.php');
}
?>
<?php
require('server.php');
			$error ="";
if (isset($_POST['add'])) {
			
			$accounttype = mysqli_real_escape_string($con, $_POST['acctype']);
			$username = mysqli_real_escape_string($con, $_POST['username']);
			$password = mysqli_real_escape_string($con, $_POST['password']);
			$password2 = mysqli_real_escape_string($con, $_POST['password2']);
			$lname = mysqli_real_escape_string($con, $_POST['lname']);
			$fname = mysqli_real_escape_string($con, $_POST['fname']);
			$mname = mysqli_real_escape_string($con, $_POST['mname']);
			$location = mysqli_real_escape_string($con, $_POST['location']);
			$age = mysqli_real_escape_string($con, $_POST['age']);
			$sex = mysqli_real_escape_string($con, $_POST['sex']);
			$educattain = mysqli_real_escape_string($con, $_POST['educattain']);
			$pondarea = mysqli_real_escape_string($con, $_POST['pondarea']);
			$unit = mysqli_real_escape_string($con, $_POST['unit']);
			$pondname = mysqli_real_escape_string($con, $_POST['pondname']);
			$totstock = mysqli_real_escape_string($con, $_POST['totstock']);
			
			$slquery = "SELECT 1 FROM tblaccounts WHERE username = '$username'";
			$selectresult = mysqli_query($con,$slquery);
			if(mysqli_num_rows($selectresult)>0)
			{
				 $error = 'Username already exists.';
					header("refresh:1.2");
			}elseif ($password != $password2) {
				 $error = 'Password does not match.';
				 header("refresh:1.2");
			}else {
				$query = "INSERT INTO tblaccounts (accounttype, username, password, lname , fname, mname, location, age, sex, educattain, pondarea, unit, pondname, totstock) 
						
				VALUES ('$accounttype', '$username', '$password', '$lname','$fname','$mname','$location','$age','$sex','$educattain','$pondarea', '$unit', '$pondname', '$totstock')";
					
				$results = mysqli_query($con, $query);
				header("Location: acc.php");
				exit;
			}
		}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Account</title>
	<link rel="shortcut icon" href="img/team1.png" />
	<link href="css/s8.css" rel="stylesheet">
</head>

<script type="text/javascript" src="jsscript/jquery-3.3.1.min.js"> </script>

<script>	
	$(document).ready(function() {
		
		$("#rimg").click(function() {
			location.href= 'acc.php';
		
		});
	});
</script>


<body>
	<div class="topnav" id="myTopnav">
		<div class="r">	
			<img src="img/team.png" id="rimg" style="padding-right: 5px;"> Account Creation
			<div class="right" style="color:white;margin-right:24px;">Mcrab IS </div>
		</div>
	</div>

	<div class="container">
	<div class="title"><center><h2>Create New Account</h2></center></div>
		<form  method="post" autocomplete="off" action="addaccount.php">

			<div class="input-group"><span id="er"><?php echo ("$error");?><span></div>

			<div class="input-group2">
				<div class="sb">Account Type</div>
			</div>

			<div class="input-group3">
				<select name="acctype" required>
					<option value="" readonly></option>
					<option value="Admin">Admin</option>
					<option value="Farmers">Farmers</option>	
				</select>
			</div>

			<div class="input-group2">
				<div class="sb">Location</div>
			</div>
						
			<div class="input-group3">
				<select name="location" required>
					<option value="" readonly></option>
					<option value="Bacoor">Bacoor</option>
					<option value="Cavite City">Cavite City</option>
					<option value="Kawit">Kawit</option>
					<option value="Magallanes">Magallanes</option>
					<option value="Maragondon">Maragondon</option>
					<option value="Naic">Naic</option>
					<option value="Rosario">Rosario</option>
					<option value="Tanza">Tanza</option>
					<option value="Ternate">Ternate</option>								
				</select>
			</div>

			<div class="input-group">
				<input type="text" name="username" placeholder="Username" required>
			</div>

			<div class="input-group">
				<input type="password" name="password" placeholder="Password" required>
			</div>
						
			<div class="input-group">
				<input type="password" name="password2" placeholder="Confirm Password" required>
			</div>

			<div class="input-group">
				<input type="text" name="lname" placeholder="Last Name" required>
			</div>

			<div class="input-group">
				<input type="text" name="fname" placeholder="First Name" required>
			</div>

			<div class="input-group">
				<input type="text" name="mname" placeholder="Middle Name" required>
			</div>

			<div class="input-group2">
				<div class="sb">Sex</div>
			</div>

			<div class="input-group3">
				<select name="sex" required>
				<option value="" readonly></option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				</select>
			</div>

			<div class="input-group">
				<input type="text" name="age" placeholder="Age" required>
			</div>

			<div class="input-group2">
				<div class="sb">Educational Attainment</div>
			</div>

			<div class="input-group3">
				<select name="educattain" required>
				<option value="" readonly></option>
				<option value="Elem">Elementary Graduate</option>
				<option value="Highschool">High School Graduate</option>
				<option value="Vocational">Vocational Graduate</option>
				<option value="College">College Graduate</option>
				</select>
			</div>

			<div class="input-group">
				<input type="text" name="pondarea" placeholder="Pond Area" required>
			</div>

			<div class="input-group2">
				<div class="sb">Unit</div>
			</div>

			<div class="input-group3">
				<select name="unit" required>
				<option value="" readonly></option>
				<option value="sqmeter">square meter</option>
				<option value="hectare">Hectare</option>
				</select>
			</div>

			<div class="input-group">
				<input type="text" name="pondname" placeholder="Pond Name" required>
			</div>

			<div class="input-group">
				<input type="text" name="totstock" placeholder="Total Stocks" required>
			</div>

			
			<input type="radio" name="privacy" value="privacybtn" required />Data Privacy Consent 
			<ul style="text-align: justify; padding-right: 10px; padding-left: 5px;"><p>
				In compliance with RA 10173 known as the Philippines Data Privacy Act of 2012. All information collected from the information system will be treated and stored with utmost confidentiality and shall not be given to any third party institution and organization. The data collected will only be used for data analytics/ statistics purposes only.</p>
				<p>Please be assured that our institution is committed to ensuring the confidentiality of your information under the Philippines Data Privacy Act of 2012, and will exert reasonable efforts to protect against unauthorized use or disclosure. Should you also wish to access, update, or correct certain personal information, or withdraw consent to the use of any of your information as set out in this information system database, please send your e-mail at prossian.it@tip.edu.ph.
			</p></ul>
			
			<div class="input-group">
				<input type="submit" name="add" id="button1" value="Create Account">
			</div>		
		</form>
	</div>
			<div class="footer">
				<p>IS FOR GROW OUT POPULATION MANAGEMENT OF MANGROVE CRABS</p>
			</div>
	</div>
</body>
</html>
	
				