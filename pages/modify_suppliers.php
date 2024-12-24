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

<?php   include ("../pages/side.php");?>

        <div id="page-wrapper">
		 <div class="row">
                <div class="col-lg-12">
					<div class="panel panel-danger">
                        <div class="panel-heading">
                          <?php include ("../pages/supplier_links.php");?>
                        </div>
                    </div>
                </div>
        </div>
            	
			<div class="panel panel-primary">
				  <div class="panel-heading"><h4>All Suppliers</h4></div>
				  <div class="panel-body">
						<?php if(!empty($_SESSION['response'])): ?>
						<div class="alert alert-success">
								<?php echo $_SESSION['response']; $_SESSION['response'] = ""; ?>
						</div>
					<?php endif; ?>
	<?php
			$query="select * from suppliers";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "
			<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
			<thead>	
			<tr><td>ID</td><td>Sup_name</td><td>Address</td><td>Phone</td><td>Email</td><td>Email</td><td>Edit</td></tr></thead><tbody>";
			while($a=mysqli_fetch_assoc($query_run)){
			$supplier_id=$a['supplier_id'];
			$supplier_name=$a['supplier_name'];
			$address=$a['address'];
			$phone=$a['phone'];
			$email=$a['email'];
			$supplier_type=$a['supplier_type'];
			echo "
			<tr><td>$supplier_id</td><td>$supplier_name</td><td>$address</td><td>$phone</td><td>$email</td><td>$supplier_type</td>
			<td><a href='edit_supplier.php?supplier_id=$supplier_id' class='btn btn-success'><i class='fa fa-edit'></i></a></td></tr>
			";
			}
			echo "</tbody></table>";
			print"</div>";
		?>	

</div>
		        </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>

<?php   include ("../pages/footer.php");?>