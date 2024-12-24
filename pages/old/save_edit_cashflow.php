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
	$query="UPDATE cashflow SET cashflow_type='$_POST[cashflow_type]', cashflow_category='$_POST[cashflow_category]' WHERE cashflow_id='$_POST[cashflow_id]'";
	$result = mysqli_query($con,$query)or die(mysqli_error($con));
	if($result){
		$session['response'] = "Expense Updated";
	}
	else{
		$session['response'] = "Failed to updated Expense";
	}
	include ("manage_cashflow.php");	
?>
			