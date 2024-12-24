
<?php
			$query="select * from staff";
			$query_run=mysqli_query($con,$query);
			echo "
				<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
			<thead>	
			<tr bgcolor='#DCDCDC' class='success' align='center'><td>Supplier Name</td><td>Address</td><td>Phone</td><td>Emails</td><td>Position</td></tr></thead>";
			while($a=mysqli_fetch_assoc($query_run)){
			$id=$a['staff_id'];
			$v=$a['staff_name'];
			$c=$a['address'];
			$b=$a['phone'];
			$e=$a['email'];
			$f=$a['position'];
			echo "<tbody>
			<tr align='center'><td>$v</td><td>$c</td><td>$b</td><td>$e</td><td>$f</td></tr> </tbody>";
			}
			echo "</table>";
			print"</div>";
			?>