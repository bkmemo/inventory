
<?php

			$id=$_GET['id'];
			$query0="select * from user where id='$id'";
			$query=mysqli_query($con,$query0)or die(mysqli_error($con));
			echo "<div class='hero-unit-table'>";
			echo "<div class='table-responsive'>";
			echo "<table class='table table-striped table-bordered table-hover' id='employee_data3'>
						<thead>	
							<tr>
							    <th>ID</th><th>Names</th><th>Position</th><th>Address</th><th>Phone</th><th>Email</th><th>Username</th><th>Edit</th><th>Delete</th>
							</tr>
					    </thead><tbody>";
						while($a=mysqli_fetch_assoc($query)){
							$id=$a['id'];
							$staff_name=$a['staff_name'];
							$user_type=$a['user_type'];
							$address=$a['address'];
							$position=$a['position'];
							$phone_number=$a['phone_number'];
							$email_address=$a['email_address'];
							$username=$a['username'];
							echo "
								<tr>
								<td>$id</td>
								<td>$staff_name</td>
								<td>$position</td>
								<td>$address</td>
								<td>$phone_number</td>
								<td>$email_address</td>
								<td>$username</td>
								
								<td><a href='edit_staff.php?id=$id' class='btn btn-success'><i class='fa fa-edit'></i></a></td>		
								<td><a href='delete_staff.php?id=$id' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>	
								</tr>";
			}		
				echo "</tbody></table>";					
			print "</div>";
			print "</div>";
		

?>