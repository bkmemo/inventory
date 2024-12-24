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
	if(isset($_POST["pay"])){
		$amount = $_POST["amount"];
		$purchase_id = $_POST["purchase_id"];
		$balance = $_POST["balance"];
		
		//$date_of_payment = $_POST['date_of_payment'];
		//$date_of_payment = strtotime( $date_of_payment );
		//$date_of_payment = date( 'Y-m-d H:i:s', $date_of_payment );
		$date_of_payment = date('Y-m-d');
		
		if($amount>$balance){
			$_SESSION['response'] = "Can't pay more than what is owed";
		}
		else if($amount<=0){
			$_SESSION['response'] = "Can't pay Zero amount";
		}
		else{  // 
			$result = mysqli_query($con,"INSERT INTO payments_made (`PURCHASE_ID`, `AMOUNT_PAID`, `DATE_OF_PAYMENT`)
						VALUES('$purchase_id','$amount','$date_of_payment')");
			if($result){
				$_SESSION['response'] = "Payment has been saved";
			}
			else{
				$_SESSION['response'] = mysqli_error($con);
			}
		}
		
	}
	else{
		$_SESSION['response'] = "";
	}
	header("location:make_payment.php");
?>