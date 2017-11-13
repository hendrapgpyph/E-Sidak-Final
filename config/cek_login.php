<?php 
	session_start();
	if($_SESSION['status'] == ""){
		header("location:../form_login.php");
	}
?>