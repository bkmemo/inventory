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
?>
<?php   include ("../pages/header.php");?>
<body>

    <div id="wrapper">

       

<?php   include ("../pages/side.php");?>

        <div id="page-wrapper">
			<div class="col-lg-12">
			<div class="panel-body" align="center">			   
			</div>	
            </div>			
            <div class="row">
                <div class="col-lg-12">
<?php			

			if(isset($_GET['requisition_id'])){
			$requisition_id = $_GET['requisition_id'];	
			$query11="select * from requisition inner join requisition_items_details inner join items on requisition.requisition_id = requisition_items_details.requisition_id && items.ITEM_ID = requisition_items_details.ITEM_ID where requisition.requisition_id = '$requisition_id'";		
			$query_run=mysqli_query($con,$query11)or die(mysqli_error($con));	
			echo "<div class='hero-unit-table'>";
			echo "<div class='table-responsive'>";
			echo "<table class='table table-striped table-bordered table-hover'>
						<thead class='static'>	
							<tr bgcolor='#DCDCDC'>
							    <td>Item Name</td>
								<td>Description</td><td>Qty_Needed</td>
								<td>Unit_Price</td><td>Amount</td>
							</tr>
					    </thead>";
			$total_sum=0;			
			while($a=mysqli_fetch_assoc($query_run)){
			$id=$a['requisition_id'];
			$lpo_number=$a["lpo_number"];
			$ordered_By=$a["ordered_By"];
			$destination=$a["destination"];
			$date_ordered=$a["date_ordered"];
			$date_required=$a["date_required"];
			$order_status=$a["order_status"];
			$approved_by=$a["approved_by"];
			$reason=$a["reason"];
			$item = $a["ITEM_NAME"]; 
			$description=$a["description"];
			$quantity = $a["PURCHASED_QUANTITY"];
			$price = $a["BUYING_PRICE"]; 
			$total = $quantity*$price;
			//Sum all the Prices (TOTAL)
			$total_sum = $total_sum+$total;
			
			echo "<tbody>
								<tr>
								<td> $item</td>
								<td> $description</td>
								<td> $quantity</td>
								<td> $price</td>
								<td> $total</td>
								

								</tr>
								
				";
			}	
			echo "<tr><td>TOTAL Amount</td><td></td><td></td><td></td><td> <strong>$total_sum</strong></td></tr></tbody>";
			echo "<tr><td>Action</td><td><a href='requisition_details.php?requisition_id=$id' class='btn btn-primary'><i class='fa fa-print'></i> Print Requisition</a></td><td><a href='edit_requisition.php?requisition_id=$id' class='btn btn-success'>Edit Requisition</a></td></tr>
								
								<tr><td>LPO Number:</td><td> $lpo_number</td></tr>
								<tr><td>Destination:</td><td> $destination</td></tr>
								<tr><td>Date Required:</td><td> <strong>$date_required</strong></td></tr>
								<tr><td>Order Status:</td><td> $order_status</td></tr>
								<tr><td>Action By:</td><td> $approved_by</td>
								<tr><td>Reason:</td><td> <strong>$reason </strong></td>
								<tr><td>Ordered By:</td><td> $ordered_By</td></tr>
								<br>";
												echo '</td></tr>';
			
			
								
			print "</div>";
			print "</div>";
			
					
				}else{
					echo "<strong><font color='#cc0000'>Sorry  Doesnt Exist</font></strong>";
				}
				
?>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper <?php   //include ("../pages/footer.php");?>-->

