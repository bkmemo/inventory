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

	if(isset($_POST['save_edit_phone'])){
		$item_name=$_POST['ITEM_NAME'];
		$supplier_name=$_POST['supplier_name'];
		$serial_number=$_POST['serial_number'];
		
		$register_date = $_POST['register_date'];
		$register_date = strtotime( $register_date );
		$register_date = date( 'Y-m-d H:i:s', $register_date );
		
		$query="UPDATE phones SET 
		ITEM_ID = (select ITEM_ID from items where ITEM_NAME='$item_name'), serial_number='$serial_number', supplier_id=(select supplier_id from suppliers where supplier_name='$supplier_name'), register_date='$register_date'
		WHERE phone_id=$_POST[id]";
		mysqli_query($con,$query)or die(mysqli_error());
		$_SESSION['response'] = "Successfully Modified";
		include ('add_new_phone.php');

	}else{
		$_SESSION['response'] = "Sorry Try Again";
		include ('add_new_phone.php');
	}
?>
