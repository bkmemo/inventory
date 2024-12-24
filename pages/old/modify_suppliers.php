
	<?php
			$query="select * from suppliers";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "
			<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
			<thead>	
			<tr><td>Sup_name</td><td>Address</td><td>Phone</td><td>Emails</td><td>Edit</td></tr></thead><tbody>";
			while($a=mysqli_fetch_assoc($query_run)){
			$id=$a['supplier_id'];
			$v=$a['supplier_name'];
			$c=$a['address'];
			$b=$a['phone'];
			$e=$a['email'];
			echo "
			<tr><td>$v</td><td>$c</td><td>$b</td><td>$e</td>
			<td><a href='edit_supplier.php?supplier_id=$id' class='btn btn-success'><i class='fa fa-edit'></i></a></td></tr>
			";
			}
			echo "</tbody></table>";
			print"</div>";
		?>	

