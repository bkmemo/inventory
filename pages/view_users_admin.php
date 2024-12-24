<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	include_once 'log.php';
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
?>
<?php   include ("../pages/header.php");?> 
<body>
	<div id="wrapper">
		<!-- Navigation -->   
		<?php include ("../pages/side.php");?>
		
        <div id="page-wrapper">
		<div class="row">
                <div class="col-lg-12">
					<div class="panel panel-danger">
                        <div class="panel-heading">
                          <?php include ("../pages/staff_links.php");?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
        </div>
             <div class="row">
			 <div class="panel panel-primary">
				  <div class="panel-heading"><h3>Manage Staffs</h3></div>
				  <div class="panel-body">
<?php
			$query0="select * from user";
			$query=mysqli_query($con,$query0)or die(mysqli_error($con));
			echo "<div class='hero-unit-table'>";
			echo "<div class='table-responsive'>";
			echo "<table class='table table-striped table-bordered table-hover' id='employee_data3'>
						<thead>	
							<tr>
							    <th>ID</th><th>Names</th><th>Position</th><th>Address</th><th>Phone</th><th>Email</th><th>UserName</th><th>Edit</th><th>Delete</th>
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
								<td><a href='edit_user_admin.php?id=$id' class='btn btn-success'><i class='fa fa-edit'></i></a></td>		
								<td><a href='delete_staff.php?id=$id' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>	
								</tr>";
			}		
				echo "</tbody></table>";					
			print "</div>";
			print "</div>";
		

?>
</div>
                <!-- /.col-lg-12 -->
        </div>
        </div>
        </div>
        </div>

   <?php   include ("../pages/footer.php");?> 