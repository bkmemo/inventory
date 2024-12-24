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
			<div class="alert alert-info">Stock take Report </div>
                                    <?php
                                    	
										$query = mysqli_query($con,"select * from  stock_taking inner join items  on  stock_taking.ITEM_ID=items.ITEM_ID  order by items.ITEM_ID asc") or die(mysqli_error($con));
										?>
										<div class="table-responsive">  
										 <table id="employee_data3" class="table table-striped table-bordered">  
											  <thead> 
											  <tr><td>Item Name</td><td>Computer Stock </td><td>Physical Stock</td><td>Variance</td><td>Count Date</td></tr>
											  </thead>
											 <?php	 	 	
											while ($row = mysqli_fetch_array($query)) {
										    $variance = $row['PHYSICAL_STOCK']-$row['COMPUTER STOCK'];
											echo '<tr>
											<td>'.$row["ITEM_NAME"].'</td><td>'.$row["COMPUTER STOCK"].'</td>
											<td>'.$row["PHYSICAL_STOCK"].'</td><td>'.$variance.'</td><td>'.$row["DATE_TIME"].'</td>
                                            </tr>';
										}?>
											</table>
											</div>
									
									
            </div> <!-- /.row -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- jQuery -->
<?php   include ("../pages/footer.php");?>