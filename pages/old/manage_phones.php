
                <div class="col-lg-12">
<?php

			$query0="select * from phones inner join items inner join suppliers on items.ITEM_ID = phones.ITEM_ID && phones.supplier_id = suppliers.supplier_id";
			$query_run0=mysqli_query($con,$query0);
?>			
            <div class="hero-unit-table">
            <div class="table-responsive">
            <table  id="employee_data3" class="table table-striped table-bordered"> 
						<thead>	
							<tr bgcolor="#DCDCDC">
								<td>Model_Name</td>
								<td>Serial_No</td>
								<td>Status</td><td>CustomerName</td><td>Entry_Date</td><td>Action</td><td>Edit</td>
								</tr>
					    </thead><tbody>
<?php
			while($a=mysqli_fetch_assoc($query_run0)){
			$id=$a['phone_id'];
			$model_name=$a['ITEM_NAME'];
			$serial_number=$a['serial_number'];
			$customer_name=$a['customer_name'];
			$register_date=$a['register_date'];
			$status=$a['phone_status'];
			echo "<tr bgcolor='#fff'>
			<td>$model_name</td>
			<td>$serial_number</td>
			<td>$status</td><td>$customer_name</td><td>$register_date</td>
			<td><a href='view_item_details.php?phone_id=$id' class='btn btn-warning'>Details</td>
			<td><a href='edit_phone.php?phone_id=$id' class='btn btn-primary'><i class='fa fa-edit'></i></a></td>
			</tr>";
			}
			echo "</tbody></table>";
			print "</div>";
            print "</div>";
			
			

?>