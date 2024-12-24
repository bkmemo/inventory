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
			$query="select * from sales_details inner join items on sales_details.ITEM_ID = items.ITEM_ID where ITEM_NAME= 'Side board'";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
			echo "<h3>Total Sales</h3>";
			echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover'>
						<thead class='static'>	
							<tr bgcolor='#DCDCDC'>
								<td>Total Quantity Sold</td>
								<td>Sub_Total_Amount</td><td>Total_Amount</td>
					    </thead><tbody>";
			$Total_Amount_sum = 0;
			$Total_quantity_sum = 0;
			while($a=mysqli_fetch_assoc($query_run)){  	 	 	
			$QUANTITY_SOLD=$a['QUANTITY_SOLD'];
			$SELLING_PRICE=$a['SELLING_PRICE'];
			$total_Amt = $QUANTITY_SOLD*$SELLING_PRICE;
			$Total_quantity_sum = $Total_quantity_sum + $QUANTITY_SOLD;
			$Total_Amount_sum = $Total_Amount_sum + $SELLING_PRICE;
			$Total_Amount = $Total_quantity_sum * $Total_Amount_sum;
			
			echo "<tr bgcolor='#fff'>
					<td>$QUANTITY_SOLD</td>
					<td>$SELLING_PRICE</td>
					<td>$total_Amt</td></tr>";
					
			}
			echo "<tr><td>$Total_quantity_sum</td>
					<td>$Total_Amount_sum</td>
					<td>$Total_Amount</td></tr>";
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