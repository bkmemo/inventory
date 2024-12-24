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
	if(isset($_POST['edit_staff'])){
		$query="UPDATE user SET staff_name='$_POST[staff_name]', position='$_POST[position]',
		address='$_POST[address]',phone_number='$_POST[phone_number]',email_address='$_POST[email_address]'
		 WHERE id=$_POST[id]";
		mysqli_query($con,$query)or die(mysqli_error());
		$_SESSION['response'] = "You have Successfully Modified User";
	include ("add_staff.php");
	}else {
		$_SESSION['response'] = "Sorry try Again";
		include ("add_staff.php");
	}
?>