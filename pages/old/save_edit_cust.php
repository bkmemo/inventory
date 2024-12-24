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
	
	if(isset($_POST['scust'])){
		$query="UPDATE customer SET customer_name='$_POST[customer_name]',address='$_POST[address]', address='$_POST[address]',phone='$_POST[phone]', email='$_POST[email]' WHERE customer_id=$_POST[id]";
		mysqli_query($con,$query)or die(mysqli_error());
		$_SESSION['response']= "Customer Modified";
		include ('add_customer.php');
	}
?>
