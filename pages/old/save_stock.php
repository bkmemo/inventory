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
		$supplier_name = $_POST['supplier_name'];
		$receipt_no = $_POST['receipt_no'];
		$amount_paid = $_POST['amount_paid'];
		//$total_amount = $_POST['amount'];
		
		$purchase_date = $_POST['purchase_date'];
		$purchase_date = strtotime( $purchase_date );
		$purchase_date = date( 'Y-m-d H:i:s', $purchase_date );
		
		$proceed = false;
		
		$result = mysqli_query($con,"INSERT INTO purchased_items (`USER_ID`, `SUPPLIER_ID`, `DATE_OF_PURCHASE`, `RECEIPT_NO`)
		VALUES ((select id from user where username='$username'), (select supplier_id from suppliers where supplier_name='$supplier_name'),'$purchase_date', '$receipt_no')");
		}
		
		if($result){
			$index = 1;
			for($i =0; $i<count($_POST['item_name']);$i++){					  
				$item_name  = $_POST['item_name'][$i];
				$quantity   = $_POST['quantity'][$i];
				$price      = $_POST['price'][$i];
				$amount     = $_POST['amount'][$i];
				//check if the item already exists on the puchas invoice
				$result = mysqli_query($con,"SELECT * FROM purchased_items_details WHERE PURCHASE_ID=(select max(PURCHASE_ID)  from purchased_items) && ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name')");
				if($result){
					$count = mysqli_num_rows($result);
					if($count<=0){
						
							
						//insert individual item purchase record
						$result = mysqli_query($con,"INSERT INTO purchased_items_details (`PURCHASE_ID`, `ITEM_ID`, `PURCHASED_QUANTITY`, `BUYING_PRICE`)
						VALUES((select max(PURCHASE_ID) from purchased_items),(select ITEM_ID from items where ITEM_NAME='$item_name'),'$quantity','$price')");
						if($result){
							
							//Store phone serial numbers
                            $serials =  explode(" ", preg_replace('/\s/', ' ', trim($_POST['serial'][$i])));
                            foreach($serials as $serial_number){
								if(isset($serial_number) && $serial_number != null){

									$query09 = "SELECT * FROM phones WHERE serial_number='$serial_number'";
									$query_run09=mysqli_query($con, $query09)or die(mysqli_error($con));

									if(mysqli_num_rows($query_run09)<=0){
										//add new item to the database
										//$query="insert into phones (brand_id, ITEM_ID, serial_number, supplier_id, register_date) values((select brand_id from brands where brand_name='$brand_name'), (select ITEM_ID from items where ITEM_NAME='$item_name'), '$serial_number', (select supplier_id from suppliers where supplier_name='$supplier_name'), '$purchase_date')";
										$query99="insert into phones (ITEM_ID, serial_number, supplier_id, register_date, phone_status) values((select ITEM_ID from items where ITEM_NAME='$item_name'), '$serial_number', (select supplier_id from suppliers where supplier_name='$supplier_name'), '$purchase_date', 'OnSale')";
										$run = mysqli_query($con,$query99)or die(mysqli_error($con));

										//save serial number
										$result = mysqli_query($con,"INSERT INTO purchased_items_details_phones (`purchased_items_details_id`, `phone_id`) VALUES ((select max(PURCHASED_ITEM_DETAILS_ID) from purchased_items_details), (select phone_id from phones where serial_number='$serial_number'))");
										$_SESSION['response'] = "$serial_number Add To The Database";
									}
									else{
										$quantity = $quantity-1;
										$_SESSION['response'] = "$serial_number Already Exists In The Database";
									}
								}
                            }
							
							$result = mysqli_query($con,"UPDATE purchased_items_details SET PURCHASED_QUANTITY='$quantity' WHERE PURCHASED_ITEM_DETAILS_ID =(select max(PURCHASED_ITEM_DETAILS_ID) from purchased_items_details)");	
							
							//get current item quantity
							$query_run = mysqli_query($con,"select * from item_stock where ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name')");
							if(mysqli_num_rows($query_run)>0){
								while($result1=mysqli_fetch_assoc($query_run)){
									$available_quantity = $result1['QUANTITY'];
								}
								//calculate new quantity
								$new_quantity = $quantity+$available_quantity;
								//update item stock
								$result = mysqli_query($con,"UPDATE item_stock SET QUANTITY='$new_quantity' WHERE ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name')");
								if($result){
									$proceed = true;
								}
								else{
									$_SESSION['response'] = mysqli_error($con);	
								}
							}
							else{
								//Add new item to a store
								$result989 = mysqli_query($con,"INSERT INTO item_stock (`ITEM_ID`,`QUANTITY`)
								VALUES((select ITEM_ID from items where ITEM_NAME='$item_name'),'$quantity')");
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
			}//end of the for loop tha loops through all items
			//store the amount of money paid for the purchase
			if($proceed){
				if($amount_paid>0){
					$result = mysqli_query($con,"INSERT INTO payments_made (`PURCHASE_ID`, `AMOUNT_PAID`, `DATE_OF_PAYMENT`)
					VALUES((select max(PURCHASE_ID) from purchased_items),'$amount_paid','$purchase_date')");
					if($result){
						$_SESSION['response'] = "Purchase has been added to the database";
					}
					else{
						$_SESSION['response'] = mysqli_error($con);
					}
				}
				else{
					$_SESSION['response'] = "Purchase has been added to the database";
				}
			}
		
	}//end of the if save button
	//$_SESSION['response'] = "this is the number of items ".count($_POST['item_name']);
	header("location:add_stock.php");
	
?>