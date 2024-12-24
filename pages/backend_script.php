<?php
session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	include "functions.php";
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}


// Check if the 'selectedValue' parameter is set in the POST request
if(isset($_GET['selectedValue'])){
    // Sanitize the input to prevent SQL injection (you should use prepared statements for better security)
    $selectedValue = $_GET['selectedValue'];
    // Query the database (replace 'your_table' with your actual table name)
    //$sql = "SELECT * FROM your_table WHERE column_name = '$selectedValue'";
	//$sql="select pid.BUYING_PRICE from phones p inner join purchased_items_details_phones pidp on p.phone_id=pidp.phone_id inner join purchased_items_details pid on pid.purchased_items_details_id=pidp.PURCHASED_ITEM_DETAILS_ID  where p.serial_number='$selectedValue'";
	
	$sql = "SELECT pid.BUYING_PRICE 
        FROM phones p 
        INNER JOIN purchased_items_details_phones pidp ON p.phone_id = pidp.phone_id 
        INNER JOIN purchased_items_details pid ON pid.PURCHASED_ITEM_DETAILS_ID = pidp.purchased_items_details_id  
        WHERE p.serial_number = '$selectedValue'";
	
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["BUYING_PRICE"];
        }
    } else {
        echo "No data found";
    }

    // Close the database connection
    $con->close();
} else {
    echo "Error: 'selectedValue' not set in the request.";
}
?>