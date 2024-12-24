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
					<div class="panel panel-default">
                        <div class="panel-heading">
                          <h4>Stock Card Report</h4>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row"> 
                <div class="col-lg-12"><?php echo $_SESSION['response']; $_SESSION['response']=""; ?> 
<?php
			$query="select * from requisition inner join requisition_items_details inner join customer inner join items on requisition_items_details.requisition_id=requisition.requisition_id && requisition.CUSTOMER_ID=customer.CUSTOMER_ID && items.ITEM_ID=requisition_items_details.ITEM_ID";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
	echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
						<thead class='static'>	
							<tr bgcolor='#DCDCDC'>
								<td>Order_Date</td>
								<td>Customer Name</td>
								<td>Destination</td>
								<td>Item_Name</td>
								<td>quantity</td>
								<td>Price</td>
								<td>Issued By</td>
								
					    </thead><tbody>";
			while($a=mysqli_fetch_assoc($query_run)){
			$customer_name=$a['customer_name'];  	 	 	 	 	 	 	
			$approved_by=$a['approved_by'];
			$date_ordered=$a['date_ordered'];
			$address=$a['address'];
			$ITEM_NAME=$a['ITEM_NAME'];
			$BUYING_PRICE=$a['BUYING_PRICE'];
			$PURCHASED_QUANTITY=$a['PURCHASED_QUANTITY'];
			echo "<tr bgcolor='#fff'>
					<td>$date_ordered</td>
					<td>$customer_name</td>
					<td>$address</td>
					<td>$ITEM_NAME</td>
					<td>$PURCHASED_QUANTITY</td>
					<td>$BUYING_PRICE</td>
					<td>$approved_by</td></tr>";
					
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