<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	if(isset($_POST['save'])){
		$expense_name = $_POST['EXPENSE_NAME'];
		$Descreption = $_POST['Descreption'];
		$amount_spent = $_POST['amount_spent'];
		
		$date = $_POST['expense_date'];
		$date = strtotime( $date );
		$date = date( 'Y-m-d H:i:s', $date );
		
		$result = mysqli_query($con,"INSERT INTO expenses_incured (`EXPENSE_ID`,`Descreption`,`AMOUNT_SPENT`, `DATE`)
		VALUES ((select EXPENSE_ID from expenses where EXPENSE_NAME='$expense_name'),'$Descreption', '$amount_spent', '$date')");
		if($result){
			$_SESSION['response']="<font color='green'>Added Successfully</font>";
		}
		else{
			$_SESSION['response']="<font color='#cc0000'>Failled to add Expense ".mysqli_error($con)."</font>";
		}
	}
	header("Location:incure_expenses.php");
?>