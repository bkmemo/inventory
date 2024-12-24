<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	$con = db_connect();
	$sale_details_id = $_GET["sale_details_id"];
	//GET QUANTITY SOLD ON THE SALE_DETAILS ID
	$query11 = mysqli_query($con,"SELECT * FROM sales_details inner join item_stock on
	sales_details.ITEM_ID = item_stock.ITEM_ID WHERE sales_details.SALE_DETAILS_ID='$sale_details_id'");
	while($result11=mysqli_fetch_assoc($query11)){
		$available_quantity = $result11['QUANTITY']; //quantity in stock
		$quantity_sold = $result11['QUANTITY_SOLD']; //quantity sold
		$item_id = $result11['ITEM_ID'];
		$sale_id = $result11['SALES_ID'];
	}
	//CALCULATE NEW PRODUCT QUANTITY
	$new_stock_quantity = $available_quantity+$quantity_sold;
	
	//DELETE SALE FROM DATABASE
	$query="DELETE FROM sales_details WHERE SALE_DETAILS_ID='$sale_details_id'";
	$query_run=mysqli_query($con,$query);
	
	if($query_run){
		//UPDATE PRODUCT STOCK
		mysqli_query($con,"UPDATE item_stock SET QUANTITY=$new_stock_quantity WHERE ITEM_ID='$item_id'");
						
		$_SESSION['response'] = "<h4><font color='green'>Item successfully Deleted from invoice</font></h4>";
	}
	else{
		$_SESSION['response'] = "<h4><font color='green'>".mysqli_error($con)."</font></h4>";
	}
	
	header("Location: edit_sales.php?sale_id=$sale_id");
?>