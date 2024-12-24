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
							<div class="panel panel-primary">
								<div class="panel-heading">
								  <h4>Export Customer Contacts</h4>
								</div>
							</div>
						</div>
		</div>
            <div class="row">				
		<div class="col-md-12">
		        <?php
	   	  
	   ?>
		<div class="box box-primary">
			<!-- <div class="box-header"><h3 class="box-title" style="color:#333333;">Report</h3></div> -->  
           <form  method="post" action="customer_contacts.php"  role="form">
           <table width="100%">
           		<tr>
                   <th>From</th>
                    <th><input style="text-align:center; width:40%;" type="text" id="dopDate" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="search_value1" value="<?php echo $date1; ?>"  /></th>
                    <th>To</th>
                    <th><input style="text-align:center; width:40%;" type="text" id="expDate" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="search_value2" value="<?php echo $date2; ?>"  /></th>
                	<th><input style="float:right;" name="search" type="submit" value="Export Contacts" class="btn btn-success"></th>
                </tr>
           </table>
           </form><br><br>
<?php

		   if(isset($_POST['search'])){
		   		$date1 = $_POST['search_value1'];
				$date1 = strtotime( $date1 );
				$date1 = date( 'Y-m-d', $date1 );
				
				$date2 = $_POST['search_value2'];
				$date2 = strtotime( $date2 );
				$date2 = date( 'Y-m-d', $date2 );
				
		  
			$query="select * from phones WHERE customer_name IS NOT NULL AND customer_phone IS NOT NULL AND PDATE_OF_SALE BETWEEN '$date1' AND '$date2'";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
	echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data5'>
						<thead>	
							<tr><td>ID</td>
							    <td>Date Sold</td>
								<td>Customer Name</td>
								<td>Phone Number</td></tr>
					    </thead><tbody>";
			while($a=mysqli_fetch_assoc($query_run)){
			$id=$a['phone_id'];
			$PDATE_OF_SALE=$a['PDATE_OF_SALE'];
			$customer_name=$a['customer_name'];
			$customer_phone=$a['customer_phone'];

			echo "<tr><td>$id</td><td>$PDATE_OF_SALE</td><td>$customer_name</td><td>$customer_phone</td></tr>";
			}
			echo "</tbody></table><br>";
			print "</div>";
 }
?>
		
		</div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
 
   <?php   include ("../pages/footer.php");?>  
</body>

</html>

