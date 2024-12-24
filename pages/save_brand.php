<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	include_once 'log.php';
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	

if (isset($_POST['save_brand'])) {
    $brand_name = mysqli_real_escape_string($con, $_POST['brand_name']);

    $query0 = "SELECT * FROM brands WHERE brand_name='$brand_name'";
    $query_run0 = mysqli_query($con, $query0);

    if (mysqli_num_rows($query_run0) <= 0) {
        $query = "INSERT INTO brands (brand_name) VALUES ('$brand_name')";
        if (mysqli_query($con, $query)) {
            $_SESSION['response'] = true;
            $_SESSION['response'] = 'Brand has been added to the database';
			include ("add_brand_phone.php");
        } else {
            $_SESSION['response'] = 'Failed to add brand to the database: ' . mysqli_error($con);
			include ("add_brand_phone.php");
        }
    } else {
        $_SESSION['response'] = 'Brand already exists in the database';
		include ("add_brand_phone.php");
    }
} else {
    $_SESSION['response'] = 'All fields are required';
	include ("add_brand_phone.php");
}

echo json_encode($response);
?>
