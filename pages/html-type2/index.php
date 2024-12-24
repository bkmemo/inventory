
        
        <div class="row">
        
        	<div class="col-lg-12">
            	
            		<table class="table table-striped table-bordered">
            		<tbody>
            		<?php //include "connect.php";
					//$con = db_connect();
	//session_start();
		$customer_name = $_SESSION['customer_name'];
		$query="select * from sales inner join customer on sales.CUSTOMER_ID=customer.customer_id where sales.CUSTOMER_ID=(select customer_id from customer where customer_name='$customer_name') order by sales.SALES_ID desc";
		$query_run = mysqli_query($con,$query);
        if($query_run){
        	$count = mysqli_num_rows($query_run);
            if($count>0){
				$total_amount_for_all_invoices=0;
				$total_amount_paid_for_all_invoices=0;
				echo "<tr class='success'>";
						echo "<th>Invoice ID</th>";
						echo "<th>Date Of Sale</th>";
						echo "<th>Total Amount</th>";
						echo "<th>Paid</th>";
						echo "<th>Balance</th>";
						echo "<th>Enter Amount</th>";
						echo "<th>Pay</th>";
						echo "<th style='text-align:right;'>Details&nbsp;&nbsp;&nbsp;</th>";
					echo "</tr>";
                while($a=mysqli_fetch_assoc($query_run)){
                	$sale_id=$a['SALES_ID'];
					$date_of_sale=$a['DATE_OF_SALE'];
					$query1="select * from sales inner join sales_details inner join items on sales.SALES_ID=sales_details.SALES_ID && sales_details.ITEM_ID=items.ITEM_ID where sales.SALES_ID=$sale_id";
           			$query_run1 = mysqli_query($con,$query1);
					$total_invoice_price=0;
					while($a1=mysqli_fetch_assoc($query_run1)){
						$sale_details_id = $a1['SALE_DETAILS_ID'];
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
					//calculate balance
					$balance = $total_invoice_price-$total_amount_paid;
					//only display purchased that have a pending balance
					if($balance>0){
						echo "<tr>";
							echo "<form method='post' action='save_sale_payment.php' >";
							echo "<td>$sale_id</td>";
							echo "<td>$date_of_sale</td>";
							echo "<td>$total_invoice_price</td>";
							echo "<td>$total_amount_paid</td>";
							echo "<td>$balance</td>";
							echo "<td><input type='text' name='amount' class='form-control' /></td>";
							echo "<input type='hidden' name='sale_id' value='$sale_id' />";
							echo "<input type='hidden' name='balance' value='$balance' />";
							echo "<td><input name='pay' type='submit' value='Pay' class='btn btn-success'></td>";
							echo "</form>";
							echo "<td><button data-toggle='modal' data-target='#view-modal' style='float:right;' data-id='$sale_id' id='getUsers' class='btn btn-sm btn-info one'>Details</button></td>";
						echo "</tr>";
						$pending_purchase_payments = true;
					}
				}//end of the first while loop
				if(!$pending_purchase_payments){ //if no pending payments to be made
					echo "<tr><td colspan='6'><h3><font color='#cc0000'>No Pending Payments</font></h3></td></tr>";
				}
		  	}
			else{
				echo "<tr><td colspan='6'><h3><font color='#cc0000'>Empty Result Set</font></h3></td></tr>";
			}
		}
	?>
            		</tbody>
            		</table>      
                
            </div>
        
        </div>
        
        
        
        
        <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 
                  <div class="modal-content"> 
                  
                       <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            <h4 class="modal-title">
                            	<i class="glyphicon"></i> Sales Details
                            </h4> 
                       </div> 
                       <div class="modal-body"> kll
                       
                       	   <div id="modal-loader" style="display: none; text-align: center;">
                       	   	<img src="ajax-loader.gif">
                       	   </div>
                            
                           <!-- content will be load here -->                          
                           <div id="dynamic-content"></div>
                             
                        </div> 
                        <div class="modal-footer"> 
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                        </div> 
                        
                 </div> 
              </div>
       </div><!-- /.modal -->    
   