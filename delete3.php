<?php 
	session_start();
	if(isset($_SESSION['accounttype']) && $_SESSION['accounttype']=="Farmer"){
            header('location: index.php');
	}
?>
<?php

require("server.php");
$id = $_GET['accountid'];
 
$result = mysqli_query($con, "DELETE FROM `tblaccounts` WHERE accountid=$id");
 
header("Location: acc.php");
exit;
?>
<?php

require("server.php");
$id = $_GET['samplingno'];
 
$result = mysqli_query($con, "DELETE FROM `tblfarminfo` WHERE samplingno=$id");
 
header("Location: samplinginfo.php");
exit;
?>