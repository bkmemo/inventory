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
	if(isset($_POST['scat'])){
	$item_name = $_POST['ITEM_NAME'];
	$brand_name=$_POST['brand_name'];
	$ITEM_TYPE=$_POST['ITEM_TYPE'];
	$query="UPDATE items SET ITEM_NAME='$item_name', brand_id=(select brand_id from brands where brand_name='$brand_name'), ITEM_TYPE='$ITEM_TYPE' WHERE ITEM_ID=$_POST[item_id]";
	$result = mysqli_query($con,$query)or die(mysqli_error($con));
	if($result){
		$query="UPDATE item_sellprice SET  PRICE='$_POST[sell_price]', BUY_PRICE='$_POST[BUY_PRICE]' WHERE ITEM_ID=$_POST[item_id]";
		$result = mysqli_query($con,$query)or die(mysqli_error($con));
		$_SESSION['response'] = "Item Updated";
		include ('add_item.php');
	}
	else{
		$_SESSION['response'] = "Failed to updated Item";
		include ('add_item.php');	
	}
	}
	
?>
