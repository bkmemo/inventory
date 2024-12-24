<?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	$con = db_connect();
	error_reporting(0);
	include_once 'log.php';
	error_reporting (E_ALL ^ E_NOTICE);
	//$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}	

	$SALES_ID = $_POST['sale_id'];
	
	$query="SELECT * FROM sales WHERE SALES_ID=$SALES_ID";
	$result=mysqli_query($con,$query);
	$number_of_results = mysqli_num_rows($result);
	if($number_of_results>0){
		//Remove payment made
		$payment_total = 0;
		$payment_query="SELECT * FROM payments_received WHERE SALES_ID=$SALES_ID";
		$payment_results=mysqli_query($con,$payment_query);
		if (mysqli_num_rows($payment_results) > 0) {
			while ($payment_result = mysqli_fetch_assoc($payment_results)) {
				$payment_total = $payment_total + $payment_result['AMOUNT_PAID'];
			}
			$delete_sales_result = mysqli_query($con, "DELETE FROM payments_received WHERE SALES_ID=$SALES_ID" );
		}

		//Get sale_details
		$sales_details_results = mysqli_query($con, "SELECT * FROM sales_details WHERE SALES_ID=$SALES_ID");
		if (mysqli_num_rows($sales_details_results) > 0) {
			while ($sales_details_result = mysqli_fetch_assoc($sales_details_results)) {

				$sales_details_id = $sales_details_result['SALE_DETAILS_ID'];
				$item_id = $sales_details_result['ITEM_ID'];
				$quantity_sold = $sales_details_result['QUANTITY_SOLD'];
				$available_quantity = 0;

				//Get avaible item quantity
				$item_stock_query_run = mysqli_query($con, "SELECT * FROM item_stock WHERE ITEM_ID=$item_id");
                        	if (mysqli_num_rows($item_stock_query_run) > 0) {
	                        	while ($item_stock_query_run0 = mysqli_fetch_assoc($item_stock_query_run)) {
	                                	$available_quantity = $item_stock_query_run0['QUANTITY'];
	                            	}
	                    	}
                        
                            	$new_quantity = $available_quantity - $quantity_sold;

				//Update Item Stock
				$result = mysqli_query($con, "UPDATE item_stock SET QUANTITY='$new_quantity' WHERE ITEM_ID=$item_id");

				//Update phone status to OnSale
				$salesdetails_phones_results = mysqli_query($con, "SELECT * FROM salesdetails_phones WHERE sales_details_id=$sales_details_id");
				if (mysqli_num_rows($salesdetails_phones_results) > 0) {
					while ($salesdetails_phones_result = mysqli_fetch_assoc($salesdetails_phones_results)) {
						$phone_id = intval($salesdetails_phones_result['phone_id']);
						// Prepare the update statement
						$stmt = $con->prepare("UPDATE phones SET PDATE_OF_SALE=NULL, customer_name=NULL, customer_phone=NULL, phone_status='OnSale' WHERE phone_id=$phone_id");
						if ($stmt === false) {
						    // Error in preparing the statement
						    //die("Error in preparing the statement: " . $con->error);
						}
						// Execute the statement
						if ($stmt->execute()) {
						    //echo "Phone details updated successfully.";
						} else {
						    //echo "Error: " . $stmt->error;
						}
						// Close the statement
						$stmt->close();
						
					}
				}

				//DELETE ITEM FROM SALE. (SALES_DETAILS)
				$delete_sales_details_result = mysqli_query($con, "DELETE FROM sales_details WHERE SALE_DETAILS_ID=$sales_details_id");

			}
		}



		//DELETE SALE
		$delete_sales_result = mysqli_query($con, "DELETE FROM sales WHERE SALES_ID=$SALES_ID" );

		/*$result = mysqli_query($con, "INSERT INTO payments_received (`SALES_ID`, `AMOUNT_PAID`, `DATE_OF_PAYMENT`)
                    VALUES ((SELECT MAX(SALES_ID) FROM sales), '$amount_paid', '$date_of_sale')");*/

		
		/*if($delete_sales_result){
			echo "<strong><font color='green'> Successfuly Deleted successfully</font></strong>";
			include ("add_new_phone.php");	
		}
		else{
			echo "Error: " . mysqli_error($con);;
			echo "<strong><font color='red'> Sorry try again</font></strong>";
			include ("add_new_phone.php");	
		}*/
		
	}

	header("Location:customer_transaction_history.php");

?>
