<?php
		 
	//require_once 'dbconfig.php';
	include "connect.php";
	$con = db_connect();
	if (isset($_REQUEST['id'])) {
		$sale_id = intval($_REQUEST['id']);
		$query1="select * from sales_details inner join items on sales_details.ITEM_ID=items.ITEM_ID where sales_details.SALES_ID='$sale_id'";
        $query_run1 = mysqli_query($con,$query1);	
		if($query_run1){
			if(mysqli_num_rows($query_run1)>0){
?>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    $total_invoice_price=0;
                    while($a1=mysqli_fetch_assoc($query_run1)){
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
					echo "<tr>"; 
                    	echo "<th colspan='3'>Total</th>";
                        echo "<td>$total_invoice_price</td>";
                    echo "</tr>";
                    ?>
                </table>
                </div>
                <?php
        	}
            else{
                echo "<h2>Empty Result Set sdsd $sale_details_id</h2>";	
            }
		}
		else{
			echo "<h2>".mysqli_error($con)."</h2>";
		}
	}
	?>