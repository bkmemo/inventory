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

		$date = $_POST['income_date'];
		$date = strtotime( $date );
		$date = date( 'Y-m-d H:i:s', $date );
	$query="UPDATE income SET income_name='$_POST[income_name]', amount_earned='$_POST[amount_earned]',description='$_POST[description]', income_date='$date' WHERE income_id=$_POST[income_id]";
	$result = mysqli_query($con,$query)or die(mysqli_error($con));
	if($result){
		$session['response'] = "income_id Updated";
		include ("add_income.php");	
	}
	else{
		$session['response'] = "Failed to updated Expense";
	}
	include ("add_income.php");	
?>
