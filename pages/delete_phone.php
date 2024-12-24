<?php
	session_start(); // Use session variable on this page. This function must be put at the top of the page.
	include_once "connect.php"; 
	error_reporting(0);
	include_once 'log.php';
	error_reporting(E_ALL ^ E_NOTICE);
	$con = db_connect();

	if (!isset($_SESSION['username'])) { // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to login.php
	}

	$phone_id = $_GET['phone_id'];
	$query = "SELECT * FROM phones WHERE phone_id='$phone_id'";
	$result = mysqli_query($con, $query);
	$number_of_results = mysqli_num_rows($result);

	if ($number_of_results > 0) {
		$query = "DELETE FROM phones WHERE phone_id='$phone_id'";
		$result = mysqli_query($con, $query);
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

		if ($result) {
			echo "<center><strong><font color='green'>Phone successfully deleted.</font></strong></center>";
			include ("add_new_phone.php");
		} else {
			// Check for foreign key constraint error
			if (mysqli_errno($con) == 1451) {
				echo "<center><strong><font color='red'>Cannot delete this phone. Please delete all dependent records first.</font></strong></center>";
			} else {
				echo "<center><strong><font color='red'>Failed to delete phone. Error: " . mysqli_error($con) . "</font></strong></center>";
			}
			include ("add_new_phone.php");
		}
	} else {
		echo "<center><strong><font color='red'>Phone not found.</font></strong></center>";
		include ("add_new_phone.php");
	}
?>
