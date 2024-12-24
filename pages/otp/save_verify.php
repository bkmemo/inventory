<?php 
session_start();

include_once("inc/db_connect.php");
$errorMessage = '';
if(!empty($_POST["authenticate"]) && $_POST["otp"]!='') {
	$sqlQuery = "SELECT * FROM authentication WHERE otp='". $_POST["otp"]."' AND expired!=1 AND NOW() <= DATE_ADD(created, INTERVAL 1 HOUR)";
	$result = mysqli_query($conn, $sqlQuery);
	$count = mysqli_num_rows($result);
	if(!empty($count)) {
		$sqlUpdate = "UPDATE authentication SET expired = 1 WHERE otp = '" . $_POST["otp"] . "'";
		$result = mysqli_query($conn, $sqlUpdate);
		header("Location:welcome.php");
	} else {
		$errorMessage = "Invalid OTP!";
	}	
} else if(!empty($_POST["otp"])){
	$errorMessage = "Enter OTP!";	
}	
?>