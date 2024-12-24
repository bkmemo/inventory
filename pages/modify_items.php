
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
<?php   include ("header.php");?> 
<body>

    <div id="wrapper">
<?php   include ("side.php");?>


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
             <div class="row">
			 <div class="panel panel-primary">
				  <div class="panel-heading"><h4>All Items</h4></div>
				  <div class="panel-body">
				  <?php if(!empty($_SESSION['response'])): ?>
						<div class="alert alert-success">
								<?php echo $_SESSION['response']; $_SESSION['response'] = ""; ?>
						</div>
					<?php endif; ?>
			<?php
			$query="select * from items inner join item_sellprice inner join brands on items.ITEM_ID=item_sellprice.ITEM_ID && items.brand_id=brands.brand_id";
			$query_run=mysqli_query($con,$query);
			$rows=mysqli_num_rows($query_run);
	        echo "	<div class='dataTable_wrapper'>
			 <table class='table table-striped table-bordered table-hover' id='employee_data3'>
			    <thead>
		            <tr><td>No.</td>
					<td>Model_Name</td>
					<td>Brand Name</td>
					<td>Buying Price</td>
					<td>Selling Price</td><td>ITEM_TYPE</td>
					<td>Edit</td><td>Delete</td></tr>
			    </thead><tbody>";
				$no_of_items=0;
			while($a=mysqli_fetch_assoc($query_run)){
				$item_id=$a['ITEM_ID'];
				$item_name=$a['ITEM_NAME'];
				$brand_name=$a['brand_name'];
				$sell_price=$a['PRICE'];
				$BUY_PRICE=$a['BUY_PRICE'];
				$ITEM_TYPE=$a['ITEM_TYPE'];
				$no_of_items++;
				echo "<tr><td>$no_of_items</td><td>$brand_name</td><td>$item_name</td><td>$BUY_PRICE</td><td>$sell_price</td><td>$ITEM_TYPE</td>
				
				<td><a href='edit_item.php?item_id=$item_id' class='btn btn-info'><i class='fa fa-edit'></a></td>
				<td><a href='delete_item.php?item_id=$item_id'  class='btn btn-danger delete-btn' data-id='$item_id'><i class='fa fa-trash'></a></td></tr>";
			}
			echo "</tbody></table><br>";
			
			print "</div>";
			
?>
</div>
			   </div>
			   </div>
			   </div>
			   </div>

   <?php   include ("footer.php");?> 
