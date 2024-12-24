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
	if(isset($_GET['phone_id'])){
		$query="select * from phones where phone_id=$_GET[phone_id]";
		$query_run=mysqli_query($con,$query);
		if($_GET=mysqli_fetch_array($query_run)){
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
                          <h4>Edit Phones</h4>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
        </div>
			<div class="row">
				<div class="col-md-3">
 				<h3>Edit Phone</h3>
					<form id="main-contact-form" method="post" action="save_edit_phone.php" role="form">
						Model Name:
						<div class="form-group">
								<?php  selection('items','ITEM_NAME','No Models');   ?>
						</div>
						Serial Number:
						<div class="form-group">
							<input type="text" type="text"  name="serial_number" value="<?php echo $_GET['serial_number'];?>" placeholder="Enter Serial Number"  required="required" class="form-control" />
						</div>
						Supplier Name:
						<div class="form-group">
								<?php  selection('suppliers','supplier_name','No Suppliers');   ?>
						</div>
						<div class="form-group">
							Date <input  id="dopDate" type="text" class="form-control" value="<?php echo $_GET['register_date']; ?>"  name="register_date">
						</div>
						<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $_GET['phone_id']; ?>" required/>
						</div>
						<div class="form-group"> <br />
									<button type="submit" name="save_edit_phone"  class="btn btn-success btn-md btn-block">Save Edit Phone</button>
						</div>
												
					</form></div>
					<div class="col-md-9">
						<?php   include ("../pages/manage_phones.php");?> 
					</div>
			
                <!-- /.col-lg-12 -->
            </div>			 
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php   include ("../pages/footer.php");?>
<?php
		}
		else{
			include "add_new_phone.php";
		}
	}	
	else{
		include "add_new_phone.php";
	}
?>