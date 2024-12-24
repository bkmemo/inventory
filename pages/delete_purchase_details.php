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
	
	$query="SELECT * FROM purchased_items_details inner join purchased_items on 
    purchased_items_details.PURCHASE_ID=purchased_items.PURCHASE_ID WHERE PURCHASED_ITEM_DETAILS_ID=$_POST[PURCHASED_ITEM_DETAILS_ID]";
	$result=mysqli_query($con,$query);
	$number_of_results = mysqli_num_rows($result);
	if($number_of_results>0){
		$query="DELETE FROM purchased_items_details WHERE PURCHASED_ITEM_DETAILS_ID=$_POST[PURCHASED_ITEM_DETAILS_ID]";
		$result = mysqli_query($con,$query);
		if($result){
            $_SESSION['response'] =  "<strong><font color='green'> Successfuly Deleted successfully</font></strong>";
				include ("show_purchase.php");	
		}
		else{
            $_SESSION['response'] =  "<strong><font color='red'> Sorry try again Delete purchase Phone Details</font></strong>";
					include ("show_purchase.php");	
		}
	}
	else{
        $_SESSION['response'] =  "<strong><font color='red'>Can't delete Brand First, Delete all records that depend on it</font></strong>";
					include ("show_purchase.php");	
	}
?>