<?php	
  session_start(); // Use session variable on this page. This function must put on the top of page.
	include ("connect.php");
	error_reporting(0);
	include_once 'log.php';
	include "functions.php";
	$con = db_connect();
	error_reporting (E_ALL ^ E_NOTICE);
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
?>        


<!DOCTYPE html>
<html lang="en">

<?php   include ("../pages/header.php");?> 

<script type="text/javascript">
        function confirmDelete() {
            return confirm('Are you sure you want to delete this purchase?        NOTE: All records linked to this purchase will be deleted.');
        }
    </script>

<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php   include ("../pages/side.php");?>        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
		        	<div class="panel-body" align="center">
						<?php   include ("../pages/purchase_links.php");?> 
					</div>	
                </div>
             		
		<div class="box box-primary">
			<div class="box-header"><h3 class="box-title" style="color:#000000;"><?php  echo $_SESSION['supplier_name'];  ?></h3></div>  
					<?php if(!empty($_SESSION['response'])): ?>
								<div class="alert alert-success">
										<?php echo $_SESSION['response']; $_SESSION['response'] = ""; ?>
								</div>
							<?php endif; ?>
           <form  method="post" action="supplier_transaction_history.php"  role="form">
           <table width="100%">
           		<tr>
                	<th><h4 class="box-title" >Transaction History</h4></th>
                	<th><input type="hidden" value="<?php echo $_SESSION['supplier_name']; ?>" name="supplier_name" /></th>
                    <th><input style="float:right; text-align:center; width:80%;" type="text" id="dopDate" class="form-control" name="search_value"  /></th>
                	<th><input style="float:right;" name="search" type="submit" value="Search" class="btn btn-primary"></th>
                </tr>
           </table>
           </form>
           <?php get_totals($_SESSION['supplier_name']); ?>
       <?php
	   	   $supplier_name = $_SESSION['supplier_name'];
		   if(isset($_POST['search'])){
		   		$search_value = $_POST['search_value'];
				$search_value = strtotime( $search_value );
				$search_value = date( 'Y-m-d', $search_value );
				$query="select * from purchased_items inner join suppliers on purchased_items.SUPPLIER_ID=suppliers.supplier_id where purchased_items.DATE_OF_PURCHASE like '%$search_value%' && purchased_items.SUPPLIER_ID=(select supplier_id from suppliers where supplier_name='$supplier_name') order by purchased_items.PURCHASE_ID desc";
		   }
		   else{
			   $query="select * from purchased_items inner join suppliers on purchased_items.SUPPLIER_ID=suppliers.supplier_id where purchased_items.SUPPLIER_ID=(select supplier_id from suppliers where supplier_name='$supplier_name') order by purchased_items.PURCHASE_ID desc";
		   }
		   $query_run = mysqli_query($con,$query);
           if($query_run){
              $count = mysqli_num_rows($query_run);
              if($count>0){
				   $total_amount_for_all_invoices=0;
				   $total_amount_paid_for_all_invoices=0;
                   while($a=mysqli_fetch_assoc($query_run)){
                        $purchase_id=$a['PURCHASE_ID'];
						$date_of_purchase=$a['DATE_OF_PURCHASE'];
						$RECEIPT_NO=$a['RECEIPT_NO'];
					    echo "<table class='table table-striped'>";
							 echo "<thead>";
							 	  echo "<tr bgcolor='#FFA500' style='color:#000000;'>";
								  		 echo "<th>Invoice No: &nbsp;&nbsp;&nbsp;<font color='#FFFFFF'><b>$purchase_id</b></font></th>";
									    echo "<th>Date Of Purchase</th><th>$date_of_purchase</th>";
									    echo "<th>RECEIPT_NO</th><th>$RECEIPT_NO</th>";
									    echo "<th>User </th><th>".$_SESSION['username']."</th>";
								  echo "</tr>";
							 echo "</thead>";
							 echo "<tbody>";
							 echo "<tr>"; 
								echo "<th style='width:25%'>Item</th>";
								echo "<th style='width:25%'></th>";
								echo "<th style='width:25%'>Quantity</th>";
								echo "<th style='width:25%'>Unit Price</th>";
								echo "<th style='width:25%'>Total</th>";
							 echo "</tr>";
							 $query1="select * from purchased_items_details inner join items on purchased_items_details.ITEM_ID=items.ITEM_ID where PURCHASE_ID=$purchase_id";
           					 $query_run1 = mysqli_query($con,$query1);
							 $total_invoice_price=0;
							 while($a1=mysqli_fetch_assoc($query_run1)){
								 $PURCHASED_ITEM_DETAILS_ID = $a1['PURCHASED_ITEM_DETAILS_ID'];
								 $item_name = $a1['ITEM_NAME'];
								 $quantity = $a1['PURCHASED_QUANTITY']; 
								 $price = $a1['BUYING_PRICE'];
								 $total = $quantity*$price;
								 $total_invoice_price = $total_invoice_price+$total;
								 echo "<tr>"; 
									   echo "<td>$item_name</td>";
									   echo "<td></td>";
									   echo "<td>$quantity</td>";
									   echo "<td>$price</td>";
									   echo "<td>$total</td>";
								 echo "</tr>";
							 }
							 echo "</tbody>";
							 //get amount paid for each invoice
							 $query2="select * from payments_made where PURCHASE_ID=$purchase_id";
           					 $query_run2 = mysqli_query($con,$query2);
							 $total_amount_paid=0;
							 while($a2=mysqli_fetch_assoc($query_run2)){
								 $total_amount_paid = $total_amount_paid+$a2['AMOUNT_PAID'];
							 }
							 //calculate balance
							 $balance = $total_invoice_price-$total_amount_paid;
							 echo "<tfoot>";
								  echo "<tr bgcolor=''>"; 
									   echo "<th colspan='4'>Total</th>";
									   echo "<th>$total_invoice_price</th>";
								  echo "</tr>";
								  echo "<tr bgcolor=''>";
									   echo "<th colspan='4'>Amount Paid</th>";
									   echo "<th>$total_amount_paid</th>";
								  echo "</tr>";
								  echo "<tr bgcolor=''>";
									   echo "<th colspan='4'>Balance</th>";
									   echo "<th>$balance</th>";
								  echo "</tr>";
								  echo "<tr>";
										echo "<td colspan='2'>";
											echo "<form method='post' action='purchase_invoice.php' >";
											echo "<input type='hidden' value='$purchase_id' name='purchase_id'/>";
											echo "<input style='float:right;' class='btn btn-default' type='submit' value='Print Invoice' />";
											echo "</form>";
										echo "</td>";
										echo "<td colspan=''>";
											echo "<form method='post' action='edit_purchase.php' >";
											echo "<input type='hidden' value='$purchase_id' name='purchase_id'/>";
											echo "<input type='hidden' value='$supplier_name' name='supplier_name'/>";
											echo "<input style='float:right;' class='btn btn-info' type='submit' value='Edit Purchase' />";
											echo "</form>";
										echo "</td>";
										echo "<td colspan=''>";
											echo "<form method='post' action='delete_purchase.php' onsubmit='return confirmDelete();' >";
											echo "<input type='hidden' value='$purchase_id' name='purchase_id'/>";
											echo "<input style='float:right;' class='btn btn-danger' type='submit' value='Delete Purchase' />";
											echo "</form>";
										echo "</td>";
									echo "</tr>";
								  echo "</form>";
							  echo "</tfoot>";
						echo "</table>";
						//calculate total amount for all invoices
					    //$total_amount_for_all_invoices = $total_amount_for_all_invoices+$total_invoice_price;
						//$total_amount_paid_for_all_invoices = $total_amount_paid_for_all_invoices+$total_invoice_price;
				   }//end of the first while loop
			  }
			  else{
					echo "<h3><font color='#cc0000'>Empty Result Set</font></h3>";  
			  }
		   }
		   
	?>
           </div> <!-- /.col-lg-12 -->
      </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
 </div><!-- /#wrapper -->
</div>
<?php   include ("../pages/footer.php");?>
</body>
</html>
