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
	
	$query="SELECT * FROM purchased_items_details_phones WHERE phone_id=$_GET[phone_id]";
	$result=mysqli_query($con,$query);
	$number_of_results = mysqli_num_rows($result);
	if($number_of_results>0){
		$query="DELETE FROM purchased_items_details_phones WHERE phone_id=$_GET[phone_id]";
		$result = mysqli_query($con,$query);
								//get current item quantity
								$query_run = mysqli_query($con,"select * from item_stock inner join phones on item_stock.ITEM_ID = phones.ITEM_ID  where phones.phone_id=$_GET[phone_id]");
								if(mysqli_num_rows($query_run)>0){
									while($result1=mysqli_fetch_assoc($query_run)){
										$ITEM_ID = $result1['ITEM_ID'];
										$available_quantity = $result1['QUANTITY'];
									}
									$new_quantity = $available_quantity-1;
									$result1 = mysqli_query($con,"UPDATE item_stock SET QUANTITY='$new_quantity' WHERE ITEM_ID='$ITEM_ID'");
									
								}	
		if($result){
				echo "<strong><font color='green'> Successfuly Deleted successfully</font></strong>";
				include ("show_purchased_items_details_phones.php");	
		}
		else{
				echo "<strong><font color='red'> Sorry try again</font></strong>";
					include ("show_purchased_items_details_phones.php");	
		}
	}
	else{
				echo "<strong><font color='red'>Can't delete Brand First, Delete all records that depend on it</font></strong>";
					include ("show_purchased_items_details_phones.php");	
	}
?>