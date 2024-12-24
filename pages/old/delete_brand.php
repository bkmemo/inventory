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
	
	$query="SELECT * FROM brands WHERE brand_id=$_GET[brand_id]";
	$result=mysqli_query($con,$query);
	$number_of_results = mysqli_num_rows($result);
	if($number_of_results>0){
		$query="DELETE FROM brands WHERE brand_id=$_GET[brand_id]";
		$result = mysqli_query($con,$query)or die(mysqli_error($con));
		if($result){
				echo "<strong><font color='green'>Brand Successfuly Deleted successfully</font></strong>";
		}
		else{
				echo "<strong><font color='red'>Failed To Delete Brand</font></strong>";
		}
	}
	else{
				echo "<strong><font color='red'>Can't delete Brand First, Delete all records that depend on it</font></strong>";
	}
	return 1;
	include ("edit_brand.php");	
?>