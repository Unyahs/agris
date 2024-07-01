<?php 

session_start();
require ('server.php');
if (isset($_POST['signin'])) {
		$user = MySqli_real_escape_string($con, $_POST['username']);
		$pass = MySqli_real_escape_string($con, $_POST['password']);

		 $query = "SELECT * FROM `tblaccounts` WHERE username= '$user' AND password= '$pass'";
		 $result = mysqli_query($con,$query);
	
			 if (mysqli_num_rows($result) > 0  ) {
				 $_SESSION['username'] = $user;
				  while($row= mysqli_fetch_array($result)){
					  $_SESSION['lname'] = $row['lname'];
				      $_SESSION['fname'] = $row['fname'];
					  $_SESSION['mname'] = $row['mname'];
					  $_SESSION['location'] = $row['location'];
					  $_SESSION['age'] = $row['age'];
					  $_SESSION['sex'] = $row['sex']; 
					  $_SESSION['educattain'] = $row['educattain'];
					  $_SESSION['pondarea'] = $row['pondarea']; 
					  $_SESSION['unit'] = $row['unit'];  
					  $_SESSION['pondname'] = $row['pondname']; 
					  $_SESSION['totstock'] = $row['totstock']; 
					  $_SESSION['accounttype'] = $row['accounttype'];  
				 if($row['accounttype'] == "Admin"){
					 header('location: admin.php');
					 exit;
				 }else if($row['accounttype'] == "Farmers" ){
					 header('location: farm.php');
					 exit;
				 }
			 }
			}else {
					array_push($errors, "Wrong username/password combination.");
			} 
    }
?>
<?php 
	if (isset($_SESSION['username'])==true) {
		if(isset($_SESSION['accounttype']) && $_SESSION['accounttype']=="Admin"){
            header('location: admin.php');
            }
            else {
            header('location: farm.php');
            }
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
		<title>Log In</title>
		<link rel="shortcut icon" href="img/team1.png" />
		<link href="css/s1.css" rel="stylesheet" />
	</head>
	<body>
		<div id = "whole-site">
			<div id = "leftpart">
				<div id = "signin">
					<div class="header">
						<div class="head">Log In</div>
					</div>

					<form method="post" action="index.php">
						<div class="er"><?php include('errors.php'); ?></div>
						<div>
							<label> Email or Username</label>
							<input type="text" name="username" class="text"/>	
						</div>					
						
						<div>
							<label> Password</label>
							<input type="password" name="password" class="text"/>	
						</div>

						<button type="submit" name="signin" class="login-btn">
							Log in 
						</button>					
					</form>

					

					<div class="or">
						<hr class="hrbar">
						<span> OR </span>
						<hr class="hrbar">
					</div>

					
					<a href="addaccount.php" class="signin-btn"> Create an Account </a>
					
				</div>

				<br>

				<footer id="leftfooter">
					<div class="text"><b>Forgot password?</b><br> <br>									  
					For all Farmers, ask the designated<br>Admin to reset the password.
					</div>
				</footer>
			</div>			

			<div id = "rightpart">
				<div id="showcase" style="background-image: url('img/crab.jpg'); background-position: center; background-size: cover;background-repeat: no-repeat;">
					<div class="showcase-text">
						<h1>IS FOR GROW OUT POPULATION <br>
						MANAGEMENT OF MANGROVE CRABS</h1>					
					</div>		
									
				</div>
			</div>		
		</div>
	</body>
</html>