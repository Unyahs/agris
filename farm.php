<?php include('session.php')?>
<?php 
	if(isset($_SESSION['accounttype']) && $_SESSION['accounttype']=="Admin"){
            header('location: index.php');
	}
?>
<?php 
require('server.php');
	$error = '';
	$success = '';
if (isset($_SESSION['farm'])==true) {
		$bg = $_SESSION['farm'];
if(isset($_POST["submit"]))
{
	$file=$_FILES["file"]["name"];
	$tmp_name=$_FILES["file"]["tmp_name"];
	$path="upload/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	$allowed=array("jpg","JPG","jpeg","JPEG","png","PNG","gif","GIF","pdf","wmv","pdf","zip","rar","doc","docx","ppt","pptx","xlsx","xls","txt","mp3");
	$maxsize = 2097152;
	$nosize = 0;
		if(($_FILES['file']['size'] == $nosize) || ($_FILES['file']['size'] >= $maxsize)) {
		$error = '<div id ="error">File too large. File must be less than 2 megabytes.</div><br>';
		header("refresh:1.2");
	}elseif(in_array($ext,$allowed))
		{	
			if(file_exists($path)){
				$i = 1;
				while(file_exists('upload/'.$i."_".$file)){
				 $i++;
				}
				$file = $i."_".$file;
				$path="upload/".$file;
				move_uploaded_file($tmp_name,$path);
				$sql = mysqli_query($con,"insert into tblfiles(file,brgy)values('$file','$bg')");
				if($sql){
				$success = '<div id ="error2">File upload succesful.</div><br>';
				header("refresh:1.3");
				}
			}else {
				move_uploaded_file($tmp_name,$path);
				$sql = mysqli_query($con,"insert into tblfiles(file,brgy)values('$file','$bg')");
				if($sql){
				$success = '<div id ="error2">File upload succesful.</div><br>';
				header("refresh:1.3");
				}
			}	
		}else {
		$error = '<div id ="error">Invalid file type.</div><br>';
		header("refresh:1.2");
		}
}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
		<title>Online Crab Farmers Association</title>
		<link rel="shortcut icon" href="img/team1.png" />
		<link href="css/s2.css" rel="stylesheet" />
	</head>

	<body>				
		<div class="nav">
			<div class="r">
				<img src="img/team.png" id="rimg"> MCrabIS
			</div> 
			<a href="log-out.php"  id="out" >Sign out</a>

			<div class="dropdown" style="margin-top: 1px;">
			  <div class="dropbtn"> 
				<span  id="dtext"><?php echo  $_SESSION['fname']; ?> <?php echo  $_SESSION['mname']; ?> <?php echo  $_SESSION['lname']; ?>
				</span> 			
			  </div>

			  <div class="dropdown-content">
				<a href="sampling.php">Add Sampling</a>				
				<a href="samplinginfo.php">Sampling Rec</a>
				<a href="home.php">Generated Report</a>						
			  </div>

			</div>			
		</div>


		<div class="name">
			<p class="p1">Welcome <strong><span><?php echo  $_SESSION['fname']; ?> <?php echo  $_SESSION['lname']; ?></span></strong> / Farmer</p> 				
		</div>

		<div class="row">
		  	<div class="column" >
				<div class="containerinfo" >	
					<div class="info">
						<img src="img/person.png" class="person"><div class="text">Farmer Information</div>
					</div>

					<p>
					   	<b>Full Name</b> : <?php echo  $_SESSION['fname']; ?> <?php echo  $_SESSION['mname']; ?> <?php echo  $_SESSION['lname']; ?> <br><br>
						<b>Pond Name</b> : <?php echo  $_SESSION['pondname']; ?><br><br>
					</p>
				</div>
		  	</div>

		  	<div class="column">
				<div class="bdata" >
					<div class="binfo">
						<img src="img/insert.png" class="bimage"><div class="text">Sampling Data</div>
					</div>

					<p><a href="sampling.php" style="color:green">Add Sampling</a></p> 

					<hr>

					<p><a href="samplinginfo.php" style="color:green">Sampling Record</a> </p>

				</div>	
		  	</div>
		</div>

		<div class="oneb">
			<div class="rep">	
				<div class="binfo">
					<img src="img/re.png" class="bimage">
					<div class="text">Upload  Sampling Report</div>
				</div>

				<form action="farm.php" method="POST" enctype="multipart/form-data" >
					<?php echo  ("$error"); ?><?php echo  ("$success"); ?>
					File Upload : <input type="file" name="file" id="files" required>
					<input type="submit" name="submit" id="sub" value="Upload" style="background: green;w">		
				</form>	
			</div>
		</div>
			
		<div class="footer">
		  <p>IS FOR GROW OUT POPULATION MANAGEMENT OF MANGROVE CRABS</p>
		</div>
	</body>
</html>