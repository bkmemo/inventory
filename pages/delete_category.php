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
	
	$query="SELECT * FROM items WHERE CATEGORY_ID=$_GET[category_id]";
	$result=mysqli_query($con,$query);
	$number_of_results = mysqli_num_rows($result);
	if($number_of_results<=0){
		$query="DELETE FROM category WHERE CATEGORY_ID=$_GET[category_id]";
		$result = mysqli_query($con,$query)or die(mysqli_error($con));
		if($result){
				$session['response'] = "<strong><font color='green'>Category Deleted successfully</font></strong>";
		}
		else{
			$session['response'] = "<strong><font color='red'>Failed To Delete Category</font></strong>";
		}
	}
	else{
		$session['response'] = "<strong><font color='red'>Can't delete category First, Delete all records that depend on it</font></strong>";
	}
	include ("modify_categories.php");	
?>