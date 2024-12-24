
			<?php
			$query="select * from items inner join item_sellprice inner join brands on items.ITEM_ID=item_sellprice.ITEM_ID && items.brand_id=brands.brand_id";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
	        echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
			    <thead>
		            <tr><td>No.</td><td>Model_Name</td><td>Brand Name</td><td>Selling Price</td><td>Edit</td></tr>
			    </thead><tbody>";
				$no_of_items=0;
			while($a=mysqli_fetch_assoc($query_run)){
				$item_id=$a['ITEM_ID'];
				$item_name=$a['ITEM_NAME'];
				$brand_name=$a['brand_name'];
				$sell_price=$a['PRICE'];
				$no_of_items++;
				echo "<tr><td>$no_of_items</td><td>$brand_name</td><td>$item_name</td><td>$sell_price</td>
				
				<td><a href='edit_item.php?item_id=$item_id' class='btn btn-info'><i class='fa fa-edit'></a></td>
				</tr>";
			}
			echo "</tbody></table><br>";
			
			print "</div>";
			
?>