<?php
			
			$query="select * from income";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "<div class='table-responsive'>";
	       echo "
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
			    <thead>
		            <tr><td>No.</td><td style='text-align:left;'>Income</td><td>Amount Earned</td><td>Description</td><td>Date</td><td>Modify</td></tr>
			    </thead><tbody>";
				$no=0;
			while($a=mysqli_fetch_assoc($query_run)){
				$income_id=$a['income_id'];
				$income_name=$a['income_name'];
				$amount_earned=$a['amount_earned'];
				$description=$a['description'];
				$income_date=$a['income_date'];
				$no++;
				echo "<tr><td>$no</td><td>$income_name</td><td>$amount_earned</td><td>$description</td><td>$income_date</td>
				<td><a href='edit_income.php?income_id=$income_id' class='btn btn-warning'><i class='fa fa-edit'></i></a></td>
				</tr>";
			}
			echo "</table></tbody>";
			
			print "</div>";

			
			
?>
