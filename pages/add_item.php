<?php
	session_start(); // Use session variable on this page. This function must put on the top of page.
	include_once "connect.php"; 
	error_reporting(0);
	error_reporting (E_ALL ^ E_NOTICE);
	$con = db_connect();
	if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
		header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
	}
//end of function
function selection($table_name,$column_name,$error){
		$con = db_connect();
         $query="select * from  $table_name";
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
                $_SESSION['response'] = "<h4><font color='#ff0000'>$error</font></h4>";
               }
         }
         else{
            $_SESSION['response'] = "<h3><font color='#ff0000'>MYSQL ERROR <br />".$query_run.mysqli_error()."</font></h3>";
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
					<div class="panel panel-danger">
                        <div class="panel-heading">
								<?php   include ("item_links.php");?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
        </div>
             <div class="col-lg-12">
			  <div class="panel panel-primary">
				  <div class="panel-heading"><h4>Add New Items</h4></div>
				  <div class="panel-body">
					<?php if(!empty($_SESSION['response'])): ?>
						<div class="alert alert-success">
								<?php echo $_SESSION['response']; $_SESSION['response'] = ""; ?>
						</div>
					<?php endif; ?>
				 
                <form id="main-contact-form" method="post" action="save_add_item.php" role="form">
				<div class="row">
					<div class="col-md-4">
                     Model Name:
					 <div class="form-group"> 
						<input type="text" type="text"  name="phone_model_name" placeholder="Enter Model Name"  required="required" class="form-control" />
					 </div>
					 </div><div class="col-md-4">
					 Brand name:
					 <div class="form-group">
						<?php  selection('brands','brand_name','No Brands');   ?>
						</div>
						 </div><div class="col-md-4">
					Selling Price:
                	<div class="form-group"> 	 	
            			<input type="text" type="text"  name="sell_price" placeholder="Enter Selling Price"  required="required" class="form-control" />
                  	</div>
					 </div><div class="col-md-4">
                  	Buying Price:
                	<div class="form-group"> 	 	
            			<input type="text" type="text"  name="BUY_PRICE" placeholder="Enter Buying Price"  required="required" class="form-control" />
                  	</div>
					 </div><div class="col-md-4">
					Item Type
                	<div class="form-group"> 	 	
            			<select type="text" type="text"  name="item_type"  required="required" class="form-control">
						<option value="">Select Unit</option>
						<option>Phone</option>
						<option>Laptop</option>
						<option>Others</option>
						</select>
                  	</div>
					</div><div class="col-md-4">					
            		<div class="form-group"> <br />
                        <button type="submit" name="save_item"  class="btn btn-success btn-md btn-block">Save Item</button>
                    </div>
                </form> 
               </div>
               </div>
               </div>
               </div>
               </div>
               </div>
			   </div>

   <?php   include ("../pages/footer.php");?> 
