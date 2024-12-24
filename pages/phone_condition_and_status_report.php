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
							<div class="panel panel-primary">
								<div class="panel-heading">
								  <h4>Manage Customers</h4>
								</div>
							</div>
						</div>
		</div>
            <div class="row">				
					<div class="col-md-12">
						<table id="onsale_sold_total" class="table table-striped table-bordered table-hover" >
						<tr bgcolor="#DCDCDC" class="success" align="center">
							<th>Phones</th><th>UK Used</th><th>New</th>
						</tr>
						<tr>
						<td>rr</td><td>On Sale</td><td>Sold</td><td>On Sale</td><td>Sold</td>
						</tr>
						<?php
							$query="select * from items";
							$query_run=mysqli_query($con,$query);
							
							while($a=mysqli_fetch_assoc($query_run)){
								$ukusedphones_onsale_query="select * from phones where ITEM_ID=".$a['ITEM_ID']." && phone_condition = 'UKUsedPhone' && phone_status ='OnSale'";
								$ukusedphones_onsale=mysqli_num_rows(mysqli_query($con,$ukusedphones_onsale_query));
								
								$ukusedphones_sold_query="select * from phones where ITEM_ID=".$a['ITEM_ID']." && phone_condition='UKUsedPhone' && phone_status='Sold'";
								$ukusedphones_sold=mysqli_num_rows(mysqli_query($con,$ukusedphones_sold_query));
								
								$newphones_onsale_query="select * from phones where ITEM_ID=".$a['ITEM_ID']." && phone_condition = 'NewPhone' && phone_status ='OnSale'";
								$newphones_onsale=mysqli_num_rows(mysqli_query($con,$newphones_onsale_query));
								
								$newphones_sold_query="select * from phones where ITEM_ID=".$a['ITEM_ID']." && phone_condition='NewPhone' && phone_status='Sold'";
								$newphones_sold=mysqli_num_rows(mysqli_query($con,$newphones_sold_query));
						?>
								<tr>
								<td><?php echo $a['ITEM_NAME'] ?></td>
								<td class="bg-success"><?php echo $ukusedphones_onsale ?></td>
								<td  class="bg-primary"><?php echo $ukusedphones_sold ?></td>
								<td class="bg-success"><?php echo $newphones_onsale ?></td>
								<td class="bg-primary"><?php echo $newphones_sold ?></td>
								</tr>
						<?php
							}
						?>
						
						
						
						</table>
		
		</div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
 
   <?php   include ("../pages/footer.php");?>  