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
	if(isset($_GET['supplier_id'])){
		$query="select * from suppliers WHERE supplier_id=$_GET[supplier_id]";
		$query_run=mysqli_query($con,$query);
	if($_GET=mysqli_fetch_array($query_run)){	}}
?>

   <?php   include ("../pages/header.php");?>  

<body>

    <div id="wrapper">

   <?php   include ("../pages/side.php");?>    
        <div id="page-wrapper">
		 <div class="row">
                <div class="col-lg-12">
					<div class="panel panel-danger">
                        <div class="panel-heading">
                          <?php include ("../pages/supplier_links.php");?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
        </div>
            	
			<div class="panel panel-primary">
				  <div class="panel-heading"><h4>Edit Supplier</h4></div>
				  <div class="panel-body">
						<?php if(!empty($_SESSION['response'])): ?>
						<div class="alert alert-success">
								<?php echo $_SESSION['response']; $_SESSION['response'] = ""; ?>
						</div>
					<?php endif; ?>
           			

                        <h3>Edit Supplier</h3>
                    <form id="main-contact-form" method="post" action="save_edit_sup.php" role="form">
					 <div class="row">	
						<div class="col-md-4">
                        Supplier Name	
                        <div class="form-group">
                            <input type="text"  name="supplier_name"  value="<?php echo $_GET['supplier_name']; ?>"  required="required" class="form-control">
                        </div>
						</div><div class="col-md-4">
                        Address  
                        <div class="form-group">
                            <input type="text"  name="address"  value="<?php echo $_GET['address']; ?>"   required="required" class="form-control">
                        </div>
						</div><div class="col-md-4">
                        Phone 
                        <div class="form-group">
                            <input type="text"  name="phone"  value="<?php echo $_GET['phone']; ?>"  required="required" class="form-control">
                        </div>
						</div><div class="col-md-4">
                        Email Address
                        <div class="form-group">
                             <input type="text"  name="email"  value="<?php echo $_GET['email']; ?>"  required="required" class="form-control">
                        </div>
						</div><div class="col-md-4">
						Supplier Type
						<div class="form-group">
						<select type="email"  name="supplier_type" placeholder="Email supplier_type"  class="form-control">
							<option>International Supplier</option>
							<option>Local Supplier</option>
						</select>
						</div>
						
						<div class="form-group">
        			    	<input type="hidden" name="id" value="<?php echo $_GET['supplier_id']; ?>" />
        				</div>
						</div><div class="col-md-4"><br>
        				<div class="form-group">
                            <button type="submit" name="edit_supplier"  class="btn btn-success btn-md btn-block">Save Edit Supplier</button>
                        </div>
                        </div>
                        </div>
					</form> 
		
				</div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

   <?php   include ("../pages/footer.php");?>  