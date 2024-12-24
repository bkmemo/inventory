
<?php

			$query0="select * from brands";
			$query_run0=mysqli_query($con,$query0);
?>			
            <div class="hero-unit-table">
            <div class="table-responsive">
            <table class='table table-striped table-bordered table-hover' id="employee_data3"> 
						<thead>	
							<tr bgcolor="#DCDCDC">
								<td>ID</td><td>Brand Name</td><td>Edit</td>
								</tr>
					    </thead><tbody>
<?php
			while($a=mysqli_fetch_assoc($query_run0)){
			$id=$a['brand_id'];
			$brand_name=$a['brand_name'];
			echo "<tr bgcolor='#fff'>
			<td>$id</td><td>$brand_name</td><td><a href='edit_brand.php?brand_id=$id' class='btn btn-primary'>
			<i class='fa fa-edit'></i></a></td>
			</tr>";
			}
			echo "</tbody></table>";
			print "</div>";
            print "</div>";
			
			

?>