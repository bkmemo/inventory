<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	$con = db_connect();
	$requisition_items_details_id = $_GET["requisition_items_details_id"];
	
	//GET QUANTITY SOLD ON THE SALE_DETAILS ID
	//DELETE PURCHASE FROM DATABASE
	$query="DELETE FROM requisition_items_details WHERE  requisition_items_details_id ='$requisition_items_details_id'";
	$query_run=mysqli_query($con,$query);
	
	$_SESSION['response'] = "<h4><font color='green'> Deleted Successfully</font></h4>";
	
	header("Location:show_requisitions.php");
?>