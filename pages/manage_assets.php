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

    <div id="wrapper">

      

 <?php   include ("../pages/side.php");?>

        <div id="page-wrapper">
            <div class="row">
					<div class="col-lg-12">
					<div class="panel-body" align="center">
						<?php   include ("../pages/balance_sheet_links.php");?>								   
					</div>
             </div>			
                <div class="col-lg-12">
<?php
					

			$query="select * from balance_sheet";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "<h3>All BS Types</h3>";
	        echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped' id='employee_data3'>
			    <thead>
		            <tr><td>No.</td><td>Type</td><td>Category Name</td><td>Modify</td><td>Delete</td></tr>
			    </thead><tbody>";
				$no_of_items=0;
			while($a=mysqli_fetch_assoc($query_run)){
				$balance_sheet_id=$a['balance_sheet_id'];
				$balance_sheet_type=$a['balance_sheet_type'];
				$category_type=$a['category_type'];
				$no_of_items++;
				echo "<tr><td>$no_of_items</td><td>$balance_sheet_type</td><td>$category_type</td>
				<td><a href='edit_balance_sheet.php?balance_sheet_id=$balance_sheet_id' class='btn btn-success'><i class='fa fa-edit'></i></a></td>
				
				</tr>";
			}
			echo "</table></tbody>";
			
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