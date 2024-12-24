
<?php

			$query="select * from category";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
	        echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
			    <thead>
		            <tr><td>No.</td><td>Category Name</td><td>Description</td><td>Edit</td></tr>
			    </thead><tbody>";
				$no_of_items=0;
			while($a=mysqli_fetch_assoc($query_run)){				

				$category_id=$a['category_id'];
				$category_name=$a['category_name'];
				$description=$a['description'];
				$no_of_items++;
				echo "<tr><td>$no_of_items</td><td>$category_name</td>
				<td style='text-align:left;'>$description</td>
				<td><a href='edit_category.php?category_id=$category_id' class='btn btn-success'><i class='fa fa-edit'></i></a></td>
				</tr>";
			}
			echo "</table></tbody>";
			
			print "</div>";
			
?>
