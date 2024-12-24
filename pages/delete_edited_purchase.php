<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	$con = db_connect();
	$purchase_details_id = $_GET["purchase_details_id"];
	//GET QUANTITY SOLD ON THE SALE_DETAILS ID
	$query11 = mysqli_query($con,"SELECT * FROM purchased_items_details inner join item_stock on
	purchased_items_details.ITEM_ID = item_stock.ITEM_ID WHERE purchased_items_details.PURCHASED_ITEM_DETAILS_ID='$purchase_details_id'");
	while($result11=mysqli_fetch_assoc($query11)){
		$available_quantity = $result11['QUANTITY']; //quantity in stock
		$quantity_purchased = $result11['PURCHASE_QUANTITY']; //quantity bought
		$item_id = $result11['ITEM_ID'];
		$purchase_id = $result11['PURCHASE_ID']; 
	}
	//CALCULATE NEW PRODUCT QUANTITY
	$new_stock_quantity = $available_quantity-$quantity_purchased;
	
	//DELETE PURCHASE FROM DATABASE
	$query="DELETE FROM purchased_items_details WHERE  PURCHASED_ITEM_DETAILS_ID ='$purchase_details_id'";
	$query_run=mysqli_query($con,$query);
	
	if($query_run){
		//UPDATE PRODUCT STOCK
		mysqli_query($con,"UPDATE item_stock SET QUANTITY=$new_stock_quantity WHERE ITEM_ID='$item_id'");
						
		$_SESSION['response'] = "<h4><font color='green'>Item successfully Deleted from Purchase Invoice</font></h4>";
	}
	else{
		$_SESSION['response'] = "<h4><font color='green'>".mysqli_error($con)."</font></h4>";
	}
	
	header("Location: edit_purchase.php?purchase_id=$purchase_id");
?>