
<?php
			$query="select * from expenses_incured";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "<h3>All Expenses Types</h3><br/>";
	        echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
			    <thead>
		            <tr>
					<td>No.</td><td>Expense</td><td>Descreption</td>
					<td>Amount Spent</td><td>Date</td><td>Edit</td>
					</tr>
			    </thead><tbody>";
				$n=0;
			while($a=mysqli_fetch_assoc($query_run)){
				$EXPENSES_INCURED_ID=$a['EXPENSES_INCURED_ID'];
				$expense_name=$a['EXPENSE_NAME'];
				$Descreption=$a['Descreption'];
				$AMOUNT_SPENT=$a['AMOUNT_SPENT'];
				$DATE=$a['DATE'];
				$n++;
				echo "<tr>
				<td>$n</td>
				<td>$expense_name</td>
				<td>$Descreption</td><td>$AMOUNT_SPENT</td><td>$DATE</td>
				<td><a href='edit_incure_expenses.php?EXPENSES_INCURED_ID=$EXPENSES_INCURED_ID' class='btn btn-warning'><i class='fa fa-edit'></i></a></td>
				</tr>";
			}
			echo "</table></tbody>";
			
			print "</div>";
			
?>
