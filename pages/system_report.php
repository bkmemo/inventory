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
        	<?php
			$query="select * from visitor_activity_logs ORDER BY role ASC";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "<h4>User Activities</h4>";
			echo "
				<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
			<thead>	
			<tr bgcolor='#DCDCDC' class='success'><td>User Role</td><td>Visted Page</td><td>Date & Time</td></tr></thead><tbody>";
			while($a=mysqli_fetch_assoc($query_run)){
			$id=$a['id'];
			$c=$a['role'];
			$e=$a['page_url'];
			$g=$a['created_on'];
			echo "
			<tr  class='default'><td>$c</td><td>$e</td><td>$g</td></tr>
			";
			}
			echo "</tbody></table>";
			print"</div>";
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