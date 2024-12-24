
<?php
			$query="select * from sales_returns inner join customer inner join items on sales_returns.customer_id = customer.customer_id && sales_returns.ITEM_ID = items.ITEM_ID ";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "<h3>Manage Sales Returns</h3>";
	echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
						<thead class='static'>	
							<tr bgcolor='#DCDCDC'>
								<td>Customer name</td><td>Date_Of_Return</td>
								<td>Item_Name</td><td>Quantity</td><td>Amount</td><td>Total</td>
								<td>Modify</td></tr>
					    </thead><tbody>";
			while($a=mysqli_fetch_assoc($query_run)){
			$sales_returns_id=$a['sales_returns_id'];
			$customer_name=$a['customer_name'];
			$date_returned=$a['date_returned'];
			$ITEM_Name=$a['ITEM_NAME'];
			$quantity=$a['quantity'];
			$amount=$a['amount'];
			$total= $quantity*$amount;
			echo "<tr bgcolor='#fff'><td>$customer_name</td><td>$date_returned</td><td>$ITEM_Name</td><td>$quantity</td><td>$amount</td><td>$total</td>
			<td><a href='#' class='btn btn-default'>Edit</a></td></tr>";
			}
			echo "</tbody></table><br>";
			print "</div>";
			
			

?>
