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
		$customer_name = $_POST['customer_name'];
		$amount_paid = $_POST['amount_paid'];
		//$total_amount = $_POST['amount'];

        $customer = $_POST['customer'];
		$customer_telephone = $_POST['customer_telephone'];
		
		$date_of_sale = $_POST['date_of_sale'];
		$date_of_sale = strtotime( $date_of_sale );
		$date_of_sale = date( 'Y-m-d H:i:s', $date_of_sale );
		
		$proceed = false;
		
		$result = mysqli_query($con,"INSERT INTO sales (`USER_ID`, `CUSTOMER_ID`, `DATE_OF_SALE`)
		VALUES ((select id from user where username='$username'), (select customer_id from customer where customer_name='$customer_name'),'$date_of_sale')");
		
		if($result){
			$row = 1;
			for($i =0; $i<count($_POST['item_name']);$i++){
				$item_name  = $_POST['item_name'][$i];
				$quantity   = $_POST['quantity'][$i];
				$price      = $_POST['price'][$i];
				$amount     = $_POST['amount'][$i];
				//if(){
					//check if the item already exists on the sale invoice
					$result = mysqli_query($con,"SELECT * FROM sales_details WHERE SALES_ID=(select max(SALES_ID) from sales) && ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name')");
					if($result){
						$count = mysqli_num_rows($result);
						if($count<=0){
							//insert individual item purchase record
							$result = mysqli_query($con,"INSERT INTO sales_details (`SALES_ID`, `ITEM_ID`, `QUANTITY_SOLD`, `SELLING_PRICE`)
							VALUES((select max(SALES_ID) from sales),(select ITEM_ID from items where ITEM_NAME='$item_name'),'$quantity','$price')");
							if($result){
								//get current item quantity
								$query_run = mysqli_query($con,"select * from item_stock where ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name')");
								if(mysqli_num_rows($query_run)>0){
									while($result1=mysqli_fetch_assoc($query_run)){
										$available_quantity = $result1['QUANTITY'];
									}
									//calculate new quantity
									$new_quantity = $available_quantity-$quantity;
									//update item stock
									$result = mysqli_query($con,"UPDATE item_stock SET QUANTITY='$new_quantity' WHERE ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name')");
									if($result){
                                        //save selected serial numbers
                                        foreach ($_POST['serial_'.$row] as $serial){
                                            //save serial number
                                        	$result = mysqli_query($con,"INSERT INTO salesdetails_phones (`sales_details_id`, `phone_id`) VALUES ((select max(SALE_DETAILS_ID) from sales_details), (select phone_id from phones where serial_number='$serial'))");

                                        	//save customer name and telephone
						                    $result = mysqli_query($con,"UPDATE phones SET customer_name='$customer', customer_phone='$customer_telephone', phone_status='Sold' where serial_number='$serial'");

                                        } 
                                        
										$proceed = true;

									}
									else{
										$_SESSION['response'] = mysqli_error($con);	
									}
								}
								else{
									$_SESSION['response'] = "sjjjjjjjjjjjd";
								}
							}
							else{
								$_SESSION['response'] = mysqli_error($con);
							}
						}
					}
					else{
						$_SESSION['response'] = mysqli_error($con);	
					}
				//}

				$row++;	
			}//end of the for loop tha loops through all items
			//store the amount of money paid for the sale
			if($proceed){
				if($amount_paid>0){
					$result = mysqli_query($con,"INSERT INTO payments_received (`SALES_ID`, `AMOUNT_PAID`, `DATE_OF_PAYMENT`)
					VALUES((select max(SALES_ID) from sales),'$amount_paid','$date_of_sale')");
					if($result){
						//$_SESSION['response'] = "Sale has been added to the database";
					}
					else{
						//$_SESSION['response'] = mysqli_error($con);
					}
				}
				else{
					//$_SESSION['response'] = "Sale has been added to the database";
				}
			}
		}
		else{
			$_SESSION['response'] = mysqli_error($con);
		}
	}//end of the if save button
	//$_SESSION['response'] = "this is the number of items ".count($_POST['item_name']);
	header("location:add_sales.php");
	
?>