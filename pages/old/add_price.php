<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
	
	if(isset($_POST['save_price'])){
		$item_name=$_POST['item_name'];
		$retail_price=$_POST['retail_price'];
		//get category id
		$query00 = "SELECT * FROM items WHERE ITEM_NAME='$item_name'";
		$query_run00=mysqli_query($con,$query00)or die(mysqli_error($con));
		while($a00=mysqli_fetch_assoc($query_run00)){
        	$item_id=$a00['ITEM_ID'];
        }
		
		// check if item alrady exists
		$query0 = "SELECT * FROM item_retailprice WHERE item_id='$item_id'";
		$query_run0=mysqli_query($con,$query0)or die(mysqli_error($con));
		if(mysqli_num_rows($query_run0)<=0){
			//add new item to the database
			$query="insert into item_retailprice (item_id,retail_price) values('$item_id',$retail_price)";
			$run = mysqli_query($con,$query)or die(mysqli_error($con));
			if($run){
				$session['response'] = "<strong><font color='green'>Price Successfully Added To The Database</font></strong>";
			}
			else{
				$session['response'] = "<strong><font color='#cc0000'>Failled Add Price To The Database</font></strong>";
			}
		}
		else{
			$session['response'] = "<strong><font color='#cc0000'>Pricing Already Exists In The Database</font></strong>";
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
                            <a href="add_price.php">
							<button type="button" class="btn btn-primary">Add New Price</button></a>
                            <a href="modify_price.php">
							<button type="button" class="btn btn-primary">View Price</button></a>
                        </p>						   
					</div>
             </div>
             
					
            <div class="row">
                <div class="col-lg-12">
 <section>
 <?php echo $session['response']; $session['response']=""; ?>
<h3>Add New Retail Price</h3>
    <form id="main-contact-form" method="post" action="?action=saveitem" role="form">
    
    <div class = "col-md-6">
    Item<br /><br />
    	<div class="form-group">
    	<?php  selection('items','item_name','No Items');   ?>
        </div>
        Retail Price <br /><br />
    	<div class="form-group">
			<input type="text" type="text"  name="retail_price" placeholder="Price Per Item"  required="required" class="form-control" />
      	</div>
		
				<div class="form-group"> <br />
                    <button type="submit" name="save_price"  class="btn btn-success btn-md btn-block">Save Price</button>
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
