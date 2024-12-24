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
	if(isset($_POST['save'])){
		$cashflow_type = $_POST['cashflow_type'];
		$Descreption = $_POST['Descreption'];
		$amount_spent = $_POST['amount_spent'];
		
		$date = $_POST['expense_date'];
		$date = strtotime( $date );
		$date = date( 'Y-m-d H:i:s', $date );
		
		$result = mysqli_query($con,"INSERT INTO cashfow_amount (`cashflow_id`, `Descreption`,`AMOUNT`, `DATE`)
		VALUES ((select cashflow_id from cashflow where cashflow_type='$cashflow_type'),'$Descreption', '$amount_spent', '$date')");
		if($result){
			$_SESSION['response']="<font color='green'>Added Successfully</font>";
		}
		else{
			$_SESSION['response']="<font color='#cc0000'>Failled to add Expense ".mysqli_error($con)."</font>";
		}
	}
	header("Location:incure_cashflow.php");
?>