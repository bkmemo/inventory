<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	include_once 'log.php';
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}

	if(isset($_POST['save_edit_brand'])){
		$query="UPDATE brands SET brand_name='$_POST[brand_name]'	WHERE brand_id=$_POST[id]";
		mysqli_query($con,$query)or die(mysqli_error());
		$session['response'] = "Successfully Modified";
		include ('add_brand_phone.php');
	}else{
		$session['response'] = "Sorry Try Again";
		include ('add_brand_phone.php');
	}
?>
