<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once 'log.php';
	include_once "connect.php"; 
	error_reporting(0);
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	function selection($table_name,$column_name,$error){
		$con = db_connect();
         $query="select * from payment inner join car_details inner join customer on 
			payment.ITEM_ID=car_details.ITEM_ID && payment.customer_id=customer.customer_id";
         $query_run = mysqli_query($con,$query);
         if($query_run){
              $count = mysqli_num_rows($query_run);
              if($count>0){
                   echo "<select name='$column_name' class='form-control'>";
                   while($a=mysqli_fetch_assoc($query_run)){
                        $category_name=$a[$column_name];
                         echo "<option>$category_name</option>";
                    }
                    echo "</select>";
               }
               else{
                    echo "<h4><font color='#ff0000'>$error</font></h4>";
               }
         }
         else{
              echo "<h3><font color='#ff0000'>MYSQL ERROR <br />".$query_run.mysqli_error()."</font></h3>";
         }
}//end of function
?>
<?php   include ("../pages/header.php");?>
<body>

    <div id="wrapper">

       

<?php   include ("../pages/side.php");?>

        <div id="page-wrapper">
			<div class="col-lg-12">
			<div class="panel-body" align="center">
						<p>
                            <?php   include ("../pages/branch_links.php");?>
                        </p>							   
			</div>	
            </div>			
            <div class="row">
                <div class="col-lg-12">
<?php

			
			$query0="select * from branches";
			$query=mysqli_query($con,$query0)or die(mysqli_error($con));
			
			echo "<h3>Show Stores <span style='float:right; color:#ff0000;'></span></h3>";
			
			echo "<div class='hero-unit-table'>";
			echo "<div class='table-responsive'>";
			echo "<table class='table table-striped table-bordered table-hover' id='employee_data3'>
						<thead class='static'>	
							<tr bgcolor='#DCDCDC'>
							    <th>Store_Name</th><th>Location</th><th>Phone_Number</th><th>Email_Address</th><th>Details</th><th>Edit</th><th>Delete</th>
							</tr>
					    </thead><tbody>";
						while($a=mysqli_fetch_assoc($query)){
							$id=$a['branch_id'];
							$branch_name=$a['branch_name'];
							$location=$a['location'];
							$phone_number=$a['phone_number'];
							$email_address=$a['email_address'];
							echo "
								<tr>
								<td>$branch_name</td>
								<td>$location</td>
								<td>$phone_number</td>
								<td>$email_address</td>
								<td>
									<form method='post' action='view_branch_details.php'>
										<input type='hidden' name='branch_id' value='$id' />
										<button type='submit' class='btn btn-info'>Details</button>
									</form>
								</td>
								<td><a href='#' class='btn btn-success'><i class='fa fa-edit'></i></a></td>
								<td><a href='#' class='btn btn-danger'><i class='fa fa-remove'></i></a></td>
								</tr>";
			}		
				echo "</tbody></table>";					
			print "</div>";
			print "</div>";
			
			
			


?>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php   include ("../pages/footer.php");?>