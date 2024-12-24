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
	$query="select * from item_stock inner join items on item_stock.ITEM_ID=items.ITEM_ID where item_stock.ITEM_ID=$_POST[item_id]";
	$query_run=mysqli_query($con,$query);
  if(!$query_run){
    echo $_POST['item_id']. $query_run.mysqli_error($con);
  }
	if($_GET=mysqli_fetch_array($query_run)){
?>


		<?php   include ("../pages/header.php");?>   
	
	
</head>
<body>
    <div id="wrapper">
		<?php   include ("../pages/side.php");?>   
        <div id="page-wrapper">
        	<div class="row">
        	<form id="main-contact-form" method="post" action="save_stock_taking.php" role="form">
            <div class="row">
            	<div class="col-lg-12">
					<h3>Stock Taking</h3>
						 <div class="col-md-3"> <strong>Item Name:</strong> <?php echo $_GET['ITEM_NAME']; ?></div>
						 <div class="col-md-3"> <strong>Computer Quantity:</strong> <?php echo $_GET['QUANTITY']; ?></div>
						  <div class="col-md-3"><strong>Physical Quantity:</strong></div>
                   <div class="col-md-3"> <div class="form-group">
                        <input type="text" value="" name="physical_qty" required="required" class="form-control" />
                    </div></div>
                 </div>
                 <div class="col-lg-12">
					<div class="form-group">
						<input type="hidden" name="computer_qty" value="<?php echo $_GET['QUANTITY']; ?>" required/>
            <input type="hidden" name="item_id" value="<?php echo $_GET['ITEM_ID']; ?>" required/>
					</div>
                 </div>
            </div>
            <div class="row">	
					<div class="form-group">
                    	<button type="submit" name="scat"  class="btn btn-success btn-md btn-block">Update Stock</button>
                	</div>
                </div><!-- /.col-lg-12 -->
        		</form>
            </div> <!-- /.row -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>
<?php
		}
		else{
			include "index.php";
		}
?>