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

	if(isset($_POST['save_purchase_returns'])){
		$supplier_name=$_POST['supplier_name'];
		
		$date_returned=$_POST['date_returned'];
		$date_returned = strtotime( $date_returned );
		$date_returned = date( 'Y-m-d H:i:s', $date_returned );
		
		$ITEM_NAME=$_POST['ITEM_NAME'];
		$quantity=$_POST['quantity'];
		$amount=$_POST['amount'];
		$query="insert into purchases_returns (supplier_id,	date_returned,	ITEM_ID, quantity,	amount) values((select supplier_id from suppliers where supplier_name='$supplier_name'), '$date_returned', (select ITEM_ID from items where ITEM_NAME='$ITEM_NAME'), '$quantity', '$amount')"; 
		mysqli_query($con,$query)or die(mysqli_error());
			$_SESSION['response'] ="<center><strong> <font color='Green'>Purchase Return successfully Added</font></strong></center>";
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
								  <h4>Manage Purchases Returns</h4>
								</div>
							</div>
						</div>
						<!-- /.col-lg-12 -->
				</div>		
                <div class="col-lg-12">
                <div class="col-md-3">
                    <h4>Purchases Returns</h4> 
					<?php echo "<h4><font color='green'>".$_SESSION['response']."</font></h4>"; $_SESSION['response']=""; ?>
                    <form id="main-contact-form" method="post" action="add_purchases_returns.php" role="form">
                    Supplier name 
					<div class="form-group">
                    <?php  selection('suppliers','supplier_name','No Suppliers');   ?>
                    </div>
                    Date 
                    <div class="form-group">
                    <input type="text"  name="date_returned"  id="dopDate" placeholder="Date Of Return"  required="required" class="form-control">
                    </div>
                    Item 
                    <div class="form-group">
                    <?php  selection('items','ITEM_NAME','No Items');   ?>
                    </div>
                    Quantity
                    <div class="form-group">
                    <input type="text"  name="quantity" placeholder="Quantity" required="required" class="form-control">
                    </div>
					Amount 
                    <div class="form-group">
                    <input type="text"  name="amount" placeholder="Amount Paid" required="required" class="form-control">
                    </div>
					<div class="form-group">
						<button type="submit" name="save_purchase_returns"  class="btn btn-success btn-md btn-block">Save Purchase Return</button>
					</div>
            </form>
		</div>
		<div class="col-md-9">
		<?php   include ("../pages/modify_purchases_returns.php");?>
		</div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->

   <?php   include ("../pages/footer.php");?>  
</body>

</html>