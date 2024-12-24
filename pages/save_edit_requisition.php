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
	if(isset($_POST['save_edit_requisition'])){
		$requisition_id = $_POST['requisition_id'];
		$lpo_number = $_POST['lpo_number'];
		$ordered_By = $_POST['username'];
		$destination = $_POST['destination'];
		$date_ordered = $_POST['date_ordered'];
		$date_ordered = strtotime( $date_ordered );
		$date_ordered = date( 'Y-m-d H:i:s', $date_ordered );
		
		$date_required = $_POST['date_required'];
		$date_required = strtotime( $date_required );
		$date_required = date( 'Y-m-d H:i:s', $date_required );
		
		$proceed = false;
		for($i =0; $i<count($_POST['item_name']);$i++){					  
			$item_name  = $_POST['item_name'][$i];
			$quantity   = $_POST['quantity'][$i];
			$price      = $_POST['price'][$i];
			$amount     = $_POST['amount'][$i];
			$result34 = mysqli_query($con,"UPDATE requisition SET lpo_number='$lpo_number', ordered_By='$ordered_By', destination='$destination', date_ordered='$date_ordered',  date_required='$date_required' where  requisition_id=$requisition_id");
		    $requisition_items_details_id = $_POST['requisition_items_details_id'][$i];
			//check if the item already exists on the purchase invoice
			$result = mysqli_query($con,"SELECT * FROM requisition_items_details WHERE requisition_id='$requisition_id' && ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name')");
			if($result && $result34){
				$count = mysqli_num_rows($result);
				if($count<=0){
					if(isset($requisition_items_details_id)){
						//updates item details
						$result = mysqli_query($con,"UPDATE requisition_items_details SET requisition_id=$requisition_id, ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name'), PURCHASED_QUANTITY=$quantity, BUYING_PRICE=$price where  requisition_items_details_id=$requisition_items_details_id")or die(mysqli_error($con));
					}
					else{
						//insert individual item purchase record
						$result = mysqli_query($con,"INSERT INTO requisition_items_details (`requisition_id`, `ITEM_ID`, `PURCHASED_QUANTITY`, `BUYING_PRICE`)
						VALUES('$requisition_id',(select ITEM_ID from items where ITEM_NAME='$item_name'),'$quantity','$price')");
						$_SESSION['response'] = "New Stock Added";
						
					}
				}
				else{
					$result = mysqli_query($con,"UPDATE requisition_items_details SET requisition_id=$requisition_id, ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name'), PURCHASED_QUANTITY='$quantity', BUYING_PRICE='$price' where  requisition_items_details_id='$requisition_items_details_id'")or die(mysqli_error($con));
					$_SESSION['response'] = "Stock Updated";
				}
			}
			else{
				$_SESSION['response'] = "c ".mysqli_error($con);	
			}
				//}
		}//end of the for loop tha loops through all items
		//store the amount of money paid for the sale
	}//end of the if save button
	//$_SESSION['response'] = "this is the number of items ".count($_POST['item_name']);
	header("location:edit_requisition.php?requisition_id=$requisition_id");
	
?>