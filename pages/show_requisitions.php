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
			<div class="col-lg-12">
					<div class="panel-body" align="center">
						<?php   include ("../pages/requisition_links.php");?>								   
					</div>
             </div>			
            <div class="row"> 
                <div class="col-lg-12"><?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
<?php
			$query="select * from requisition inner join customer on requisition.customer_id = customer.customer_id";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "<h3>All Requisitions</h3>";
	echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
						<thead class='static'>	
							<tr bgcolor='#DCDCDC'>
								<td>Requ_No</td><td>LPO_NO.</td>
								<td>Order_By</td><td>Cust_Name</td>
								<td>Date_Ord</td><td>Date_Req</td>
								<td>Order_Stat</td><td>Action_By</td>
								<td>View</td><td>Print</td><td>Action</td>
					    </thead><tbody>";
			while($a=mysqli_fetch_assoc($query_run)){
			$id=$a['requisition_id'];  	 	 	 	 	 	 	
			$lpo_number=$a['lpo_number'];
			$ordered_By=$a['ordered_By'];
			$customer_name=$a['customer_name'];
			$date_ordered=$a['date_ordered'];
			$date_required=$a['date_required'];
			$order_status=$a['order_status'];
			$approved_by=$a['approved_by'];
			echo "<tr bgcolor='#fff'>
					<td>$id</td>
					<td>$lpo_number</td>
					<td>$ordered_By</td>
					<td>$customer_name</td>
					<td>$date_ordered</td>
					<td>$date_required</td>
					<td>$order_status</td>
					<td>$approved_by</td>
					
					<td><a href='view_requisition_details.php?requisition_id=$id' class='btn btn-warning'>View</a></td>
					<td><a href='requisition_details.php?requisition_id=$id' class='btn btn-info'>Print</a></td>
					<td><a href='change_status.php?requisition_id=$id' class='btn btn-danger'>Change</a></td></tr>";
					
			}
			echo "</tbody></table><br>";
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