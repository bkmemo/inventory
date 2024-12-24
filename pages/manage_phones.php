<script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const itemId = this.getAttribute('data-id');
                    const userConfirmed = confirm('Are you sure you want to delete this item?');

                    if (userConfirmed) {
                        // Proceed with deletion logic
                        // For example, send a request to the server to delete the item
                        // Here we're just removing the item from the list for demonstration
                        const listItem = this.closest('li');
                        listItem.remove();
                        console.log(`Item with ID ${itemId} has been deleted.`);
                    } else {
                        // Do nothing if the user cancels the action
                        console.log('Deletion cancelled.');
                    }
                });
            });
        });
    </script>
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
								<td>Phone_id</td>
								<td>Model_Name</td>
								<td>Serial_No</td><td>COND:</td>
								<td>Status</td><td>Cust_Name</td><td>Date_Sold</td>
								<td>Action</td><td>Edit</td><td>Delete</td>
								</tr>
					    </thead><tbody>
<?php
			while($a=mysqli_fetch_assoc($query_run0)){
			$id=$a['phone_id'];
			$model_name=$a['ITEM_NAME'];
			$serial_number=$a['serial_number'];
			$phone_condition=$a['phone_condition'];
			$customer_name=$a['customer_name'];
			$PDATE_OF_SALE=$a['PDATE_OF_SALE'];
			$status=$a['phone_status'];
			echo "<tr bgcolor='#fff'>
			<td>$id</td><td>$model_name</td>
			<td>$serial_number</td><td>$phone_condition</td>
			<td>$status</td><td>$customer_name</td>
			<td>$PDATE_OF_SALE</td>
			
			<td><a href='view_item_details.php?phone_id=$id' class='btn btn-warning'>Details</td>
			<td><a href='edit_phone.php?phone_id=$id' class='btn btn-primary'><i class='fa fa-edit'></i></a></td>
			<td><a href='delete_phone.php?phone_id=$id' class='btn btn-danger delete-btn' data-id='$id'><i class='fa fa-trash'></i></a></td>
			</tr>";
			}
			echo "</tbody></table>";
			print "</div>";
            print "</div>";
			
			

?>