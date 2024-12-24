<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	if(isset($_POST['edit_supplier'])){
		$query="UPDATE suppliers SET supplier_name='$_POST[supplier_name]', address='$_POST[address]',
		phone='$_POST[phone]',email='$_POST[email]' WHERE supplier_id=$_POST[id]";
		mysqli_query($con,$query)or die(mysqli_error());
		$_SESSION['response']= "You have Successfully Modified a Supplier";
		include ("add_supplier.php");
	}
	else {
		$_SESSION['response']= "Sorry try Again";
		include ("add_supplier.php");
		
	}
?>