<?php
require("server.php");
 
$id = $_GET['id'];
 $status = 1;
$result = mysqli_query($con, "UPDATE `tblfarminfo` SET pond_name='$pond_name' WHERE accountid=$id" ");
 
header("Location: samplinginfo.php");
exit;
?>