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

<body>

    <div id="wrapper">

        <!-- Navigation -->
<?php   include ("../pages/side.php");?>        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
		        	<div class="panel-body" align="center">
						<?php   include ("../pages/sales_links.php");?>     
					</div>	
                </div>
             		
		<div class="box box-primary">
			<div class="box-header"><h3 class="box-title" style="color:#333333;"><?php  echo $_SESSION['customer_name'];  ?></h3></div>   
           <?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
           <form  method="post" action="customer_transaction_history.php"  role="form">
           <table width="100%">
           		<tr>
                	<th><h4 class="box-title" >Transaction History</h4></th>
                	<th><input type="hidden" value="<?php echo $_SESSION['customer_name']; ?>" name="customer_name" /></th>
                    <th><input style="float:right; text-align:center; width:80%;" type="text" id="" class="form-control" name="search_value"  /></th>
                	<th><input style="float:right;" name="search" type="submit" value="Search" class="btn btn-primary"></th>
                </tr>
           </table>
           </form>
           <?php get_customer_totals($_SESSION['customer_name']); ?>
       <?php
	   	   $customer_name = $_SESSION['customer_name'];
		   
		   $query_runc = mysqli_query($con,"select customer_id from customer where customer_name='$customer_name'");
		   while($customer_id0=mysqli_fetch_assoc($query_runc)){
			   $customer_id = $customer_id0['customer_id'];
		   }
		   
		   if(isset($_POST['search'])){
			    $search_value = $_POST['search_value'];
				$search_value = strtotime( $search_value );
				$search_value = date( 'Y-m-d', $search_value );
		   		$search_value = $_POST['search_value'];
				//$query="select * from sales inner join customer on sales.CUSTOMER_ID=customer.customer_id where sales.CUSTOMER_ID=(select customer_id from customer where customer_name='$customer_name') order by sales.SALES_ID desc";
				$query="select * from sales inner join customer on sales.CUSTOMER_ID=customer.customer_id where sales.DATE_OF_SALE like '%$search_value%' || sales.SALES_ID like '%$search_value%'  && sales.CUSTOMER_ID=(select customer_id from customer where customer_name='$customer_name') order by sales.SALES_ID desc";
		   }
		   else{
			   $query="select * from sales inner join customer on sales.CUSTOMER_ID=customer.customer_id where sales.CUSTOMER_ID=(select customer_id from customer where customer_name='$customer_name') order by sales.SALES_ID desc";
		   }
		   $query_run = mysqli_query($con,$query);
           if($query_run){
              $count = mysqli_num_rows($query_run);
              if($count>0){
				   $total_amount_for_all_invoices=0;
				   $total_amount_paid_for_all_invoices=0;
                   while($a=mysqli_fetch_assoc($query_run)){
					   
					   if($customer_id == $a['CUSTOMER_ID']){
                        $sale_id=$a['SALES_ID'];
						$date_of_sale=$a['DATE_OF_SALE'];
						
					    echo "<table class='table table-striped'>";
							 echo "<thead>";
							 	  echo "<tr bgcolor='#FFA500' style='color:#000000;'>";
									    echo "<th>Invoice No: &nbsp;&nbsp;&nbsp;<font color='#FFFFFF'><b>$sale_id</b></font></th>";
										echo "<th>Date Of Sale</th><th><font color='#FFFFFF'><b>$date_of_sale</b></font></th>"; 
									    echo "<th> User &nbsp;&nbsp;&nbsp;<font color='#FFFFFF'><b>".$_SESSION['username']."</b></font></th>";
								  echo "</tr>";
							 echo "</thead>";
							 echo "<tbody>";
							 echo "<tr>"; 
								echo "<th style='width:25%'>Item</th>";
								echo "<th style='width:25%'>Quantity</th>";
								echo "<th style='width:25%'>Unit Price</th>";
								echo "<th style='width:25%'>Total</th>";
							 echo "</tr>";
							 $query1="select * from sales_details inner join items on sales_details.ITEM_ID=items.ITEM_ID where SALES_ID=$sale_id";
           					 $query_run1 = mysqli_query($con,$query1);
							 if(!$query_run1){
								 echo mysqli_error($con);
							 }
							 $total_invoice_price=0;
							 while($a1=mysqli_fetch_assoc($query_run1)){
								 $sale_details_id = $a1['SALE_DETAILS_ID'];
								 $item_name = $a1['ITEM_NAME'];
								 $quantity = $a1['QUANTITY_SOLD']; 
								 $price = $a1['SELLING_PRICE'];
								 $total = $quantity*$price;
								 $total_invoice_price = $total_invoice_price+$total;
								 echo "<tr>"; 
									   echo "<td>$item_name</td>";
									   echo "<td>$quantity</td>";
									   echo "<td>$price</td>";
									   echo "<td>$total</td>";
								 echo "</tr>";
							 }
							 echo "</tbody>";
							 //get amount paid for each invoice
							 $query2="select * from payments_received where SALES_ID=$sale_id";
           					 $query_run2 = mysqli_query($con,$query2);
							 $total_amount_paid=0;
							 while($a2=mysqli_fetch_assoc($query_run2)){
								 $total_amount_paid = $total_amount_paid+$a2['AMOUNT_PAID'];
							 }
							 //calculate balance
							 $balance = $total_invoice_price-$total_amount_paid;
							 echo "<tfoot>";
								  echo "<tr bgcolor=''>"; 
									   echo "<th colspan='3'>Total</th>";
									   echo "<th>$total_invoice_price</th>";
								  echo "</tr>";
								  echo "<tr bgcolor=''>";
									   echo "<th colspan='3'>Amount Paid</th>";
									   echo "<th>$total_amount_paid</th>";
								  echo "</tr>";
								  echo "<tr bgcolor=''>";
									   echo "<th colspan='3'>Balance</th>";
									   echo "<th>$balance</th>";
								  echo "</tr>";
								  echo "<tr>";
								  		echo "<td colspan='3'>";
											echo "<form method='post' action='sales_invoice80mm.php' >";
											echo "<input type='hidden' value='$sale_id' name='sale_id'/>";
											echo "<input style='float:right;' class='btn btn-default' type='submit' value='Print Invoice' />";
											echo "</form>";
										echo "</td>";
										echo "<td colspan=''>";
											echo "<form method='post' action='edit_sales.php' >";
											echo "<input type='hidden' value='$sale_id' name='sale_id'/>";
											echo "<input style='float:right;' class='btn btn-info' type='submit' value='Edit Sale' />";
											echo "</form>";
										echo "</td>";
								  echo "</tr>";
								  
							  echo "</tfoot>";
						echo "</table>";
						//calculate total amount for all invoices
					    //$total_amount_for_all_invoices = $total_amount_for_all_invoices+$total_invoice_price;
						//$total_amount_paid_for_all_invoices = $total_amount_paid_for_all_invoices+$total_invoice_price;
						}
				   }//end of the first while loop
			  }
			  else{
					//echo "<center><h3>Empty Result Set <font color='#cc0000'>$search_value</font></h3></center>"; 
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