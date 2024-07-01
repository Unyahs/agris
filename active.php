<?php
require("server.php");
 
$id = $_GET['id'];
 $status = 0;
$result = mysqli_query($con, "UPDATE `tblfarminfo`  WHERE accountid=$id");
 
header("Location: samplinginfo.php");
exit;
?>