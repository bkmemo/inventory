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
	function selection($table_name,$column_name,$error){
		$con = db_connect();
         $query="select * from $table_name";
         $query_run = mysqli_query($con,$query);
         if($query_run){
              $count = mysqli_num_rows($query_run);
              if($count>0){
                   echo "<select name='$column_name' class='form-control'>";
                   while($a=mysqli_fetch_assoc($query_run)){
                        $category_name=$a[$column_name];
                         echo "<option>$category_name</option>";
                    }
                    echo "</select>";
               }
               else{
                    echo "<h3><font color='#ff0000'>$error</font></h3>";
               }
         }
         else{
              echo "<h3><font color='#ff0000'>MYSQL ERROR <br />".$query_run.mysqli_error()."</font></h3>";
         }
}//end of function
?>
<?php   include ("../pages/header.php");?>
<body>

    <div id="wrapper">

       

<?php   include ("../pages/side.php");?>

        <div id="page-wrapper">
			<div class="col-lg-12">
			<div class="panel-body" align="center">
						<p>
                            <?php   include ("../pages/branch_links.php");?>
                        </p>							   
			</div>	
            </div>			
            <div class="row">
                <div class="col-lg-12">
				
				<?php echo $_SESSION['response']; ?>
<?php
				if(!isset($_POST['branch_id'])){
					$_POST['branch_id'] = $_GET['branch_id'];
				}
				echo date("Y-m-d");
				$query0="SELECT * FROM branches INNER JOIN item_stock INNER JOIN items ON branches.branch_id=item_stock.branch_id && item_stock.ITEM_ID=items.ITEM_ID WHERE branches.branch_id=".intval($_POST['branch_id'])."";
				$query=mysqli_query($con,$query0)or die(mysqli_error($con));
				
				echo "<h3>Store Details <span style='float:right; color:#ff0000;'></span></h3>";
				
				echo "<div class='hero-unit-table'>";
				echo "<div class='table-responsive'>";
				echo "<table class='table table-striped table-bordered table-hover' id='employee_data3'>
							<thead class='static'>	
								<tr bgcolor='#DCDCDC'>
									<th>STORE NAME</th><th>ITEM NAME</th><th>QUANTITY</th><th>STORE</th><th>TRANSFER QTY</th><th>SUBMIT</th>
								</tr>
							</thead><tbody>";
							while($a=mysqli_fetch_assoc($query)){
								$branch_name=$a['branch_name'];
								$item_name=$a['ITEM_NAME'];
								$quantity=$a['QUANTITY'];
								echo "
									<tr><form method='post' action='save_stock_transfer.php'><input type='hidden' name='branch_id' value='".$_POST["branch_id"]."' /><input type='hidden' name='quantity' value='".$quantity."' /><input type='hidden' name='item_id' value='".$a['ITEM_ID']."' />
									<td>$branch_name</td>
									<td>$item_name</td>
									<td>$quantity</td>
									<td>";
										  $query2="select * from branches";
										 $query_run2 = mysqli_query($con,$query2);
										 if($query_run2){
											  $count = mysqli_num_rows($query_run2);
											  if($count>0){
												   echo "<select name='transfer_branch_id' class='form-control'>";
												   while($aa=mysqli_fetch_assoc($query_run2)){
														if($aa['branch_id'] != $_POST["branch_id"]){
														 echo "<option value='".$aa['branch_id']."'>".$aa['branch_name']."</option>";
														}
													}
													echo "</select>";
											   }
										 }
									echo "</td>
									<td><input type='text' name='transfer_quantity' /></td>
									<td><button type='submit' class='btn btn-info'>Trasfer</button></td>
									</form></tr>";
				}		
					echo "</tbody></table>";					
				print "</div>";
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