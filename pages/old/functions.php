<?php
	function get_totals($supplier_name){
		$con = db_connect();
		$query="select * from purchased_items inner join suppliers on purchased_items.SUPPLIER_ID=suppliers.supplier_id where purchased_items.SUPPLIER_ID=(select supplier_id from suppliers where supplier_name='$supplier_name') order by purchased_items.PURCHASE_ID desc";
		$query_run = mysqli_query($con,$query);
        if($query_run){
        	$count = mysqli_num_rows($query_run);
            if($count>0){
				$total_amount_for_all_invoices=0;
				$total_amount_paid_for_all_invoices=0;
                while($a=mysqli_fetch_assoc($query_run)){
                	$purchase_id=$a['PURCHASE_ID'];
					$date_of_purchase=$a['DATE_OF_PURCHASE'];
					$query1="select * from purchased_items_details inner join  items  where purchased_items_details.PURCHASE_ID=$purchase_id";
           			$query_run1 = mysqli_query($con,$query1);
					$total_invoice_price=0;
					while($a1=mysqli_fetch_assoc($query_run1)){
						$item_name = $a1['ITEM_NAME'];
						$quantity = $a1['PURCHASED_QUANTITY']; 
						$price = $a1['BUYING_PRICE'];
						$total = $quantity*$price;
						$total_invoice_price = $total_invoice_price+$total;
					}
					//get amount paid for each invoice
					$query2="select * from payments_made where PURCHASE_ID=$purchase_id";
           			$query_run2 = mysqli_query($con,$query2);
					$total_amount_paid=0;
					while($a2=mysqli_fetch_assoc($query_run2)){
						$total_amount_paid = $total_amount_paid+$a2['AMOUNT_PAID'];
					}
					//calculate total amount for all invoices
					$total_amount_for_all_invoices = $total_amount_for_all_invoices+$total_invoice_price;
					$total_amount_paid_for_all_invoices = $total_amount_paid_for_all_invoices+$total_amount_paid;
				}//end of the first while loop
				//calculate balance
				$total_balance = $total_amount_for_all_invoices-$total_amount_paid_for_all_invoices;
				echo "<table style='width:100%;'>";
					echo "<tr style='' bgcolor='#000' class='success'>";
						echo "<th style='width:20%; color:#ffffff;'><h4><strong>Total Amount</strong></h4></th>";
						echo "<td style='width:20%; color:#ffffff;'><h4>$total_amount_for_all_invoices</h4></td>";
						echo "<th style='width:15%; color:#ffffff;'><h4><strong>Paid</strong></h4></th>";
						echo "<td style='width:15%; color:#ffffff; text-align:left;'><h4>$total_amount_paid_for_all_invoices</h4></td>";
						echo "<th style='width:15%; color:#ffffff;'><h4><strong>Balance</strong></h4></th>";
						echo "<td style='width:15%; color:#ffffff; text-align:right; padding-right:5px;'><h4>$total_balance</h4></td>";
					echo "</tr>";
				echo "</table>";
		  	}
		}	
	}
	
	function payment_history($supplier_name){
		$con = db_connect();
		   if(isset($_POST['search'])){
		   		$search_value = $_POST['search_value'];
           		$query="select * from purchased_items inner join payments_made on purchased_items.PURCHASE_ID=payments_made.PURCHASE_ID where payments_made.DATE_OF_PAYMENT like '%$search_value%' && purchased_items.SUPPLIER_ID=(select supplier_id from suppliers where supplier_name='$supplier_name') order by purchased_items.PURCHASE_ID desc";
		   }
		   else{
			    $query="select * from purchased_items inner join payments_made on purchased_items.PURCHASE_ID=payments_made.PURCHASE_ID where purchased_items.SUPPLIER_ID=(select supplier_id from suppliers where supplier_name='$supplier_name') order by purchased_items.PURCHASE_ID desc";
		   }
		   $query_run = mysqli_query($con,$query);
           if($query_run){
              $count = mysqli_num_rows($query_run);
              if($count>0){
				  echo "<table class='table table-striped'>";
					echo "<thead>";
					echo "<tr bgcolor='#333333' style='color:#ffffff;'>";
						echo "<th>User</th></th>";
					    echo "<th>Date Of Payment</th>";
						echo "<th>Amount Paid</th>";
					echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
				    while($a=mysqli_fetch_assoc($query_run)){
                        $purchase_id=$a['PURCHASE_ID'];
						$date_of_payment = $a['DATE_OF_PAYMENT'];
						$amount_paid = $a['AMOUNT_PAID'];
						echo "<tr>";
							echo "<td>ss</td>";
							echo "<td>$date_of_payment</td>";
							echo "<td>$amount_paid</td>";
						echo "</tr>";
				    }
					echo "</tbody>";
				echo "</table>";
				  
			  }
		   }
	}//end of the payment_history function
	
	
	function payment_forms($supplier_name){
		$con = db_connect();
		$query="select * from purchased_items inner join suppliers on purchased_items.SUPPLIER_ID=suppliers.supplier_id where purchased_items.SUPPLIER_ID=(select supplier_id from suppliers where supplier_name='$supplier_name') order by purchased_items.PURCHASE_ID desc";
		$query_run = mysqli_query($con,$query);
        if($query_run){
        	$count = mysqli_num_rows($query_run);
            if($count>0){
				$total_amount_for_all_invoices=0;
				$total_amount_paid_for_all_invoices=0;
				echo "<table style='width:100%;' class='table table-striped'>";
				echo "<tr class='success'>";
						//echo "<th>Stock ID</th>";
						echo "<th>Date Of Purchase</th>";
						echo "<th>Total Amount</th>";
						echo "<th>Paid</th>";
						echo "<th>Balance</th>";
						echo "<th>Enter Amount</th>";
						echo "<th>Pay</th>";
						echo "<th style='text-align:right;'>Details&nbsp;&nbsp;&nbsp;</th>";
					echo "</tr>";
                while($a=mysqli_fetch_assoc($query_run)){
                	$purchase_id=$a['PURCHASE_ID'];
					$date_of_purchase=$a['DATE_OF_PURCHASE'];
					$query1="select * from purchased_items_details inner join items on purchased_items_details.ITEM_ID=items.ITEM_ID where PURCHASE_ID=$purchase_id";
           			$query_run1 = mysqli_query($con,$query1);
					$total_invoice_price=0;
					while($a1=mysqli_fetch_assoc($query_run1)){
						$item_name = $a1['ITEM_NAME'];
						$quantity = $a1['PURCHASED_QUANTITY']; 
						$price = $a1['BUYING_PRICE'];
						$total = $quantity*$price;
						$total_invoice_price = $total_invoice_price+$total;
					}
					//get amount paid for each invoice
					$query2="select * from payments_made where PURCHASE_ID=$purchase_id";
           			$query_run2 = mysqli_query($con,$query2);
					$total_amount_paid=0;
					while($a2=mysqli_fetch_assoc($query_run2)){
						$total_amount_paid = $total_amount_paid+$a2['AMOUNT_PAID'];
					}
					//calculate balance
					$balance = $total_invoice_price-$total_amount_paid;
					//only display purchased that have a pending balance
					if($balance>0){
						echo "<tr>";
							echo "<form method='post' action='save_purchase_payment.php' >";
							echo "<td>$date_of_purchase</td>";
							echo "<td>$total_invoice_price</td>";
							echo "<td>$total_amount_paid</td>";
							echo "<td>$balance</td>";
							echo "<td><input type='text' name='amount' class='form-control' /></td>";
							echo "<input type='hidden' name='purchase_id' value='$purchase_id' />";
							echo "<input type='hidden' name='balance' value='$balance' />";
							echo "<td><input name='pay' type='submit' value='Pay' class='btn btn-success'></td>";
							echo "</form>";
							echo "<td><input style='float:right;' name='pay' type='submit' value='Details' class='btn btn-success'></td>";
						echo "</tr>";
						$pending_purchase_payments = true;
					}
				}//end of the first while loop
				if(!$pending_purchase_payments){ //if no pending payments to be made
					echo "<tr><td colspan='6'><h3><font color='#cc0000'>No Pending Payments</font></h3></td></tr>";
				}
				echo "</table>";
		  	}
		}	
	}
	
	
	
	function get_customer_totals($customer_name){
		$con = db_connect();
		$query="select * from sales inner join customer on sales.CUSTOMER_ID=customer.customer_id where sales.CUSTOMER_ID=(select customer_id from customer where customer_name='$customer_name') order by sales.SALES_ID desc";
		$query_run = mysqli_query($con,$query);
        if($query_run){
        	$count = mysqli_num_rows($query_run);
            if($count>0){
				$total_amount_for_all_invoices=0;
				$total_amount_paid_for_all_invoices=0;
                while($a=mysqli_fetch_assoc($query_run)){
                	$sale_id=$a['SALES_ID'];
					$date_of_sale=$a['DATE_OF_SALE'];
					$query1="select * from sales_details inner join items on sales_details.ITEM_ID=items.ITEM_ID where sales_details.SALES_ID=$sale_id";
           			$query_run1 = mysqli_query($con,$query1);
					$total_invoice_price=0;
					while($a1=mysqli_fetch_assoc($query_run1)){
						$item_name = $a1['ITEM_NAME'];
						$quantity = $a1['QUANTITY_SOLD']; 
						$price = $a1['SELLING_PRICE'];
						$total = $quantity*$price;
						$total_invoice_price = $total_invoice_price+$total;
					}
					//get amount paid for each invoice
					$query2="select * from payments_received where SALES_ID=$sale_id";
           			$query_run2 = mysqli_query($con,$query2);
					$total_amount_paid=0;
					while($a2=mysqli_fetch_assoc($query_run2)){
						$total_amount_paid = $total_amount_paid+$a2['AMOUNT_PAID'];
					}
					//calculate total amount for all invoices
					$total_amount_for_all_invoices = $total_amount_for_all_invoices+$total_invoice_price;
					$total_amount_paid_for_all_invoices = $total_amount_paid_for_all_invoices+$total_amount_paid;
				}//end of the first while loop
				//calculate balance
				$total_balance = $total_amount_for_all_invoices-$total_amount_paid_for_all_invoices;
				echo "<table style='width:100%;'>";
					echo "<tr style='' bgcolor='#000' class='success'>";
						echo "<th style='width:20%; color:#ffffff;'><h4><strong>Total Amount</strong></h4></th>";
						echo "<td style='width:20%; color:#ffffff;'><h4>$total_amount_for_all_invoices</h4></td>";
						echo "<th style='width:15%; color:#ffffff;'><h4><strong>Paid</strong></h4></th>";
						echo "<td style='width:15%; color:#ffffff; text-align:left;'><h4>$total_amount_paid_for_all_invoices</h4></td>";
						echo "<th style='width:15%; color:#ffffff;'><h4><strong>Balance</strong></h4></th>";
						echo "<td style='width:15%; color:#ffffff; text-align:right; padding-right:5px;'><h4>$total_balance</h4></td>";
					echo "</tr>";
				echo "</table>";
		  	}
		}	
	}
	
function get_expense_totals(){
		$con = db_connect();
		$query0="select * from expenses inner join expenses_incured on expenses.EXPENSE_ID=expenses_incured.EXPENSE_ID group by expenses_incured.EXPENSE_ID order by expenses.EXPENSE_NAME ASC";
        $query_run0=mysqli_query($con,$query0);
		$total_expenses = 0;
        while($result0=mysqli_fetch_assoc($query_run0)){
			$expense_id=$result0['EXPENSE_ID'];
			$expense_name=$result0['EXPENSE_NAME'];
			$query="select * from expenses_incured where expenses_incured.EXPENSE_ID='$expense_id' order by DATE ASC";
			$query_run=mysqli_query($con,$query);
			$total = 0;
			while($result=mysqli_fetch_assoc($query_run)){
				$amount_spent = $result['AMOUNT_SPENT'];
				$date = $result['DATE']; 
				$total = $total+$amount_spent;
			}
			$total_expenses = $total_expenses+$total;
         }	
		 echo "<table style='width:100%;'>";
					echo "<tr bgcolor='#0' class='success'><th style='color:#ffffff;'><h4><strong>Total Amount</strong></h4></th><td style='color:#ffffff;'><h4><strong>$total_expenses</strong></h4></td></tr>";
	     echo "</table>";
	}
	
	function get_report($groupby,$date1,$date2){// SALES_ID 	USER_ID 	CUSTOMER_ID 	DATE_OF_SALE 
		$con = db_connect();
		$total_amount_for_all_invoices=0;
		$total_amount_paid_for_all_invoices=0;
		if($groupby=="Customer"){
		$query="select * from sales inner join customer on sales.CUSTOMER_ID=customer.customer_id where sales.DATE_OF_SALE BETWEEN '$date1' AND '$date2' group by sales.CUSTOMER_ID order by sales.CUSTOMER_ID asc";
		$query_run = mysqli_query($con,$query);
        if($query_run){
			$count = mysqli_num_rows($query_run);
			//echo $count;
            if($count>0){
				echo "<table style='width:100%;' class='table table-striped' align='left'>";
				echo "<tr style='background:#FF8C00; color:#ffffff;'>";
						echo "<th>Customer</th>";
						echo "<th>AmountPaid</th>";
						echo "<th>Balance</th>";
						echo "<th>Total</th>";
				echo "</tr>";
                while($a=mysqli_fetch_assoc($query_run)){
					$customer_id=$a['CUSTOMER_ID'];
					$query12="select * from sales inner join customer on sales.CUSTOMER_ID=customer.customer_id where sales.DATE_OF_SALE BETWEEN '$date1' AND '$date2' && sales.CUSTOMER_ID='$customer_id' order by sales.CUSTOMER_ID asc";
					$query_run12 = mysqli_query($con,$query12);
					$total_invoice_price=0;$total_amount_paid=0;
					while($a12=mysqli_fetch_assoc($query_run12)){
						$sale_id=$a12['SALES_ID'];
						$date_of_sale=$a12['DATE_OF_SALE'];
						$customer=$a12['customer_name'];
						$query1="select * from sales_details inner join items on sales_details.ITEM_ID=items.ITEM_ID where sales_details.SALES_ID=$sale_id";
						$query_run1 = mysqli_query($con,$query1);
						while($a1=mysqli_fetch_assoc($query_run1)){
							$item_name = $a1['ITEM_NAME'];
							$quantity = $a1['QUANTITY_SOLD']; 
							$price = $a1['SELLING_PRICE'];
							$total = $quantity*$price;
							$total_invoice_price = $total_invoice_price+$total;
						}
						//get amount paid for each invoice
						$query2="select * from payments_received where SALES_ID=$sale_id";
						$query_run2 = mysqli_query($con,$query2);
						while($a2=mysqli_fetch_assoc($query_run2)){
							$total_amount_paid = $total_amount_paid+$a2['AMOUNT_PAID'];
						}
						$balance = $total_invoice_price-$total_amount_paid;
					}
					echo "<tr>";
							echo "<td>$customer</td>";
							echo "<td>$total_amount_paid</td>";
							echo "<td>$balance</td>";
							echo "<td>$total_invoice_price</td>";
					echo "</tr>";
					//calculate total amount for all invoices
					$total_amount_for_all_invoices = $total_amount_for_all_invoices+$total_invoice_price;
					$total_amount_paid_for_all_invoices = $total_amount_paid_for_all_invoices+$total_amount_paid;
					$total_balance = $total_amount_for_all_invoices-$total_amount_paid_for_all_invoices;
					
				}//end of the first while loop
				//calculate balance
				//$total_balance = $total_amount_for_all_invoices-$total_amount_paid_for_all_invoices;
				echo "<tr class='success'>";
						echo "<th>TOTAL</th>";
						echo "<th>$total_amount_paid_for_all_invoices</th>";
						echo "<th>$total_balance</th>";
						echo "<th>$total_amount_for_all_invoices</th>";
					echo "</tr>";
				echo "</table>";
		  	}
			else{
				echo "<h2><font color='#cc0000'>Empty Result Set</font></h2>";
			}
		}
		
		}//end if groupby - Customer
		else if($groupby=="Item"){
		$query="select * from sales_details inner join sales inner join items on sales.SALES_ID=sales_details.SALES_ID && sales_details.ITEM_ID=items.ITEM_ID where sales.DATE_OF_SALE BETWEEN '$date1' AND '$date2' group by sales_details.ITEM_ID order by sales_details.ITEM_ID asc";
		$query_run = mysqli_query($con,$query);
        if($query_run){
			$count = mysqli_num_rows($query_run);
			//echo $count;
            if($count>0){
				echo "<table style='width:100%;' class='table table-striped'>";
				echo "<tr style='background:#FF8C00; color:#ffffff;'>";
						echo "<th>Item</th>";
						echo "<th>Qty Bought</th>";
						echo "<th>Qty Sold</th>";
						echo "<th>Available Qty</th>";
						echo "<th>Amount Spent</th>";
						echo "<th>Amount Sold</th>";
						echo "<th>Profit</th>";
				echo "</tr>";
                while($a=mysqli_fetch_assoc($query_run)){
					$item_id=$a['ITEM_ID'];	
					$item_name = $a['ITEM_NAME'];				
					$query2="select * from sales_details inner join sales on sales_details.SALES_ID=sales.SALES_ID where sales_details.ITEM_ID='$item_id' && sales.DATE_OF_SALE BETWEEN '$date1' AND '$date2'";
					$query_run2 = mysqli_query($con,$query2);
					$total_quantity = 0; $total_money_made = 0;
					while($a2=mysqli_fetch_assoc($query_run2)){
						$quantity = $a2['QUANTITY_SOLD']; 
						$price = $a2['SELLING_PRICE'];
						$total = $quantity*$price;
						$total_money_made = $total_money_made+$total;
						$total_quantity = $total_quantity+$quantity;
						
						
					}
					$query3="select * from purchased_items_details inner join purchased_items on purchased_items_details.PURCHASE_ID=purchased_items.PURCHASE_ID where purchased_items_details.ITEM_ID='$item_id' && purchased_items.DATE_OF_PURCHASE BETWEEN '$date1' AND '$date2'";
					$query_run3 = mysqli_query($con,$query3);
					$total_qty_bought = 0; $total_money_spent = 0;
					while($a3=mysqli_fetch_assoc($query_run3)){
						$bought = $a3['PURCHASED_QUANTITY'];
						$buying_price = $a3['BUYING_PRICE'];
						$money_spent = $bought*$buying_price;
						$total_money_spent = $total_money_spent+$money_spent;
						$total_qty_bought = $total_qty_bought+$bought;
					}
					$query4="select * from item_stock where ITEM_ID='$item_id'";
					$query_run4 = mysqli_query($con,$query4);
					while($a4=mysqli_fetch_assoc($query_run4)){
						$available_qty= $a4['QUANTITY'];
					}
					$profit = $total_money_made-$total_money_spent;
					echo "<tr>";
						echo "<td>$item_name</td>";
						echo "<td>$total_qty_bought</td>";
						echo "<td>$total_quantity</td>";
						echo "<td>$available_qty</td>";
						echo "<td>$total_money_spent</td>";
						echo "<td>$total_money_made</td>";
						if($profit>=0){echo "<td>$profit</td>";}else{echo "<td><font color='#cc0000'>$profit</font></td>";}
					echo "</tr>";
					
				}//end of the first while loop
				//calculate balance
				//$total_balance = $total_amount_for_all_invoices-$total_amount_paid_for_all_invoices;
				
				echo "</table>";
		  	}
			else{
				echo "<h2><font color='#cc0000'>Empty Result Set</font></h2>";
			}
		}
		}//end of if group by = Item
		else{
			$total_amount_paid_for_all_invoices = 0;
			$total_balance_for_all_invoices =0;
			$query="select * from sales inner join customer inner join sales_details on sales.CUSTOMER_ID=customer.customer_id && sales.SALES_ID=sales_details.SALES_ID where sales.DATE_OF_SALE BETWEEN '$date1' AND '$date2' group by sales.SALES_ID order by sales_details.SALES_ID asc";
			$query_run = mysqli_query($con,$query);
        	if($query_run){
				$count = mysqli_num_rows($query_run);
				//echo $count;
				if($count>0){
					while($a=mysqli_fetch_assoc($query_run)){
						$date_of_sale = $a['DATE_OF_SALE'];
						$sale_id = $a['SALES_ID'];
						$customer_name = $a['customer_name'];
						echo "<table style='width:100%;' class='table table-striped'>";
						echo "<tr style='background:#FF8C00; color:#ffffff;'>";
								echo "<th width='30%'>Invoice No: &nbsp;&nbsp;&nbsp;$sale_id</th>";
								echo "<th>Date Of Sale</th>";
								echo "<th>$date_of_sale</th>";
								echo "<th>$customer_name</th>";
						echo "</tr>";
						$query2="select * from sales_details inner join items on sales_details.ITEM_ID=items.ITEM_ID where sales_details.SALES_ID='$sale_id' order by items.ITEM_NAME asc";
						$query_run2 = mysqli_query($con,$query2);
						$count2 = mysqli_num_rows($query_run2);
						if($count2>0){
							echo "<tr style='background:#000000; color:#ffffff;'>";
								echo "<th>Item</th>";
								echo "<th>Quantity</th>";
								echo "<th>Unit Price</th>";
								echo "<th>Total</th>";  	 
							echo "</tr>";
							$total_invoice_price=0;
							while($a2=mysqli_fetch_assoc($query_run2)){
								echo "<tr>";			
									echo "<td>".$a2['ITEM_NAME']."</td>";
									echo "<td>".$a2['QUANTITY_SOLD']."</td>";
									echo "<td>".$a2['SELLING_PRICE']."</td>";
									echo "<td>".$a2['QUANTITY_SOLD']*$a2['SELLING_PRICE']."</td>";
								echo "</tr>";
								$total_invoice_price = $total_invoice_price+$a2['QUANTITY_SOLD']*$a2['SELLING_PRICE'];
							}
							//get amout of money paid fro each invoice
							$query3="select * from payments_received where SALES_ID='$sale_id'";
							$query_run3 = mysqli_query($con,$query3);
							$total_amount_paid=0;
							while($a3=mysqli_fetch_assoc($query_run3)){
								$total_amount_paid = $total_amount_paid+$a3['AMOUNT_PAID'];
							}
							$balance = $total_invoice_price-$total_amount_paid;
							echo "<tr style='background:#ffffff; color:#000000;'>";
								echo "<th colspan='3'>Amount Paid</th>";
								echo "<th>$total_amount_paid</th>";	 
							echo "</tr>";
							echo "<tr style='background:#ffffff; color:#000000;'>";
								echo "<th colspan='3'>Balance</th>";
								echo "<th>$balance</th>";	 
							echo "</tr>";
							echo "<tr style='background:#ffffff; color:#000000;'>";
								echo "<th colspan='3'>Total</th>";  
								echo "<th>$total_invoice_price</th>";	 
							echo "</tr>";
							$total_amount_for_all_invoices = $total_amount_for_all_invoices+$total_invoice_price;
							$total_amount_paid_for_all_invoices = $total_amount_paid_for_all_invoices+$total_amount_paid;
							$total_balance_for_all_invoices = $total_balance_for_all_invoices+$balance;
						}
						
					}
					echo "<tr style='background:#333333; color:#ffffff;'>";
						echo "<th>Overoll</th>";
						echo "<th>Amount Paid: &nbsp;&nbsp;$total_amount_paid_for_all_invoices</th>";
						echo "<th>Balance: &nbsp;&nbsp;$total_balance_for_all_invoices</th>";
						echo "<th>Total: &nbsp;&nbsp;$total_amount_for_all_invoices</th>";	 
					echo "</tr>";
					echo "</table>";
				}
				else{
					echo "<h2><font color='#cc0000'>Empty Result Set</font></h2>";
				}
			}
		}//end of if group by = -- Select --
	}
	function get_purchase_report($groupby,$date1,$date2){// SALES_ID 	USER_ID 	CUSTOMER_ID 	DATE_OF_SALE 
		$con = db_connect();
		$total_amount_for_all_invoices=0;
		$total_amount_paid_for_all_invoices=0;
		if($groupby=="Supplier"){
		$query="select * from purchased_items inner join suppliers on purchased_items.SUPPLIER_ID=suppliers.SUPPLIER_ID where purchased_items.DATE_OF_PURCHASE BETWEEN '$date1' AND '$date2' group by purchased_items.SUPPLIER_ID order by purchased_items.SUPPLIER_ID asc";
		$query_run = mysqli_query($con,$query);
        if($query_run){
			$count = mysqli_num_rows($query_run);
			//echo $count;
            if($count>0){
				echo "<table style='width:100%;' class='table table-striped' align='left'>";
				echo "<tr style='background:#FF8C00; color:#ffffff;'>";
						echo "<th>Supplier</th>";
						echo "<th>AmountPaid</th>";
						echo "<th>Balance</th>";
						echo "<th>DATE_OF_PAYMENT</th>";
						echo "<th>Total</th>";
				echo "</tr>";
                while($a=mysqli_fetch_assoc($query_run)){
					$SUPPLIER_ID=$a['SUPPLIER_ID'];
					$query12="select * from purchased_items inner join suppliers on purchased_items.SUPPLIER_ID=suppliers.SUPPLIER_ID where purchased_items.DATE_OF_PURCHASE BETWEEN '$date1' AND '$date2' && purchased_items.SUPPLIER_ID='$SUPPLIER_ID' order by purchased_items.SUPPLIER_ID asc";
					$query_run12 = mysqli_query($con,$query12);
					$total_invoice_price=0;$total_amount_paid=0;
					while($a12=mysqli_fetch_assoc($query_run12)){
						$PURCHASE_ID=$a12['PURCHASE_ID'];
						$DATE_OF_PURCHASE=$a12['DATE_OF_PURCHASE'];
						$supplier=$a12['supplier_name'];
						$query1="select * from purchased_items_details inner join items on purchased_items_details.ITEM_ID=items.ITEM_ID where purchased_items_details.PURCHASE_ID=$PURCHASE_ID";
						$query_run1 = mysqli_query($con,$query1);
						while($a1=mysqli_fetch_assoc($query_run1)){
							$item_name = $a1['ITEM_NAME'];
							$quantity = $a1['PURCHASED_QUANTITY']; 
							$price = $a1['BUYING_PRICE'];
							$total = $quantity*$price;
							$total_invoice_price = $total_invoice_price+$total;
						}
						//get amount paid for each invoice
						$query2="select * from  payments_made where PURCHASE_ID=$PURCHASE_ID";
						$query_run2 = mysqli_query($con,$query2);
						while($a2=mysqli_fetch_assoc($query_run2)){
							$DATE_OF_PAYMENT = $a2['DATE_OF_PAYMENT'];
							$total_amount_paid = $total_amount_paid+$a2['AMOUNT_PAID'];
						}
						$balance = $total_invoice_price-$total_amount_paid;
					}
					echo "<tr>";
							echo "<td>$supplier</td>";
							echo "<td>$total_amount_paid</td>";
							echo "<td>$balance</td>";
							echo "<td>$DATE_OF_PAYMENT</td>";
							echo "<td>$total_invoice_price</td>";
					echo "</tr>";
					//calculate total amount for all invoices
					$total_amount_for_all_invoices = $total_amount_for_all_invoices+$total_invoice_price;
					$total_amount_paid_for_all_invoices = $total_amount_paid_for_all_invoices+$total_amount_paid;
					$total_balance = $total_amount_for_all_invoices-$total_amount_paid_for_all_invoices;
					
				}//end of the first while loop
				//calculate balance
				//$total_balance = $total_amount_for_all_invoices-$total_amount_paid_for_all_invoices;
				echo "<tr class='success'>";
						echo "<th>TOTAL</th>";
						echo "<th>$total_amount_paid_for_all_invoices</th>";
						echo "<th>$total_balance</th>";
						echo "<th></th>";
						echo "<th>$total_amount_for_all_invoices</th>";
					echo "</tr>";
				echo "</table>";
		  	}
			else{
				echo "<h2><font color='#cc0000'>Empty Result Set</font></h2>";
			}
		}
		
		}//end if groupby - Customer
		else if($groupby=="Item"){
		$query="select * from purchased_items_details inner join purchased_items inner join items on purchased_items.PURCHASE_ID=purchased_items_details.PURCHASE_ID && purchased_items_details.ITEM_ID=items.ITEM_ID where purchased_items.DATE_OF_PURCHASE BETWEEN '$date1' AND '$date2' group by purchased_items_details.ITEM_ID order by purchased_items_details.ITEM_ID asc";
		$query_run = mysqli_query($con,$query);
        if($query_run){
			$count = mysqli_num_rows($query_run);
			//echo $count;
            if($count>0){
				echo "<table style='width:100%;' class='table table-striped'>";
				echo "<tr style='background:#FF8C00; color:#ffffff;'>";
						echo "<th>Item</th>";
						//echo "<th>Qty Bought</th>";
						echo "<th>Qty Bought</th>";
						//echo "<th>Available Qty</th>";
						//echo "<th>Amount Spent</th>";
						echo "<th>Amount Bought</th>";
						//echo "<th>Profit</th>";
				echo "</tr>";
                while($a=mysqli_fetch_assoc($query_run)){
					$item_id=$a['ITEM_ID'];	
					$item_name = $a['ITEM_NAME'];				
					$query2="select * from purchased_items_details inner join purchased_items on purchased_items_details.PURCHASE_ID=purchased_items.PURCHASE_ID where purchased_items_details.ITEM_ID='$item_id' && purchased_items.DATE_OF_PURCHASE BETWEEN '$date1' AND '$date2'";
					$query_run2 = mysqli_query($con,$query2);
					$total_quantity = 0; $total_money_made = 0;
					while($a2=mysqli_fetch_assoc($query_run2)){
						$quantity = $a2['PURCHASED_QUANTITY']; 
						$price = $a2['BUYING_PRICE'];
						$total = $quantity*$price;
						$total_money_made = $total_money_made+$total;
						$total_quantity = $total_quantity+$quantity;
						
						
					}
					$query3="select * from purchased_items_details inner join purchased_items on purchased_items_details.PURCHASE_ID=purchased_items.PURCHASE_ID where purchased_items_details.ITEM_ID='$item_id' && purchased_items.DATE_OF_PURCHASE BETWEEN '$date1' AND '$date2'";
					$query_run3 = mysqli_query($con,$query3);
					$total_qty_bought = 0; $total_money_spent = 0;
					while($a3=mysqli_fetch_assoc($query_run3)){
						$bought = $a3['PURCHASED_QUANTITY'];
						$buying_price = $a3['BUYING_PRICE'];
						$money_spent = $bought*$buying_price;
						$total_money_spent = $total_money_spent+$money_spent;
						$total_qty_bought = $total_qty_bought+$bought;
					}
					$query4="select * from item_stock where ITEM_ID='$item_id'";
					$query_run4 = mysqli_query($con,$query4);
					while($a4=mysqli_fetch_assoc($query_run4)){
						$available_qty= $a4['QUANTITY'];
					}
					$profit = $total_money_made-$total_money_spent;
					echo "<tr>";
						echo "<td>$item_name</td>";
						//echo "<td>$total_qty_bought</td>";
						echo "<td>$total_quantity</td>";
						//echo "<td>$available_qty</td>";
						//echo "<td>$total_money_spent</td>";
						echo "<td>$total_money_made</td>";
						//if($profit>=0){echo "<td>$profit</td>";}else{echo "<td><font color='#cc0000'>$profit</font></td>";}
					echo "</tr>";
					
				}//end of the first while loop
				//calculate balance
				//$total_balance = $total_amount_for_all_invoices-$total_amount_paid_for_all_invoices;
				
				echo "</table>";
		  	}
			else{
				echo "<h2><font color='#cc0000'>Empty Result Set</font></h2>";
			}
		}
		}//end of if group by = Item
		else{
			$total_amount_paid_for_all_invoices = 0;
			$total_balance_for_all_invoices =0;
			$query="select * from purchased_items inner join suppliers inner join purchased_items_details on purchased_items.SUPPLIER_ID=suppliers.SUPPLIER_ID && purchased_items.PURCHASE_ID =purchased_items_details.PURCHASE_ID  where purchased_items.DATE_OF_PURCHASE BETWEEN '$date1' AND '$date2' group by purchased_items.PURCHASE_ID  order by purchased_items_details.PURCHASE_ID  asc";
			$query_run = mysqli_query($con,$query);
        	if($query_run){
				$count = mysqli_num_rows($query_run);
				//echo $count;
				if($count>0){
					while($a=mysqli_fetch_assoc($query_run)){
						$DATE_OF_PURCHASE = $a['DATE_OF_PURCHASE'];
						$PURCHASE_ID = $a['PURCHASE_ID'];
						$supplier_name = $a['supplier_name'];
						echo "<table style='width:100%;' class='table table-striped'>";
						echo "<tr style='background:#FF8C00; color:#ffffff;'>";
								echo "<th width='30%'>Invoice No: &nbsp;&nbsp;&nbsp;$PURCHASE_ID</th>";
								echo "<th>DATE_OF_PURCHASE</th>";
								echo "<th>$DATE_OF_PURCHASE</th>";
								echo "<th>$supplier_name</th>";
						echo "</tr>";
						$query2="select * from purchased_items_details inner join items on purchased_items_details.ITEM_ID=items.ITEM_ID where purchased_items_details.PURCHASE_ID ='$PURCHASE_ID' order by items.ITEM_NAME asc";
						$query_run2 = mysqli_query($con,$query2);
						$count2 = mysqli_num_rows($query_run2);
						if($count2>0){
							echo "<tr style='background:#000000; color:#ffffff;'>";
								echo "<th>Item</th>";
								echo "<th>Quantity</th>";
								echo "<th>Unit Price</th>";
								echo "<th>Total</th>";  	 
							echo "</tr>";
							$total_invoice_price=0;
							while($a2=mysqli_fetch_assoc($query_run2)){
								echo "<tr>";			
									echo "<td>".$a2['ITEM_NAME']."</td>";
									echo "<td>".$a2['PURCHASED_QUANTITY']."</td>";
									echo "<td>".$a2['BUYING_PRICE']."</td>";
									echo "<td>".$a2['PURCHASED_QUANTITY']*$a2['BUYING_PRICE']."</td>";
								echo "</tr>";
								$total_invoice_price = $total_invoice_price+$a2['PURCHASED_QUANTITY']*$a2['BUYING_PRICE'];
							}
							//get amout of money paid fro each invoice
							$query3="select * from payments_made where PURCHASE_ID='$PURCHASE_ID'";
							$query_run3 = mysqli_query($con,$query3);
							$total_amount_paid=0;
							while($a3=mysqli_fetch_assoc($query_run3)){
								$total_amount_paid = $total_amount_paid+$a3['AMOUNT_PAID'];
							}
							$balance = $total_invoice_price-$total_amount_paid;
							echo "<tr style='background:#ffffff; color:#000000;'>";
								echo "<th colspan='3'>Amount Paid</th>";
								echo "<th>$total_amount_paid</th>";	 
							echo "</tr>";
							echo "<tr style='background:#ffffff; color:#000000;'>";
								echo "<th colspan='3'>Balance</th>";
								echo "<th>$balance</th>";	 
							echo "</tr>";
							echo "<tr style='background:#ffffff; color:#000000;'>";
								echo "<th colspan='3'>Total</th>";  
								echo "<th>$total_invoice_price</th>";	 
							echo "</tr>";
							$total_amount_for_all_invoices = $total_amount_for_all_invoices+$total_invoice_price;
							$total_amount_paid_for_all_invoices = $total_amount_paid_for_all_invoices+$total_amount_paid;
							$total_balance_for_all_invoices = $total_balance_for_all_invoices+$balance;
						}
						
					}
					echo "<tr style='background:#333333; color:#ffffff;'>";
						echo "<th>Overoll 111</th>";
						echo "<th>Amount Paid: &nbsp;&nbsp;$total_amount_paid_for_all_invoices</th>";
						echo "<th>Balance: &nbsp;&nbsp;$total_balance_for_all_invoices</th>";
						echo "<th>Total: &nbsp;&nbsp;$total_amount_for_all_invoices</th>";	 
					echo "</tr>";
					echo "</table>";
				}
				else{
					echo "<h2><font color='#cc0000'>Empty Result Set</font></h2>";
				}
			}
			}
		}//end of if group by = -- Select --
	
	function get_Customer_Balance(){
		$con = db_connect();
		$total_amount_for_all_invoices=0;
		$total_amount_paid_for_all_invoices=0;
		$query="select * from customer order by CUSTOMER_NAME";
		$query_run = mysqli_query($con,$query);
        if($query_run){
			$count = mysqli_num_rows($query_run);
			//echo $count;
            if($count>0){
				echo "<select name='customer_name' id='customers_select' class='form-control' onchange='show_Customer_Balance()'>";
                $index=0;
				while($a=mysqli_fetch_assoc($query_run)){
					$customer_id=$a['CUSTOMER_ID'];
					$customer=$a['customer_name'];
					echo "<option>$customer</option>";
					$customers[$index]=$customer;
					$customer_balance[$index]=$balance;
					$index++;
					echo $customer_balance[$index];
							/*echo "<td>$customer</td>";
							echo "<td>$total_amount_paid</td>";
							echo "<td>$balance</td>";
							echo "<td>$total_invoice_price</td>";
					echo "</tr>";*/
					//calculate total amount for all invoices
					$total_amount_for_all_invoices = $total_amount_for_all_invoices+$total_invoice_price;
					$total_amount_paid_for_all_invoices = $total_amount_paid_for_all_invoices+$total_amount_paid;
					$total_balance = $total_amount_for_all_invoices-$total_amount_paid_for_all_invoices;
					
				}//end of the first while loop
				echo "</select>";
	?>
    		<script type="text/javascript">
				var customers,customer_balance;
				customers = <?php echo json_encode($customers); ?>;
				customer_balance = <?php echo json_encode($customer_balance); ?>;
				
			</script>
    <?php
		  	}
			else{
				echo "<h2><font color='#cc0000'>Empty Result Set</font></h2>";
			}
		}
	}//end of the get_Customer_Balance function
	
	
	
?>




