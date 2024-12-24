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
		$purchase_id = $_POST['purchase_id'];
		$amount_paid = $_POST['amount_paid'];
		$receipt_no = $_POST['receipt_no'];
		$date_of_purchase = $_POST['purchase_date'];
		$date_of_purchase = strtotime( $date_of_purchase );
		$date_of_purchase = date( 'Y-m-d H:i:s', $date_of_purchase );
		$supplier_name = $_SESSION['supplier_name'];

        for($i =0; $i<count($_POST['item_name']);$i++){	
        	$purchase_details_id = $_POST['purchase_details_id'][$i];

			$result6 = mysqli_query($con,"SELECT * FROM purchased_items_details_phones WHERE purchased_items_details_id=$purchase_details_id");
			while($result66=mysqli_fetch_assoc($result6)){
				$phone_id = $result66['phone_id'];
				$result56 = mysqli_query($con,"SELECT * FROM phones p inner join salesdetails_phones sdp on p.phone_id=sdp.phone_id WHERE p.phone_id=$phone_id");
				$count56 = mysqli_num_rows($result56);
				if($count56<=0){
					$query14="DELETE FROM purchased_items_details_phones WHERE phone_id='$phone_id'";
					$query_run14=mysqli_query($con,$query14);
			
					$query18 = "DELETE FROM phones WHERE phone_id='$phone_id' && phone_status='OnSale'";
					$query_run18 = mysqli_query($con,$query18);
				}
			}
	    }
		
		$proceed = false;
		$quantity;
		for($i =0; $i<count($_POST['item_name']);$i++){					  
			$item_name  = $_POST['item_name'][$i];
			$quantity   = $_POST['quantity'][$i];
			$price      = $_POST['price'][$i];
			$amount     = $_POST['amount'][$i];
			$result34 = mysqli_query($con,"UPDATE purchased_items SET DATE_OF_PURCHASE='$date_of_purchase', RECEIPT_NO='$receipt_no' where  PURCHASE_ID=$purchase_id");
			$purchase_details_id = $_POST['purchase_details_id'][$i];
			$new_quantity = 0;
			//check if the item already exists on the purchase invoice
			$result = mysqli_query($con,"SELECT * FROM purchased_items_details WHERE PURCHASE_ID=$purchase_id && ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name')");
			if($result && $result34){
						
				//get old item purchased quantity
				while($result10=mysqli_fetch_assoc($result)){
					$quantity_purchased = $result10['PURCHASED_QUANTITY'];
				}
				
				//Store phone serial numbers
                        $serials =  explode(" ", $_POST['serial'][$i]);
                        foreach($serials as $serial_number){
                            $query09 = "SELECT * FROM phones WHERE serial_number='$serial_number'";
		                    $query_run09=mysqli_query($con, $query09)or die(mysqli_error($con));

		                        if(mysqli_num_rows($query_run09)<=0){
		                        	$query99="insert into phones (ITEM_ID, serial_number, supplier_id, register_date, phone_status) values((select ITEM_ID from items where ITEM_NAME='$item_name'), '$serial_number', (select supplier_id from suppliers where supplier_name='$supplier_name'), '$date_of_purchase', 'OnSale')";
		                        	$run = mysqli_query($con,$query99)or die(mysqli_error($con));

		                        	//save serial number
                                    $result123 = mysqli_query($con,"INSERT INTO purchased_items_details_phones (`purchased_items_details_id`, `phone_id`) VALUES ($purchase_details_id, (select phone_id from phones where serial_number='$serial_number'))");

		                        	$_SESSION['response'] = "$serial_number Add To The Database";
		                        }
		                        else{
									if(isset($serial_number) && $serial_number != null){
										$quantity = $quantity-1;
									}
		                        	$_SESSION['response'] = "$serial_number Already Exists In The Database";
		                        }
                        }
				//if new item on the invooice or old one that needs to be updated
				$count = mysqli_num_rows($result);
						
				if($count<=0){
					if(isset($purchase_details_id)){
						//updates item details
						$result = mysqli_query($con,"UPDATE purchased_items_details SET PURCHASE_ID=$purchase_id, ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name'), PURCHASED_QUANTITY=$quantity, BUYING_PRICE=$price where  PURCHASED_ITEM_DETAILS_ID=$purchase_details_id");
						//get current item quantity
						$query_run = mysqli_query($con,"select * from item_stock where ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name')");
						if(mysqli_num_rows($query_run)>0){
							while($result1=mysqli_fetch_assoc($query_run)){
								$available_quantity = $result1['QUANTITY'];
							}
						}
						//calculate new quantity
						$new_quantity = $available_quantity-$quantity_purchased; //first subtract old quantity
						$new_quantity = $new_quantity+$quantity; //add new quantity
					}
					else{
						//insert individual item purchase record
						$result = mysqli_query($con,"INSERT INTO purchased_items_details (`PURCHASE_ID`, `ITEM_ID`, `PURCHASED_QUANTITY`, `BUYING_PRICE`)
						VALUES('$purchase_id',(select ITEM_ID from items where ITEM_NAME='$item_name'),'$quantity','$price')");
						//get current item quantity
						$query_run = mysqli_query($con,"select * from item_stock where ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name')");
						if(mysqli_num_rows($query_run)>0){
							while($result1=mysqli_fetch_assoc($query_run)){
								$available_quantity = $result1['QUANTITY'];
							}
						}	 	 
						//calculate new quantity
						$new_quantity = $available_quantity+$quantity; //add new quantity
						//$_SESSION['response'] = "Item $item_name already exists on the invoice";
					}
				}
				else{
					//updates item details
					$result = mysqli_query($con,"UPDATE purchased_items_details SET PURCHASE_ID=$purchase_id, ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name'), PURCHASED_QUANTITY=$quantity, BUYING_PRICE=$price where  PURCHASED_ITEM_DETAILS_ID=$purchase_details_id");
					//get current item quantity
					$query_run = mysqli_query($con,"select * from item_stock where ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name')");
					if(mysqli_num_rows($query_run)>0){
						while($result1=mysqli_fetch_assoc($query_run)){
							$available_quantity = $result1['QUANTITY'];
						}
					}
					//calculate new quantity
					$new_quantity = $available_quantity-$quantity_purchased; //first subtract old quantity
					$new_quantity = $new_quantity+$quantity; //add new quantity	
				}
				
				if($result){
					//update item stock
					$result = mysqli_query($con,"UPDATE item_stock SET QUANTITY='$new_quantity' WHERE ITEM_ID=(select ITEM_ID from items where ITEM_NAME='$item_name')");
					if($result){

						$proceed = true;
					}
					else{
						$_SESSION['response'] = "a".mysqli_error($con);	
					}
				}
				else{
					$_SESSION['response'] = "b ".mysqli_error($con);
				}
			}
			else{
				$_SESSION['response'] = "c ".mysqli_error($con);	
			}
				//}
		}//end of the for loop tha loops through all items
		//store the amount of money paid for the sale
		if($proceed){
			//delete all previous payments
			$result = mysqli_query($con,"DELETE FROM payments_made WHERE PURCHASE_ID='$purchase_id'");
			if($amount_paid>0){
				if($result){
					$result = mysqli_query($con,"INSERT INTO payments_made (`PURCHASE_ID`, `AMOUNT_PAID`, `DATE_OF_PAYMENT`)
					VALUES('$purchase_id','$amount_paid','$date_of_purchase')");
					if($result){
						$_SESSION['response'] = "Purchase has been edited";
					}
					else{
						$_SESSION['response'] = mysqli_error($con);
					}
				}
				else{
					
				}
			}
			else{
				$_SESSION['response'] = "Purchase has been edited";
			}
			
		}
	}//end of the if save button
	//$_SESSION['response'] = "this is the number of items ".count($_POST['item_name']);
	header("location:edit_purchase.php?purchase_id=$purchase_id");
	
?>