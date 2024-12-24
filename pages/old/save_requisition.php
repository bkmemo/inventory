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
		$username = $_SESSION['username'];
		$lpo_number = $_POST['lpo_number'];
		$ordered_By = $_SESSION['username'];
		$date_ordered = $_POST['date_ordered'];
		$date_ordered = strtotime($date_ordered);
		$date_ordered = date( 'Y-m-d H:i:s', $date_ordered );
		
		$date_required = $_POST['date_required'];
		$date_required = strtotime($date_required);
		$date_required = date( 'Y-m-d H:i:s', $date_required );
		
		$customer_name = $_POST['customer_name'];

		$proceed = false;
		$result = mysqli_query($con,"INSERT INTO requisition (customer_id, lpo_number, ordered_By, date_ordered, order_status, approved_by, date_required)
		VALUES ((select customer_id from customer where customer_name='$customer_name'), '$lpo_number','$ordered_By', '$date_ordered', 'Pending', 'Not Approved', '$date_required')");

		if($result){
			
			for($i =0; $i<count($_POST['item_name']);$i++){					  
				$item_name  = $_POST['item_name'][$i];
				$description  = $_POST['description'][$i];
				$quantity   = $_POST['quantity'][$i];
				$price      = $_POST['price'][$i];
				
				//check if the item already exists on the puchas invoice
				$result = mysqli_query($con,"SELECT * FROM  requisition_items_details WHERE requisition_id =(select max(requisition_id)  from requisition) && ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name')");
				if($result){
					$count = mysqli_num_rows($result);
					if($count<=0){
						//insert individual item purchase record
						$result = mysqli_query($con,"INSERT INTO  requisition_items_details (requisition_items_details_id,	requisition_id,	ITEM_ID, description, PURCHASED_QUANTITY, BUYING_PRICE)
						VALUES(null, (select max(requisition_id) from requisition),(select ITEM_ID from items where ITEM_NAME='$item_name'), '$description','$quantity','$price')")or die(mysqli_error($con));	
					}
				}
				else{
					$_SESSION['response'] = mysqli_error($con);	
				}
			}//end of the for loop tha loops through all items
			//store the amount of money paid for the purchase
			
		}
		else{
			$_SESSION['response'] = mysqli_error($con);
		}
	}//end of the if save button
	//$_SESSION['response'] = "this is the number of items ".count($_POST['item_name']);
	header("location:stock_request.php");
?>