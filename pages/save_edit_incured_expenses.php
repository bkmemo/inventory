<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	if(isset($_POST['save_edit_incured_expenses'])){
		$expense_name = $_POST['EXPENSE_NAME'];
		$Descreption = $_POST['Descreption'];
		$amount_spent = $_POST['amount_spent'];
		
		$date = $_POST['expense_date'];
		$date = strtotime( $date );
		$date = date( 'Y-m-d H:i:s', $date );
		
		$result = mysqli_query($con,"UPDATE expenses_incured SET EXPENSE_NAME='$expense_name',Descreption='$Descreption', AMOUNT_SPENT='$amount_spent', DATE='$date' where EXPENSES_INCURED_ID=$_POST[id]");
		if($result){
			$_SESSION['response']="Edited Successfully";
		}
		else{
			$_SESSION['response']="Failled to add Expense";
		}
	}
	header("Location:incure_expenses.php");
?>