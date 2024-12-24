<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting (E_ALL ^ E_NOTICE);

	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}		
	$query="UPDATE expenses SET EXPENSE_NAME='$_POST[expense_name]' WHERE EXPENSE_ID=$_POST[expense_id]";
	$result = mysqli_query($con,$query)or die(mysqli_error($con));
	if($result){
		$session['response'] = "<strong><font color='green'>Expense Updated</font></strong>";
	}
	else{
		$session['response'] = "<strong><font color='red'>Failed to updated Expense</font></strong>";
	}
	include ("manage_expenses.php");	
?>
