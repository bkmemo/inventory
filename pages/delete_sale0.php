<?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	include_once 'log.php';
	error_reporting (E_ALL ^ E_NOTICE);
	//$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}	
	
	$query="SELECT * FROM sales WHERE SALES_ID=$_GET[SALES_ID]";
	$result=mysqli_query($con,$query);
	$number_of_results = mysqli_num_rows($result);
	if($number_of_results>0){
		$query="DELETE FROM sales WHERE SALES_ID=$_GET[SALES_ID]";
		$result = mysqli_query($con,$query);
		if($result){
				echo "<strong><font color='green'> Successfuly Deleted successfully</font></strong>";
				include ("add_new_phone.php");	
		}
		else{
				echo "<strong><font color='red'> Sorry try again</font></strong>";
					include ("add_new_phone.php");	
		}
	}
	else{
				echo "<strong><font color='red'>Can't delete Brand First, Delete all records that depend on it</font></strong>";
					include ("add_new_phone.php");	
	}
?>
