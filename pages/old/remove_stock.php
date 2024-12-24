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
	$purchase_details_id = $_POST['purchase_details_id'];
	$result = mysqli_query($con,"UPDATE purchased_items_details SET STATUS = 'EXPIRED' WHERE PURCHASED_ITEM_DETAILS_ID=$purchase_details_id");
	if($result){
		$_SESSION['response'] = "Purchased suucessfully removed from stock";
	}
	else{
		$_SESSION['response'] = mysqli_error($con);
	}
	header("location:index.php");
?>