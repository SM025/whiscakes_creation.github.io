<?php
	
	session_start();
	//Start session
	

	if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
		header("location: index.php");
		exit();
	}
?>