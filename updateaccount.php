<?php 
	session_start();
	if(isset($_SESSION['accounttype']) && $_SESSION['accounttype']=="Farmer"){
            header('location: index.php');
	}
?>
<?php require('server.php'); ?>
<?php 
if (isset($_POST['update'])) {
	$id = $_POST['id'];
			$accounttype = $_POST['acctype'];
			$location = $_POST['location'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$lname = $_POST['lname'];
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$location = $_POST['location'];
			$age = $_POST['age'];
			$sex = $_POST['sex'];
			$educattain = $_POST['educattain'];
			$pondarea = $_POST['pondarea'];
			$unit = $_POST['unit'];
			$pondname = $_POST['pondname'];
			$totstock = $_POST['totstock'];
	    $result = mysqli_query($con, "UPDATE tblaccounts SET accounttype='$accounttype', unit='$unit', totstock='$totstock', age=$age, sex='$sex', educattain='$educattain', pondarea=$pondarea, accounttype='$accounttype', location='$location', username='$username', password='$password', lname='$lname', fname='$fname',mname='$mname', pondname='$pondname' WHERE accountid='$id'");
	header('location: acc.php');
}
?>
<?php 
	if (isset($_GET['accountid'])) {
		$id = $_GET['accountid'];
		$query = mysqli_query($con, "SELECT * FROM tblaccounts WHERE accountid=$id");
        while($res = mysqli_fetch_array($query))
		{
			$accounttype = $res['acctype'];
			$username = $res['username'];
			$password = $res['password'];
			$lname = $res['lname'];
			$fname = $res['fname'];
			$mname = $res['mname'];
			$location = $res['location'];
			$age = $res['age'];
			$sex = $res['sex'];
			$educattain = $res['educattain'];
			$pondarea = $res['pondarea'];
			$unit = $res['unit'];
			$pondname = $res['pondname'];
			$totstock = $res['totstock'];
			
		}
		
	}
?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<title>IS FOR GROW OUT POPULATION MANAGEMENT OF MANGROVE CRABS</title>
		<link rel="shortcut icon" href="img/team.ico" />
		<link href="css/s8.css" rel="stylesheet" />
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
			<img src="img/team.png" id="rimg" >Update Account 
		</div>
	</div>
	<div class="container">
	<form  method="post" autocomplete="off" action="updateaccount.php">	
	<div class="input-group2" value="<?php echo $accounttype;?>">
					<div class="sb">Account Type</div>
					</div>
					<div class="input-group3" >
						<select name="acctype" required selected="<?php echo $accounttype;?>">
						<option value="Admin">Admin</option>
						<option value="Farmers">Farmers</option>	
					</select>
					</div>

					<div class="input-group2">
					<div class="sb">Location</div>
					</div>
					
					<div class="input-group3">
						<select name="location" required selected="<?php echo $location;?>">
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
						<input type="text" name="username" placeholder="Username" selected="<?php echo $username;?>">
					</div>
					<div class="input-group">
						<input type="password" name="password" placeholder="Password" value="<?php echo $password;?>" required>
					</div>
					<div class="input-group">
						<input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname;?>" required>
					</div>
					<div class="input-group">
						<input type="text" name="fname" placeholder="First Name" value="<?php echo $fname;?>" required>
					</div>
					<div class="input-group">
						<input type="text" name="mname" placeholder="Middle Name" value="<?php echo $mname;?>" required>
					</div>
					
					<div class="input-group">
						<input type="text" name="age" placeholder="Age" value="<?php echo $age;?>"required>
					</div>
					<div class="input-group2">
					<div class="sb">Sex</div>
					</div>
					<div class="input-group3">
						<select name="sex" selected="<?php echo $sex;?>" required>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						</select>
					 
					</div>
					<div class="input-group2">
					<div class="sb">Educational Attainment</div>
					</div>
					<div class="input-group3">
						<select name="educattain" selected="<?php echo $educattain;?>" required>
						<option value="Elem">Elementary Graduate</option>
						<option value="High">High School Graduate</option>
						<option value="Voc">Vocational Graduate</option>
						<option value="Col">College Graduate</option>
						</select> 
					</div>
					<div class="input-group">
						<input type="text" name="pondarea" placeholder="Pond area" value="<?php echo $pondarea;?>" required>
					</div>
					<div class="input-group2">
					<div class="sb">Unit</div>
					</div>
					<div class="input-group3">
						<select name="unit" selected="<?php echo $unit;?>" required>
						<option value="sm">Square meter</option>
						<option value="hec">Hectare</option>
						</select> 
					</div>
					<div class="input-group">
						<input type="text" name="pondname" placeholder="Pond name" value="<?php echo $pondname;?>" required>
					</div>
					<div class="input-group">
						<input type="text" name="totstock" placeholder="Total stocks" value="<?php echo $totstock;?>"required>
					</div>
					<div class="input-group">
						<input type="hidden" name="id" value=<?php echo $_GET['accountid'];?>>
						<input type="submit" name="update" id="button1" value="Update">
					</div>
	</form>
		</div>
	</div>
	
	</body>
	</html>
	
				