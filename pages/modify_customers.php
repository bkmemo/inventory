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
	if(isset($_POST['custs'])){
		$a=mysqli_real_escape_string($con,$_POST['customer_name']);
		$v=mysqli_real_escape_string($con,$_POST['address']);
		$b=mysqli_real_escape_string($con,$_POST['phone']);
		$c=mysqli_real_escape_string($con,$_POST['email']);
        $query0 = "SELECT * FROM customer WHERE customer_name='$a'";
		$query_run0=mysqli_query($con,$query0)or die(mysqli_error($con));
		if(mysqli_num_rows($query_run0)<=0){
		$query="insert into customer (`customer_id`, `customer_name`, `address`, `phone`, `email`) values(null,'$a','$v','$b','$c')";
		mysqli_query($con,$query)or die(mysqli_error());
			$_SESSION['response']= "Customers Added";
        }else{
                $session['response'] = "$a Already Exists In The Database";
            }
            
	}
?>
<?php   include ("../pages/header.php");?> 
<body>

    <div id="wrapper">
<?php   include ("../pages/side.php");?>
       <div id="page-wrapper">
		 <div class="row">
                <div class="col-lg-12">
					<div class="panel panel-danger">
                        <div class="panel-heading">
                          <?php include ("../pages/customer_links.php");?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
        </div>
            	
			<div class="panel panel-primary">
				  <div class="panel-heading"><h4>All Customers</h4> </div>
				  <div class="panel-body">
					<?php if(!empty($_SESSION['response'])): ?>
						<div class="alert alert-success">
								<?php echo $_SESSION['response']; $_SESSION['response'] = ""; ?>
						</div>
					<?php endif; ?>
						
<?php
			$query="select * from customer";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
	echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
						<thead>	
							<tr>
								<td>Customer name</td><td>Address</td>
								<td>Phone</td><td>email</td>
								<td>Edit</td></tr>
					    </thead><tbody>";
			while($a=mysqli_fetch_assoc($query_run)){
			$id=$a['customer_id'];
			$qw=$a['customer_name'];
			$s=$a['address'];
			$q=$a['phone'];
			$e=$a['email'];
			echo "<tr><td>$qw</td><td>$s</td><td>$q</td><td>$e</td><td>
			<a href='edit_customer.php?customer_id=$id' class='btn btn-success'><i class='fa fa-edit'></i></a></td></tr>";
			}
			echo "</tbody></table><br>";
			print "</div>";
			
			

?>
</div>
                </div>
            </div>

        </div>

    <!-- /#wrapper -->
 
   <?php   include ("../pages/footer.php");?>  
</body>

</html>