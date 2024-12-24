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
	
	$query="SELECT * FROM purchased_items_details WHERE ITEM_ID=$_GET[item_id]";
	$result=mysqli_query($con,$query);
	$number_of_results = mysqli_num_rows($result);
	if($number_of_results<=0){
		$query="SELECT * FROM sales_details WHERE ITEM_ID=$_GET[item_id]";
		$result=mysqli_query($con,$query);
		$number_of_results = mysqli_num_rows($result);
		if($number_of_results<=0){
			$query="DELETE FROM item_sellprice WHERE ITEM_ID=$_GET[item_id]";
			$result = mysqli_query($con,$query)or die(mysqli_error($con));
			
			$query="DELETE FROM item_stock WHERE ITEM_ID=$_GET[item_id]";
			$result = mysqli_query($con,$query)or die(mysqli_error($con));
			
			$query="DELETE FROM items WHERE ITEM_ID=$_GET[item_id]";
			$result = mysqli_query($con,$query)or die(mysqli_error($con));
			if($result){
				$session['response'] = "<strong><font color='green'>Item Has Deleted</font></strong>";
			}
			else{
				$session['response'] = "<strong><font color='red'>Failed To Delete Item</font></strong>";
			}
		}
		else{
			$session['response'] = "<strong><font color='red'>Can't delete item, First Delete all sales for the item</font></strong>";
		}
	}
	else{
		$session['response'] = "<strong><font color='red'>Can't delete item First, Delete all purchased Stock for the item</font></strong>";
	}
	include ("modify_items.php");	
?>