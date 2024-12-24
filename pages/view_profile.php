
<?php

			
			$query0="select * from profile";
			$query=mysqli_query($con,$query0)or die(mysqli_error($con));
			
			echo "<h3>Company Details <span style='float:right; color:#ff0000;'></span></h3>";
			
			echo "<div class='hero-unit-table'>";
			echo "<div class='table-responsive'>";
			echo "<table class='table table-striped table-bordered table-hover'>
						<thead class='static'>	
							<tr bgcolor='#DCDCDC'>
							 <th>Name</th><th>Details</th>
							</tr>
					    </thead><tbody>";
						while($a=mysqli_fetch_assoc($query)){
							$id=$a['profile_id'];
							$business_name=$a['business_name'];
							$business_slogan=$a['business_slogan'];
							$address=$a['address'];
							$phone_number=$a['phone_number'];
							$email_address=$a['email_address'];
							$website_link=$a['website_link'];
							$tin_number=$a['tin_number'];
							$company_logo=$a['company_logo'];
							echo "
								
								<tr><td>Company Name: </td><td>$business_name</td></tr>
								<tr><td>Company Slogan</td><td>$business_slogan</td></tr>
								<tr><td>Location</td><td>$address</td></tr>
								<tr><td>Telephone</td><td>$phone_number</td></tr>
								<tr><td>Email Address</td><td>$email_address</td></tr>
								<tr><td>Website Link</td><td>$website_link</td></tr>
								<tr><td>Tin Number</td><td>$tin_number</td></tr>
								<tr><td>Company Logo</td><td><img src='../images/$company_logo' width='80px' height='50px'></td></tr>
								<tr><td>Edit Profile</td><td><a href='edit_profile.php?profile_id=$id' class='btn btn-success'><i class='fa fa-edit'></i></a></td></tr>
								";
			}		
				echo "</tbody></table>";					
			print "</div>";
			print "</div>";
			
			
			


?>