<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
     error_reporting(0);
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	
	if(isset($_POST['save_packaging'])){
		$item_name=$_POST['item_name'];
		$whole_sale_price=$_POST['whole_sale_price'];
		$retail_price=$_POST['retail_price'];
		$package_type=$_POST['package_type'];
		$package_size = $_POST['package_size'];
		//get category id
		$query00 = "SELECT * FROM items WHERE ITEM_NAME='$item_name'";
		$query_run00=mysqli_query($con,$query00)or die(mysqli_error($con));
		while($a00=mysqli_fetch_assoc($query_run00)){
        	$item_id=$a00['ITEM_ID'];
        }
		
		// check if item alrady exists
		$query0 = "SELECT * FROM item_packaging WHERE ITEM_ID='$item_id' && PACKAGE_TYPE_ID=(select PACKAGE_TYPE_ID from package_type where PACKAGE_TYPE='$package_type')";
		$query_run0=mysqli_query($con,$query0)or die(mysqli_error($con));
		if(mysqli_num_rows($query_run0)<=0){
			//add new item to the database
			$query="insert into item_packaging (ITEM_ID,PACKAGE_TYPE_ID,WHOLE_SALE_PRICE,RETAIL_PRICE,PACK_SIZE) values('$item_id',(select PACKAGE_TYPE_ID from package_type where PACKAGE_TYPE='$package_type'),$whole_sale_price,$retail_price,$package_size)";
			$run = mysqli_query($con,$query)or die(mysqli_error($con));
			if($run){
				$query="insert into total_stock (ITEM_ID,PACKAGE_TYPE_ID,QUANTITY) values('$item_id',(select PACKAGE_TYPE_ID from package_type where PACKAGE_TYPE='$package_type'),0)";
				$run = mysqli_query($con,$query)or die(mysqli_error($con));
				$session['response'] = "<strong><font color='green'>$packaging Successfully Added To The Database</font></strong>";
			}
			else{
				$session['response'] = "<strong><font color='#cc0000'>Failled Add $packaging To The Database</font></strong>";
			}
		}
		else{
			$session['response'] = "<strong><font color='#cc0000'>Packaging Already Exists In The Database</font></strong>";
		}
		
	}	
	function selection($table_name,$column_name,$error){
		$con = db_connect();
         $query="select * from $table_name order by ITEM_NAME";
         $query_run = mysqli_query($con,$query);
         if($query_run){
              $count = mysqli_num_rows($query_run);
              if($count>0){
                   echo "<select name='$column_name' class='form-control'>";
                   while($a=mysqli_fetch_assoc($query_run)){
                        $item_name=$a['ITEM_NAME'];
                         echo "<option>$item_name</option>";
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
function selection2($table_name,$column_name,$error){
		$con = db_connect();
         $query="select * from $table_name order by $column_name";
         $query_run = mysqli_query($con,$query);
         if($query_run){
              $count = mysqli_num_rows($query_run);
              if($count>0){
                   echo "<select name='package_type' class='form-control'>";
                   while($a=mysqli_fetch_assoc($query_run)){
                        $package_type=$a['PACKAGE_TYPE'];
                         echo "<option>$package_type</option>";
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
?>
<?php   include ("../pages/header.php");?> 
<body>

    <div id="wrapper">
<?php   include ("../pages/side.php");?>

        <div id="page-wrapper">
        	<div class="row">
				<div class="col-lg-12">
					<div class="panel-body">
						<p>
                            <a href="add_packaging.php">
							<button type="button" class="btn btn-primary">Add New Packaging</button></a>
                            <a href="modify_packaging.php">
							<button type="button" class="btn btn-primary">View packaging</button></a>
                        </p>						   
					</div>
             </div>
             
					
            <div class="row">
                <div class="col-lg-12">
 <section>
 <?php echo $session['response']; $session['response']=""; ?>
<h4>Add New Package</h4>
    <form id="main-contact-form" method="post" action="?action=saveitem" role="form">
    
    <div class = "col-md-6">
    Item<br /><br />
    	<div class="form-group">
    	<?php  selection('items','item_name','No Items');   ?>
        </div>
    
    
    Packaging<br /><br />
    	<div class="form-group">
			<?php selection2('package_type','PACKAGE_TYPE','No Package Types'); ?>
      	</div>
        Package Size<br /><br />
    	<div class="form-group">
			<input type="text" type="text"  name="package_size" placeholder="Enter Size"  required="required" class="form-control" />
      	</div>
        Whole Sale Price<br /><br />
    	<div class="form-group">
			<input type="text" type="text"  name="whole_sale_price" placeholder="Enter Selling Price"  required="required" class="form-control" />
      	</div>
        Retail Price<br /><br />
    	<div class="form-group">
			<input type="text" type="text"  name="retail_price" placeholder="Enter Selling Price"  required="required" class="form-control" />
      	</div>
		
				<div class="form-group"> <br />
                    <button type="submit" name="save_packaging"  class="btn btn-success btn-md btn-block">Save Packaging</button>
               </div>
            </div>
        </form> </section> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php   include ("../pages/footer.php");?> 
