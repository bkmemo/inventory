<?php
session_start(); // Start the session at the top of the page

include_once "connect.php"; // Include the database connection
error_reporting(0); // Suppress notice messages
error_reporting(E_ALL ^ E_NOTICE); // Optionally handle all errors except notices

$con = db_connect(); // Connect to the database

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if the session variable "username" does not exist
    header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!");
    exit(); // Ensure the script stops executing after the redirect
}

// Include header file
include("../pages/header.php");

$errorMessage = '';

// Check if the OTP form is submitted
if (!empty($_POST["authenticate"]) && $_POST["otp"] != '') {
    // Prepare and execute the SQL query to check the OTP
    $otp = mysqli_real_escape_string($con, $_POST["otp"]); // Escape the OTP input
	$today = date( 'Y-m-d H:i:s' );
    $sqlQuery = "SELECT * FROM authentication WHERE otp='$otp' AND expired!=1 AND '$today' <= DATE_ADD(created, INTERVAL 1 HOUR)";
    $result = mysqli_query($con, $sqlQuery);
    $count = mysqli_num_rows($result);

    if (!empty($count)) {
        // If the OTP is valid, mark it as expired
        $sqlUpdate = "UPDATE authentication SET expired = 1 WHERE otp = '$otp'";
        mysqli_query($con, $sqlUpdate);

        // Fetch user details based on the email address stored in the session
        $email_address = $_SESSION["username"];
        $query = "SELECT username FROM user WHERE email_address='$email_address'";
        $query_run = mysqli_query($con, $query);
        $a = mysqli_fetch_assoc($query_run); // Fetch a single row

        // Retrieve the username and redirect to the index page
       $_SESSION["username"] = $a['username'];
        header('Location: index.php');
        exit(); // Ensure the script stops executing after the redirect
    } else {
        $errorMessage = "Invalid OTP!";
    }
} elseif (!empty($_POST["otp"])) {
    $errorMessage = "Enter OTP!";
}
?>