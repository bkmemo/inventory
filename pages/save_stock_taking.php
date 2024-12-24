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

	$query="UPDATE item_stock SET QUANTITY='$_POST[physical_qty]' WHERE ITEM_ID=$_POST[item_id]";
	$result = mysqli_query($con,$query)or die(mysqli_error($con));
	if($result){
		$time_stamp = date( 'Y-m-d H:i:s');
		echo $time_stamp;
		$result = mysqli_query($con,"INSERT INTO stock_taking (`ITEM_ID`,`COMPUTER STOCK`, `PHYSICAL_STOCK`, `DATE_TIME`) VALUES($_POST[item_id],$_POST[computer_qty],$_POST[physical_qty],'$time_stamp')") or die(mysqli_error($con));
		$session['response'] = "Stock Updated";
		header("index.php");
	}
	else{
		$session['response'] = "Failed to updated Stock";
		header("index.php");
	}

?>