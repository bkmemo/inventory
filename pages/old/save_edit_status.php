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

	if(isset($_POST['save_edit_status'])){
		
		$query="UPDATE requisition SET order_status='$_POST[order_status]', approved_by='$_SESSION[username]', reason='$_POST[reason]'  WHERE requisition_id=$_POST[id]";
		mysqli_query($con,$query)or die(mysqli_error());
		$_SESSION['response'] = "<font color='green'>Successfully Eddited</font>";
		include ('show_requisitions.php');
	}else{
		$_SESSION['response'] = "Sorry Try Again";
		include ('show_requisitions.php');
	}
?>
