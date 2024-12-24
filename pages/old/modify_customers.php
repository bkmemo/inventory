
<?php
			$query="select * from customer";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
	echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
						<thead>	
							<tr>
								<td>Customer name</td><td>Address</td>
								<td>Phone</td><td>email</td>
								<td>Edit</td></tr>
					    </thead><tbody>";
			while($a=mysqli_fetch_assoc($query_run)){
			$id=$a['customer_id'];
			$qw=$a['customer_name'];
			$s=$a['address'];
			$q=$a['phone'];
			$e=$a['email'];
			echo "<tr><td>$qw</td><td>$s</td><td>$q</td><td>$e</td><td>
			<a href='edit_customer.php?customer_id=$id' class='btn btn-success'><i class='fa fa-edit'></i></a></td></tr>";
			}
			echo "</tbody></table><br>";
			print "</div>";
			
			

?>