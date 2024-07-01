<?php 
	session_start(); 
	if (!isset($_SESSION['pondname'])) {
		session_destroy();
		header('Location: index.php');
		exit;
	}
?>