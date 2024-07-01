<?php
	session_start();
	if(isset($_SESSION['accounttype']) && $_SESSION['accounttype']=="Brgy.Secretary"){
            header('location: index.php');
	}
?>
<?php 

require('server.php');
if(isset($_GET['id']))
	{
		$selectSql = "select * from tblfiles where id = ".$_GET['id'];
		$rsSelect = mysqli_query($con,$selectSql);
		$getRow = mysqli_fetch_assoc($rsSelect);
		
		$getName = $getRow['file'];
		
		$DeletePath = "upload/".$getName;
		
		if(unlink($DeletePath))
		{
			$deleteSql = "delete from tblfiles where id = ".$getRow['id'];
			$rsDelete = mysqli_query($con, $deleteSql);	
			
			if($rsDelete)
			{
				header('location:admin.php');
				exit();
			}
		}
		
		
	}
?>