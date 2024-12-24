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
	
	function selection($table_name,$column_name,$error){
		$con = db_connect();
         $query="select * from $table_name";
         $query_run = mysqli_query($con,$query);
         if($query_run){
              $count = mysqli_num_rows($query_run);
              if($count>0){
                   echo "<select name='$column_name' class='form-control js-example-basic-single'>";
                   while($a=mysqli_fetch_assoc($query_run)){
                        $category_name=$a[$column_name];
                         echo "<option>$category_name</option>";
                    }
                    echo "</select>";
               }
               else{
                    echo "<h4><font color='#ff0000'>$error</font></h4>";
               }
         }
         else{
              echo "<h3><font color='#ff0000'>MYSQL ERROR <br />".$query_run.mysqli_error()."</font></h3>";
         }
}//end of function
 include ("../pages/header.php");?> 
<body>

    <div id="wrapper">
<?php   include ("../pages/side.php");?>


        <div id="page-wrapper">
            <div class="row">
				<div class="col-lg-12">
					<div class="panel-body" align="center">
						<p>
                            <?php   include ("../pages/branch_links.php");?>
                        </p>						   
					</div>
             </div>				
             </div>
            <div class="row">
                <div class="col-lg-12">
					<?php
								$query="select * from stock_transfer inner join user inner join items on stock_transfer.user_id = user.id && stock_transfer.item_id=items.ITEM_ID order by stock_transfer_id desc ";
								$query_run=mysqli_query($con,$query);
								$rows=mysqli_num_rows($query_run);
								echo "<h3>Stock Transfer Report</h3>";
						        echo "	<div class='dataTable_wrapper'>
								 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
											<thead class='static'>	
												<tr bgcolor='#DCDCDC'>
													<td>User</td>
													<td>Item Name</td><td>Date</td><td>From Store</td><td>To Store</td><td>Quantity</td>
												
											</thead><tbody>";
								while($a=mysqli_fetch_assoc($query_run)){
									echo "<tr bgcolor='#fff'>
										<td>".$a['username']."</td>
										<td>".$a['ITEM_NAME']."</td>
										<td>".$a['date']."</td>";
											$query1="select * from branches where branch_id=".$a['store_from_id']."";
											$query_run1=mysqli_query($con,$query1);
											while($a1=mysqli_fetch_assoc($query_run1)){
												echo "<td>".$a1['branch_name']."</td>";
											}
											
											$query2="select * from branches where branch_id=".$a['store_to_id']."";
											$query_run2=mysqli_query($con,$query2);
											while($a2=mysqli_fetch_assoc($query_run2)){
												echo "<td>".$a2['branch_name']."</td>";
											}
										echo "<td>".$a['quantity']."</td>
										</tr>";
								}
								echo "</tbody></table><br>";
								print "</div>";
								
								

					?>

                </div>
                <!-- /.col-lg-12 -->
            </div>			 
             

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    <!-- /#wrapper -->

   <?php   include ("../pages/footer.php");?>  