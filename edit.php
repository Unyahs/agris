<?php 
	session_start();
	if(isset($_SESSION['accounttype']) && $_SESSION['accounttype']=="Farmer"){
            header('location: index.php');
	}
?>
<?php require('server.php'); ?>

<?php
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
	$hh=$_POST['hh'];
    $lstname=$_POST['lname'];
	$fstname=$_POST['fname'];
	$mname=$_POST['mname'];
	$brgy=$_POST['brgy'];
	$str=$_POST['str'];
	$age=$_POST['age'];
	$dob= $_POST['dob'];
	$cil = $_POST['cil'];
	$pob = $_POST['pob'];
	$reg = $_POST['reg'];
	$gen = $_POST['gen'];
	$hea = $_POST['hea'];
	$pro = $_POST['pro'];
	$rv = $_POST['rv'];
	$inc = $_POST['inc'];
	$org = $_POST['org'];
	$cit = $_POST['cit'];
	$po = $_POST['po'];
	$dia = $_POST['dia'];
	$th = $_POST['th'];
	$lt = $_POST['lt'];
	$ho = $_POST['ho'];
	$ls = $_POST['ls'];
	$si = $_POST['si'];
	$cs = $_POST['cs'];
	$ws = $_POST['ws'];
	$tf = $_POST['tf'];
	$mt = $_POST['mt'];
        $result = mysqli_query($con, "UPDATE `tblresinfo` SET householdno='$hh',reslname='$lstname',resfname='$fstname',resmname='$mname',resbrgy='$brgy',resstr='$str',resage='$age',resdob='$dob',rescivil='$cil',respob='$pob',resreg='$reg',ressex='$gen',reshea='$hea',respro='$pro',resrv='$rv',resinc='$inc',resorg='$org',respo='$po',rescit='$cit',resdia='$dia',resth='$th',reslt='$lt',reshouse='$ho',resls='$ls',ressi='$si',rescs='$cs',resws='$ws',restf='$tf',resmt='$mt' WHERE resid=$id");
        header("Location: residentinfo.php");
		exit();
}
?>
<?php

$id = $_GET['id'];
 

$result = mysqli_query($con, "SELECT * FROM `tblresinfo` WHERE resid=$id");

while($res = mysqli_fetch_array($result))
{
	$hh = $res['householdno'];
    $lname = $res['reslname'];
    $fname = $res['resfname'];
    $mname = $res['resmname'];
	$brgy = $res['resbrgy'];
	$str = $res['resstr'];
	$age = $res['resage'];
	$dob = $res['resdob'];
	$pob = $res['respob'];
	$cil = $res['rescivil'];
	$reg = $res['resreg'];
	$gen = $res['ressex'];
	$hea = $res['reshea'];
	$rv = $res['resrv'];
	$occu = $res['respro'];
	$inc = $res['resinc'];
	$org = $res['resorg'];
	$cit = $res['rescit'];
	$poo = $res['respo'];
	$dia = $res['resdia'];
	$th = $res['resth'];
	$lt = $res['reslt'];
	$hou = $res['reshouse'];
	$ls = $res['resls'];
	$si = $res['ressi'];
	$cs = $res['rescs'];
	$ws = $res['resws'];
	$tf = $res['restf'];
	$mt = $res['resmt'];
}
?>
<?php include('session.php')?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<title>OIS for Collecting Sex-disaggregated Data</title>
	<link rel="shortcut icon" href="img/team.ico" />
	<link href="css/s5.css" rel="stylesheet" />
	
	<script type="text/javascript" src="jsscript/jquery-3.3.1.min.js"> </script>

	<script>
			
		function getAge(){
			var dob = document.getElementById('dob').value;
			dob = new Date(dob);
			var today = new Date();
			var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
			document.getElementById('age').value=age;
		}
		$(document).ready(function() {
			$("#rimg").click(function() {
				location.href= 'barangay.php';
			
			});
		});

		
	</script>

</head>

<body >
	<div class="topnav" id="myTopnav">
		<div class="r">	
			<img src="img/team.png" id="rimg" > Update Resident Information  
		</div>  
	</div>
		
							<div class="container">
							
							<div class="s1">INDIVIDUAL RECORD OF BARANGAY INHABITANTS</div>
							<form id="form1" method="post" autocomplete="off" action="edit.php">		
							<div class="input-group1">
								Household No.<span>* </span> <input type="text" id="hh" name="hh" value="<?php echo $hh;?>" required>
							</div>
							
							<div class="line"></div>
							
							<div class="input-group2">
								Last name <span>* </span><input type="text" id="lname" name="lname" value="<?php echo $lname;?>" required>
								First name <span>* </span><input type="text" name="fname" value="<?php echo $fname;?>" required>
								Middle name <span>* </span><input type="text" id="mname" name="mname" value="<?php echo $mname;?>" required>
							</div>
							
							<div class="row">
							
							  <div class="col">
									<div class="input-group3">
										
										Address<br>
										<input type="text" id="brgy" name="brgy" value="<?php echo $brgy;?>" readonly>
										<input type="text" id="str" name="str" value="<?php echo $str;?>" required><br>
										
										
										Date of Birth <span>* </span><input type="date" id="dob" name="dob" value="<?php echo $dob;?>" onchange="getAge();" required><br>
										
										Age <span>* </span><input id="age" type="text" name="age" value="<?php echo $age;?>"  required readonly>
										
										Sex <span>*</span>
											<input type="text" id="gen" name="gen" list="resgen" value="<?php echo $gen;?>" required><br>
										<datalist id="resgen">
											<option value="Male">Male</option>
											<option value="Female">Female</option>				
										</datalist>
										
										Religion 
										<input id="reg" type="text"  list="religion" name="reg" value="<?php echo $reg;?>" required><br>
										<datalist id="religion">
											<option value="Roman Catholic">Roman Catholic</option>
											<option value="Protestants">Protestants</option>
											<option value="Muslims">Muslims</option>
											<option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
											<option value="Buddhists">Buddhists</option>				
										</datalist>
										
										Place of Birth <span>* </span>
										
										<input type="text" id="pob" name="pob" list="establishment" value="<?php echo $pob;?>" required>
										<datalist id="establishment">
											<option value="San Lorenzo Ruiz Hospital - Naic">San Lorenzo Ruiz Hospital - Naic</option>
											<option value="Naic Medicare Hospital - A. Soriano Highway, Naic">Naic Medicare Hospital - A. Soriano Highway, Naic</option>
											<option value="Naic Doctors' Hospital - Daang Makina, Naic">Naic Doctors' Hospital - Daang Makina, Naic</option>
											<option value="First Filipino Saint Hospital - Governor's Drive, Naic">First Filipino Saint Hospital - Governor's Drive, Naic</option>
											<option value="Cavite Municipal Hospital - Maragondon">Cavite Municipal Hospital - Maragondon</option>
											<option value="M. V. Santiago Medical Center - De Ocampo, Trece Martires City">M. V. Santiago Medical Center - De Ocampo, Trece Martires City</option>
											<option value="Korea-Philippines Friendship Hospital - Trece Martires City">Korea-Philippines Friendship Hospital - Trece Martires City</option>
											<option value="General Emilio Aguinaldo Memorial Hospital - Luciano, Trece Martires City">General Emilio Aguinaldo Memorial Hospital - Luciano, Trece Martires City</option>
											<option value="Cavite Center for Mental Health - Trece Martires City">Cavite Center for Mental Health - Trece Martires City</option>
											<option value="Cuddles and Cribs Lying-In Clinic">Cuddles and Cribs Lying-In Clinic</option>
											<option value="Mom And Daughter Lying-In Clinic">Mom And Daughter Lying-In Clinic</option>
											<option value="Glady's Lying In">Glady's Lying In</option>
											<option value="Jovie Herrera Lying-In Clinic">Jovie Herrera Lying-In Clinic</option>
											<option value="Nora L. Alano Lying-in Clinic">Nora L. Alano Lying-in Clinic</option>
											<option value="Charver Lying In Clinic">Charver Lying In Clinic</option>
											<option value="Brookside Lane Medical Clinic And Lying-In">Brookside Lane Medical Clinic And Lying-In</option>
											<option value="G.F. Cabuhat Lying-In Clinic">G.F. Cabuhat Lying-In Clinic</option>
											<option value="Tanza Municipal Health Center Lying-In Clinic">Tanza Municipal Health Center Lying-In Clinic</option>
											<option value="Rubia - Javier Maternity Clinic & Lying - In">Rubia - Javier Maternity Clinic & Lying - In</option>
											<option value="Bucal Lying-In">Bucal Lying-In</option>
											<option value="Lourdes R.Pacumio Lying-In & Family Care Clinic">Lourdes R.Pacumio Lying-In & Family Care Clinic</option>
										</datalist>
										<br>
										Organization <input id="org" type="text"  name="org" value="<?php echo $org;?>">
										
										
										
									</div>
									
							  </div>
							  
							  <div class="col2">
									<div class="input-group4">
											
										Highest Educational Attainment 
										<input id="hea" type="text"  list="educational" name="hea" value="<?php echo $hea;?>" required>
										<datalist id="educational">
											<option value="Elementary">Elementary</option>
											<option value="High School">High School</option>
											<option value="College">College</option>
											<option value="Graduate Studies">Graduate Studies</option>
											<option value="Vocational">Vocational</option>				
										</datalist>
											Profession/Occupation 
											<input id="pro" type="text" list="poc" name="pro" value="<?php echo $occu;?>" ><br>
								
											
											Civil Status 
											<input type="text" id="cil" name="cil" list="status" value="<?php echo $cil;?>" required><br>
											<datalist id="status">
											
											<option value="Married">Married</option>
											<option value="Widowed">Widowed</option>
											<option value="Separated">Separated</option>
											<option value="Divorced">Divorced</option>
											<option value="Single">Single</option>	
											
											</datalist>
										
											Registered Voter <span>* </span><input id="rv" type="text"  name="rv" list="regrv" value="<?php echo $rv;?>" required><br>
											<datalist id="regrv">
												<option value="Yes">Yes</option>
												<option value="No">No</option>			
											</datalist>
											Monthly Income 
											<input id="inc" type="text"  name="inc"  list="inco" value="<?php echo $inc;?>" >
											<datalist id="inco">
												<option value="Under 10,000 Php">Under 10,000 Php</option>
												<option value="10,000 to 19,000 Php">10,000 to 19,000 Php</option>
												<option value="20,000 to 29,000 Php">20,000 to 29,000 Php</option>
												<option value="30,000 to 39,000 Php">30,000 to 39,000 Php</option>
												<option value="40,000 to 49,000 Php">40,000 to 49,000 Php</option>	
												<option value="50,000 to 60,000 Php">50,000 to 60,000 Php</option>	
												<option value="60,000 Php and Over">60,000 Php and Over</option>
											</datalist>
											<br>
											Citizenship <span>* </span><input id="cit" type="text"  name="cit" value="<?php echo $cit;?>" required>
									</div>
										
							  </div>
									
							</div>
							
							
							<div class="row">
							
								<div class="column" >
										<div class="input-group7">
											
											<span id="hss">Housing Status</span>
											
											<br>
											<br>
											
											House <br>
											
											<input id="ho" type="text"  list="hou" name="ho" value="<?php echo $hou;?>"   >
											<br>
											
											<datalist id="hou">
												<option value="Owned"/>  Owned  </option>
												<option value="Rented"/>  Rented </option>
												<option value="Caretaker"/>  Caretaker </option>
											</datalist>
											
											<br>
											
											Types of House 
											
											<br><input id="th" type="text"  list="toh" name="th" value="<?php echo $th;?>" >
											<br>
											
											<datalist id="toh">
												<option value="Concrete" /> Concrete </option>
												<option value="Semi-Concrete"/>  Semi-Concrete </option>
												<option value="wood/bamboo"/>  wood/bamboo </option>
												<option value="2 Stories"/>  2 Stories </option>
												<option value="3 Stories"/>  3 Stories </option>	
												<option value="4 Stories"/>  4 Stories </option>
												<option value="5 Stories"/>  5 Stories </option>	
											</datalist>
											
											<datalist id="toh">
												<option value="Concrete" /> Concrete </option>
												<option value="Semi-Concrete"/>  Semi-Concrete </option>
												<option value="wood/bamboo"/>  wood/bamboo </option>
												<option value="2 Stories"/>  2 Stories </option>
												<option value="3 Stories"/>  3 Stories </option>	
												<option value="4 Stories"/>  4 Stories </option>
												<option value="5 Stories"/>  5 Stories </option>	
											</datalist>
											
											<br>
											
											Land Tenure/Ownership 
											
											<br><input id="lt" type="text"  list="lat" name="lt" value="<?php echo $lt;?>" >
								
											<datalist id="lat">
												<option value="Owned"/>  Owned  </option>
												<option value="Private/Titled"/>  Private/Titled </option>
												<option value="N/A"/>  N/A </option>
											</datalist>
										
										</div>
								</div>
								
								<div class="column">
								
										<div class="input-group8">
											
											Place of Origin/Ethnic Origin <span>*</span>
											
											<br><input id="po" type="text"  name="po" value="<?php echo $poo;?>">
											<br>
											<br>
											
											
											Dialect <span>*</span>
											
											<br><input id="dia" type="text"  name="dia" value="<?php echo $dia;?>"/>

											<br>
											<br>
											
											Lighting System 
											
											<br><input id="ls" type="text"  list="lit" name="ls" value="<?php echo $ls;?>" >
											<br>
											<datalist id="lit">
												<option value="Electricity"/>  Electricity  </option>
												<option  value="Kerosene"/>  Kerosene </option>
												<option value="Solar"/>  Solar </option>
											</datalist>
											<br>
											
											Source of Information 
											
											<input id="si" type="text"  list="soi" name="si" value="<?php echo $si;?>"  >
								
											<datalist id="soi">
												<option  value="TV"/>  TV  </option>
												<option  value="Radio"/>  Radio </option>
												<option value="Newspaper"/> Newspaper </option>
												<option value="Internet"/>  Internet </option>
												<option value="N/A"/>  N/A </option>
											</datalist>
											
										</div>
								</div>
								
								<div class="column" >
								
											<div class="input-group9">
											
											Communication Services 
											
											<br><input id="cs" type="text"  list="csi" name="cs" value="<?php echo $cs;?>"  >
								
											<datalist id="csi">
												<option  value="Telephone"/>  Telephone  </option>
												<option  value="Cellular Phone"/>  Cellular Phone </option>
												<option value="Internet"/>  Internet </option>
												<option value="Telegraph"/>  Telegraph </option>
												<option value="N/A"/>  N/A </option>
											</datalist>
											
											<br>
											<br>
											
											Water System 
											
											<br><input id="ws" type="text"  list="wsm" name="ws" value="<?php echo $ws;?>" >
								
											<datalist id="wsm">
												<option  value="Spring"/>  Spring  </option>
												<option  value="Deep Well"/>  Deep Well </option>
												<option  value="Municipal Water District"/>  Municipal Water District </option>
											</datalist>
											<br>
											<br>
											
											Toilet Facilities 
											
											<br><input id="tf" type="text"  list="tof" name="tf" value="<?php echo $tf;?>" >
								
											<datalist id="tof">
												<option  value="Open Pit"/>  Open Pit  </option>
												<option  value="Flush"/>  Flush </option>
											</datalist>
											<br>
											<br>
											
											Means of Transportaion 
											
											<br><input id="mt" type="text"  list="mtn" name="mt" value="<?php echo $mt;?>">
								
											<datalist id="mtn">
												<option  value="PUV"/>  PUV  </option>
												<option  value="Private Car"/>  Private Car </option>
											</datalist>
											
										</div>
								</div>
								
							</div>
						
					</div>
				
				
					
					<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
					<div class="btn">
					<input type="submit" name="update" value="Update">
					</div>
				</form>
	
				
	
	
	
	<div id="footer">
		<p>Online Information System for Collecting Sex-disaggregated Data</p>
	</div>
	
	
	
</body>


</html>